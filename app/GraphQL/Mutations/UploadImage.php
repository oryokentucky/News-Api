<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


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
        $originalname = $file->getClientOriginalName();
        $filename=time().'_'.$originalname;

        $folderPath= 'images/'.str_replace('','_',$user->user_fullname);

        $path=$file->storeAS($folderPath,$filename,'public');

        return Storage::url($path);
    }
}
