<?php
namespace App\GraphQL;

use Illuminate\Http\Request;
use \GraphQL\Schema;

class RouterGraphQL
{
    /**
     * The request received
     * @var Illuminate\Http\Request
     */
    private $request;
    
    /**
     * The GraphQL schema
     * @var \GraphQL\Schema
     */
    private $schema;

    public function __contructor(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Query Result
     * @return JSon
     */
    public function result()
    {
        $this->createSchema();
        return json_encode([
            'status' => 'ok'
        ]);
    }

    protected function createSchema()
    {
        $this->schema = new Schema([
               'query' => SchemaBuilder::query()
           ]);

    }
}
