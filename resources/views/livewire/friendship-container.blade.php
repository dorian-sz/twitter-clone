<div class="flex flex-col h-full w-1/6 border-gray-700 border-l p-4 pt-10 gap-y-6">
    @foreach ($users as $user)
        <livewire:friendship-element :$user :key="$user->id" />
    @endforeach
</div>
