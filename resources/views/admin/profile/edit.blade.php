@extends('admin.layouts.app')

@section('title', 'Administrator Profile')
@section('page_title', 'My Profile')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">

    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="font-serif text-2xl sm:text-3xl font-medium text-ink">My Administrator Profile</h1>
            <p class="text-xs text-ink-muted mt-0.5">Update personal credentials, identity designation, and account security passphrase.</p>
        </div>
    </div>

    <form action="{{ route('admin.profile.update') }}" method="POST" class="bg-white rounded-xl border border-paper-border p-6 shadow-xs space-y-6">
        @csrf
        @method('PUT')

        <!-- Identity -->
        <div class="space-y-4">
            <h2 class="text-xs font-mono uppercase tracking-wider text-ink font-semibold border-b border-paper-border pb-2">
                Personal Identification
            </h2>

            <div>
                <label for="name" class="block text-xs font-mono uppercase text-ink-muted mb-1">Full Legal Name *</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                       class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-sm text-ink focus-visible:ring-2 focus-visible:ring-saddle">
            </div>

            <div>
                <label for="email" class="block text-xs font-mono uppercase text-ink-muted mb-1">Corporate Email Address *</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required
                       class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-sm text-ink focus-visible:ring-2 focus-visible:ring-saddle">
            </div>

            <div>
                <label for="title" class="block text-xs font-mono uppercase text-ink-muted mb-1">Administrative Designation</label>
                <input type="text" id="title" name="title" value="{{ old('title', $user->title) }}"
                       class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink">
            </div>
        </div>

        <!-- Security Passphrase -->
        <div class="space-y-4 pt-2 border-t border-paper-border">
            <h2 class="text-xs font-mono uppercase tracking-wider text-ink font-semibold border-b border-paper-border pb-2">
                Security Passphrase Update
            </h2>
            <p class="text-xs text-ink-subtle">Fill out these fields only if you wish to change your access password.</p>

            <div>
                <label for="current_password" class="block text-xs font-mono uppercase text-ink-muted mb-1">Current Password</label>
                <input type="password" id="current_password" name="current_password"
                       class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-sm text-ink"
                       placeholder="Required to confirm password change">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="password" class="block text-xs font-mono uppercase text-ink-muted mb-1">New Password</label>
                    <input type="password" id="password" name="password" minlength="8"
                           class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-sm text-ink"
                           placeholder="Minimum 8 characters">
                </div>

                <div>
                    <label for="password_confirmation" class="block text-xs font-mono uppercase text-ink-muted mb-1">Confirm New Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" minlength="8"
                           class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-sm text-ink"
                           placeholder="Repeat new password">
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end pt-4 border-t border-paper-border">
            <button type="submit" class="px-6 py-2.5 bg-saddle hover:bg-saddle-hover text-white text-xs font-mono font-semibold uppercase tracking-wider rounded transition-colors shadow-xs cursor-pointer">
                Commit Profile Changes
            </button>
        </div>
    </form>

</div>
@endsection

