<?php

namespace App\Http\Controllers;

use App\GraphQL\Mutation\CreateUserMutation;
use App\GraphQL\Query\UserQuery;
use GraphQL\GraphQL;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserDetailController extends Controller {

    public function userDetail(Request $request)
    {
//        http://tutorail-webapp.local/graphql?query=query+FetchUsers{users{id,email}}

        $query = $request->get('query');
        $params = $request->get('params');

        if(is_string($params))
        {
            $params = json_decode($params, true);
        }


        $userSchema = config('graphql.schemas.detail', [
            'query' => [
                //Put your protected queries
                'user' => UserQuery::class
            ],
            'mutation' => [
                //Put your protected mutations
                'createUser' => CreateUserMutation::class
            ]
        ]);

        return app('graphql')->query($query, $params, $userSchema);

    }
}