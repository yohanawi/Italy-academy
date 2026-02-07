<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- SEO Meta Tags --}}
    <title>{{ $seoData['title'] ?? 'Italy Academy - Learn Italian Online' }}</title>
    <meta name="description"
        content="{{ $seoData['description'] ?? 'Learn Italian language and culture with expert instructors' }}">
    <meta name="keywords" content="{{ $seoData['keywords'] ?? 'Italian language, learn Italian, Italian courses' }}">
    <meta name="author" content="Italy Academy">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $seoData['title'] ?? 'Italy Academy' }}">
    <meta property="og:description" content="{{ $seoData['description'] ?? 'Learn Italian language and culture' }}">
    <meta property="og:image" content="{{ $seoData['og_image'] ?? asset('assets/media/og-image.jpg') }}">
    <meta property="og:locale" content="en_US">

    {{-- Twitter --}}
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $seoData['title'] ?? 'Italy Academy' }}">
    <meta property="twitter:description"
        content="{{ $seoData['description'] ?? 'Learn Italian language and culture' }}">
    <meta property="twitter:image" content="{{ $seoData['og_image'] ?? asset('assets/media/og-image.jpg') }}">

    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- Custom CSS --}}
    <style>
        :root {
            --primary-color: #009246;
            --secondary-color: #CE2B37;
            --tertiary-color: #F4F5F8;
            --dark-color: #1E1E1E;
            --light-color: #FFFFFF;
            --text-color: #333333;
            --text-light: #6B7280;
            --border-color: #E5E7EB;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-color);
            line-height: 1.6;
            overflow-x: hidden;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 1rem;
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: all 0.3s ease;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .container-fluid {
            width: 100%;
            padding: 0 20px;
        }

        .btn {
            display: inline-block;
            padding: 12px 32px;
            font-size: 16px;
            font-weight: 600;
            text-align: center;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: var(--light-color);
        }

        .btn-primary:hover {
            background-color: #007a3a;
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-secondary {
            background-color: var(--secondary-color);
            color: var(--light-color);
        }

        .btn-secondary:hover {
            background-color: #b31f2a;
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-outline {
            background-color: transparent;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
        }

        .btn-outline:hover {
            background-color: var(--primary-color);
            color: var(--light-color);
        }

        .section {
            padding: 80px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title h2 {
            font-size: 42px;
            color: var(--dark-color);
            margin-bottom: 16px;
        }

        .section-title p {
            font-size: 18px;
            color: var(--text-light);
            max-width: 600px;
            margin: 0 auto;
        }

        @media (max-width: 768px) {
            .section {
                padding: 60px 0;
            }

            .section-title h2 {
                font-size: 32px;
            }

            .section-title p {
                font-size: 16px;
            }

            .btn {
                padding: 10px 24px;
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 0 15px;
            }

            .section {
                padding: 40px 0;
            }

            .section-title h2 {
                font-size: 28px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>
    {{-- Header --}}
    @include('website.partials.header')

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('website.partials.footer')

    {{-- Structured Data for SEO --}}
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "EducationalOrganization",
        "name": "Italy Academy",
        "description": "Online Italian Language Learning Platform",
        "url": "{{ url('/') }}",
        "logo": "{{ asset('assets/media/logo.png') }}",
        "address": {
            "@type": "PostalAddress",
            "addressCountry": "IT"
        },
        "sameAs": [
            "https://facebook.com/italyacademy",
            "https://twitter.com/italyacademy",
            "https://instagram.com/italyacademy"
        ]
    }
    </script>

    @stack('scripts')
</body>

</html>
