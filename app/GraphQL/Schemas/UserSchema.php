<?php

namespace App\GraphQL\Schemas;

use App\GraphQL\Queries\User\ProfileQuery;
use App\GraphQL\Types\User\User\ProfileType;
use Rebing\GraphQL\Support\Contracts\ConfigConvertible;

class UserSchema implements ConfigConvertible
{
    public function toConfig(): array
    {
        return [
            'query' => [
                ProfileQuery::class,
            ],

            'mutation' => [
                // ExampleMutation::class,
            ],
            'types' => [
                'ProfileType' => ProfileType::class,
            ],
            // 'middleware' => ['auth'],
        ];
    }
}
