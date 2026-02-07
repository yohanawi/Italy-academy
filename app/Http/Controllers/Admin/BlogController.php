<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of blogs
     */
    public function index()
    {
        $blogs = Blog::with('author')->withCount('comments')->latest()->paginate(15);
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new blog
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created blog
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:191',
            'description' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author_name' => 'nullable|string|max:191',
            'author_profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author_position' => 'nullable|string|max:191',
            'published_date' => 'nullable|date',
            'status' => 'required|in:draft,published',
            'is_popular' => 'nullable|boolean',
        ]);

        $slug = Str::slug($validated['title']);
        $originalSlug = $slug;
        $count = 1;

        while (Blog::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $validated['slug'] = $slug;
        $validated['author_id'] = Auth::id();
        $validated['is_popular'] = $request->has('is_popular') ? true : false;

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('blogs/thumbnails', 'public');
        }

        // Handle author profile photo upload
        if ($request->hasFile('author_profile_photo')) {
            $validated['author_profile_photo'] = $request->file('author_profile_photo')->store('blogs/authors', 'public');
        }

        Blog::create($validated);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully!');
    }

    /**
     * Display the specified blog
     */
    public function show(Blog $blog)
    {
        return view('admin.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified blog
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified blog
     */
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:191',
            'description' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author_name' => 'nullable|string|max:191',
            'author_profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author_position' => 'nullable|string|max:191',
            'published_date' => 'nullable|date',
            'status' => 'required|in:draft,published',
            'is_popular' => 'nullable|boolean',
        ]);

        // Update slug if title changed
        if ($validated['title'] !== $blog->title) {
            $slug = Str::slug($validated['title']);
            $originalSlug = $slug;
            $count = 1;

            while (Blog::where('slug', $slug)->where('id', '!=', $blog->id)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }
            $validated['slug'] = $slug;
        }

        $validated['is_popular'] = $request->has('is_popular') ? true : false;

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail
            if ($blog->thumbnail) {
                Storage::disk('public')->delete($blog->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('blogs/thumbnails', 'public');
        }

        // Handle author profile photo upload
        if ($request->hasFile('author_profile_photo')) {
            // Delete old photo
            if ($blog->author_profile_photo) {
                Storage::disk('public')->delete($blog->author_profile_photo);
            }
            $validated['author_profile_photo'] = $request->file('author_profile_photo')->store('blogs/authors', 'public');
        }

        $blog->update($validated);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully!');
    }

    /**
     * Remove the specified blog
     */
    public function destroy(Blog $blog)
    {
        // Delete associated files
        if ($blog->thumbnail) {
            Storage::disk('public')->delete($blog->thumbnail);
        }
        if ($blog->author_profile_photo) {
            Storage::disk('public')->delete($blog->author_profile_photo);
        }

        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully!');
    }
}
