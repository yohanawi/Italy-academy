<footer class="footer">
    <div class="footer-main">
        <div class="container">
            <div class="footer-grid">
                {{-- Company Info --}}
                <div class="footer-col">
                    <div class="footer-logo">
                        <i class="fas fa-graduation-cap"></i>
                        <span>Italy Academy</span>
                    </div>
                    <p class="footer-desc">
                        Your gateway to mastering the Italian language and immersing yourself in the rich culture of
                        Italy.
                    </p>
                    <div class="social-links">
                        <a href="https://facebook.com" target="_blank" aria-label="Facebook"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com" target="_blank" aria-label="Twitter"><i
                                class="fab fa-twitter"></i></a>
                        <a href="https://instagram.com" target="_blank" aria-label="Instagram"><i
                                class="fab fa-instagram"></i></a>
                        <a href="https://linkedin.com" target="_blank" aria-label="LinkedIn"><i
                                class="fab fa-linkedin-in"></i></a>
                        <a href="https://youtube.com" target="_blank" aria-label="YouTube"><i
                                class="fab fa-youtube"></i></a>
                    </div>
                </div>

                {{-- Quick Links --}}
                <div class="footer-col">
                    <h3 class="footer-title">Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="{{ route('home') }}"><i class="fas fa-chevron-right"></i> Home</a></li>
                        <li><a href="{{ route('about') }}"><i class="fas fa-chevron-right"></i> About Us</a></li>
                        <li><a href="{{ route('courses') }}"><i class="fas fa-chevron-right"></i> Courses</a></li>
                        <li><a href="{{ route('contact') }}"><i class="fas fa-chevron-right"></i> Contact</a></li>
                    </ul>
                </div>

                {{-- Courses --}}
                <div class="footer-col">
                    <h3 class="footer-title">Popular Courses</h3>
                    <ul class="footer-links">
                        <li><a href="{{ route('courses') }}"><i class="fas fa-chevron-right"></i> Beginner Italian</a>
                        </li>
                        <li><a href="{{ route('courses') }}"><i class="fas fa-chevron-right"></i> Intermediate
                                Italian</a></li>
                        <li><a href="{{ route('courses') }}"><i class="fas fa-chevron-right"></i> Advanced Italian</a>
                        </li>
                        <li><a href="{{ route('courses') }}"><i class="fas fa-chevron-right"></i> Business Italian</a>
                        </li>
                    </ul>
                </div>

                {{-- Contact Info --}}
                <div class="footer-col">
                    <h3 class="footer-title">Contact Us</h3>
                    <ul class="footer-contact">
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Rome, Italy</span>
                        </li>
                        <li>
                            <i class="fas fa-phone"></i>
                            <span>+39 123 456 7890</span>
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <span>info@italyacademy.com</span>
                        </li>
                        <li>
                            <i class="fas fa-clock"></i>
                            <span>Mon - Fri: 9:00 AM - 6:00 PM</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer Bottom --}}
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-content">
                <p>&copy; {{ date('Y') }} Italy Academy. All rights reserved.</p>
                <div class="footer-bottom-links">
                    <a href="#">Privacy Policy</a>
                    <span>|</span>
                    <a href="#">Terms & Conditions</a>
                    <span>|</span>
                    <a href="#">Cookie Policy</a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .footer {
            background: linear-gradient(135deg, var(--dark-color) 0%, #2d2d2d 100%);
            color: var(--light-color);
        }

        .footer-main {
            padding: 80px 0 40px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
        }

        .footer-col {
            display: flex;
            flex-direction: column;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 24px;
            font-weight: 700;
            color: var(--light-color);
            margin-bottom: 20px;
            font-family: 'Playfair Display', serif;
        }

        .footer-logo i {
            font-size: 32px;
            color: var(--primary-color);
        }

        .footer-desc {
            color: #b0b0b0;
            margin-bottom: 25px;
            line-height: 1.8;
        }

        .social-links {
            display: flex;
            gap: 12px;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: var(--light-color);
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background-color: var(--primary-color);
            transform: translateY(-3px);
        }

        .footer-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 25px;
            color: var(--light-color);
            position: relative;
            padding-bottom: 10px;
        }

        .footer-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 2px;
            background-color: var(--primary-color);
        }

        .footer-links,
        .footer-contact {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .footer-links a {
            color: #b0b0b0;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--primary-color);
            padding-left: 5px;
        }

        .footer-links i {
            font-size: 12px;
        }

        .footer-contact li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            color: #b0b0b0;
        }

        .footer-contact i {
            color: var(--primary-color);
            margin-top: 3px;
            font-size: 16px;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding: 25px 0;
        }

        .footer-bottom-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .footer-bottom p {
            color: #b0b0b0;
            margin: 0;
        }

        .footer-bottom-links {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .footer-bottom-links a {
            color: #b0b0b0;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .footer-bottom-links a:hover {
            color: var(--primary-color);
        }

        .footer-bottom-links span {
            color: #555;
        }

        @media (max-width: 768px) {
            .footer-main {
                padding: 60px 0 30px;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 35px;
            }

            .footer-bottom-content {
                flex-direction: column;
                text-align: center;
            }

            .footer-bottom-links {
                flex-wrap: wrap;
                justify-content: center;
            }
        }
    </style>
</footer>
