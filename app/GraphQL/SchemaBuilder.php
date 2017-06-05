<?php
namespace App\GraphQL;

use GraphQL\Type\Definition\ObjectType;

class SchemaBuilder
{
    
    public static function query()
    {
        return (new self)->getQueryObjectType();
    }

    public static function mutations()
    {

    }

    public function getQueryObjectType()
    {
        $config = [
            'name' => 'Query',
            'fields' => [],
        ];

        foreach ($this->listOfQueries() as $query) {
            $name = $query->name();
            $config['fields'][$name] = $query->attributes();
        }

        return new ObjectType($config);
    }

    protected function listOfQueries()
    {
        $list = [];
        foreach (glob(__DIR__ . '/Queries/*Query.php') as $queryFile) {
            $className = "\\App\\GraphQL\\Queries\\" . basename($queryFile, ".php");
            $list[] = new $className;
        }
        return $list;

    }
}
