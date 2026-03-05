<?php declare(strict_types=1);

namespace App\GraphQL\Queries;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

final readonly class GetImageUrl
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $user= Auth::user();

        if(!$user){
            return null;
        }
    $directory ='images/'.str_replace('','_',$user->user_fullname);

    $files = Storage::disk('public')->files($directory);

    return array_map(function($path){
        return Storage::url($path);
    },$files);


    }
}
