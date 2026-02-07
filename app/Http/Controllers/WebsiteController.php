<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    /**
     * Display the home page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $seoData = [
            'title' => 'Italy Academy - Learn Italian Language & Culture Online',
            'description' => 'Discover the beauty of Italian language and culture with Italy Academy. Expert-led courses, interactive lessons, and personalized learning paths for all levels.',
            'keywords' => 'Italian language learning, Italy culture, Italian courses, learn Italian online, Italian academy, Italian lessons',
            'og_image' => asset('assets/media/italy-academy-og.jpg'),
        ];

        // Get latest 6 published blogs for carousel
        $latestBlogs = Blog::published()->latest()->take(6)->get();

        return view('website.home', compact('seoData', 'latestBlogs'));
    }

    /**
     * Display the about page
     *
     * @return \Illuminate\View\View
     */
    public function about()
    {
        $seoData = [
            'title' => 'About Us - Italy Academy',
            'description' => 'Learn about Italy Academy\'s mission to bring Italian language and culture to students worldwide through innovative online education.',
            'keywords' => 'about Italy Academy, Italian language school, online Italian education',
        ];

        return view('website.about', compact('seoData'));
    }

    /**
     * Display the courses page
     *
     * @return \Illuminate\View\View
     */
    public function courses()
    {
        $seoData = [
            'title' => 'Italian Courses - Italy Academy',
            'description' => 'Explore our comprehensive Italian language courses for beginners, intermediate, and advanced learners. Start your Italian journey today!',
            'keywords' => 'Italian courses, Italian classes, beginner Italian, advanced Italian',
        ];

        return view('website.courses', compact('seoData'));
    }

    /**
     * Display the contact page
     *
     * @return \Illuminate\View\View
     */
    public function contact()
    {
        $seoData = [
            'title' => 'Contact Us - Italy Academy',
            'description' => 'Get in touch with Italy Academy. We\'re here to help you with any questions about our Italian language courses and programs.',
            'keywords' => 'contact Italy Academy, Italian course inquiry, customer support',
        ];

        return view('website.contact', compact('seoData'));
    }

    /**
     * Store contact form submission
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:191',
            'message' => 'required|string|max:5000',
        ]);

        ContactSubmission::create($validated);

        return redirect()->back()->with('success', 'Thank you for your message! We will get back to you soon.');
    }

    /**
     * Display blogs listing
     *
     * @return \Illuminate\View\View
     */
    public function blogs(Request $request)
    {
        $seoData = [
            'title' => 'Blog - Italy Academy',
            'description' => 'Read our latest articles about Italian language, culture, travel tips, and learning resources.',
            'keywords' => 'Italian blog, Italian language tips, Italy culture articles, Italian learning resources',
        ];

        $query = Blog::published()->with('author');

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $blogs = $query->latest()->paginate(12);
        $view = $request->get('view', 'grid'); // grid or list

        return view('website.blogs.index', compact('seoData', 'blogs', 'view'));
    }

    /**
     * Display single blog
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function blogShow($slug)
    {
        $blog = Blog::published()->where('slug', $slug)->firstOrFail();

        // Increment views
        $blog->incrementViews();

        $seoData = [
            'title' => $blog->title . ' - Italy Academy Blog',
            'description' => strip_tags(substr($blog->description, 0, 160)),
            'keywords' => 'Italian blog, ' . $blog->title,
            'og_image' => $blog->thumbnail_url,
        ];

        // Get related blogs
        $relatedBlogs = Blog::published()
            ->where('id', '!=', $blog->id)
            ->latest()
            ->take(3)
            ->get();

        return view('website.blogs.show', compact('seoData', 'blog', 'relatedBlogs'));
    }

    /**
     * Store blog comment
     *
     * @param Request $request
     * @param string $slug
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeComment(Request $request, $slug)
    {
        $blog = Blog::published()->where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'comment' => 'required|string|max:1000',
            'rating' => 'nullable|integer|min:1|max:5',
        ]);

        $validated['blog_id'] = $blog->id;

        BlogComment::create($validated);

        return redirect()->back()->with('comment_success', 'Thank you for your review! Your comment has been added successfully.');
    }
}
