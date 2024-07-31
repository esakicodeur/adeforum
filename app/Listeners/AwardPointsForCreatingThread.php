<?php

namespace App\Listeners;

use App\Events\ThreadWasCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AwardPointsForCreatingThread
{
    public function handle(ThreadWasCreated $event)
    {
        $amount = config('points.rewards.new_thread');
        $message = 'L\'utilisateur a créé un fil de discussion';

        $author = $event->thread->author();

        $author->addPoints($amount, $message);
    }
}
