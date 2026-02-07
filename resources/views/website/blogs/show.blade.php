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

                    <!--begin::Comments Section-->
                    <div class="blog-comments-section">
                        <h3 class="comments-title">
                            <i class="fas fa-comments"></i>
                            Reviews & Comments ({{ $blog->comments->count() }})
                        </h3>

                        <!--begin::Comment Form-->
                        <div class="comment-form-card">
                            <h4>Leave a Review</h4>
                            @if (session('comment_success'))
                                <div class="alert alert-success">
                                    {{ session('comment_success') }}
                                </div>
                            @endif
                            <form action="{{ route('blogs.comments.store', $blog->slug) }}" method="POST">
                                @csrf
                                <!--begin::Rating-->
                                <div class="rating-input">
                                    <label>Rating (optional)</label>
                                    <div class="star-rating">
                                        <input type="radio" name="rating" value="5" id="star5">
                                        <label for="star5" title="5 stars"><i class="fas fa-star"></i></label>
                                        <input type="radio" name="rating" value="4" id="star4">
                                        <label for="star4" title="4 stars"><i class="fas fa-star"></i></label>
                                        <input type="radio" name="rating" value="3" id="star3">
                                        <label for="star3" title="3 stars"><i class="fas fa-star"></i></label>
                                        <input type="radio" name="rating" value="2" id="star2">
                                        <label for="star2" title="2 stars"><i class="fas fa-star"></i></label>
                                        <input type="radio" name="rating" value="1" id="star1">
                                        <label for="star1" title="1 star"><i class="fas fa-star"></i></label>
                                    </div>
                                    @error('rating')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!--end::Rating-->

                                <!--begin::Comment-->
                                <div class="form-group">
                                    <label for="comment">Your Review</label>
                                    <textarea name="comment" id="comment" rows="5" placeholder="Share your thoughts about this article..." required>{{ old('comment') }}</textarea>
                                    @error('comment')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!--end::Comment-->

                                <button type="submit" class="btn-primary">
                                    <i class="fas fa-paper-plane"></i> Submit Review
                                </button>
                            </form>
                        </div>
                        <!--end::Comment Form-->

                        <!--begin::Comments List-->
                        @if ($blog->comments->count() > 0)
                            <div class="comments-list">
                                @foreach ($blog->comments()->latest()->get() as $comment)
                                    <div class="comment-item">
                                        <div class="comment-avatar">
                                            <i class="fas fa-user-circle"></i>
                                        </div>
                                        <div class="comment-content">
                                            <div class="comment-header">
                                                <span class="comment-author">Anonymous User</span>
                                                <span class="comment-date">
                                                    {{ $comment->created_at->diffForHumans() }}
                                                </span>
                                            </div>
                                            @if ($comment->rating)
                                                <div class="comment-rating">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <i
                                                            class="fas fa-star {{ $i <= $comment->rating ? 'active' : '' }}"></i>
                                                    @endfor
                                                </div>
                                            @endif
                                            <p class="comment-text">{{ $comment->comment }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="no-comments">
                                <i class="fas fa-comment-slash"></i>
                                <p>No reviews yet. Be the first to share your thoughts!</p>
                            </div>
                        @endif
                        <!--end::Comments List-->
                    </div>
                    <!--end::Comments Section-->
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

        /* Comments Section Styles */
        .blog-comments-section {
            background-color: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: var(--shadow);
            margin-top: 30px;
        }

        .comments-title {
            font-size: 28px;
            margin-bottom: 30px;
            color: var(--dark-color);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .comments-title i {
            color: var(--primary-color);
        }

        .comment-form-card {
            background-color: var(--tertiary-color);
            padding: 30px;
            border-radius: 12px;
            margin-bottom: 40px;
        }

        .comment-form-card h4 {
            font-size: 20px;
            margin-bottom: 20px;
            color: var(--dark-color);
        }

        .alert {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .rating-input {
            margin-bottom: 20px;
        }

        .rating-input label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: var(--dark-color);
        }

        .star-rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: flex-end;
            gap: 5px;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            cursor: pointer;
            font-size: 30px;
            color: #ddd;
            transition: all 0.2s ease;
        }

        .star-rating label:hover,
        .star-rating label:hover~label,
        .star-rating input:checked~label {
            color: #ffc107;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: var(--dark-color);
        }

        .form-group textarea {
            width: 100%;
            padding: 15px;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
            resize: vertical;
            transition: border-color 0.3s ease;
        }

        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        .error-message {
            color: var(--secondary-color);
            font-size: 14px;
            margin-top: 5px;
            display: block;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-primary:hover {
            background-color: #00803d;
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .comments-list {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .comment-item {
            display: flex;
            gap: 15px;
            padding: 25px;
            background-color: var(--tertiary-color);
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .comment-item:hover {
            box-shadow: var(--shadow);
        }

        .comment-avatar {
            flex-shrink: 0;
        }

        .comment-avatar i {
            font-size: 48px;
            color: var(--primary-color);
        }

        .comment-content {
            flex: 1;
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .comment-author {
            font-weight: 600;
            color: var(--dark-color);
            font-size: 16px;
        }

        .comment-date {
            color: var(--text-light);
            font-size: 14px;
        }

        .comment-rating {
            margin-bottom: 10px;
        }

        .comment-rating i {
            color: #ddd;
            font-size: 16px;
        }

        .comment-rating i.active {
            color: #ffc107;
        }

        .comment-text {
            color: var(--text-color);
            line-height: 1.6;
            margin: 0;
        }

        .no-comments {
            text-align: center;
            padding: 60px 20px;
            color: var(--text-light);
        }

        .no-comments i {
            font-size: 64px;
            color: var(--border-color);
            margin-bottom: 20px;
        }

        .no-comments p {
            font-size: 18px;
            margin: 0;
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
