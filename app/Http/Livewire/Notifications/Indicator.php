<?php

namespace App\Http\Livewire\Notifications;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class Indicator extends Component
{
    public $hasNotifications;

    protected $listeners = [
        'markedAsRead' => 'setHasNotification',
    ];

    public function render(): View
    {
        $this->hasNotifications = $this->setHasNotifications(Auth::user()->unreadNotifications()->count());

        return view('livewire.notifications.indicator', [
            'hasNotification' => $this->hasNotifications,
        ]);
    }

    public function setHasNotifications(int $count): bool
    {
        return $count > 0;
    }
}
