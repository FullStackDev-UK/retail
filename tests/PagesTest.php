<?php

namespace App\Tests;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Routing\RouteCollection;
use Illuminate\Support\Facades\Route;

class PagesTest extends TestCase
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Home page test
     *
     * @param $base_url
     * @return void
     */
    public function test_HomePage_can_be_loaded()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * About page test
     *
     * @return void
     */
    public function test_AboutPage_can_be_loaded()
    {
        $path = $this->site_base_url;

        $response = $this->get($path);
        $response->assertStatus(200);
        $response->assertSee('A little background');
    }

    /**
     * Contact page test
     *
     * @return void
     */
    public function test_ContactPage_can_be_loaded()
    {
        $response = $this->get($this->site_base_url.'/contact');

        $response->assertStatus(200);
        $response->assertSee('Contact');
    }

    /**
     * Login page test
     *
     * @return void
     */
    public function test_LoginPage_can_be_loaded()
    {
        $response = $this->get($this->site_base_url.'/login');

        $response->assertStatus(200);
        $response->assertStringContainsString('Login',$response);
    }

    /**
     * Register page test
     *
     * @return void
     */
    public function test_RegisterPage_can_be_loaded()
    {
        $response = $this->get($this->site_base_url.'/register');

        $response->assertStatus(200);
        $response->assertStringContainsString('Register',$response);
    }
}
