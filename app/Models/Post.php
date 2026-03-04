<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Post extends Model
{
     use SoftDeletes;
     use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'post_title',
        'post_description',
        'post_slug',
        'post_status',
        'post_publish_date',
        'is_deleted',
        'language',
    ];

    protected $casts = [
        'post_publish_date' => 'date',
        'is_deleted' => 'boolean',
        'language' => 'array'
    ];

   protected static function boot()
    {
        parent::boot();
        //Auto Create Post_Slug
        static::creating(function($post){
            $slug=Str::slug($post->post_title);
            $originalSlug=$slug;
            $count=1;
            //Check Existing Slug
            while(static::where('post_slug',$slug)->exists()){
                $slug ="{$originalSlug}-".$count++;
            }
            $post->post_slug=$slug;

        });

        // When creating
        static::creating(function ($post) {
            $post->post_publish_date = now();
        });

        // When updating
        static::updating(function ($post) {
            $post->post_publish_date = now();
        });
    }
}
