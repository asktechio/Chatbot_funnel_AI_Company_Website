@extends('admin.layout')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')
    {{-- Stats grid --}}
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-8">
        <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
            <div class="text-xs font-medium text-slate-500 uppercase tracking-wide mb-1">Total Leads</div>
            <div class="text-2xl font-bold text-slate-900">{{ number_format($stats['total']) }}</div>
        </div>
        <div class="bg-white rounded-xl border border-green-200 p-5 shadow-sm">
            <div class="text-xs font-medium text-green-600 uppercase tracking-wide mb-1">Demo Booked</div>
            <div class="text-2xl font-bold text-green-700">{{ number_format($stats['demo_booked']) }}</div>
        </div>
        <div class="bg-white rounded-xl border border-blue-200 p-5 shadow-sm">
            <div class="text-xs font-medium text-blue-600 uppercase tracking-wide mb-1">Lead Captured</div>
            <div class="text-2xl font-bold text-blue-700">{{ number_format($stats['lead_captured']) }}</div>
        </div>
        <div class="bg-white rounded-xl border border-amber-200 p-5 shadow-sm">
            <div class="text-xs font-medium text-amber-600 uppercase tracking-wide mb-1">Active</div>
            <div class="text-2xl font-bold text-amber-700">{{ number_format($stats['active']) }}</div>
        </div>
    </div>

    {{-- Time-based + source stats --}}
    <div class="grid grid-cols-2 sm:grid-cols-5 gap-4 mb-8">
        <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
            <div class="text-xs font-medium text-slate-500 uppercase tracking-wide mb-1">Today</div>
            <div class="text-xl font-bold text-slate-900">{{ $stats['today'] }}</div>
        </div>
        <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
            <div class="text-xs font-medium text-slate-500 uppercase tracking-wide mb-1">This Week</div>
            <div class="text-xl font-bold text-slate-900">{{ $stats['this_week'] }}</div>
        </div>
        <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
            <div class="text-xs font-medium text-slate-500 uppercase tracking-wide mb-1">This Month</div>
            <div class="text-xl font-bold text-slate-900">{{ $stats['this_month'] }}</div>
        </div>
        <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
            <div class="text-xs font-medium text-slate-500 uppercase tracking-wide mb-1">From Chat</div>
            <div class="text-xl font-bold text-slate-900">{{ $stats['from_chat'] }}</div>
        </div>
        <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
            <div class="text-xs font-medium text-slate-500 uppercase tracking-wide mb-1">From Form</div>
            <div class="text-xl font-bold text-slate-900">{{ $stats['from_form'] }}</div>
        </div>
    </div>

    {{-- Abandoned --}}
    @if($stats['abandoned'] > 0)
    <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-8 flex items-center">
        <svg class="w-5 h-5 text-red-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
        </svg>
        <span class="text-sm text-red-700 font-medium">{{ $stats['abandoned'] }} abandoned session(s)</span>
        <a href="{{ route('admin.leads.index', ['status' => 'abandoned']) }}" class="ml-auto text-sm text-red-600 hover:text-red-800 font-medium">View &rarr;</a>
    </div>
    @endif

    {{-- Recent leads --}}
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-200 flex items-center justify-between">
            <h2 class="text-base font-semibold text-slate-900">Recent Leads</h2>
            <a href="{{ route('admin.leads.index') }}" class="text-sm text-primary-600 hover:text-primary-700 font-medium">View All &rarr;</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Contact</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Business</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Source</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-slate-500 uppercase tracking-wider"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($recentLeads as $lead)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-slate-900">{{ $lead->contact_name ?: '—' }}</div>
                                <div class="text-xs text-slate-500">{{ $lead->whatsapp ?: $lead->email ?: '—' }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600">{{ $lead->business_type ?: '—' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium {{ $lead->source === 'form' ? 'bg-violet-100 text-violet-700' : 'bg-teal-100 text-teal-700' }}">
                                    {{ $lead->source === 'form' ? 'Form' : 'Chat' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @include('admin.components.status-badge', ['status' => $lead->status])
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">{{ $lead->created_at?->format('M d, H:i') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <a href="{{ route('admin.leads.show', $lead->id) }}" class="text-sm text-primary-600 hover:text-primary-700 font-medium">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-sm text-slate-400">No leads yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
