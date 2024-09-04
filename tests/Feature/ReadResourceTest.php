<?php

namespace tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use tests\TestCase;
use App\Models\Resource;

class ReadResourceTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * @doesNotPerformAssertions
     */

    public function testReadResource()
    {
        $response = $this->post('/api/addResources', [
            'id' => 1234,
            'title' => 'Test creation ressource',
            'description' => 'Test de création de ressource',
            'type' => 'article',
            'content' => 'test',
            'creation_date' => now()
        ]);

        $this -> get('/api/resources/{1234}');
    }
}
