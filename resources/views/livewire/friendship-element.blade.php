<div class="flex w-full justify-between items-center">
    <p class="text-white font-semibold">
        {{ $user->name}}
    </p>
    <x-primary-button wire:click='addFriend'>Add friend</x-primary-button>
</div>
