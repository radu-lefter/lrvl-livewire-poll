<?php

namespace App\Livewire;

use App\Models\Poll;
use App\Models\Option;
use Livewire\Component;

class Polls extends Component
{
    protected $listeners = [
        'pollCreated' => 'render'
    ];
    public function render()
    {
        $polls = Poll::with('options.votes')->latest()->get();

        return view('livewire.polls', ['polls' => $polls]);
    }

    public function vote(Option $option)
    {
        $option->votes()->create();
    }

    public function deletePoll($pollId)
    {
        // Find the poll by ID and delete it
        $poll = Poll::find($pollId);

        // Optional: Check if the poll exists and if the user has permission to delete
        if ($poll) {
            $poll->delete();

            $this->dispatch('pollDeleted');
        } 
    }
    
}
