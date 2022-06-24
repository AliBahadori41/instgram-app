<?php

declare(strict_types=1);

namespace App\GraphQL\Types\User\User;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ProfileType extends GraphQLType
{
    protected $attributes = [
        'name' => 'ProfileType',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'name' => [
                'type' => Type::string(),
            ],
            'username' => [
                'type' => Type::string(),
            ],
            'email' => [
                'type' => Type::string(),
            ],
            'phone' => [
                'type' => Type::string(),
            ],
        ];
    }
}
