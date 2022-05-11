<?php

namespace Tests\Feature;

use App\Models\Label;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->get(route('home'));
        $response->assertOk();
    }
}
