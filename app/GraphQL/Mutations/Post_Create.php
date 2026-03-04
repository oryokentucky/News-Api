<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;
use App\Models\Post;
final readonly class Post_Create
{
  public function __invoke($_, array $args)
{

    return Post::create($args);
    $post = Post::findOrFail($args['post_id']);
    $post->post_publish_date =now();

}

}
