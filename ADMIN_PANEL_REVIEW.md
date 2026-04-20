# Admin Panel — Code Review & Remediation Plan

> **Reviewer:** Senior Dev (20yr exp) · **Date:** 2026-03-04  
> **Scope:** chatbot_funnel admin panel (15 files, commit 466ffd1)  
> **Verdict:** Functional but has **3 critical**, **5 high**, and **6 medium** issues

---

## Executive Summary

The admin panel is **structurally sound** — authentication works, dashboard loads, leads list paginates correctly, CSV export streams properly, and CRUD operations all return expected HTTP codes. However, the review uncovered a **critical frontend–backend mismatch** where lead-source tracking (`page_url`/`referrer`) was never wired into the JavaScript fetch calls, an **export filter inconsistency**, and a **layout CSS bug** that breaks the sidebar on desktop viewports.

---

## CRITICAL Issues (P0 — Must Fix)

### C1. Frontend never sends `page_url` / `referrer` to backend

**File:** `resources/views/pages/chatbot-sales.blade.php`  
**Impact:** The `page_url` and `referrer` columns in `chatbot_sales_sessions` will **always be NULL**. The entire "Captured From" column in the admin leads table and the "Source & Metadata" card on the lead detail page will show "—" for every lead.

**Evidence (disk content):**

```js
// submitForm (line ~176) — sends raw this.form, no tracking fields
body: JSON.stringify(this.form),

// sendMessage (line ~343) — missing page_url & referrer
body: JSON.stringify({
    session_id: this.sessionId,
    chat_id:    this.chatId || undefined,
    messages:   historySlice,
    context:    this.context,
    turnCount:  this.aiTurnCount,
    // ❌ page_url and referrer are absent
}),

// bookDemo (line ~383) — missing page_url & referrer
body: JSON.stringify({
    session_id:     this.sessionId,
    chat_id:        this.chatId || undefined,
    businessType:   this.context.businessType,
    // ... other fields ...
    source:         'inline_chat',
    // ❌ page_url and referrer are absent
}),
```

**Fix — 3 changes in `chatbot-sales.blade.php`:**

1. **`submitForm()`** — replace `body: JSON.stringify(this.form)` with:
```js
body: JSON.stringify({
    ...this.form,
    source: 'form',
    page_url: window.location.href,
    referrer: document.referrer || '',
}),
```

2. **`sendMessage()`** — add after `turnCount`:
```js
page_url: window.location.href,
referrer: document.referrer || '',
```

3. **`bookDemo()`** — add after `source: 'inline_chat'`:
```js
page_url: window.location.href,
referrer: document.referrer || '',
```

---

### C2. Export CSV search filter misses `business_type`

**File:** `app/Http/Controllers/Admin/AdminLeadsController.php`  
**Impact:** When an admin filters by "search" on the leads list, the results include `business_type` matches. But calling "Export CSV" with the same filter **omits** `business_type` from the search, producing a **different result set**.

**Evidence:**

```php
// index() — line 71: includes business_type ✅
->orWhere('business_type', 'like', $term);

// export() — line 152: missing business_type ❌
->orWhere('business_name', 'like', $term);
// business_type is not searched
```

**Fix in `AdminLeadsController.php` `export()` method (~line 152):**
```php
$query->where(function ($q) use ($term) {
    $q->where('contact_name', 'like', $term)
      ->orWhere('email', 'like', $term)
      ->orWhere('whatsapp', 'like', $term)
      ->orWhere('business_name', 'like', $term)
      ->orWhere('business_type', 'like', $term); // ← ADD THIS
});
```

**Best practice:** Extract the shared filter logic into a private method to prevent future drift:

