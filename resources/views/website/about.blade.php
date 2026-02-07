@extends('website.layout')

@section('content')
    {{-- About Hero Section --}}
    <section class="page-hero">
        <div class="container">
            <h1>About Italy Academy</h1>
            <p>Your Gateway to Italian Language and Culture</p>
        </div>
    </section>

    {{-- About Content Section --}}
    <section class="section about-content">
        <div class="container">
            <div class="about-grid">
                <div class="about-text">
                    <h2>Our Story</h2>
                    <p>
                        Italy Academy was founded with a simple yet powerful mission: to make learning Italian accessible,
                        engaging, and effective for students worldwide. We believe that language learning is not just about
                        grammar and vocabulary—it's about opening doors to new cultures, experiences, and opportunities.
                    </p>
                    <p>
                        Our team of expert native Italian instructors brings years of teaching experience and a genuine
                        passion for sharing their language and culture. We've developed a comprehensive curriculum that
                        combines traditional teaching methods with modern technology to create an immersive learning
                        experience.
                    </p>
                    <p>
                        Whether you're learning Italian for travel, work, or personal enrichment, Italy Academy provides
                        the tools, support, and community you need to succeed.
                    </p>
                </div>
                <div class="about-image">
                    <div class="image-placeholder">
                        <i class="fas fa-school"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Mission & Vision Section --}}
    <section class="section mission-section" style="background-color: var(--tertiary-color);">
        <div class="container">
            <div class="mission-grid">
                <div class="mission-card">
                    <div class="mission-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h3>Our Mission</h3>
                    <p>
                        To provide world-class Italian language education that empowers students to communicate
                        confidently and understand Italian culture deeply, fostering global connections and opportunities.
                    </p>
                </div>
                <div class="mission-card">
                    <div class="mission-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3>Our Vision</h3>
                    <p>
                        To become the world's leading online Italian language academy, recognized for excellence in
                        teaching, innovation in education technology, and commitment to student success.
                    </p>
                </div>
            </div>
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

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .about-text h2 {
            font-size: 36px;
            margin-bottom: 30px;
        }

        .about-text p {
            margin-bottom: 20px;
            line-height: 1.8;
            color: var(--text-light);
        }

        .about-image .image-placeholder {
            height: 400px;
            background: linear-gradient(135deg, var(--primary-color), #00b359);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .about-image .image-placeholder i {
            font-size: 100px;
            color: rgba(255, 255, 255, 0.8);
        }

        .mission-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
        }

        .mission-card {
            background-color: white;
            padding: 50px 40px;
            border-radius: 12px;
            box-shadow: var(--shadow);
            text-align: center;
        }

        .mission-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-color), #00b359);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
        }

        .mission-icon i {
            font-size: 36px;
            color: white;
        }

        .mission-card h3 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        .mission-card p {
            color: var(--text-light);
            line-height: 1.7;
        }

        @media (max-width: 768px) {
            .page-hero h1 {
                font-size: 36px;
            }

            .about-grid,
            .mission-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .about-image .image-placeholder {
                height: 300px;
            }
        }
    </style>
@endpush
