<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UrlControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $data = [
            'id' => 1000,
            'alias' => 'ok',
            'name' => 'test',
            'name_en' => 'test_en',
        ];
        $response = $this->post('/api/country/', $data);
    }
    public function testgetAllCountries()
    {
        $response = $this->get('/api/country/');
        $response->assertStatus(200);
    }
    public function testShow()
    {
        $response = $this->get('/api/country/1000');
        $response->assertStatus(200);
        $response = $this->get('/api/country/non');
        $response->assertStatus(404);
    }
    public function testCreate()
    {
        $data = [];
        $response = $this->post('/api/country/', $data);
        $response->assertStatus(400);

        $data = [
            'alias' => 'ok',
            'name' => 'test',
            'name_en' => 'test_en',
        ];
        $response = $this->post('/api/country/', $data);
        $response->assertStatus(201);
    }
    public function testEdit()
    {
        $response = $this->put('/api/country/non');
        $response->assertStatus(404);

        $data = [
            'alias' => '',
            'name' => 'test',
            'name_en' => 'test_en',
        ];
        $response = $this->put('/api/country/1000', $data);
        $response->assertStatus(400);

        $data = [
            'alias' => 'yo',
            'name' => 'test2',
            'name_en' => 'test_en2',
        ];
        $response = $this->put('/api/country/1000', $data);
        $response->assertStatus(200);
    }
    public function testDelete()
    {
        $response = $this->delete('/api/country/non');
        $response->assertStatus(404);

        $response = $this->delete('/api/country/1000');
        $response->assertStatus(204);
    }
}