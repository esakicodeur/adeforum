<?php

namespace App\Listeners;

use App\Events\ReplyWasCreated;

class AwardPointsForCreatingReply
{
    public function handle(ReplyWasCreated $event)
    {
        $amount = config('points.rewards.new_reply');
        $message = 'L\'utilisateur a créé une réponse';

        $author = $event->reply->author();

        $author->addPoints($amount, $message);
    }
}
