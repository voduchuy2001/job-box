<div>
    <x-admin.card>
        <button
            wire:click="clearCache"
            class="btn btn-soft-info">
                <i wire:loading
                   wire:target="clearCache"
                   wire:loading.attr="disabled"
                   class="mdi mdi-loading mdi-spin align-middle me-2"></i>
                <span class="flex-grow-1">{{ __('Clear Cache') }}</span>
        </button>

        <button
            wire:click="clearAuthenticateLogs"
            class="btn btn-soft-danger">
            <i wire:loading
               wire:target="clearAuthenticateLogs"
               wire:loading.attr="disabled"
               class="mdi mdi-loading mdi-spin align-middle me-2"></i>
            <span class="flex-grow-1">{{ __('Clear Authenticate Logs') }}</span>
        </button>
    </x-admin.card>
</div>
