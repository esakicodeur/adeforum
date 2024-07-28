<?php

namespace App\Http\Livewire\Thread;

use Livewire\Component;

class Delete extends Component
{
    public $thread;
    public $confirmingThreadDeletion = false;

    public function confirmThreadDeletion()
    {
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('confirming-delete-thread');
        $this->confirmingThreadDeletion = true;
    }

    public function deleteThread()
    {
        $this->thread->delete();

        session()->flash('success', 'Sujet supprimé !');

        return redirect()->route('threads.index');
    }

    public function render()
    {
        return view('livewire.thread.delete');
    }
}
