<?php
namespace App\GraphQL\Queries;

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ObjectType;
use App\GraphQL\QueryAbstract;

class MissionsQuery extends QueryAbstract
{
    public function name()
    {
        return 'missions';
    }

    public function description()
    {
        return "The list of missions";
    }

    public function attributes()
    {
        return [
            'type' => Type::listOf($this->getType()),
            'description' => 'List of missions',
            'resolve' => $this->resolve()
        ];
    }

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::string(),
                'description' => 'The mission code',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The mission name.'
            ],
            'coordinates' => [
                'type' => Type::string(),
                'description' => 'The location of mission.',
            ],
        ];
    }

    protected function resolve()
    {
        return function ($root, $args) {
            return [
                [
                    'id' => 1,
                    'name' => 'teste'
                ],
                [
                    'id' => 2,
                    'name' => 'teste 2',
                    'coordinates' => '-33.42323,-34.123123'
                ],
            ];
        };
    }
}
