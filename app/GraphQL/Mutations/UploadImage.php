<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;
use Illuminate\Support\Facades\Storage;


final readonly class UploadImage
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args):string
    {
        $file = $args['file'];

        $imagePath = $file->store('image','public');

        return Storage::url($imagePath);
    }
}
