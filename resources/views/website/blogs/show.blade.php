@extends('website.layout')

@section('content')

    {{-- Blog Header Section --}}
    <section class="blog-header">
        <div class="container">
            <div class="blog-header-content">
                <div class="blog-category">
                    <a href="{{ route('blogs.index') }}">
                        <i class="fas fa-arrow-left"></i> Back to Blogs
                    </a>
                </div>
                <h1 class="blog-main-title">{{ $blog->title }}</h1>
                <div class="blog-header-meta">
                    <div class="author-info">
                        @if ($blog->author_profile_photo)
                            <img src="{{ asset('storage/' . $blog->author_profile_photo) }}" alt="{{ $blog->author_name }}"
                                class="author-avatar">
                        @else
                            <div class="author-avatar-placeholder">
                                <i class="fas fa-user"></i>
                            </div>
                        @endif
                        <div>
                            <div class="author-name">{{ $blog->author_name ?? 'Admin' }}</div>
                            <div class="author-position">{{ $blog->author_position ?? 'Content Writer' }}</div>
                        </div>
                    </div>
                    <div class="blog-stats">
                        <span class="stat-item">
                            <i class="fas fa-calendar"></i>
                            {{ $blog->published_date ? $blog->published_date->format('F d, Y') : 'N/A' }}
                        </span>
                        <span class="stat-item">
                            <i class="fas fa-eye"></i>
                            {{ number_format($blog->views) }} views
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Featured Image --}}
    @if ($blog->thumbnail)
        <section class="blog-featured-image">
            <div class="container">
                <img src="{{ asset('storage/' . $blog->thumbnail) }}" alt="{{ $blog->title }}">
            </div>
        </section>
    @endif

    {{-- Blog Content --}}
    <section class="section blog-content-section">
        <div class="container">
            <div class="blog-layout">
                <div class="blog-main-content">
                    <div class="blog-content-wrapper">
                        {!! $blog->description !!}
                    </div>

                    <!--begin::Share Section-->
                    <div class="blog-share">
                        <h4>Share this article</h4>
                        <div class="share-buttons">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blogs.show', $blog->slug)) }}"
                                target="_blank" class="share-btn facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blogs.show', $blog->slug)) }}&text={{ urlencode($blog->title) }}"
                                target="_blank" class="share-btn twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(route('blogs.show', $blog->slug)) }}&title={{ urlencode($blog->title) }}"
                                target="_blank" class="share-btn linkedin">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($blog->title . ' ' . route('blogs.show', $blog->slug)) }}"
                                target="_blank" class="share-btn whatsapp">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                    <!--end::Share Section-->
                </div>

                <div class="blog-sidebar">
                    <!--begin::Author Card-->
                    <div class="sidebar-card author-card">
                        <h3>About the Author</h3>
                        <div class="author-details">
                            @if ($blog->author_profile_photo)
                                <img src="{{ asset('storage/' . $blog->author_profile_photo) }}"
                                    alt="{{ $blog->author_name }}" class="author-avatar-large">
                            @else
                                <div class="author-avatar-large-placeholder">
                                    <i class="fas fa-user"></i>
                                </div>
                            @endif
                            <h4>{{ $blog->author_name ?? 'Admin' }}</h4>
                            <p class="author-title">{{ $blog->author_position ?? 'Content Writer' }}</p>
                        </div>
                    </div>
                    <!--end::Author Card-->

                    <!--begin::Related Posts-->
                    @if ($relatedBlogs->count() > 0)
                        <div class="sidebar-card related-posts">
                            <h3>Related Articles</h3>
                            <div class="related-posts-list">
                                @foreach ($relatedBlogs as $relatedBlog)
                                    <a href="{{ route('blogs.show', $relatedBlog->slug) }}" class="related-post-item">
                                        <div class="related-post-image">
                                            <img src="{{ asset('storage/' . $relatedBlog->thumbnail) }}"
                                                alt="{{ $relatedBlog->title }}"
                                                onerror="this.src='https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?w=400&h=300&fit=crop'">
                                        </div>
                                        <div class="related-post-content">
                                            <h4>{{ Str::limit($relatedBlog->title, 50) }}</h4>
                                            <span class="related-post-date">
                                                <i class="fas fa-calendar"></i>
                                                {{ $relatedBlog->published_date ? $relatedBlog->published_date->format('M d, Y') : 'N/A' }}
                                            </span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <!--end::Related Posts-->
                </div>
            </div>
        </div>
    </section>

@endsection

