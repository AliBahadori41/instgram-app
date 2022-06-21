<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations\User\Auth;

use App\Models\User;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class LoginMutation extends Mutation
{
    protected $attributes = [
        'name' => 'userLogin',
        'description' => 'A mutation'
    ];

    public function type(): Type
    {
        return GraphQL::type('User/Auth/Auth');
    }

    public function args(): array
    {
        return [
            'email' => [
                'type' =>  Type::string(),
                'rules' => [
                    'required',
                    'email',
                ],
            ],
            'password' => [
                'type' => Type::string(),
                'rules' => [
                    'required',
                    'string',
                    'min:8',
                ]
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {

        $user = User::where('email', $args['email'])->first();

        if ($user) {
            $this->loginUser($user, $args);
        } else {
            $user = $this->registerUser($args);
        }

        return [
            'token' => $user->createToken($args['device_name'] ?? 'my-app')->plainTextToken,
        ];
    }

    /**
     * Register user.
     *
     * @param array $args
     * @return \App\Model\User
     */
    public function registerUser(array $args)
    {
        return User::create($args);
    }

    /**
     * Login user.
     *
     * @param \App\Model\User $user
     * @param array $args
     * @return void
     */
    public function loginUser(User $user, array $args)
    {
        if (! $user || ! Hash::check($args['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
    }
}
