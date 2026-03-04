<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Str;

final class ForgotPassword
{
   public function __invoke($_, array $args)
{

    $user = User::where('email', $args['user_email'])->firstOrFail();

    $token = md5(Str::random(32));

    $user->remember_token = $token;
    $user->save();

    return [
        'encryption' => $token
    ];
}
}

