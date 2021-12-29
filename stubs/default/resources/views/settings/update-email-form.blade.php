<x-form-section :action="route('settings.email.notify')" method="POST">
    <x-slot name="title">
        {{ __('Email') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input name="email" id="email" type="email" class="mt-1 block w-full" value="{{ auth()->user()->email }}" />
            <x-input-error for="email" class="mt-2" />
        </div>

        <!-- Verification Message -->
        @if ($showVerificationMessage)
            <div class="col-span-6 sm:col-span-4 text-sm bg-gray-100 text-gray-800 font-medium rounded-lg p-2">
                <span>A verification email has been sent to {{ $emailToVerify }}.</span>
            </div>
        @endif
    </x-slot>

    <x-slot name="actions">
        <x-button>
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
