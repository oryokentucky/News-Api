<?php declare(strict_types=1);


namespace App\GraphQL\Mutations;
use Illuminate\Support\Facades\Auth;

final readonly class UploadImage
{
    /** @param  array{}  $args */


    public function __invoke(null $_, array $args):string
    {
        $user = Auth::user();
        if (!$user) {
            throw new \Exception("User not found.");
        }

        $file = $args['file'];

        $media =$user->addMedia($file)
                ->usingFileName(time().'_'.$file->getClientOriginalName())
                ->toMediaCollection('avatars','public');

        return $media->getFullUrl();


}

}
