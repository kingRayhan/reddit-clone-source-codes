<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{

    public function index()
    {
        return Thread::orderBy('created_at', 'desc')->paginate(\request()->query('limit', 10));
    }

}
