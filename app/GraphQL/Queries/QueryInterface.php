<?php
namespace App\GraphQL\Queries;

interface QueryInterface
{
    /**
     * Query name
     * @return String
     */
    public function name();

    /**
     * Attributes of query
     * @return Array
     */
    public function attributes();
}
