<?php

namespace Tests\Unit;

use Tests\TestCase;
use GuzzleHttp;
use App\User;
use App\Contact;
use Facade;
use Illuminate\Database\Connection as DB;

class ApiTest extends TestCase
{
    protected $client;

    protected function setUp() : void
    {
        $this->client = new GuzzleHttp\Client([
            'base_uri' => 'http://localhost/retail/api/'
        ]);
    }

    public function test_it_can_receive_a_POST_Message()
    {
        $contact = new Contact([
            'name' => 'Thomas Edison',
            'email' => 'ted@ison.com',
            'subject' => 'Collaboration',
            'message' => 'This is a message from a user of this site called Thomas Edison'
        ]);

        $response = $this->client->post('contact', [$contact]);

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function test_it_can_GET_All_Messages()
    {
        $response = json_decode($this->client->get('contact')->getBody(), true);
        $this->assertContains('Thomas Edison', $response[0]['name'], 'Found "Test User Name"');
    }
}
