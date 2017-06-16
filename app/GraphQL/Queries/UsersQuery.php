<?php
namespace App\GraphQL\Queries;

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ObjectType;
use App\GraphQL\QueryAbstract;

class UsersQuery extends QueryAbstract
{
    public function name()
    {
        return 'users';
    }

    public function description()
    {
        return "The list of missions";
    }

    public function fields()
    {
        $missions = new MissionsQuery;
        return [
            'id' => [
                'type' => Type::string(),
                'description' => 'The user code',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The user name.'
            ],
            'missions' => [
                'type' => Type::listOf($missions->getType('user')),
                'description' => 'User missions',
                'resolve' => function ($obj) {
                    return [
                        [
                            'id' => 12333 . "-" . $obj['id'],
                            'namde' => 'asdadasd'
                        ],
                    ];
                },

            ]
        ];
    }

    protected function resolve()
    {
        return function ($root, $args) {
            return [
                [
                    'id' => 1,
                    'name' => 'teste',
                    'missions' => [
                        'id' => 1
                    ]
                ],
                [
                    'id' => 2,
                    'name' => 'teste 2'
                ],
            ];
        };
    }
}
