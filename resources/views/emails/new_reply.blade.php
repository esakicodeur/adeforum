@component('mail::message')
    **{{ $reply->author()->name() }}** a répondu à ce sujet

    @component('mail::panel')
        {{ $reply->excerpt(200) }}
    @endcomponent

    @component('mail::button', ['url' => route('threads.show', ['category' => $reply->replyAble()->category->slug(), 'thread' => $reply->replyAble()->slug()])])
        Voir le sujet
    @endcomponent

    Merci,
    Forum
@endcomponent
