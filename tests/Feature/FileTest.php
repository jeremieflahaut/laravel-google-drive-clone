<?php

declare(strict_types=1);

use App\Models\File;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

test('My files page is displayed', function () {
    $user = User::factory()->create();

    Auth::login($user);

    $file = new File();
    $file->name = $user->email;
    $file->is_folder = true;
    $file->makeRoot()->save();

    $response = $this->get('/my-files');

    $response->assertOk();
});
