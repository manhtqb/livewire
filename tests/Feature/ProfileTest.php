<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Livewire\Livewire;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_see_livewire_profile_component_on_profile_page()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user)
            ->get('/profile')
            ->assertSuccessful()
            ->assertSeeLivewire('profile');
    }

    public function test_can_update_profile()
    {
        $user = \App\Models\User::factory()->create();

        Livewire::actingAs($user)
            ->test('profile')
            ->set('username', 'foo')
            ->set('about', 'bar')
            ->call('save');

        $user->refresh();

        $this->assertEquals('foo', $user->username);
        $this->assertEquals('bar', $user->about);
    }

    public function test_username_must_be_less_than_24_characters()
    {
        $user = \App\Models\User::factory()->create();

        Livewire::actingAs($user)
            ->test('profile')
            ->set('username', Str::repeat('2', 25))
            ->call('save')
            ->assertHasErrors(['username' => 'max']);
    }

    public function test_about_must_be_less_than_140_characters()
    {
        $user = \App\Models\User::factory()->create();

        Livewire::actingAs($user)
            ->test('profile')
            ->set('about', Str::repeat('2', 141))
            ->call('save')
            ->assertHasErrors(['about' => 'max']);
    }

    public function test_profile_info_is_pre_populated()
    {
        $user = \App\Models\User::factory()->create([
            'username' => 'foo',
            'about' => 'bar'
        ]);

        Livewire::actingAs($user)
            ->test('profile')
            ->assertSet('username', 'foo')
            ->assertSet('about', 'bar');
    }
}
