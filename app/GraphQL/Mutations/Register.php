<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;
use App\Models\User;

final readonly class Register
{
    public function __invoke($_, array $args)
{
    $user = User::create([
        'user_fullname' => $args['user_fullname'],
        'email' => $args['user_email'],
        'user_mobile' => $args['user_mobile'],
        'password' => bcrypt($args['password'])
    ]);

    return "Successfully Registered!";
}

}