```php
private function applyFilters(Request $request, $query)
{
    if ($request->filled('status') && $request->input('status') !== 'all') {
        $query->where('status', $request->input('status'));
    }
    if ($request->filled('source') && $request->input('source') !== 'all') {
        $query->where('source', $request->input('source'));
    }
    if ($request->filled('search')) {
        $term = '%' . $request->input('search') . '%';
        $query->where(function ($q) use ($term) {
            $q->where('contact_name', 'like', $term)
              ->orWhere('email', 'like', $term)
              ->orWhere('whatsapp', 'like', $term)
              ->orWhere('business_name', 'like', $term)
              ->orWhere('business_type', 'like', $term);
        });
    }
    if ($request->filled('date_from')) {
        $query->whereDate('created_at', '>=', $request->input('date_from'));
    }
    if ($request->filled('date_to')) {
        $query->whereDate('created_at', '<=', $request->input('date_to'));
    }
    return $query;
}
```

---

### C3. Admin layout CSS breaks desktop sidebar

**File:** `resources/views/admin/layout.blade.php`  
**Impact:** On `lg:` breakpoint, sidebar has `lg:static` (position: static, in document flow) but the parent `<div class="min-h-full">` is **not a flex container**. This means the static sidebar takes a full-width block row, and the main content div (with `lg:pl-64`) renders **below** the sidebar with a left padding offset to nothing — the layout is broken on desktop.

**Evidence (line 23, 33, 88):**
```html
<div class="min-h-full">                          <!-- ❌ no flex -->
    <aside class="fixed ... lg:static w-64 ...">  <!-- lg:static = in flow = full-width block -->
    <div class="lg:pl-64">                         <!-- padding has no sidebar to pair with -->
```

**Fix — change parent wrapper and remove `lg:static` approach:**

**Option A (recommended — keep sidebar fixed on all breakpoints):**
```html
<!-- Line 33: Remove lg:static, keep fixed always -->
<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
       class="fixed inset-y-0 left-0 z-50 w-64 bg-slate-900 transform transition-transform duration-300 lg:translate-x-0 flex flex-col">
```
This keeps the sidebar fixed and the `lg:pl-64` on the main div works correctly.

**Option B (flex parent approach):**
```html
<div class="min-h-full lg:flex">
```
And remove `lg:pl-64` from the main content div since flex will handle the layout.

---

## HIGH Issues (P1 — Should Fix Before Production)

### H1. `redirectGuestsTo('/admin/login')` is global

**File:** `bootstrap/app.php` (line 25)  
**Impact:** Any future route using `auth` middleware (e.g., user dashboard, API auth) will redirect unauthenticated users to `/admin/login` instead of the appropriate login page.

**Fix:** Use `Authenticate` middleware override instead of `redirectGuestsTo`:

```php
// bootstrap/app.php — REMOVE:
$middleware->redirectGuestsTo('/admin/login');

// routes/web.php — add named route:
Route::get('/admin/login', ...)->name('login'); // ← This is already named 'admin.login'
```

