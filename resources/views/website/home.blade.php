@extends('website.layout')

@section('content')
    {{-- Hero Section --}}
    <section class="hero">
        <div class="hero-background">
            <div class="hero-overlay"></div>
        </div>
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1 class="hero-title">
                        Learn Italian Language<br>
                        <span class="highlight">With Native Experts</span>
                    </h1>
                    <p class="hero-description">
                        Discover the beauty of Italian language and culture with our comprehensive online courses.
                        From beginner to advanced, we'll guide you every step of the way.
                    </p>
                    <div class="hero-buttons">
                        <a href="{{ route('courses') }}" class="btn btn-primary">Explore Courses</a>
                        <a href="{{ route('contact') }}" class="btn btn-outline">Get in Touch</a>
                    </div>
                    <div class="hero-stats">
                        <div class="stat-item">
                            <div class="stat-number">5000+</div>
                            <div class="stat-label">Students</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">50+</div>
                            <div class="stat-label">Expert Teachers</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">100+</div>
                            <div class="stat-label">Courses</div>
                        </div>
                    </div>
                </div>
                <div class="hero-image">
                    <div class="hero-image-wrapper">
                        <div class="hero-badge badge-1">
                            <i class="fas fa-certificate"></i>
                            <span>Certified Courses</span>
                        </div>
                        <div class="hero-badge badge-2">
                            <i class="fas fa-users"></i>
                            <span>5000+ Students</span>
                        </div>
                        <div class="image-placeholder">
                            <i class="fas fa-landmark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Features Section --}}
    <section class="section features">
        <div class="container">
            <div class="section-title">
                <h2>Why Choose Italy Academy?</h2>
                <p>We provide the best learning experience with expert instructors and comprehensive courses</p>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <h3>Expert Instructors</h3>
                    <p>Learn from native Italian speakers with years of teaching experience and passion for the language.
                    </p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3>Flexible Schedule</h3>
                    <p>Study at your own pace with 24/7 access to course materials and on-demand lessons.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h3>Certification</h3>
                    <p>Earn recognized certificates upon course completion to showcase your Italian language skills.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Community Support</h3>
                    <p>Join a vibrant community of learners and practice with fellow students worldwide.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-video"></i>
                    </div>
                    <h3>Interactive Lessons</h3>
                    <p>Engage with multimedia content, quizzes, and interactive exercises for effective learning.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-laptop"></i>
                    </div>
                    <h3>Online Platform</h3>
                    <p>Access courses from anywhere with our user-friendly online learning platform.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Courses Section --}}
    <section class="section courses-section" style="background-color: var(--tertiary-color);">
        <div class="container">
            <div class="section-title">
                <h2>Popular Courses</h2>
                <p>Start your Italian learning journey with our most popular courses designed for all levels</p>
            </div>
            <div class="courses-grid">
                <div class="course-card">
                    <div class="course-image">
                        <div class="course-level">Beginner</div>
                        <i class="fas fa-book-open"></i>
                    </div>
                    <div class="course-content">
                        <h3>Italian for Beginners</h3>
                        <p>Start your Italian journey with basics of grammar, vocabulary, and pronunciation.</p>
                        <div class="course-meta">
                            <span><i class="fas fa-clock"></i> 40 hours</span>
                            <span><i class="fas fa-signal"></i> Beginner</span>
                        </div>
                        <a href="{{ route('courses') }}" class="btn btn-primary btn-block">Enroll Now</a>
                    </div>
                </div>
                <div class="course-card">
                    <div class="course-image">
                        <div class="course-level intermediate">Intermediate</div>
                        <i class="fas fa-comments"></i>
                    </div>
                    <div class="course-content">
                        <h3>Conversational Italian</h3>
                        <p>Improve your speaking skills and gain confidence in everyday Italian conversations.</p>
                        <div class="course-meta">
                            <span><i class="fas fa-clock"></i> 50 hours</span>
                            <span><i class="fas fa-signal"></i> Intermediate</span>
                        </div>
                        <a href="{{ route('courses') }}" class="btn btn-primary btn-block">Enroll Now</a>
                    </div>
                </div>
                <div class="course-card">
                    <div class="course-image">
                        <div class="course-level advanced">Advanced</div>
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <div class="course-content">
                        <h3>Business Italian</h3>
                        <p>Master professional Italian for business meetings, presentations, and correspondence.</p>
                        <div class="course-meta">
                            <span><i class="fas fa-clock"></i> 60 hours</span>
                            <span><i class="fas fa-signal"></i> Advanced</span>
                        </div>
                        <a href="{{ route('courses') }}" class="btn btn-primary btn-block">Enroll Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Latest Blog Section --}}
    @if (isset($latestBlogs) && $latestBlogs->count() > 0)
        <section class="section latest-blog-section">
            <div class="container">
                <div class="section-header">
                    <div class="section-title-left">
                        <p class="section-subtitle">Blog</p>
                        <h2>Latest News & Articles</h2>
                    </div>
                    <a href="{{ route('blogs.index') }}" class="view-all-btn">
                        View All <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="blog-carousel-container">
                    <div class="blog-carousel">
                        @foreach ($latestBlogs as $blog)
                            <div class="blog-carousel-item">
                                <a href="{{ route('blogs.show', $blog->slug) }}" class="blog-carousel-link">
                                    <div class="blog-carousel-image">
                                        <img src="{{ asset('storage/' . $blog->thumbnail) }}" alt="{{ $blog->title }}"
                                            onerror="this.src='https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?w=800&h=600&fit=crop'">
                                        @if ($blog->is_popular)
                                            <span class="carousel-blog-badge">Popular</span>
                                        @endif
                                    </div>
                                    <div class="blog-carousel-content">
                                        <div class="blog-carousel-meta">
                                            <span class="carousel-author">{{ $blog->author_name ?? 'Admin' }}</span>
                                        </div>
                                        <h3 class="blog-carousel-title">{{ Str::limit($blog->title, 60) }}</h3>
                                        <div class="blog-carousel-footer">
                                            <span class="carousel-date">
                                                <i class="fas fa-calendar"></i>
                                                {{ $blog->published_date ? $blog->published_date->format('M d, Y') : 'N/A' }}
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <div class="carousel-controls">
                        <button class="carousel-btn prev-btn" onclick="scrollBlogCarousel(-1)">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="carousel-btn next-btn" onclick="scrollBlogCarousel(1)">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- CTA Section --}}
    <section class="section cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>Ready to Start Your Italian Journey?</h2>
                <p>Join thousands of students learning Italian with Italy Academy today!</p>
                <a href="{{ route('courses') }}" class="btn btn-secondary">Get Started Now</a>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        /* Hero Section */
        .hero {
            position: relative;
            padding: 100px 0 80px;
            overflow: hidden;
            min-height: 600px;
            display: flex;
            align-items: center;
        }

        .hero-background {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #009246 0%, #00b359 100%);
            z-index: -2;
        }

        .hero-background::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image:
                radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
            z-index: -1;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.2);
        }

        .hero-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .hero-text {
            color: var(--light-color);
        }

        .hero-title {
            font-size: 56px;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 24px;
            color: var(--light-color);
        }

        .hero-title .highlight {
            color: #FFD700;
            display: inline-block;
        }

        .hero-description {
            font-size: 18px;
            line-height: 1.8;
            margin-bottom: 32px;
            opacity: 0.95;
        }

        .hero-buttons {
            display: flex;
            gap: 16px;
            margin-bottom: 50px;
        }

        .hero-buttons .btn-outline {
            background-color: transparent;
            border-color: white;
            color: white;
        }

        .hero-buttons .btn-outline:hover {
            background-color: white;
            color: var(--primary-color);
        }

        .hero-stats {
            display: flex;
            gap: 40px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 8px;
            color: #FFD700;
        }

        .stat-label {
            font-size: 14px;
            opacity: 0.9;
        }

        .hero-image-wrapper {
            position: relative;
            height: 500px;
        }

        .image-placeholder {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0.1) 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(10px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .image-placeholder i {
            font-size: 120px;
            color: rgba(255, 255, 255, 0.5);
        }

        .hero-badge {
            position: absolute;
            background-color: white;
            padding: 15px 20px;
            border-radius: 12px;
            box-shadow: var(--shadow-lg);
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
            font-size: 14px;
            z-index: 10;
        }

        .hero-badge i {
            color: var(--primary-color);
            font-size: 20px;
        }

        .badge-1 {
            top: 50px;
            right: -20px;
            animation: float 3s ease-in-out infinite;
        }

        .badge-2 {
            bottom: 50px;
            left: -20px;
            animation: float 3s ease-in-out infinite 1.5s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        /* Features Section */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .feature-card {
            background-color: white;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            text-align: center;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-color), #00b359);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
        }

        .feature-icon i {
            font-size: 36px;
            color: white;
        }

        .feature-card h3 {
            font-size: 22px;
            margin-bottom: 15px;
            color: var(--dark-color);
        }

        .feature-card p {
            color: var(--text-light);
            line-height: 1.7;
        }

        /* Courses Section */
        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
        }

        .course-card {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
        }

        .course-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .course-image {
            position: relative;
            height: 200px;
            background: linear-gradient(135deg, var(--primary-color), #00b359);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .course-image i {
            font-size: 80px;
            color: rgba(255, 255, 255, 0.9);
        }

        .course-level {
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: white;
            color: var(--primary-color);
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .course-level.intermediate {
            color: #ff9800;
        }

        .course-level.advanced {
            color: #f44336;
        }

        .course-content {
            padding: 30px;
        }

        .course-content h3 {
            font-size: 22px;
            margin-bottom: 12px;
            color: var(--dark-color);
        }

        .course-content p {
            color: var(--text-light);
            margin-bottom: 20px;
            line-height: 1.7;
        }

        .course-meta {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
            padding-top: 15px;
            border-top: 1px solid var(--border-color);
        }

        .course-meta span {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--text-light);
            font-size: 14px;
        }

        .course-meta i {
            color: var(--primary-color);
        }

        .btn-block {
            width: 100%;
            text-align: center;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, var(--secondary-color), #e02633);
            color: white;
            text-align: center;
        }

        .cta-content h2 {
            font-size: 42px;
            color: white;
            margin-bottom: 20px;
        }

        .cta-content p {
            font-size: 20px;
            margin-bottom: 30px;
            opacity: 0.95;
        }

        .cta-content .btn-secondary {
            background-color: white;
            color: var(--secondary-color);
        }

        .cta-content .btn-secondary:hover {
            background-color: var(--dark-color);
            color: white;
        }

        /* Latest Blog Section */
        .latest-blog-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 50px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .section-title-left .section-subtitle {
            color: var(--primary-color);
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .section-title-left h2 {
            font-size: 36px;
            color: var(--dark-color);
            margin: 0;
        }

        .view-all-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 28px;
            background-color: var(--primary-color);
            color: white;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .view-all-btn:hover {
            background-color: #007a3a;
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .view-all-btn i {
            transition: transform 0.3s ease;
        }

        .view-all-btn:hover i {
            transform: translateX(5px);
        }

        .blog-carousel-container {
            position: relative;
        }

        .blog-carousel {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 25px;
            overflow: hidden;
        }

        .blog-carousel-item {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
        }

        .blog-carousel-item:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .blog-carousel-link {
            display: block;
            color: inherit;
            text-decoration: none;
        }

        .blog-carousel-image {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .blog-carousel-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .blog-carousel-item:hover .blog-carousel-image img {
            transform: scale(1.1);
        }

        .carousel-blog-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: var(--secondary-color);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .blog-carousel-content {
            padding: 25px;
        }

        .blog-carousel-meta {
            margin-bottom: 12px;
        }

        .carousel-author {
            color: var(--text-light);
            font-size: 14px;
        }

        .blog-carousel-title {
            font-size: 20px;
            margin-bottom: 15px;
            color: var(--dark-color);
            line-height: 1.4;
            min-height: 56px;
        }

        .blog-carousel-item:hover .blog-carousel-title {
            color: var(--primary-color);
        }

        .blog-carousel-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 15px;
            border-top: 1px solid var(--border-color);
        }

        .carousel-date {
            display: flex;
            align-items: center;
            gap: 6px;
            color: var(--text-light);
            font-size: 14px;
        }

        .carousel-date i {
            color: #f9a134;
        }

        .carousel-controls {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 30px;
        }

        .carousel-btn {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background-color: var(--primary-color);
            color: white;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .carousel-btn:hover {
            background-color: #007a3a;
            transform: scale(1.1);
        }

        .carousel-btn i {
            font-size: 16px;
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .hero-content {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .hero-title {
                font-size: 42px;
            }

            .hero-image-wrapper {
                height: 400px;
            }

            .hero-stats {
                justify-content: center;
            }

            .features-grid,
            .courses-grid {
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .hero {
                padding: 60px 0 40px;
            }

            .hero-title {
                font-size: 36px;
            }

            .hero-description {
                font-size: 16px;
            }

            .hero-buttons {
                flex-direction: column;
            }

            .hero-buttons .btn {
                width: 100%;
            }

            .hero-stats {
                flex-direction: column;
                gap: 20px;
            }

            .hero-image-wrapper {
                height: 300px;
            }

            .badge-1,
            .badge-2 {
                position: static;
                margin: 10px auto;
            }

            .cta-content h2 {
                font-size: 32px;
            }

            .cta-content p {
                font-size: 18px;
            }
        }

        @media (max-width: 480px) {
            .hero-title {
                font-size: 28px;
            }

            .stat-number {
                font-size: 24px;
            }

            .features-grid,
            .courses-grid {
                grid-template-columns: 1fr;
            }

            .blog-carousel {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        function scrollBlogCarousel(direction) {
            const carousel = document.querySelector('.blog-carousel');
            const scrollAmount = 350; // Width of one card + gap

            if (direction === 1) {
                carousel.scrollBy({
                    left: scrollAmount,
                    behavior: 'smooth'
                });
            } else {
                carousel.scrollBy({
                    left: -scrollAmount,
                    behavior: 'smooth'
                });
            }
        }
    </script>
@endpush
