<?php

use App\Models\User;
use App\Models\Folder;
use App\Models\Note;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

it('lists all notes', function () {

    Note::factory()->count(3)->create();

    $response = $this->getJson('/api/notes');

    $response->assertStatus(200)
             ->assertJsonCount(3);
});

it('only lists notes belonging to the logged in user', function () {

    $userA = User::factory()->create();
    $userB = User::factory()->create();

    Note::factory()->count(2)->create(['user_id' => $userA->id]);
    Note::factory()->count(3)->create(['user_id' => $userB->id]);

    $response = $this->actingAs($userA)->getJson('/api/notes');

    $response->assertStatus(200)
             ->assertJsonCount(2);
});

it('returns an empty array when the user has no notes', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->getJson('/api/notes');

    $response->assertStatus(200)
             ->assertJsonCount(0)
             ->assertExactJson([]);
});

it('returns the correct JSON structure for notes', function () {
    $user = User::factory()->create();
    $note = Note::factory()->create(['user_id' => $user->id]);

    $response = $this->actingAs($user)->getJson('/api/notes');

    $response->assertStatus(200)
             ->assertJsonFragment([
                 'id' => $note->id,
                 'title' => $note->title,
                 'content' => $note->content,
             ]);
});
