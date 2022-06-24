<?php

declare(strict_types=1);

namespace App\GraphQL\Queries\User;

use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class ProfileQuery extends Query
{
    protected $attributes = [
        'name' => 'userProfile',
        'description' => 'A query to get user profile information.'
    ];

    public function type(): Type
    {
        return GraphQL::type('ProfileType');
    }

    public function args(): array
    {
        return [];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return auth()->user();
    }
}
