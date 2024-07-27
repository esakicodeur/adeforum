<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Thread;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function __construct()
    {
        return $this->middleware([Authenticate::class, EnsureEmailIsVerified::class])->except(['index', 'show']);
    }

    public function index()
    {
        return view('pages.threads.index', [
            'threads' => Thread::paginate(10)
        ]);
    }

    public function create()
    {
        return view('pages.threads.create', [
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Category $category, Thread $thread)
    {
        return view('pages.threads.show', compact('thread', 'category'));
    }

    public function edit(Thread $thread)
    {
        //
    }

    public function update(Request $request, Thread $thread)
    {
        //
    }

    public function destroy(Thread $thread)
    {
        //
    }
}
