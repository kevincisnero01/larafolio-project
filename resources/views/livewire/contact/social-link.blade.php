<div class="flex justify-center mt-8 space-x-6">
    @forelse($socialLinks as $socialLink)
        <a href="{{ $socialLink->url }}" target="_blank" class="text-4xl text-gray-400 hover:text-red-400">
            <span class="{{ $socialLink->icon ? 'sr-only' : '' }}">{{ $socialLink->name }}</span>
            <i class="{{ $socialLink->icon }}"></i>
        </a>
    @empty
        <h3 class="text-gray-300">{{ __('There is no social links to show!') }}</h3>
    @endforelse
    
    <!-- Boton add and edit -->
    <div class="flex items-center space-x-2">
        <x-actions.action_link wire:click.prevent="create" title="{{ __('New') }}" class="text-yellow-300 hover:text-blue-300">
            <x-icons.add/>
        </x-actions.action_link>
        <x-actions.action_link title="{{ __('Edit') }}" class="text-yellow-300 hover:text-blue-300">
            <x-icons.edit/>
        </x-actions.action_link>
    </div>

    <!-- SlideOver -->
    <x-modals.slideover>
        <div class="w-full sm:max-w-md px-6 py-4">
            <x-forms.create-or-edit-social-link-form/>
        </div>
    </x-modals.slideover>
</div>