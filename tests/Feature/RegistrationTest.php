<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class RegistrationTest extends TestCase
{

    use RefreshDatabase;

    function test_can_register()
    {
        Livewire::test('auth.register')
            ->set('email', 'abhc@g.com')
            ->set('password', '123456')
            ->set('passwordConfirmation', '123456')
            ->call('register')
            ->assertRedirect('/');

        $this->assertTrue(User::whereEmail('abhc@g.com')->exists());
        $this->assertEquals('abhc@g.com', auth()->user()->email);
    }

    function test_email_is_required()
    {
        Livewire::test('auth.register')
            ->set('email', '')
            ->set('password', '123456')
            ->set('passwordConfirmation', '123456')
            ->call('register')
            ->assertHasErrors(['email' => 'required']);
    }

    function test_email_is_valid_email()
    {
        Livewire::test('auth.register')
            ->set('email', '123')
            ->set('password', '123456')
            ->set('passwordConfirmation', '123456')
            ->call('register')
            ->assertHasErrors(['email' => 'email']);
    }

    function test_email_hasnt_been_taken_already()
    {
        User::create([
            'email' => 'fake1@g.com',
            'password' => '123456'
        ]);

        Livewire::test('auth.register')
            ->set('email', 'fake1@g.com')
            ->set('password', '123456')
            ->set('passwordConfirmation', '123456')
            ->call('register')
            ->assertHasErrors(['email' => 'unique']);
    }

    function test_password_is_required()
    {
        Livewire::test('auth.register')
            ->set('email', '123@gmail.com')
            ->set('password', '')
            ->set('passwordConfirmation', '123456')
            ->call('register')
            ->assertHasErrors(['password' => 'required']);
    }

    function test_password_is_minimum_of_six_characters()
    {
        Livewire::test('auth.register')
            ->set('email', '123@gmail.com')
            ->set('password', '12345')
            ->set('passwordConfirmation', '123456')
            ->call('register')
            ->assertHasErrors(['password' => 'min']);
    }

    function test_password_is_maximum_of_twenty_characters()
    {
        Livewire::test('auth.register')
            ->set('email', '123@gmail.com')
            ->set('password', '123452342525235234534534')
            ->set('passwordConfirmation', '123456')
            ->call('register')
            ->assertHasErrors(['password' => 'max']);
    }

    function test_password_matches_password_confirmation()
    {
        Livewire::test('auth.register')
            ->set('email', '123@gmail.com')
            ->set('password', '123457')
            ->set('passwordConfirmation', '123456')
            ->call('register')
            ->assertHasErrors(['password' => 'same']);
    }

    function test_registration_page_contains_livewire_component()
    {
        $this->get('/register')->assertSeeLivewire('auth.register');
    }

    function test_see_email_hasnt_already_been_taken_validation_message_as_user_types()
    {
        User::create([
            'email' => 'fake1@g.com',
            'password' => '123456'
        ]);

        Livewire::test('auth.register')
            ->set('email', 'fake2@g.com')
            ->assertHasNoErrors()
            ->set('email', 'fake1@g.com')
            ->assertHasErrors(['email' => 'unique']);
    }
}
