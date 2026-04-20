@extends('admin.layout')

@section('title', 'Lead #' . $lead->id)
@section('page_title', 'Lead Details')

@section('content')
    {{-- Back link --}}
    <div class="mb-6">
        <a href="{{ route('admin.leads.index') }}" class="text-sm text-slate-500 hover:text-primary-600 transition-colors flex items-center">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Back to Leads
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Left column: Lead info + actions --}}
        <div class="lg:col-span-1 space-y-6">
            {{-- Contact card --}}
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-200 bg-slate-50">
                    <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wide">Contact Information</h2>
                </div>
                <div class="px-6 py-4 space-y-3">
                    <div>
                        <div class="text-xs text-slate-400 mb-0.5">Name</div>
                        <div class="text-sm font-medium text-slate-900">{{ $lead->contact_name ?: '—' }}</div>
                    </div>
                    <div>
                        <div class="text-xs text-slate-400 mb-0.5">WhatsApp</div>
                        <div class="text-sm text-slate-900">
                            @if($lead->whatsapp)
                                <a href="https://wa.me/{{ ltrim(preg_replace('/[^0-9]/', '', $lead->whatsapp), '0') }}" target="_blank" class="text-green-600 hover:text-green-700 font-medium">
                                    {{ $lead->whatsapp }}
                                </a>
                            @else
                                <span class="text-slate-400">—</span>
                            @endif
                        </div>
                    </div>
                    <div>
                        <div class="text-xs text-slate-400 mb-0.5">Email</div>
                        <div class="text-sm text-slate-900">
                            @if($lead->email)
                                <a href="mailto:{{ $lead->email }}" class="text-primary-600 hover:text-primary-700">{{ $lead->email }}</a>
                            @else
                                <span class="text-slate-400">—</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- Business card --}}
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-200 bg-slate-50">
                    <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wide">Business Details</h2>
                </div>
                <div class="px-6 py-4 space-y-3">
                    @php
                        $bizFields = [
                            'Business Name'    => $lead->business_name,
                            'Business Type'    => $lead->business_type,
                            'Daily Enquiries'  => $lead->daily_enquiries,
                            'Channel'          => $lead->channel,
                            'After Hours'      => $lead->after_hours,
                            'Team Size'        => $lead->team_size,
                            'Monthly Volume'   => $lead->monthly_volume,
                            'Runs Ads'         => $lead->runs_ads,
                            'Pain Points'      => $lead->pain_points ? implode(', ', $lead->pain_points) : null,
                        ];
                    @endphp
                    @foreach($bizFields as $label => $value)
                        <div>
                            <div class="text-xs text-slate-400 mb-0.5">{{ $label }}</div>
                            <div class="text-sm text-slate-900">{{ $value ?: '—' }}</div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Source & metadata --}}
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-200 bg-slate-50">
                    <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wide">Source &amp; Metadata</h2>
                </div>
                <div class="px-6 py-4 space-y-3">
                    <div>
                        <div class="text-xs text-slate-400 mb-0.5">Lead Source</div>
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium {{ $lead->source === 'form' ? 'bg-violet-100 text-violet-700' : 'bg-teal-100 text-teal-700' }}">
                            {{ $lead->source === 'form' ? 'Form' : 'Inline Chat' }}
                        </span>
                    </div>
                    <div>
                        <div class="text-xs text-slate-400 mb-0.5">Captured From Page</div>
                        <div class="text-sm text-slate-900 break-all">{{ $lead->page_url ?: '—' }}</div>
                    </div>
                    <div>
                        <div class="text-xs text-slate-400 mb-0.5">Referrer</div>
                        <div class="text-sm text-slate-900 break-all">{{ $lead->referrer ?: '—' }}</div>
                    </div>
                    <div>
                        <div class="text-xs text-slate-400 mb-0.5">Total Chat Turns</div>
                        <div class="text-sm text-slate-900">{{ $lead->total_turns }}</div>
                    </div>
                    <div>
                        <div class="text-xs text-slate-400 mb-0.5">IP Address</div>
                        <div class="text-sm text-slate-500 font-mono">{{ $lead->ip_address ?: '—' }}</div>
                    </div>
                    <div>
                        <div class="text-xs text-slate-400 mb-0.5">Session ID</div>
                        <div class="text-xs text-slate-400 font-mono break-all">{{ $lead->session_id }}</div>
                    </div>
                    <div>
                        <div class="text-xs text-slate-400 mb-0.5">Created</div>
                        <div class="text-sm text-slate-900">{{ $lead->created_at?->format('M d, Y \a\t H:i:s') }}</div>
                    </div>
                    <div>
                        <div class="text-xs text-slate-400 mb-0.5">Last Updated</div>
                        <div class="text-sm text-slate-900">{{ $lead->updated_at?->format('M d, Y \a\t H:i:s') }}</div>
                    </div>
                </div>
            </div>

            {{-- Status update --}}
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-200 bg-slate-50">
                    <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wide">Manage Status</h2>
                </div>
                <div class="px-6 py-4">
                    <form method="POST" action="{{ route('admin.leads.update-status', $lead->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="flex gap-2">
                            <select name="status" class="input px-3 py-2 text-sm flex-1">
                                <option value="active" {{ $lead->status === 'active' ? 'selected' : '' }}>Active</option>
                                <option value="lead_captured" {{ $lead->status === 'lead_captured' ? 'selected' : '' }}>Lead Captured</option>
                                <option value="demo_booked" {{ $lead->status === 'demo_booked' ? 'selected' : '' }}>Demo Booked</option>
                                <option value="abandoned" {{ $lead->status === 'abandoned' ? 'selected' : '' }}>Abandoned</option>
                            </select>
                            <button type="submit" class="btn btn-sm text-white px-4" style="background: linear-gradient(90deg, #39C6C8, #5B79C9, #9A3DB8);">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Admin Notes --}}
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-200 bg-slate-50">
                    <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wide">Admin Notes</h2>
                </div>
                <div class="px-6 py-4">
                    <form method="POST" action="{{ route('admin.leads.update-notes', $lead->id) }}">
                        @csrf
                        @method('PATCH')
                        <textarea name="admin_notes" rows="4" placeholder="Add internal notes about this lead..."
                                  class="input px-3 py-2 text-sm mb-3">{{ old('admin_notes', $lead->admin_notes) }}</textarea>
                        <button type="submit" class="btn btn-sm text-white px-4" style="background: linear-gradient(90deg, #39C6C8, #5B79C9, #9A3DB8);">
                            Save Notes
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Right column: Chat transcript --}}
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex items-center justify-between">
                    <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wide">Chat Transcript</h2>
                    <span class="text-xs text-slate-400">{{ $lead->messages->count() }} message(s)</span>
                </div>
                <div class="px-6 py-4 max-h-[700px] overflow-y-auto space-y-4">
                    @forelse($lead->messages as $msg)
                        @if($msg->role === 'user')
                            <div class="flex justify-end">
                                <div class="max-w-[80%] bg-primary-50 border border-primary-100 rounded-xl rounded-tr-sm px-4 py-3">
                                    <div class="text-xs text-primary-500 font-medium mb-1">Visitor</div>
                                    <div class="text-sm text-slate-800 whitespace-pre-wrap">{{ $msg->content }}</div>
                                    <div class="text-xs text-slate-400 mt-1">{{ $msg->created_at?->format('H:i:s') }}</div>
                                </div>
                            </div>
                        @elseif($msg->role === 'assistant')
                            <div class="flex justify-start">
                                <div class="max-w-[80%] bg-slate-50 border border-slate-200 rounded-xl rounded-tl-sm px-4 py-3">
                                    <div class="text-xs text-teal-600 font-medium mb-1">Lexi (AI)</div>
                                    <div class="text-sm text-slate-800 whitespace-pre-wrap">{{ $msg->content }}</div>
                                    <div class="text-xs text-slate-400 mt-1">Turn {{ $msg->turn_number }} &middot; {{ $msg->created_at?->format('H:i:s') }}</div>
                                </div>
                            </div>
                        @else
                            <div class="flex justify-center">
                                <div class="px-3 py-1.5 bg-amber-50 border border-amber-200 rounded-full text-xs text-amber-700">
                                    System: {{ Str::limit($msg->content, 100) }}
                                </div>
                            </div>
                        @endif
                    @empty
                        <div class="text-center py-12 text-sm text-slate-400">
                            <svg class="w-12 h-12 mx-auto text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                            No chat messages recorded for this session.
                            <br>
                            <span class="text-xs">This lead may have been captured via the form only.</span>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
