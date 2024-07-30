<?php

namespace App\Jobs;

use App\Exceptions\CannotLikeItem;
use App\Models\Reply;
use Illuminate\Foundation\Auth\User;

class LikeReplyJob
{
    private $reply;
    private $user;

    public function __construct(Reply $reply, User $user)
    {
        $this->reply = $reply;
        $this->user = $user;
    }

    public function handle()
    {
        if ($this->reply->isLikedBy($this->user)) {
            throw CannotLikeItem::alreadyLiked('reply');
        }

        $this->reply->likedBy($this->user);
    }
}
