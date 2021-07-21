<?php

namespace App\Http\Controllers;

use App\Http\Resources\ThreadResource;
use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{

    public function index()
    {
        $threads =  Thread::orderBy('created_at', 'desc')->paginate(\request()->query('limit', 10));

        return ThreadResource::collection($threads);

    }

    public function show(Thread $thread)
    {
        return new ThreadResource($thread);
    }

}
