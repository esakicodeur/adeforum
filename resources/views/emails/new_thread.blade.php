@component('mail::message')
    **{{ $thread->author()->name() }}** a créé un nouveau fil de discussion

    @component('mail::panel')
        {{ $thread->excerpt(200) }}
    @endcomponent

    @component('mail::button', ['url' => route('threads.show', ['category' => $thread->category->slug(), 'thread' => $thread->slug()])])
        Voir le sujet
    @endcomponent

    Merci,
    Forum
@endcomponent
