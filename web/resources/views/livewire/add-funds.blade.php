<div>
    <button wire:click="openAddFundsModal">{{ __('Add Funds') }}</button>

    <x-dialog-modal wire:model.live="confirmingRecharge">
        <!-- Modal Title -->
        <x-slot name="title">
            {{ __('Add Funds') }}
        </x-slot>

        <!-- Modal Content -->
        <x-slot name="content">
            {{ __('Please enter the amount to recharge') }}

            <div class="mt-4">
                <x-input type="number" class="mt-1 block w-3/4" placeholder="{{ __('Amount') }}" step="0.01"
                         wire:model="rechargeAmount" />
                <x-input-error for="rechargeAmount" class="mt-2" />
            </div>
        </x-slot>

        <!-- Modal Footer -->
        <x-slot name="footer">
            <x-secondary-button wire:click="stopConfirmingRecharge" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3" dusk="recharge-button" wire:click="rechargeFunds" wire:loading.attr="disabled">
                {{ __('Recharge') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
