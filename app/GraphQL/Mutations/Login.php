<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

final readonly class Login
{
    public function __invoke($_, array $args)
{
    $user = User::where('email', $args['user_email'])->first();

    if (!$user || !Hash::check($args['password'], $user->password)) {
        throw new \Exception('Invalid credentials');
    }

    $token = $user->createToken('auth_token')->plainTextToken;

    return [
        'token' => $token,
        'user' => $user
    ];
}

}
