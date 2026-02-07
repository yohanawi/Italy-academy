@extends('website.layout')

@section('content')
    {{-- Contact Hero Section --}}
    <section class="page-hero">
        <div class="container">
            <h1>Contact Us</h1>
            <p>Get in Touch With Italy Academy</p>
        </div>
    </section>

    {{-- Contact Section --}}
    <section class="section">
        <div class="container">
            <div class="contact-grid">
                {{-- Contact Form --}}
                <div class="contact-form-wrapper">
                    <h2>Send Us a Message</h2>
                    <p class="form-description">Have questions? We'd love to hear from you. Send us a message and we'll
                        respond as soon as possible.</p>

                    @if (session('success'))
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-circle"></i>
                            <strong>Please fix the following errors:</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="contact-form">
                        @csrf
                        <div class="form-group">
                            <label for="name">Full Name *</label>
                            <input type="text" id="name" name="name" required placeholder="Your name"
                                value="{{ old('name') }}">
                            @error('name')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" required
                                placeholder="your.email@example.com" value="{{ old('email') }}">
                            @error('email')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" placeholder="+39 123 456 7890"
                                value="{{ old('phone') }}">
                            @error('phone')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="subject">Subject *</label>
                            <input type="text" id="subject" name="subject" required placeholder="How can we help?"
                                value="{{ old('subject') }}">
                            @error('subject')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="message">Message *</label>
                            <textarea id="message" name="message" rows="5" required placeholder="Tell us more about your inquiry...">{{ old('message') }}</textarea>
                            @error('message')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-paper-plane"></i> Send Message
                        </button>
                    </form>
                </div>

                {{-- Contact Info --}}
                <div class="contact-info-wrapper">
                    <h2>Contact Information</h2>
                    <p class="info-description">Feel free to reach out to us through any of these channels.</p>

                    <div class="contact-info-cards">
                        <div class="info-card">
                            <div class="info-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="info-content">
                                <h4>Our Address</h4>
                                <p>Via Roma 123<br>00100 Rome, Italy</p>
                            </div>
                        </div>

                        <div class="info-card">
                            <div class="info-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="info-content">
                                <h4>Phone Number</h4>
                                <p>+39 123 456 7890<br>+39 098 765 4321</p>
                            </div>
                        </div>

                        <div class="info-card">
                            <div class="info-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="info-content">
                                <h4>Email Address</h4>
                                <p>info@italyacademy.com<br>support@italyacademy.com</p>
                            </div>
                        </div>

                        <div class="info-card">
                            <div class="info-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="info-content">
                                <h4>Working Hours</h4>
                                <p>Monday - Friday: 9:00 AM - 6:00 PM<br>Saturday: 10:00 AM - 4:00 PM</p>
                            </div>
                        </div>
                    </div>

                    <div class="social-connect">
                        <h3>Connect With Us</h3>
                        <div class="social-links-large">
                            <a href="https://facebook.com" target="_blank" aria-label="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://twitter.com" target="_blank" aria-label="Twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://instagram.com" target="_blank" aria-label="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="https://linkedin.com" target="_blank" aria-label="LinkedIn">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
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

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
        }

        .contact-form-wrapper h2,
        .contact-info-wrapper h2 {
            font-size: 32px;
            margin-bottom: 16px;
        }

        .form-description,
        .info-description {
            color: var(--text-light);
            margin-bottom: 30px;
            line-height: 1.7;
        }

        .contact-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--dark-color);
        }

        .form-group input,
        .form-group textarea {
            padding: 12px 16px;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(0, 146, 70, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .alert {
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 25px;
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .alert i {
            font-size: 20px;
            margin-top: 2px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-success i {
            color: #28a745;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .alert-danger i {
            color: #dc3545;
        }

        .alert ul {
            margin: 5px 0 0 0;
            padding-left: 20px;
        }

        .alert li {
            margin-bottom: 5px;
        }

        .error-text {
            color: var(--secondary-color);
            font-size: 14px;
            margin-top: 5px;
            display: block;
        }

        .btn-block {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .contact-info-cards {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-bottom: 40px;
        }

        .info-card {
            display: flex;
            gap: 20px;
            padding: 25px;
            background-color: var(--tertiary-color);
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .info-card:hover {
            background-color: white;
            box-shadow: var(--shadow);
            transform: translateX(5px);
        }

        .info-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary-color), #00b359);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .info-icon i {
            font-size: 20px;
            color: white;
        }

        .info-content h4 {
            font-size: 18px;
            margin-bottom: 8px;
            color: var(--dark-color);
        }

        .info-content p {
            color: var(--text-light);
            line-height: 1.6;
            margin: 0;
        }

        .social-connect {
            background-color: var(--tertiary-color);
            padding: 30px;
            border-radius: 12px;
            text-align: center;
        }

        .social-connect h3 {
            font-size: 22px;
            margin-bottom: 20px;
        }

        .social-links-large {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .social-links-large a {
            width: 50px;
            height: 50px;
            background-color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            transition: all 0.3s ease;
            box-shadow: var(--shadow);
        }

        .social-links-large a:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-5px);
        }

        @media (max-width: 992px) {
            .contact-grid {
                grid-template-columns: 1fr;
                gap: 50px;
            }
        }

        @media (max-width: 768px) {
            .page-hero h1 {
                font-size: 36px;
            }

            .contact-form-wrapper h2,
            .contact-info-wrapper h2 {
                font-size: 28px;
            }
        }
    </style>
@endpush