@push('styles')
    <style>
        .blog-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #00b359 100%);
            color: white;
            padding: 140px 0 60px;
            margin-top: -80px;
        }

        .blog-header-content {
            max-width: 900px;
            margin: 0 auto;
            text-align: center;
        }

        .blog-category a {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: white;
            font-weight: 600;
            margin-bottom: 20px;
            opacity: 0.9;
            transition: opacity 0.3s ease;
        }

        .blog-category a:hover {
            opacity: 1;
        }

        .blog-main-title {
            font-size: 48px;
            color: white;
            margin-bottom: 30px;
            line-height: 1.3;
        }

        .blog-header-meta {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 40px;
            flex-wrap: wrap;
        }

        .author-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .author-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid rgba(255, 255, 255, 0.3);
        }

        .author-avatar-placeholder {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .author-name {
            font-weight: 600;
            font-size: 16px;
        }

        .author-position {
            font-size: 14px;
            opacity: 0.9;
        }

        .blog-stats {
            display: flex;
            gap: 20px;
        }

        .stat-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            opacity: 0.9;
        }

        .blog-featured-image {
            margin-top: -40px;
            position: relative;
            z-index: 10;
        }

        .blog-featured-image img {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
            border-radius: 20px;
            box-shadow: var(--shadow-lg);
        }

        .blog-content-section {
            padding-top: 60px;
        }

        .blog-layout {
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 50px;
        }

        .blog-content-wrapper {
            background-color: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: var(--shadow);
            line-height: 1.8;
            font-size: 18px;
            color: var(--text-color);
        }

        .blog-content-wrapper h1,
        .blog-content-wrapper h2,
        .blog-content-wrapper h3 {
            margin-top: 30px;
            margin-bottom: 20px;
            color: var(--dark-color);
        }

        .blog-content-wrapper p {
            margin-bottom: 20px;
        }

        .blog-content-wrapper img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin: 30px 0;
        }

        .blog-content-wrapper ul,
        .blog-content-wrapper ol {
            margin-bottom: 20px;
            padding-left: 30px;
        }

        .blog-content-wrapper li {
            margin-bottom: 10px;
        }

        .blog-share {
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: var(--shadow);
            margin-top: 30px;
            text-align: center;
        }

        .blog-share h4 {
            margin-bottom: 20px;
            font-size: 20px;
        }

        .share-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .share-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
            transition: all 0.3s ease;
        }

        .share-btn:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .share-btn.facebook {
            background-color: #1877f2;
        }

        .share-btn.twitter {
            background-color: #1da1f2;
        }

        .share-btn.linkedin {
            background-color: #0077b5;
        }

        .share-btn.whatsapp {
            background-color: #25d366;
        }

        .sidebar-card {
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
        }

        .sidebar-card h3 {
            font-size: 22px;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--border-color);
        }

        .author-details {
            text-align: center;
        }

        .author-avatar-large {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
            border: 3px solid var(--primary-color);
        }

        .author-avatar-large-placeholder {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: var(--tertiary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            color: var(--text-light);
            margin: 0 auto 15px;
        }

        .author-details h4 {
            font-size: 20px;
            margin-bottom: 5px;
        }

        .author-title {
            color: var(--text-light);
            font-size: 14px;
        }

        .related-posts-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .related-post-item {
            display: flex;
            gap: 15px;
            padding: 15px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .related-post-item:hover {
            background-color: var(--tertiary-color);
        }

        .related-post-image {
            width: 80px;
            height: 80px;
            flex-shrink: 0;
            border-radius: 8px;
            overflow: hidden;
        }

        .related-post-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .related-post-content h4 {
            font-size: 16px;
            color: var(--dark-color);
            margin-bottom: 8px;
            line-height: 1.4;
        }

        .related-post-date {
            font-size: 12px;
            color: var(--text-light);
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .related-post-date i {
            color: var(--primary-color);
        }

        @media (max-width: 1200px) {
            .blog-layout {
                grid-template-columns: 1fr;
            }

            .blog-sidebar {
                max-width: 600px;
                margin: 0 auto;
            }
        }

        @media (max-width: 768px) {
            .blog-header {
                padding: 120px 0 40px;
            }

            .blog-main-title {
                font-size: 32px;
            }

            .blog-header-meta {
                flex-direction: column;
                gap: 20px;
            }

            .blog-content-wrapper {
                padding: 25px;
                font-size: 16px;
            }

            .blog-featured-image {
                margin-top: 0;
            }
        }
    </style>
@endpush
