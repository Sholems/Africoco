<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Event;

class SeoController extends Controller
{
    public function sitemap()
    {
        $urls = collect([
            route('home'),
            route('about'),
            route('programs'),
            route('events'),
            route('gallery'),
            route('blog'),
            route('partners'),
            route('volunteer'),
            route('contact'),
            route('projects'),
            route('strategic-pillars'),
            route('impact'),
            route('corporate-partnerships'),
        ]);

        $blogUrls = BlogPost::published()
            ->get()
            ->map(fn (BlogPost $post) => route('blog.show', $post));

        $eventUrls = Event::query()
            ->whereIn('status', ['upcoming', 'ongoing', 'completed'])
            ->get()
            ->map(fn (Event $event) => route('events.show', $event));

        return response(
            view('sitemap', [
                'urls' => $urls->merge($blogUrls)->merge($eventUrls)->unique()->values(),
            ])->render(),
            200,
            ['Content-Type' => 'application/xml']
        );
    }
}
