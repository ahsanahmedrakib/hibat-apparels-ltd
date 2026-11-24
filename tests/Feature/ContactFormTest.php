<?php

namespace Tests\Feature;

use App\Models\ContactMessage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_valid_message_is_stored_and_redirects_with_success(): void
    {
        $response = $this->from(route('contact'))->post(route('contact.store'), [
            'name' => 'Jane Buyer',
            'email' => 'jane@example.com',
            'phone' => '+1 555 0100',
            'subject' => 'Request a quote',
            'message' => 'We would like to develop a knitwear programme.',
        ]);

        $response->assertRedirect(route('contact'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('contact_messages', [
            'name' => 'Jane Buyer',
            'email' => 'jane@example.com',
            'subject' => 'Request a quote',
        ]);
    }

    public function test_required_fields_are_validated(): void
    {
        $response = $this->from(route('contact'))->post(route('contact.store'), []);

        $response->assertRedirect(route('contact'));
        $response->assertSessionHasErrors(['name', 'email', 'subject', 'message']);

        $this->assertDatabaseCount('contact_messages', 0);
    }

    public function test_invalid_email_is_rejected(): void
    {
        $response = $this->from(route('contact'))->post(route('contact.store'), [
            'name' => 'Jane Buyer',
            'email' => 'not-an-email',
            'subject' => 'General enquiry',
            'message' => 'Hello, I have a question.',
        ]);

        $response->assertSessionHasErrors('email');

        $this->assertDatabaseCount('contact_messages', 0);
    }

    public function test_optional_phone_can_be_left_empty(): void
    {
        $this->from(route('contact'))->post(route('contact.store'), [
            'name' => 'Jane Buyer',
            'email' => 'jane@example.com',
            'phone' => '',
            'subject' => 'General enquiry',
            'message' => 'Hello, I have a question.',
        ])->assertSessionHasNoErrors();

        $this->assertDatabaseCount('contact_messages', 1);
        $this->assertNull(ContactMessage::first()->phone);
    }
}
