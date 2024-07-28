<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use App\Http\Requests\CreateReplyRequest;
use App\Jobs\CreateReply;
use App\Models\Reply;
use App\Policies\ReplyPolicy;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function __construct()
    {
        return $this->middleware([Authenticate::class, EnsureEmailIsVerified::class]);
    }

    public function store(CreateReplyRequest $request)
    {
        $this->authorize(ReplyPolicy::CREATE, Reply::class);

        $this->dispatchSync(CreateReply::fromRequest($request));
    }
}