Since the only `auth` middleware usage is for admin routes, the simplest fix is to name the login route `'login'` (Laravel's default expected name):

```php
Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
```

Or keep `admin.login` and override the middleware:

```php
// In AdminMiddleware or a custom Authenticate:
protected function redirectTo(Request $request): ?string
{
    return $request->expectsJson() ? null : route('admin.login');
}
```

---

### H2. No rate limiting on admin login

**File:** `app/Http/Controllers/Admin/AdminAuthController.php`  
**Impact:** Admin login has no brute-force protection. An attacker can attempt unlimited password guesses.

**Fix — Add throttle to login route:**

```php
// routes/web.php
Route::post('/login', [AdminAuthController::class, 'login'])
    ->middleware('throttle:5,1')  // 5 attempts per minute
    ->name('login.submit');
```

Or add manual `RateLimiter` in the controller (matching the pattern used in `ChatbotSalesController`):

```php
public function login(Request $request): RedirectResponse
{
    $key = 'admin-login:' . $request->ip();
    if (RateLimiter::tooManyAttempts($key, 5)) {
        $seconds = RateLimiter::availableIn($key);
        return back()->withErrors(['email' => "Too many attempts. Try again in {$seconds}s."])->onlyInput('email');
    }
    RateLimiter::hit($key, 60);
    // ... existing logic
}
```

---

### H3. Logout route is not auth-protected

**File:** `routes/web.php` (line 39)  
**Impact:** `/admin/logout` is outside the `auth` middleware group. While CSRF protects it from external abuse, an unauthenticated POST would still hit the controller, calling `Auth::logout()` and `session()->invalidate()` unnecessarily.

**Fix — Move logout inside auth group or add auth middleware:**

```php
Route::middleware(['auth', 'admin'])->group(function () {
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    // ... other protected routes
});
```

---

### H4. `leadForm.submitForm()` sends neither `source` nor `session_id`

**File:** `resources/views/pages/chatbot-sales.blade.php` (line 176)  
**Impact:** Form-submitted leads default to `source: 'inline_chat'` in the backend (since `source` is missing from the JSON body). This means every form submission is **incorrectly categorized as a chat lead** in the admin dashboard stats ("From Chat" vs. "From Form" counters will be wrong).

Also, no `session_id` is sent, so the backend creates a **new session** every time — no deduplication possible.

**Fix — already covered in C1 patch. Ensure `source: 'form'` is included.**

---

### H5. Form does not capture contact name

**File:** `resources/views/pages/chatbot-sales.blade.php`  
**Impact:** The lead capture form collects `businessName`, `teamSize`, `monthlyVolume`, `runsAds`, `whatsapp`, `email` — but **not the contact's name**. The backend field `contact_name` will always be NULL for form-submitted leads. In the admin panel, the "Contact" column shows "—" for these leads.

**Fix — Add a name field to `leadForm.form` and the HTML form:**

```js
form: { name: '', businessName: '', teamSize: '', monthlyVolume: '', runsAds: '', whatsapp: '', email: '' },
```

Add corresponding HTML input before the WhatsApp field:
```html
<div>
    <label class="block text-sm font-medium text-blue-200 mb-1">Your Name *</label>
    <input type="text" x-model="form.name" required placeholder="e.g. Dr. Sharma"
           class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent">
</div>
```

---

## MEDIUM Issues (P2 — Improve Before Scale)

### M1. WhatsApp link strips `+` prefix

**Files:** `resources/views/admin/leads/index.blade.php`, `resources/views/admin/leads/show.blade.php`  
**Impact:** `preg_replace('/[^0-9]/', '', $lead->whatsapp)` removes the `+` prefix. WhatsApp `wa.me` links require the country code without `+`, so this works for Indian numbers (91...) stored as `+91...`. However, if numbers are stored as `091...` or `0091...`, the link will break.

**Fix — Use a more robust sanitizer:**
```php
{{ ltrim(preg_replace('/[^0-9]/', '', $lead->whatsapp), '0') }}
```

---

### M2. Route ID parameter lacks type constraint

**File:** `routes/web.php`  
**Impact:** Routes like `/leads/{id}` accept any string. A request to `/admin/leads/abc` would cause a database error instead of a 404.

**Fix:**
```php
Route::get('/leads/{id}', ...)->whereNumber('id');
Route::patch('/leads/{id}/status', ...)->whereNumber('id');
Route::patch('/leads/{id}/notes', ...)->whereNumber('id');
```

---

### M3. Duplicated status badge logic across views

**Files:** `resources/views/admin/dashboard.blade.php` (line ~86), `resources/views/admin/leads/index.blade.php` (line ~109)  
**Impact:** The `$statusColors` array is defined inline in two separate views. Any new status (e.g. `'contacted'`) requires updating both.

**Fix — Extract to a Blade component:**

Create `resources/views/admin/components/status-badge.blade.php`:
```blade
@props(['status'])
@php
    $colors = [
        'active' => 'bg-amber-100 text-amber-700',
        'lead_captured' => 'bg-blue-100 text-blue-700',
        'demo_booked' => 'bg-green-100 text-green-700',
        'abandoned' => 'bg-red-100 text-red-700',
    ];
@endphp
<span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium {{ $colors[$status] ?? 'bg-slate-100 text-slate-700' }}">
    {{ str_replace('_', ' ', ucfirst($status)) }}
</span>
```

Usage: `<x-admin.components.status-badge :status="$lead->status" />`

---

### M4. N+1 query potential on dashboard

**File:** `app/Http/Controllers/Admin/AdminLeadsController.php` → `dashboard()`  
**Impact:** The dashboard fires **9 separate COUNT queries** to the database. While acceptable for low traffic, this becomes inefficient as the table grows.

**Fix — Use a single query with conditional aggregation:**
```php
$stats = ChatbotSalesSession::query()
    ->selectRaw("COUNT(*) as total")
    ->selectRaw("SUM(status = 'active') as active")
    ->selectRaw("SUM(status = 'lead_captured') as lead_captured")
    ->selectRaw("SUM(status = 'demo_booked') as demo_booked")
    ->selectRaw("SUM(status = 'abandoned') as abandoned")
    ->selectRaw("SUM(DATE(created_at) = CURDATE()) as today")
    ->selectRaw("SUM(created_at >= ?) as this_week", [now()->startOfWeek()])
    ->selectRaw("SUM(created_at >= ?) as this_month", [now()->startOfMonth()])
    ->selectRaw("SUM(source = 'inline_chat') as from_chat")
    ->selectRaw("SUM(source = 'form') as from_form")
    ->first()
    ->toArray();
```

Note: For SQLite, replace `CURDATE()` with `DATE('now')` and `SUM(expr)` works the same.

---

### M5. Admin seeder has hardcoded password

**File:** `database/seeders/AdminUserSeeder.php`  
**Impact:** Default credentials are in plaintext in version control. Anyone with repo access knows the admin password.

**Fix — Use environment variable:**
```php
User::firstOrCreate(
    ['email' => env('ADMIN_EMAIL', 'admin@hyluminix.com')],
    [
        'name'     => 'Admin',
        'password' => Hash::make(env('ADMIN_PASSWORD', Str::random(16))),
        'is_admin' => true,
    ]
);
```

---

### M6. Sidebar "Export CSV" link passes wrong query string

**File:** `resources/views/admin/layout.blade.php` (line 66)  
**Impact:** The sidebar export link uses `request()->getQueryString()` which would include the current page's query params. On the dashboard page, this is empty. On the leads page, it may include pagination params (`page=2`) which is irrelevant for export.

**Fix — Remove query string from sidebar export link or point to leads page first:**
```html
<a href="{{ route('admin.leads.export') }}"
```

The per-filter export is already available on the leads list page itself (the "Export CSV" link next to the results count), which correctly passes `request()->query()`.

---

## Summary — Remediation Priority

| # | Severity | Issue | Files | Effort |
|---|----------|-------|-------|--------|
| C1 | **CRITICAL** | Frontend never sends page_url/referrer | chatbot-sales.blade.php | 15 min |
| C2 | **CRITICAL** | Export search filter mismatch | AdminLeadsController.php | 5 min |
| C3 | **CRITICAL** | Desktop sidebar layout broken | admin/layout.blade.php | 5 min |
| H1 | HIGH | redirectGuestsTo is global | bootstrap/app.php, routes | 10 min |
| H2 | HIGH | No login rate limiting | routes/web.php or controller | 5 min |
| H3 | HIGH | Logout route unprotected | routes/web.php | 2 min |
| H4 | HIGH | Form sends wrong source | chatbot-sales.blade.php | (covered by C1) |
| H5 | HIGH | Form missing contact name | chatbot-sales.blade.php | 10 min |
| M1 | MEDIUM | WhatsApp link edge case | index/show blade | 2 min |
| M2 | MEDIUM | Route ID not constrained | routes/web.php | 2 min |
| M3 | MEDIUM | Duplicate status badge | dashboard/index blade | 10 min |
| M4 | MEDIUM | 9 dashboard queries | AdminLeadsController.php | 15 min |
| M5 | MEDIUM | Hardcoded admin password | AdminUserSeeder.php | 5 min |
| M6 | MEDIUM | Sidebar export link | admin/layout.blade.php | 2 min |

**Total estimated fix time: ~1.5 hours**
