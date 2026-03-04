<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;


final readonly class Logout
{
    public function __invoke($_, array $args):array{
    {
        $user = request()->user();

        // Check if the user is authenticated
        if ($user && $user->currentAccessToken()) {
            // Delete the current access token
            $user->currentAccessToken()->delete();
            return [
                'success' => true,
                'status'  =>"TOKEN REVOKED",
                'message' => 'Your Session has been terminated',
            ];
        }

        // Return an error message if the user is not authenticated
        return [
            'success' => false,
            'message' => 'User not authenticated',
        ];
    }
}
}


