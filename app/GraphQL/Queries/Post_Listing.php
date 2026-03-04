<?php declare(strict_types=1);

namespace App\GraphQL\Queries;
use App\Models\Post;

final readonly class Post_Listing
{
 public function __invoke()
{
    return Post::where('is_deleted', false)->get();
}

}
