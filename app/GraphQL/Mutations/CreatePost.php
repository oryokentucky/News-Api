<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

final readonly class CreatePost
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
            $user= Auth::user();

            $post = Post::create([
               'user_id'          => $user->id,
               'post_title'       => $args['post_title'] ?? null,
               'post_description' => $args['post_description'],
               'post_status'      => $args['post_status'],
               'language'         => $args['language'],

            ]);
            if (isset($args['Media'])) {
            $post->addMedia($args['Media'])
                 ->toMediaCollection('post_images', 'public');
        }

            return [$post];


    }
}
