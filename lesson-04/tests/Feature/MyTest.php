<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MyTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSeeText("Добро пожаловать");

        $response = $this->get('/feedback');

        $response->assertStatus(200);
        $response->assertSeeText("Feedback");

        $response = $this->get('/admin/index');

        $response->assertStatus(200);

        $response = $this->get('/news/category/sport');

        $response->assertStatus(200);
    }

}
