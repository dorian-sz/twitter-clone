<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;

use function React\Promise\all;

class FriendshipContainer extends Component
{
    public $user;
    public $friends;

    public function mount()
    {
        $this->user = auth()->user();
        $this->friends = $this->user->friends()->get();
    }

    #[On('add-friend')]
    public function addFriend($friendId)
    {
        $friend = User::findOrFail($friendId);

        // Check if a friend request already exists
        if (!$this->friends->contains($friend)) {
            // Attach friend to user with pending status
            $this->user->friendsTo()->attach($friend->id, ['accepted' => true]);
        }
    }

    public function render()
    {
        return view('livewire.friendship-container')->with(["users" => $this->availableFriends()]);
    }

    private function availableFriends()
    {
        $friends = $this->user->friends()->get();
        $users = User::all()->except($this->user->id);
        $filtered = $users->diff($friends);
        return $filtered;
    }
}
