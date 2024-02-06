<?php

declare(strict_types=1);

use App\Models\File;
use App\Models\User;
use App\Providers\RouteServiceProvider;

test('registration screen can be rendered', function () {
    $response = $this->get('/register');
    $response->assertStatus(200);
});

test('new users can register', function () {
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    $user = User::where('email', 'test@example.com')->first();
    expect($user)->not->toBeNull()
        ->and($user->name)->toEqual('Test User');

    $file = File::where('name', 'test@example.com')->first();
    expect($file)->not->toBeNull()
        ->and($file->is_folder)->toBe(true)
        ->and($file->created_by)->toEqual($user->id);

    $this->assertAuthenticated();
    $response->assertRedirect(RouteServiceProvider::HOME);
});
