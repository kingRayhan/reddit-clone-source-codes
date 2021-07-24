<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Thread extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'url', 'attachment', 'attachment_type', 'user_id', 'thread_type', 'text'];

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public static function booted()
    {
        parent::booted();

        static::creating(function ($thread){
            $thread->slug = Str::slug($thread->title) .'--'. Str::uuid();
        });
//
//        static::deleted(function ($thread){
//            $thread->user->notifyUser()
//        });
    }


//    public function setTitleAttribute($title)
//    {
//        $this->attributes['title'] = $title;
//        $this->attributes['slug'] = Str::slug($title) .'--'. Str::uuid();
//    }
}
