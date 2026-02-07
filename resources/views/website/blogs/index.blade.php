@extends('website.layout')

@section('content')

    {{-- Blog Hero Section --}}
    <section class="page-hero">
        <div class="container">
            <h1>Our Blog</h1>
            <p>Explore articles about Italian language, culture, and learning tips</p>
        </div>
    </section>

    {{-- Blog Controls Section --}}
    <section class="section">
        <div class="container">
            <!--begin::Controls-->
            <div class="blog-controls">
                <div class="search-box">
                    <form action="{{ route('blogs.index') }}" method="GET" class="search-form">
                        <input type="text" name="search" class="search-input" placeholder="Search blogs..."
                            value="{{ request('search') }}">
                        <button type="submit" class="search-btn">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
                <div class="view-toggle">
                    <a href="{{ route('blogs.index', array_merge(request()->all(), ['view' => 'grid'])) }}"
                        class="view-btn {{ $view === 'grid' ? 'active' : '' }}" title="Grid View">
                        <i class="fas fa-th"></i>
                    </a>
                    <a href="{{ route('blogs.index', array_merge(request()->all(), ['view' => 'list'])) }}"
                        class="view-btn {{ $view === 'list' ? 'active' : '' }}" title="List View">
                        <i class="fas fa-list"></i>
                    </a>
                </div>
            </div>
            <!--end::Controls-->

            @if (request('search'))
                <div class="search-info">
                    <p>Search results for: <strong>{{ request('search') }}</strong></p>
                    <a href="{{ route('blogs.index') }}" class="clear-search">Clear Search</a>
                </div>
            @endif

            <!--begin::Blogs-->
            @if ($blogs->count() > 0)
                <div class="blogs-{{ $view }}">
                    @foreach ($blogs as $blog)
                        <div class="blog-card {{ $view }}">
                            <a href="{{ route('blogs.show', $blog->slug) }}" class="blog-link">
                                <div class="blog-image">
                                    <img src="{{ asset('storage/' . $blog->thumbnail) }}" alt="{{ $blog->title }}"
                                        onerror="this.src='https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?w=800&h=600&fit=crop'">
                                    @if ($blog->is_popular)
                                        <span class="blog-badge">Popular</span>
                                    @endif
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <span class="blog-author">
                                            <i class="fas fa-user"></i>
                                            {{ $blog->author_name ?? 'Admin' }}
                                        </span>
                                        <span class="blog-date">
                                            <i class="fas fa-calendar"></i>
                                            {{ $blog->published_date ? $blog->published_date->format('M d, Y') : 'N/A' }}
                                        </span>
                                        <span class="blog-views">
                                            <i class="fas fa-eye"></i>
                                            {{ number_format($blog->views) }}
                                        </span>
                                    </div>
                                    <h3 class="blog-title">{{ $blog->title }}</h3>
                                    <p class="blog-excerpt">{{ Str::limit(strip_tags($blog->description), 120) }}</p>
                                    <div class="blog-read-more">
                                        Read More <i class="fas fa-arrow-right"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                <!--begin::Pagination-->
                <div class="pagination-wrapper">
                    {{ $blogs->appends(request()->query())->links() }}
                </div>
                <!--end::Pagination-->
            @else
                <div class="no-results">
                    <i class="fas fa-search"></i>
                    <h3>No blogs found</h3>
                    <p>{{ request('search') ? 'Try adjusting your search terms' : 'No blogs available at the moment' }}</p>
                </div>
            @endif
            <!--end::Blogs-->
        </div>
    </section>

@endsection

@push('styles')
    <style>
        .page-hero {
            background: linear-gradient(135deg, var(--primary-color) 0%, #00b359 100%);
            color: white;
            text-align: center;
            padding: 120px 0 80px;
            margin-top: -80px;
        }

        .page-hero h1 {
            font-size: 48px;
            color: white;
            margin-bottom: 16px;
        }

        .page-hero p {
            font-size: 20px;
            opacity: 0.95;
        }

        .blog-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .search-box {
            flex: 1;
            max-width: 500px;
        }

        .search-form {
            display: flex;
            border: 2px solid var(--border-color);
            border-radius: 50px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .search-form:focus-within {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(0, 146, 70, 0.1);
        }

        .search-input {
            flex: 1;
            padding: 12px 20px;
            border: none;
            outline: none;
            font-size: 16px;
        }

        .search-btn {
            padding: 12px 24px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .search-btn:hover {
            background-color: #007a3a;
        }

        .view-toggle {
            display: flex;
            gap: 8px;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            overflow: hidden;
        }

        .view-btn {
            padding: 12px 20px;
            background-color: white;
            color: var(--text-color);
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 18px;
        }

        .view-btn:hover {
            background-color: var(--tertiary-color);
        }

        .view-btn.active {
            background-color: var(--primary-color);
            color: white;
        }

        .search-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            background-color: var(--tertiary-color);
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .clear-search {
            color: var(--primary-color);
            font-weight: 600;
        }

        /* Grid View */
        .blogs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
        }

        /* List View */
        .blogs-list {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .blog-card.grid {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
        }

        .blog-card.grid:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .blog-card.list {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
        }

        .blog-card.list:hover {
            box-shadow: var(--shadow-lg);
        }

        .blog-card.list .blog-link {
            display: flex;
            gap: 25px;
        }

        .blog-card.list .blog-image {
            width: 300px;
            flex-shrink: 0;
        }

        .blog-link {
            display: block;
            color: inherit;
            text-decoration: none;
        }

        .blog-image {
            position: relative;
            height: 220px;
            overflow: hidden;
        }

        .blog-card.list .blog-image {
            height: 100%;
        }

        .blog-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .blog-card:hover .blog-image img {
            transform: scale(1.1);
        }

        .blog-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: var(--secondary-color);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .blog-content {
            padding: 25px;
        }

        .blog-card.list .blog-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .blog-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 15px;
            font-size: 14px;
            color: var(--text-light);
        }

        .blog-meta span {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .blog-meta i {
            color: var(--primary-color);
        }

        .blog-title {
            font-size: 22px;
            margin-bottom: 12px;
            color: var(--dark-color);
            transition: color 0.3s ease;
            line-height: 1.4;
        }

        .blog-card:hover .blog-title {
            color: var(--primary-color);
        }

        .blog-excerpt {
            color: var(--text-light);
            line-height: 1.7;
            margin-bottom: 15px;
        }

        .blog-read-more {
            color: var(--primary-color);
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .blog-read-more i {
            transition: transform 0.3s ease;
        }

        .blog-card:hover .blog-read-more i {
            transform: translateX(5px);
        }

        .no-results {
            text-align: center;
            padding: 80px 20px;
        }

        .no-results i {
            font-size: 80px;
            color: var(--text-light);
            margin-bottom: 20px;
        }

        .no-results h3 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .no-results p {
            color: var(--text-light);
        }

        .pagination-wrapper {
            margin-top: 50px;
            display: flex;
            justify-content: center;
        }

        @media (max-width: 992px) {
            .blog-card.list .blog-link {
                flex-direction: column;
            }

            .blog-card.list .blog-image {
                width: 100%;
                height: 220px;
            }

            .blogs-grid {
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .page-hero h1 {
                font-size: 36px;
            }

            .blog-controls {
                flex-direction: column;
                align-items: stretch;
            }

            .search-box {
                max-width: 100%;
            }

            .blogs-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endpush
