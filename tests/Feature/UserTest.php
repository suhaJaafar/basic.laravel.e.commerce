<?php

test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('return all users', function () {
    $response = $this->get('/api/user');
    $users = $response->json();
    expect($users)->toHaveProperty('data');

    $response->assertStatus(200);
});
