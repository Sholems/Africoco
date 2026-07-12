<?php

namespace Tests\Feature;

use App\Models\ContactMessage;
use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\NewsletterSubscriber;
use App\Models\Volunteer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicSubmissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_form_stores_new_message(): void
    {
        $response = $this->from('/contact')->post('/contact', [
            'name' => 'Ada Okafor',
            'email' => 'ada@example.com',
            'phone' => '+2348012345678',
            'subject' => 'Partnership',
            'message' => 'We would like to discuss a coconut seedling program.',
        ]);

        $response->assertRedirect('/contact');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas(ContactMessage::class, [
            'name' => 'Ada Okafor',
            'email' => 'ada@example.com',
            'subject' => 'Partnership',
            'status' => 'new',
        ]);
    }

    public function test_contact_form_requires_a_message(): void
    {
        $response = $this->from('/contact')->post('/contact', [
            'name' => 'Ada Okafor',
            'email' => 'ada@example.com',
        ]);

        $response->assertRedirect('/contact');
        $response->assertSessionHasErrors('message');
        $this->assertDatabaseCount(ContactMessage::class, 0);
    }

    public function test_volunteer_form_stores_new_application(): void
    {
        $response = $this->from('/volunteer')->post('/volunteer', [
            'full_name' => 'Tunde Bello',
            'email' => 'tunde@example.com',
            'phone' => '+2348098765432',
            'location' => 'Badagry',
            'area_of_interest' => 'Community outreach',
            'skills' => 'Training and event support',
            'message' => 'I can help during weekend programs.',
        ]);

        $response->assertRedirect('/volunteer');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas(Volunteer::class, [
            'full_name' => 'Tunde Bello',
            'email' => 'tunde@example.com',
            'area_of_interest' => 'Community outreach',
            'status' => 'new',
        ]);
    }

    public function test_newsletter_subscription_stores_active_subscriber(): void
    {
        $response = $this->from('/')->post('/newsletter/subscribe', [
            'email' => 'reader@example.com',
            'name' => 'Newsletter Reader',
            'source' => 'footer',
        ]);

        $response->assertRedirect('/');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas(NewsletterSubscriber::class, [
            'email' => 'reader@example.com',
            'name' => 'Newsletter Reader',
            'source' => 'footer',
            'is_active' => true,
        ]);
    }

    public function test_newsletter_subscription_rejects_duplicate_email(): void
    {
        NewsletterSubscriber::create([
            'email' => 'reader@example.com',
            'name' => 'Existing Reader',
            'source' => 'footer',
            'is_active' => true,
        ]);

        $response = $this->from('/')->post('/newsletter/subscribe', [
            'email' => 'reader@example.com',
        ]);

        $response->assertRedirect('/');
        $response->assertSessionHasErrors('email');
        $this->assertDatabaseCount(NewsletterSubscriber::class, 1);
    }

    public function test_event_registration_stores_free_event_attendee(): void
    {
        $event = Event::create([
            'title' => 'Coconut Heritage Workshop',
            'slug' => 'coconut-heritage-workshop',
            'start_date' => now()->addMonth()->toDateString(),
            'registration_enabled' => true,
            'registration_fee' => null,
            'status' => 'upcoming',
        ]);

        $response = $this->from("/events/{$event->slug}")->post("/events/{$event->id}/register", [
            'full_name' => 'Mariam Johnson',
            'email' => 'mariam@example.com',
            'phone' => '+2348011122233',
            'organization' => 'Coastal Farmers Network',
        ]);

        $response->assertRedirect("/events/{$event->slug}");
        $response->assertSessionHas('success');

        $this->assertDatabaseHas(EventRegistration::class, [
            'event_id' => $event->id,
            'full_name' => 'Mariam Johnson',
            'email' => 'mariam@example.com',
            'ticket_type' => 'General',
            'payment_status' => 'paid',
            'registration_status' => 'confirmed',
        ]);
    }
}
