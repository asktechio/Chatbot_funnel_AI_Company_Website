<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminLeadsController;
use Illuminate\Support\Facades\Route;

// ─── Sitemap ─────────────────────────────────────────────────────────────────
Route::get('/sitemap.xml', function () {
    return response()->view('sitemap', [], 200, ['Content-Type' => 'application/xml']);
})->name('sitemap');

// ─── Home (Chatbot Sales Funnel) ────────────────────────────────────────────
Route::get('/', fn () => view('pages.chatbot-sales'))->name('home');

// ─── Chatbot Sales API ──────────────────────────────────────────────────────
Route::post('/chatbot-sales-lead', [\App\Http\Controllers\Api\ChatbotSalesController::class, 'submitLead'])->name('chatbot-sales.lead');
Route::post('/chatbot-sales-chat', [\App\Http\Controllers\Api\ChatbotSalesController::class, 'chat'])->name('chatbot-sales.chat');
Route::post('/chatbot-sales-guided', [\App\Http\Controllers\Api\ChatbotSalesController::class, 'saveGuidedTranscript'])->name('chatbot-sales.guided');

// ─── Use Cases ──────────────────────────────────────────────────────────────
Route::prefix('use-cases')->name('use-cases.')->group(function () {
    Route::get('/', fn () => view('pages.use-cases.index'))->name('index');
    Route::get('/ai-chatbot-loan-processing-lending', fn () => view('pages.use-cases.ai-chatbot-loan-processing-lending'))->name('loan-processing');
    Route::get('/ai-chatbot-mutual-fund-advisory', fn () => view('pages.use-cases.ai-chatbot-mutual-fund-advisory'))->name('mutual-fund');
    Route::get('/ai-chatbot-insurance-distribution', fn () => view('pages.use-cases.ai-chatbot-insurance-distribution'))->name('insurance');
    Route::get('/ai-chatbot-healthcare-patient-engagement', fn () => view('pages.use-cases.ai-chatbot-healthcare-patient-engagement'))->name('healthcare');
    Route::get('/ai-chatbot-ecommerce-retail', fn () => view('pages.use-cases.ai-chatbot-ecommerce-retail'))->name('ecommerce');
    Route::get('/ai-chatbot-real-estate-property', fn () => view('pages.use-cases.ai-chatbot-real-estate-property'))->name('real-estate');
    Route::get('/ai-chatbot-education-edtech', fn () => view('pages.use-cases.ai-chatbot-education-edtech'))->name('education');
    Route::get('/ai-chatbot-hospitality-travel', fn () => view('pages.use-cases.ai-chatbot-hospitality-travel'))->name('hospitality');
});

// ─── Company Pages ──────────────────────────────────────────────────────────
Route::get('/about', fn () => view('pages.about'))->name('about');
Route::get('/contact', fn () => view('pages.contact'))->name('contact');

// ─── Legal Pages ────────────────────────────────────────────────────────────
Route::get('/privacy-policy', fn () => view('pages.legal.privacy-policy'))->name('privacy-policy');
Route::get('/terms-of-service', fn () => view('pages.legal.terms-of-service'))->name('terms-of-service');

// ─── Admin Panel ────────────────────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {
    // Auth (guest)
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])
        ->middleware('throttle:5,1')
        ->name('login.submit');

    // Protected routes
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
        Route::get('/', [AdminLeadsController::class, 'dashboard'])->name('dashboard');
        Route::get('/leads', [AdminLeadsController::class, 'index'])->name('leads.index');
        Route::get('/leads/export', [AdminLeadsController::class, 'export'])->name('leads.export');
        Route::get('/leads/{id}', [AdminLeadsController::class, 'show'])->name('leads.show')->whereNumber('id');
        Route::patch('/leads/{id}/status', [AdminLeadsController::class, 'updateStatus'])->name('leads.update-status')->whereNumber('id');
        Route::patch('/leads/{id}/notes', [AdminLeadsController::class, 'updateNotes'])->name('leads.update-notes')->whereNumber('id');
    });
});
