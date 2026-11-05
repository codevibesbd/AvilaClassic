@extends('admin.layouts.app')

@section('title', 'Create Administrator Account')
@section('page_title', 'New User')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">

    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <div class="flex items-center gap-2 text-xs font-mono text-ink-muted mb-1">
                <a href="{{ route('admin.users.index') }}" class="hover:text-saddle">&larr; Back to Admin Accounts</a>
            </div>
            <h1 class="font-serif text-2xl sm:text-3xl font-medium text-ink">New Administrator Account</h1>
        </div>
    </div>

    <form action="{{ route('admin.users.store') }}" method="POST" class="bg-white rounded-xl border border-paper-border p-6 shadow-xs space-y-5">
        @csrf

        <div class="space-y-4">
            <div>
                <label for="name" class="block text-xs font-mono uppercase text-ink-muted mb-1">Full Legal Name *</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                       class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-sm text-ink focus-visible:ring-2 focus-visible:ring-saddle">
            </div>

            <div>
                <label for="email" class="block text-xs font-mono uppercase text-ink-muted mb-1">Corporate Email Address *</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                       class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-sm text-ink focus-visible:ring-2 focus-visible:ring-saddle">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="role" class="block text-xs font-mono uppercase text-ink-muted mb-1">Access Role *</label>
                    <select id="role" name="role" required class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink">
                        <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin (Full Catalog & Content)</option>
                        <option value="editor" {{ old('role') === 'editor' ? 'selected' : '' }}>Editor (Content & Inquiries)</option>
                        <option value="super_admin" {{ old('role') === 'super_admin' ? 'selected' : '' }}>Super Admin (System Governance)</option>
                    </select>
                </div>

                <div>
                    <label for="title" class="block text-xs font-mono uppercase text-ink-muted mb-1">Corporate Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title', 'Administrator') }}"
                           class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2 border-t border-paper-border">
                <div>
                    <label for="password" class="block text-xs font-mono uppercase text-ink-muted mb-1">Initial Password *</label>
                    <input type="password" id="password" name="password" required minlength="8"
                           class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-sm text-ink">
                </div>

                <div>
                    <label for="password_confirmation" class="block text-xs font-mono uppercase text-ink-muted mb-1">Confirm Password *</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required minlength="8"
                           class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-sm text-ink">
                </div>
            </div>

            <div class="pt-2">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 rounded text-saddle focus:ring-saddle">
                    <span class="text-xs font-medium text-ink">Account is immediately active</span>
                </label>
            </div>
        </div>

        <div class="flex items-center justify-end gap-3 pt-4 border-t border-paper-border">
            <a href="{{ route('admin.users.index') }}" class="px-4 py-2 text-xs font-mono text-ink-muted hover:text-ink">Cancel</a>
            <button type="submit" class="px-5 py-2.5 bg-saddle hover:bg-saddle-hover text-white text-xs font-mono font-semibold uppercase tracking-wider rounded transition-colors shadow-xs cursor-pointer">
                Create Account
            </button>
        </div>
    </form>

</div>
@endsection

