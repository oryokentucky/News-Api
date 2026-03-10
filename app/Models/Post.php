<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Post extends Model implements HasMedia
{
     use InteractsWithMedia;
     use SoftDeletes;
     use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'post_title',
        'post_description',
        'post_slug',
        'post_status',
        'post_publish_date',
        'language',
    ];

    protected $casts = [
        'post_publish_date' => 'date',
        'language' => 'array'
    ];
    public function getPostImageUrlAttribute(): string
    {

        return $this->getFirstMediaUrl('post_images') ?: 'https://via.placeholder.com/500';
    }

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
            $post->clearMediaCollection('post_images');
            $post->post_publish_date = now();
        });
        //delete media
        static::deleting(function ($post) {
        // This tells Spatie to wipe the files even if
        // the Post record is just being soft-deleted.
        $post->clearMediaCollection('post_images');
    });
    }
}
