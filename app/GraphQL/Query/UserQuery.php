<?php

namespace App\GraphQL\Query;

use App\User;
use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

class UserQuery extends Query
{
    protected $attributes = [
        'name' => 'UserQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        // result of query with pagination laravel
        return Type::listOf(GraphQL::type('users'));
//        return GraphQL::type('User');
    }

    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::string()
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $fields)
    {
        if(isset($args['id'])) {
            return User::where('id' , $args['id'])->get();
        } else {
            return User::all();
        }
    }
}
