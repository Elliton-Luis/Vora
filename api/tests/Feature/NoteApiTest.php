<?php

use App\Models\User;
use App\Models\Folder;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

it('creates a new note successfully', function () {
    $user = User::factory()->create();
    $folder = Folder::factory()->create(['user_id' => $user->id]);

    $payload = [
        'title' => 'Minha primeira nota no Vora',
        'content' => 'Testando a arquitetura em Markdown.',
        'folder_id' => $folder->id,
        'is_starred' => true,
    ];
    
    $response = $this->actingAs($user)->postJson('/api/notes', $payload);

    $response->assertStatus(201)->assertJsonPath('title', 'Minha primeira nota no Vora');

    $this->assertDatabaseHas('notes', [
        'title' => 'Minha primeira nota no Vora',
        'folder_id' => $folder->id,
        'user_id' => $user->id,
        'is_starred' => 1,
    ]);
});

it('does not allow creating a note without a title', function () {
    $user = User::factory()->create();

    $payload = [
        'content' => 'Nota sem título',
    ];

    $response = $this->actingAs($user)->postJson('/api/notes', $payload);
    $response->assertStatus(422)->assertJsonValidationErrors(['title']);
});