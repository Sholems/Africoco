<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\Gallery;
use App\Models\PageSection;
use App\Models\Partner;
use App\Models\Pillar;
use App\Models\Program;
use App\Models\Project;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $programs = Program::active()->take(6)->get();
        $events = Event::upcoming()->take(3)->get();
        $gallery = Gallery::active()->take(6)->get();
        $partners = Partner::active()->homepage()->get();
        $posts = BlogPost::published()->recent()->take(3)->get();
        $team = TeamMember::active()->ordered()->take(4)->get();
        $pillars = Pillar::active()->ordered()->withCount('programs')->get();
        $featuredProjects = Project::active()->featured()->take(3)->get();
        $stats = [
            ['label' => 'Trees Planted', 'value' => '50,000+', 'icon' => 'leaf'],
            ['label' => 'Communities Reached', 'value' => '100+', 'icon' => 'globe'],
            ['label' => 'Projects Completed', 'value' => '15+', 'icon' => 'briefcase'],
            ['label' => 'Partners & Sponsors', 'value' => '40+', 'icon' => 'handshake'],
            ['label' => 'Youth Empowered', 'value' => '2,000+', 'icon' => 'academic-cap'],
            ['label' => 'Women Empowered', 'value' => '1,500+', 'icon' => 'user-group'],
            ['label' => 'Sponsors', 'value' => '25+', 'icon' => 'star'],
            ['label' => 'Countries Reached', 'value' => '10+', 'icon' => 'map'],
        ];

        // Fetch editable homepage sections
        $sections = PageSection::active()
            ->page('home')
            ->ordered()
            ->get()
            ->keyBy('section_key');

        return view('pages.home', compact(
            'programs', 'events', 'gallery', 'partners', 'posts', 'team',
            'stats', 'sections', 'pillars', 'featuredProjects'
        ));
    }

    public function about()
    {
        $team = TeamMember::active()->ordered()->get();
        $pillars = Pillar::active()->ordered()->withCount('programs')->get();
        $sections = PageSection::active()->page('about')->ordered()->get()->keyBy('section_key');
        return view('pages.about', compact('team', 'pillars', 'sections'));
    }

    public function programs()
    {
        $pillars = Pillar::active()->ordered()->with(['programs' => function ($q) {
            $q->active()->ordered();
        }])->get();
        return view('pages.programs', compact('pillars'));
    }

    public function events()
    {
        $events = Event::orderBy('start_date', 'desc')->get();
        return view('pages.events', compact('events'));
    }

    public function eventShow(Event $event)
    {
        return view('pages.event-show', compact('event'));
    }

    public function eventRegister(Request $request, Event $event)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'organization' => 'nullable|string|max:255',
        ]);

        $registration = EventRegistration::create([
            'event_id' => $event->id,
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'organization' => $validated['organization'] ?? null,
            'ticket_type' => 'General',
            'payment_status' => $event->registration_fee ? 'pending' : 'paid',
            'registration_status' => $event->registration_fee ? 'confirmed' : 'confirmed',
        ]);

        if ($event->registration_fee) {
            return back()->with('success', 'Registration received. Our team will contact you with payment details for ' . $event->title . '.');
        }

        return back()->with('success', 'Registration successful! We look forward to seeing you at ' . $event->title . '.');
    }

    public function gallery()
    {
        $gallery = Gallery::active()->get();
        $categories = Gallery::active()->select('category')->distinct()->pluck('category');
        return view('pages.gallery', compact('gallery', 'categories'));
    }

    public function blog()
    {
        $posts = BlogPost::published()->recent()->paginate(9);
        return view('pages.blog', compact('posts'));
    }

    public function blogShow(BlogPost $blogPost)
    {
        $related = BlogPost::published()
            ->where('id', '!=', $blogPost->id)
            ->where('blog_category_id', $blogPost->blog_category_id)
            ->recent()
            ->take(3)
            ->get();

        return view('pages.blog-show', compact('blogPost', 'related'));
    }

    public function partners()
    {
        $partners = Partner::active()->get();
        return view('pages.partners', compact('partners'));
    }

    public function volunteer()
    {
        return view('pages.volunteer');
    }

    public function contact()
    {
        $sections = PageSection::active()->page('contact')->ordered()->get()->keyBy('section_key');
        return view('pages.contact', compact('sections'));
    }

    public function strategicPillars()
    {
        $pillars = Pillar::active()->ordered()->with(['programs' => function ($q) {
            $q->active()->ordered();
        }])->withCount('programs')->get();
        $stats = [
            ['label' => 'Programmes', 'value' => $pillars->sum(fn ($p) => $p->programs_count), 'icon' => 'briefcase'],
            ['label' => 'Focus Areas', 'value' => $pillars->count(), 'icon' => 'star'],
            ['label' => 'Active Initiatives', 'value' => $pillars->sum(fn ($p) => $p->programs->count()), 'icon' => 'academic-cap'],
            ['label' => 'Impact Pillars', 'value' => $pillars->count(), 'icon' => 'globe'],
        ];
        return view('pages.strategic-pillars', compact('pillars', 'stats'));
    }

    public function impact()
    {
        $projects = Project::active()->take(6)->get();
        $partners = Partner::active()->take(8)->get();
        $posts = BlogPost::published()->recent()->take(3)->get();
        $stats = [
            ['label' => 'Trees Planted', 'value' => '50,000+', 'icon' => 'leaf', 'color' => '#059669'],
            ['label' => 'Communities Reached', 'value' => '100+', 'icon' => 'globe', 'color' => '#2563eb'],
            ['label' => 'Youth Empowered', 'value' => '2,000+', 'icon' => 'academic-cap', 'color' => '#7c3aed'],
            ['label' => 'Women Empowered', 'value' => '1,500+', 'icon' => 'user-group', 'color' => '#e11d48'],
            ['label' => 'Projects Completed', 'value' => '15+', 'icon' => 'briefcase', 'color' => '#d97706'],
            ['label' => 'Research Supported', 'value' => '8+', 'icon' => 'book-open', 'color' => '#0d9488'],
            ['label' => 'Partners & Sponsors', 'value' => '40+', 'icon' => 'handshake', 'color' => '#2d6a4f'],
            ['label' => 'Countries Reached', 'value' => '10+', 'icon' => 'map', 'color' => '#d4a373'],
            ['label' => 'Volunteers Engaged', 'value' => '500+', 'icon' => 'heart', 'color' => '#e11d48'],
            ['label' => 'Events Held', 'value' => '20+', 'icon' => 'calendar', 'color' => '#059669'],
        ];
        return view('pages.impact', compact('projects', 'partners', 'posts', 'stats'));
    }

    public function corporatePartnerships()
    {
        $featuredProjects = Project::active()->featured()->take(4)->get();
        $partners = Partner::active()->take(6)->get();
        $sponsorshipLevels = [
            [
                'name' => 'Platinum Partner',
                'amount' => '₦10,000,000+',
                'benefits' => ['Title sponsorship of flagship programmes', 'Board representation', 'Exclusive naming rights', 'Keynote speaking slots', 'Premium exhibition space', 'Co-branded impact reports', 'Quarterly impact reviews', 'VIP access to all events'],
                'featured' => true,
            ],
            [
                'name' => 'Gold Partner',
                'amount' => '₦5,000,000 - ₦9,999,999',
                'benefits' => ['Major programme sponsorship', 'Speaking opportunities', 'Premium exhibition space', 'Co-branded content', 'Recognition in annual report', 'Quarterly updates', 'VIP event access'],
                'featured' => false,
            ],
            [
                'name' => 'Silver Partner',
                'amount' => '₦1,000,000 - ₦4,999,999',
                'benefits' => ['Programme sponsorship', 'Exhibition space', 'Logo on marketing materials', 'Social media recognition', 'Event passes', 'Impact updates'],
                'featured' => false,
            ],
            [
                'name' => 'Bronze Partner',
                'amount' => '₦500,000 - ₦999,999',
                'benefits' => ['Logo recognition', 'Social media mentions', 'Event passes', 'Newsletter feature', 'Impact report access'],
                'featured' => false,
            ],
            [
                'name' => 'Community Supporter',
                'amount' => 'Custom',
                'benefits' => ['Recognition on website', 'Community updates', 'Volunteer opportunities', 'Networking access'],
                'featured' => false,
            ],
        ];
        return view('pages.corporate-partnerships', compact('featuredProjects', 'partners', 'sponsorshipLevels'));
    }

    public function projects()
    {
        $projects = Project::active()->orderBy('start_date', 'desc')->get();
        return view('pages.projects', compact('projects'));
    }

    public function donate(Request $request)
    {
        $sections = PageSection::active()->page('donate')->ordered()->get()->keyBy('section_key');
        return view('pages.donate', [
            'preset_amount' => $request->amount,
            'preset_purpose' => $request->purpose,
            'preset_name' => $request->name,
            'preset_email' => $request->email,
            'event_id' => $request->event_id,
            'registration_id' => $request->registration_id,
            'sections' => $sections,
        ]);
    }
}
