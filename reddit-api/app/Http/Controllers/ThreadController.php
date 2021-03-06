<?php

namespace App\Http\Controllers;

use App\Http\Requests\Thread\LinkThreadStoreRequest;
use App\Http\Requests\Thread\LinkThreadUpdateRequest;
use App\Http\Requests\Thread\TextThreadStoreRequest;
use App\Http\Requests\Thread\TextThreadUpdateRequest;
use App\Http\Resources\ThreadResource;
use App\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
        $thread = auth()->user()->threads()->create(
            array_merge($request->only('title', 'text'), [
                'thread_type' => "TEXT"
            ]));

        return new ThreadResource($thread);
    }


    public function updateLink(Thread $thread, LinkThreadUpdateRequest $request)
    {
        if($thread->thread_type != 'LINK'){
            abort(403, 'This is not a link thread');
        }


        $thread->update($request->only('title', 'url', 'attachment', 'attachment_type'));
        return new ThreadResource($thread);
    }


    public function updateText(Thread $thread,  TextThreadUpdateRequest $request)
    {
        if($thread->thread_type != 'TEXT'){
            abort(403, 'This is not a text thread');
        }

        $thread->update($request->only('title', 'text'));
        return new ThreadResource($thread);
    }

    public function destroy(Thread $thread)
    {
        $thread->delete();
        return response()->json([
           'message' => 'Deleted successfully'
        ]);
    }

}
