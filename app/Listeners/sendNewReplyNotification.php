<?php

namespace App\Listeners;

use App\Events\ReplyWasCreated;
use App\Notifications\NewReplyNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class sendNewReplyNotification
{
    public function handle(ReplyWasCreated $event)
    {
        $thread = $event->reply->replyAble();

        $thread->author()->notify(new NewReplyNotification($event->reply));
    }
}
