<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Post;

final readonly class Post_Delete
{
  public function __invoke($_, array $args)
{
    $post = Post::findOrFail($args['post_id']);
    $post->delete();
    $post->save();

    return "Deleted Successfully";
}

}
