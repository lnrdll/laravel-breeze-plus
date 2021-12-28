<x-form-section :action="route('settings.profile.update')" method="PUT">
    <x-slot name="title">
        {{ __('Name') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your profile\'s name.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Name') }}" />
            <x-input name="name" id="name" type="text" class="mt-1 block w-full" value="{{ auth()->user()->name }}" />
            <x-input-error for="name" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-button>
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
