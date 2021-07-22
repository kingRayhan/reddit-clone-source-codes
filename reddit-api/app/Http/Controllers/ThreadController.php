<?php

namespace App\Http\Controllers;

use App\Http\Requests\Thread\LinkThreadStoreRequest;
use App\Http\Requests\Thread\TextThreadStoreRequest;
use App\Http\Resources\ThreadResource;
use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show');
    }

    public function index()
    {
        $threads =  Thread::orderBy('created_at', 'desc')->paginate(\request()->query('limit', 10));

        return ThreadResource::collection($threads);

    }

    public function show(Thread $thread)
    {
        return new ThreadResource($thread);
    }


    public function submitLink(LinkThreadStoreRequest $request)
    {
        $thread = auth()->user()->threads()->create(
            array_merge($request->only('title', 'url', 'attachment', 'attachment_type'), [
                'thread_type' => "LINK"
            ]));

        return new ThreadResource($thread);
    }


    public function submitText(TextThreadStoreRequest $request)
    {

    }

}
