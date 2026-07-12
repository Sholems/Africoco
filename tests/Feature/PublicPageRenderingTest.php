<?php

namespace Tests\Feature;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class PublicPageRenderingTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return array<string, array{string, string}>
     */
    public static function publicPageProvider(): array
    {
        return [
            'home' => ['/', 'Preserving Africa'],
            'about' => ['/about', 'About'],
            'programs' => ['/programs', 'Programmes'],
            'events' => ['/events', 'Events'],
            'gallery' => ['/gallery', 'Gallery'],
            'blog' => ['/blog', 'News'],
            'partners' => ['/partners', 'Partners'],
            'volunteer' => ['/volunteer', 'Volunteer'],
            'contact' => ['/contact', 'Contact'],
            'projects' => ['/projects', 'Projects'],
            'strategic pillars' => ['/strategic-pillars', 'Strategic'],
            'impact' => ['/impact', 'Impact'],
            'corporate partnerships' => ['/corporate-partnerships', 'Corporate'],
        ];
    }

    #[DataProvider('publicPageProvider')]
    public function test_public_pages_render_with_empty_cms_data(string $path, string $expectedText): void
    {
        $response = $this->get($path);

        $response->assertOk();
        $response->assertSee($expectedText, false);
    }

    public function test_blog_detail_page_renders_a_published_post(): void
    {
        $category = BlogCategory::create([
            'name' => 'News',
            'slug' => 'news',
            'is_active' => true,
        ]);

        $post = BlogPost::create([
            'blog_category_id' => $category->id,
            'title' => 'Coconut Heritage Update',
            'slug' => 'coconut-heritage-update',
            'body' => '<p>AFRICOCO is expanding its community programs.</p>',
            'author' => 'AFRICOCO Team',
            'status' => 'published',
            'published_at' => now(),
        ]);

        $response = $this->get("/blog/{$post->slug}");

        $response->assertOk();
        $response->assertSee('Coconut Heritage Update');
        $response->assertSee('AFRICOCO is expanding its community programs.', false);
    }

    public function test_event_detail_page_renders_an_upcoming_event(): void
    {
        $event = Event::create([
            'title' => 'AgunkeFest Planning Forum',
            'slug' => 'agunkefest-planning-forum',
            'description' => 'A forum for coconut farmers, partners, and cultural stakeholders.',
            'venue' => 'Badagry',
            'start_date' => now()->addMonth()->toDateString(),
            'registration_enabled' => true,
            'registration_fee' => null,
            'status' => 'upcoming',
        ]);

        $response = $this->get("/events/{$event->slug}");

        $response->assertOk();
        $response->assertSee('AgunkeFest Planning Forum');
        $response->assertSee('Badagry');
        $response->assertSee('Register Now');
    }
}
