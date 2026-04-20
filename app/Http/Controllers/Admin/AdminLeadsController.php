<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChatbotSalesSession;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminLeadsController extends Controller
{
    /**
     * Dashboard — summary stats (single aggregation query).
     */
    public function dashboard(): View
    {
        $raw = ChatbotSalesSession::query()
            ->selectRaw('COUNT(*) as total')
            ->selectRaw("SUM(status = 'active') as active")
            ->selectRaw("SUM(status = 'lead_captured') as lead_captured")
            ->selectRaw("SUM(status = 'demo_booked') as demo_booked")
            ->selectRaw("SUM(status = 'abandoned') as abandoned")
            ->selectRaw("SUM(DATE(created_at) = DATE('now')) as today")
            ->selectRaw('SUM(created_at >= ?) as this_week', [now()->startOfWeek()])
            ->selectRaw('SUM(created_at >= ?) as this_month', [now()->startOfMonth()])
            ->selectRaw("SUM(source = 'inline_chat') as from_chat")
            ->selectRaw("SUM(source = 'form') as from_form")
            ->first();

        $stats = [
            'total'         => (int) $raw->total,
            'active'        => (int) $raw->active,
            'lead_captured' => (int) $raw->lead_captured,
            'demo_booked'   => (int) $raw->demo_booked,
            'abandoned'     => (int) $raw->abandoned,
            'today'         => (int) $raw->today,
            'this_week'     => (int) $raw->this_week,
            'this_month'    => (int) $raw->this_month,
            'from_chat'     => (int) $raw->from_chat,
            'from_form'     => (int) $raw->from_form,
        ];

        // Recent leads (last 10)
        $recentLeads = ChatbotSalesSession::orderByDesc('created_at')
            ->limit(10)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentLeads'));
    }

    /**
     * Paginated leads list with filtering.
     */
    public function index(Request $request): View
    {
        $query = ChatbotSalesSession::query()->orderByDesc('created_at');
        $this->applyFilters($request, $query);

        $leads = $query->paginate(25)->withQueryString();

        return view('admin.leads.index', compact('leads'));
    }

    /**
     * Show a single lead with chat transcript.
     */
    public function show(int $id): View
    {
        $lead = ChatbotSalesSession::with('messages')->findOrFail($id);

        return view('admin.leads.show', compact('lead'));
    }

    /**
     * Update lead status.
     */
    public function updateStatus(Request $request, int $id): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:active,lead_captured,demo_booked,abandoned',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $lead = ChatbotSalesSession::findOrFail($id);
        $lead->update(['status' => $request->input('status')]);

        return back()->with('success', 'Status updated to "' . $request->input('status') . '".');
    }

    /**
     * Update admin notes for a lead.
     */
    public function updateNotes(Request $request, int $id): RedirectResponse
    {
        $request->validate([
            'admin_notes' => 'nullable|string|max:5000',
        ]);

        $lead = ChatbotSalesSession::findOrFail($id);
        $lead->update(['admin_notes' => $request->input('admin_notes')]);

        return back()->with('success', 'Notes saved.');
    }

    /**
     * Export leads as CSV.
     */
    public function export(Request $request): StreamedResponse
    {
        $query = ChatbotSalesSession::query()->orderByDesc('created_at');
        $this->applyFilters($request, $query);

        $leads = $query->get();

        $headers = [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename="leads-' . now()->format('Y-m-d') . '.csv"',
        ];

        return response()->stream(function () use ($leads) {
            $handle = fopen('php://output', 'w');

            // Header row
            fputcsv($handle, [
                'ID', 'Contact Name', 'WhatsApp', 'Email', 'Business Name',
                'Business Type', 'Daily Enquiries', 'Channel', 'After Hours',
                'Team Size', 'Monthly Volume', 'Runs Ads', 'Pain Points', 'Source', 'Status',
                'Page URL', 'Referrer', 'Total Turns', 'Admin Notes',
                'IP Address', 'Created At',
            ]);

            foreach ($leads as $lead) {
                fputcsv($handle, [
                    $lead->id,
                    $lead->contact_name,
                    $lead->whatsapp,
                    $lead->email,
                    $lead->business_name,
                    $lead->business_type,
                    $lead->daily_enquiries,
                    $lead->channel,
                    $lead->after_hours,
                    $lead->team_size,
                    $lead->monthly_volume,
                    $lead->runs_ads,
                    $lead->pain_points ? implode('; ', $lead->pain_points) : '',
                    $lead->source,
                    $lead->status,
                    $lead->page_url,
                    $lead->referrer,
                    $lead->total_turns,
                    $lead->admin_notes,
                    $lead->ip_address,
                    $lead->created_at?->format('Y-m-d H:i:s'),
                ]);
            }

            fclose($handle);
        }, 200, $headers);
    }

    /**
     * Apply shared filter logic for index & export.
     */
    private function applyFilters(Request $request, $query): void
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
    }
}
