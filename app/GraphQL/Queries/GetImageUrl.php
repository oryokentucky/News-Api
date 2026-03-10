<?php declare(strict_types=1);

namespace App\GraphQL\Queries;

use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

final readonly class GetImageUrl
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $user= Auth::user();

        if(!$user){
            return null;
        }

        $mediaItems = $user->getMedia('avatars');

        return $mediaItems->map(function(Media $media){
            return[
                'file_name' => $media->file_name,
                'id' => $media->id,
            ];
        })->toArray();

    }
}
