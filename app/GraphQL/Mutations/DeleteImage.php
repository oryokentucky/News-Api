<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

use Illuminate\Support\Facades\Auth;


final readonly class DeleteImage
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
  $user = Auth::user();

        // Find the media record by ID
        $media = Media::find($args['id']);

        // 1. Security Check: Ensure the media exists
        // 2. Security Check: Ensure the media belongs to the logged-in user
        if (!$media || $media->model_id !== $user->id || $media->model_type !== get_class($user)) {
            return false;
        }

        // This deletes the file from the disk AND the row from the database
        $media->delete();

        return true;
    }
}
