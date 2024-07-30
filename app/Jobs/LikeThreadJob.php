<?php

namespace App\Jobs;
use App\Exceptions\CannotLikeItem;
use App\Models\Thread;
use App\Models\User;


class LikeThreadJob
{
    private $thread;
    private $user;

    public function __construct(Thread $thread, User $user)
    {
        $this->thread = $thread;
        $this->user = $user;
    }

    public function handle()
    {
        if ($this->thread->isLikedBy($this->user)) {
            throw CannotLikeItem::alreadyLiked('thread');
        }

        $this->thread->likedBy($this->user);
    }
}
