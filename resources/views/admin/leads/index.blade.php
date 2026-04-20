@extends('admin.layout')

@section('title', 'Leads')
@section('page_title', 'Leads')

@section('content')
    {{-- Filters --}}
    <form method="GET" action="{{ route('admin.leads.index') }}" class="bg-white rounded-xl border border-slate-200 shadow-sm p-4 mb-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-3">
            {{-- Search --}}
            <div class="lg:col-span-2">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name, email, WhatsApp, business..."
                       class="input px-3 py-2 text-sm">
            </div>
            {{-- Status --}}
            <div>
                <select name="status" class="input px-3 py-2 text-sm">
                    <option value="all">All Statuses</option>
                    <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="lead_captured" {{ request('status') === 'lead_captured' ? 'selected' : '' }}>Lead Captured</option>
                    <option value="demo_booked" {{ request('status') === 'demo_booked' ? 'selected' : '' }}>Demo Booked</option>
                    <option value="abandoned" {{ request('status') === 'abandoned' ? 'selected' : '' }}>Abandoned</option>
                </select>
            </div>
            {{-- Source --}}
            <div>
                <select name="source" class="input px-3 py-2 text-sm">
                    <option value="all">All Sources</option>
                    <option value="inline_chat" {{ request('source') === 'inline_chat' ? 'selected' : '' }}>Chat</option>
                    <option value="form" {{ request('source') === 'form' ? 'selected' : '' }}>Form</option>
                </select>
            </div>
            {{-- Date From --}}
            <div>
                <input type="date" name="date_from" value="{{ request('date_from') }}" class="input px-3 py-2 text-sm" placeholder="From date">
            </div>
            {{-- Date To + Submit --}}
            <div class="flex gap-2">
                <input type="date" name="date_to" value="{{ request('date_to') }}" class="input px-3 py-2 text-sm flex-1">
                <button type="submit" class="btn btn-sm text-white px-4 flex-shrink-0" style="background: linear-gradient(90deg, #39C6C8, #5B79C9, #9A3DB8);">
                    Filter
                </button>
                @if(request()->hasAny(['search', 'status', 'source', 'date_from', 'date_to']))
                    <a href="{{ route('admin.leads.index') }}" class="btn btn-sm border border-slate-300 text-slate-600 hover:bg-slate-50 px-3 flex-shrink-0">
                        Clear
                    </a>
                @endif
            </div>
        </div>
    </form>

    {{-- Results info --}}
    <div class="flex items-center justify-between mb-4">
        <p class="text-sm text-slate-500">
            Showing {{ $leads->firstItem() ?? 0 }}–{{ $leads->lastItem() ?? 0 }} of {{ $leads->total() }} leads
        </p>
        <a href="{{ route('admin.leads.export', request()->query()) }}" class="text-sm text-primary-600 hover:text-primary-700 font-medium flex items-center">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            Export CSV
        </a>
    </div>

    {{-- Leads table --}}
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">ID</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Contact</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Business</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">WhatsApp</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Source</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Captured From</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Turns</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Date</th>
                        <th class="px-4 py-3 text-right text-xs font-medium text-slate-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($leads as $lead)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-slate-500">#{{ $lead->id }}</td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="text-sm font-medium text-slate-900">{{ $lead->contact_name ?: '—' }}</div>
                                <div class="text-xs text-slate-500">{{ $lead->email ?: '—' }}</div>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="text-sm text-slate-700">{{ $lead->business_type ?: '—' }}</div>
                                @if($lead->business_name)
                                    <div class="text-xs text-slate-400">{{ $lead->business_name }}</div>
                                @endif
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-slate-700">
                                @if($lead->whatsapp)
                                    <a href="https://wa.me/{{ ltrim(preg_replace('/[^0-9]/', '', $lead->whatsapp), '0') }}" target="_blank" class="text-green-600 hover:text-green-700 font-medium">
                                        {{ $lead->whatsapp }}
                                    </a>
                                @else
                                    <span class="text-slate-400">—</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium {{ $lead->source === 'form' ? 'bg-violet-100 text-violet-700' : 'bg-teal-100 text-teal-700' }}">
                                    {{ $lead->source === 'form' ? 'Form' : 'Chat' }}
                                </span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-xs text-slate-500 max-w-[160px] truncate" title="{{ $lead->page_url }}">
                                @if($lead->page_url)
                                    {{ parse_url($lead->page_url, PHP_URL_PATH) ?: $lead->page_url }}
                                @else
                                    <span class="text-slate-300">—</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                @include('admin.components.status-badge', ['status' => $lead->status])
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-slate-500">{{ $lead->total_turns }}</td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-slate-500">{{ $lead->created_at?->format('M d, H:i') }}</td>
                            <td class="px-4 py-3 whitespace-nowrap text-right">
                                <a href="{{ route('admin.leads.show', $lead->id) }}" class="text-sm text-primary-600 hover:text-primary-700 font-medium">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="px-6 py-12 text-center text-sm text-slate-400">
                                No leads found matching your filters.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($leads->hasPages())
            <div class="px-6 py-4 border-t border-slate-200 bg-slate-50">
                {{ $leads->links() }}
            </div>
        @endif
    </div>
@endsection
