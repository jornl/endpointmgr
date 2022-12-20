<?php

namespace Tests\Feature\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Mockery;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    // @TODO: Rewrite to adhere to socialite-setup.

    /** @test */
    public function it_redirects_to_microsoft()
    {
        $response = $this->get(route('login'));

        $this->assertStringStartsWith('https://login.microsoftonline.com/', $response->getTargetUrl());
    }

    /** @test */
    public function it_logs_the_user_in_with_azure_and_redirects_to_dashboard()
    {
        $abstractUser = Mockery::mock('Laravel\Socialite\Two\User');
        $abstractUser
            ->shouldReceive('getId')
            ->andReturn(rand())
            ->shouldReceive('getName')
            ->andReturn('King Charles')
            ->shouldReceive('getEmail')
            ->andReturn(Str::random() . "@example.com");

        $provider = Mockery::mock('Laravel\Socialite\Contracts\Provider');
        $provider->shouldReceive('user')->andReturn($abstractUser);

        Socialite::shouldReceive('driver')
            ->with('azure')
            ->andReturn($provider);

        $this->get('/auth/callback')->assertRedirect(RouteServiceProvider::HOME);
        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', ['name' => 'King Charles']);
    }
}
