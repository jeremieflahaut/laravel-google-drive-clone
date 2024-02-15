<?php

declare(strict_types=1);

use App\Models\User;

test('My files page is displayed', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/my-files');

    $response->assertOk();
});
