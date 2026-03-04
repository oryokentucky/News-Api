<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


final readonly class ResetPassword
{
    public function __invoke($_, array $args)
    {
        $user = User::where('id', $args['user_id'])
            ->where('remember_token', $args['encryption'])
            ->first();

        if (!$user) {
            return [
                'status' => 'INVALID_TOKEN'
            ];
        }

        $user->password = Hash::make($args['password']);
        $user->remember_token = null;
        $user->save();

        return [
            'status' => 'PASSWORD_RESET_SUCCESS'
        ];
    }

}
