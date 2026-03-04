<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;
use App\Models\Post;

final readonly class Post_Update
{
 public function __invoke($_, array $args)
{
    $post = Post::findOrFail($args['post_id']);
    $post->update($args);
    $post->post_publish_date =now();
    return $post;
}

}
