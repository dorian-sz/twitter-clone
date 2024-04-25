<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class FriendshipElement extends Component
{
    public User $user;

    public function addFriend()
    {
        $this->dispatch('add-friend', friendId: $this->user->id);
    }

    public function render()
    {
        return view('livewire.friendship-element');
    }
}
