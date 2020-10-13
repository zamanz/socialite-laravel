<?php

namespace App;

use App\Events\PostCreated;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $dispatchesEvents = [
        'created' => PostCreated::class,
    ];

    public function postMeta(){
        return $this->hasOne(PostMeta::class,'post_id','id');
    }
}
