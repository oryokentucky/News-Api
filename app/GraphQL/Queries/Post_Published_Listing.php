<?php declare(strict_types=1);

namespace App\GraphQL\Queries;
use App\Models\Post;
use Carbon\Carbon;

final readonly class Post_Published_Listing
{


public function __invoke($_, array $args)
{
    return Post::where('id', $args['id'])
        ->whereDate('post_publish_date', '>=', Carbon::today())
        ->where('language', $args['language'])
        ->where('is_deleted', false)
        ->get();
}

}
