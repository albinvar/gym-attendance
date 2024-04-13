@props(['title' => __('Add Funds'), 'content' => __('Please enter the amount to recharge'), 'button' => __('Recharge')])

@php
    $confirmableId = md5($attributes->wire('then'));
@endphp

<span
    {{ $attributes->wire('then') }}
    x-data
    x-ref="span"
    x-on:click="$wire.startConfirmingRecharge('{{ $confirmableId }}')"
    x-on:recharge-confirmed.window="setTimeout(() => $event.detail.id === '{{ $confirmableId }}' && $refs.span.dispatchEvent(new CustomEvent('then', { bubbles: false })), 250);"
>
    {{ $slot }}
</span>

@once
    <x-dialog-modal wire:model.live="confirmingRecharge">
        <x-slot name="title">
            {{ $title }}
        </x-slot>

        <x-slot name="content">
            {{ $content }}

            <div class="mt-4" x-data="{}" x-on:confirming-recharge.window="setTimeout(() => $refs.recharge_amount.focus(), 250)">
                <x-input type="number" class="mt-1 block w-3/4" placeholder="{{ __('Amount') }}" step="0.01"
                         x-ref="recharge_amount"
                         wire:model="rechargeAmount"
                         wire:keydown.enter="rechargeFunds" />

                <x-input-error for="recharge_amount" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="stopConfirmingRecharge" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3" dusk="recharge-button" wire:click="rechargeFunds" wire:loading.attr="disabled">
                {{ $button }}
            </x-button>
        </x-slot>
    </x-dialog-modal>
@endonce
