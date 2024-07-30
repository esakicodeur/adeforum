<?php

namespace App\Http\Livewire;

use App\Jobs\LikeThreadJob;
use App\Jobs\UnlikeThreadJob;
use App\Models\Thread;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LikeThread extends Component
{
    use DispatchesJobs;

    public $thread;

    public function mount(Thread $thread)
    {
        $this->thread = $thread;
    }

    public function toggleLike()
    {
        if ($this->thread->isLikedBy(Auth::user())) {
            $this->dispatchSync(new UnlikeThreadJob($this->thread, Auth::user()));
        } else {
            $this->dispatchSync(new LikeThreadJob($this->thread, Auth::user()));
        }
    }

    public function render()
    {
        return view('livewire.like-thread');
    }
}
