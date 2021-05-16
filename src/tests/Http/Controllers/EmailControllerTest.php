<?php

namespace Tests\Http\Controllers;

use App\Models\Email;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Response;
use Tests\TestCase;

class EmailControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function testIsAccessingHome()
    {
        $this->get('/')
            ->assertStatus(Response::HTTP_OK)
            ->assertSeeText('netshow.me challenge');
    }

    public function testIsCreatingEmail()
    {
        $data = [
            'name' => 'foo',
            'email' => 'foo@bar.com',
            'phone' => '+5583998242740',
            'message' => 'foo bar baz',
        ];

        $this->post('/send-email', $data)
            ->assertStatus(Response::HTTP_FOUND)
            ->assertRedirect(route('email-home'))
            ->assertSessionHasNoErrors();
    }

    public function testIsReturningErrorWhenDataWasPreviewsCreated()
    {
        $data = Email::factory()->create();

        $this->post('/send-email', $data->toArray())
            ->assertStatus(Response::HTTP_FOUND)
            ->assertRedirect(route('email-home'))
            ->assertSessionHas('email-fail');
    }
}
