<?php

declare(strict_types=1);

namespace App\GraphQL\Types\User\Auth;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class AuthType extends GraphQLType
{
    protected $attributes = [
        'name' => 'User/Auth/Auth',
        'description' => 'User Login Response Type'
    ];

    public function fields(): array
    {
        return [
            'token' => [
                'type' => Type::string(),
            ]
        ];
    }
}
