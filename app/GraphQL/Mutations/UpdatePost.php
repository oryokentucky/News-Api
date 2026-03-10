<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Post;


final readonly class UpdatePost
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {

           $post = Post::findOrFail($args['id']);

        // 1. Update the text fields (only if they are provided in the request)
        $post->update(array_filter([
            'post_title'       => $args['post_title'] ?? null,
            'post_description' => $args['post_description'] ?? null,
            'post_status'      => $args['post_status'] ?? null,
            'language'         => $args['language'] ?? null,
        ]));

        // 2. Handle the Image Update
        if (isset($args['Media'])) {
            $post->addMedia($args['Media'])
                 ->toMediaCollection('post_images', 'public');

            $post->refresh();
        }


        return $post;

    }
}
