<?php

namespace App\Http\Livewire\Reply;

use App\Models\Reply;
use App\Policies\ReplyPolicy;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Update extends Component
{
    use AuthorizesRequests;

    public $replyId;
    public $replyOrigBody;
    public $replyNewBody;

    public function mount(Reply $reply)
    {
        $this->replyId = $reply->id();
        $this->replyOrigBody = $reply->body();

        $this->initialize($reply);
    }

    public function updateReply()
    {
        $reply = Reply::findOrFail($this->replyId);

        $this->authorize(ReplyPolicy::UPDATE, $reply);

        $reply->body = $this->replyNewBody;
        $reply->save();
        session()->flash('success', 'Réponse modifiée !');
        $this->initialize($reply);
    }

    public function initialize(Reply $reply)
    {
        $this->replyOrigBody = $reply->body();
        $this->replyNewBody = $this->replyOrigBody;
    }

    public function render()
    {
        return view('livewire.reply.update');
    }
}
