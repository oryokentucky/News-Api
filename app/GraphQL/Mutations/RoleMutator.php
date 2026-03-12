<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;
use App\Models\User;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

final readonly class RoleMutator

{
    /**
     * Assign a role to a user.
     */
    public function add($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $user = User::findOrFail($args['id']);

        // Using Spatie Laravel-Permission:
        $user->assignRole($args['role']);



        return $user;
    }

    /**
     * Remove a role from a user.
     */
    public function remove($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $user = User::findOrFail($args['id']);

        // Using Spatie Laravel-Permission:
        $user->removeRole($args['role']);



        return $user;
    }
}

