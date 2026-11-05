@extends('admin.layouts.app')

@section('title', 'Administrator Accounts')
@section('page_title', 'Admin Accounts')

@section('content')
<div class="space-y-6">

    <!-- Header & Action -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="font-serif text-2xl sm:text-3xl font-medium text-ink">Administrator Accounts</h1>
            <p class="text-xs text-ink-muted mt-0.5">Manage operator profiles, system roles, and publication privileges for the Avila Classic OS.</p>
        </div>

        <a href="{{ route('admin.users.create') }}" 
           class="inline-flex items-center gap-2 px-4 py-2.5 bg-saddle hover:bg-saddle-hover text-white rounded-md text-xs font-mono font-semibold uppercase tracking-wider transition-colors shadow-xs shrink-0 focus-visible:ring-2 focus-visible:ring-saddle">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span>Create Admin User</span>
        </a>
    </div>

    <!-- Users Table -->
    <div class="bg-white rounded-xl border border-paper-border shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-paper-muted text-[10px] font-mono uppercase tracking-wider text-ink-muted border-b border-paper-border">
                        <th class="px-5 py-3">Administrator</th>
                        <th class="px-5 py-3">Role & Privileges</th>
                        <th class="px-5 py-3">Administrative Title</th>
                        <th class="px-5 py-3 text-center">Status</th>
                        <th class="px-5 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-paper-border text-xs">
                    @foreach($users as $user)
                        <tr class="hover:bg-paper-muted/40 transition-colors">
                            <td class="px-5 py-3.5">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-atelier-dark text-white text-xs font-semibold flex items-center justify-center shrink-0">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="font-semibold text-ink">{{ $user->name }}</div>
                                        <div class="text-[11px] font-mono text-ink-subtle">{{ $user->email }}</div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-5 py-3.5">
                                @if($user->role === 'super_admin')
                                    <span class="inline-flex items-center gap-1 text-[10px] font-mono font-semibold px-2 py-0.5 rounded-full bg-purple-50 text-purple-700 border border-purple-200">
                                        Super Admin
                                    </span>
                                @elseif($user->role === 'admin')
                                    <span class="inline-flex items-center gap-1 text-[10px] font-mono px-2 py-0.5 rounded-full bg-blue-50 text-blue-700 border border-blue-200">
                                        Admin
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 text-[10px] font-mono px-2 py-0.5 rounded-full bg-gray-100 text-gray-700">
                                        Editor
                                    </span>
                                @endif
                            </td>

                            <td class="px-5 py-3.5 text-ink-muted">
                                {{ $user->title ?: 'Administrator' }}
                            </td>

                            <td class="px-5 py-3.5 text-center">
                                @if($user->is_active)
                                    <span class="text-[10px] font-mono text-emerald-700 font-medium">Active</span>
                                @else
                                    <span class="text-[10px] font-mono text-gray-400">Suspended</span>
                                @endif
                            </td>

                            <td class="px-5 py-3.5 text-right whitespace-nowrap">
                                <div class="inline-flex items-center gap-2">
                                    <a href="{{ route('admin.users.edit', $user) }}" 
                                       class="px-2.5 py-1 text-xs font-mono font-medium rounded bg-paper-muted hover:bg-ink hover:text-white transition-colors">
                                        Edit
                                    </a>

                                    @if(auth()->id() !== $user->id)
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" 
                                              onsubmit="return confirm('Permanently remove admin account {{ $user->name }}?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-1 text-ink-muted hover:text-red-600 rounded transition-colors cursor-pointer" title="Delete">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

