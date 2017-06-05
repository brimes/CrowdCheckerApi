<?php
namespace App\GraphQL\Queries;

use GraphQL\Type\Definition\Type;

class MissionsQuery implements QueryInterface
{
    public function name()
    {
        return 'missions';
    }

    public function attributes()
    {
        return [
            'type' => Type::string(),
            'description' => 'List of mission',
            'resolve' => $this->resolve()
        ];
    }

    protected function resolve()
    {
        return function () {
            return "Missão 001";
        };
    }
}
