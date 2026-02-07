<header class="header">
    <nav class="navbar">
        <div class="container">
            <div class="nav-wrapper">
                {{-- Logo --}}
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <i class="fas fa-graduation-cap"></i>
                        <span>Italy Academy</span>
                    </a>
                </div>

                {{-- Mobile Menu Toggle --}}
                <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Toggle menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                {{-- Navigation Menu --}}
                <div class="nav-menu" id="navMenu">
                    <ul class="nav-links">
                        <li><a href="{{ route('home') }}"
                                class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                        <li><a href="{{ route('about') }}"
                                class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
                        <li><a href="{{ route('courses') }}"
                                class="{{ request()->routeIs('courses') ? 'active' : '' }}">Courses</a></li>
                        <li><a href="{{ route('contact') }}"
                                class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
                    </ul>

                    <div class="nav-actions">
                        <a href="{{ route('login') }}" class="btn btn-outline btn-sm">Admin Login</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <style>
        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background-color: var(--light-color);
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
        }

        .navbar {
            padding: 20px 0;
        }

        .nav-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo a {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 24px;
            font-weight: 700;
            color: var(--primary-color);
            font-family: 'Playfair Display', serif;
        }

        .logo i {
            font-size: 32px;
        }

        .mobile-menu-toggle {
            display: none;
            flex-direction: column;
            gap: 5px;
            background: none;
            border: none;
            cursor: pointer;
            padding: 5px;
        }

        .mobile-menu-toggle span {
            width: 25px;
            height: 3px;
            background-color: var(--dark-color);
            transition: all 0.3s ease;
            border-radius: 3px;
        }

        .mobile-menu-toggle.active span:nth-child(1) {
            transform: rotate(45deg) translateY(8px);
        }

        .mobile-menu-toggle.active span:nth-child(2) {
            opacity: 0;
        }

        .mobile-menu-toggle.active span:nth-child(3) {
            transform: rotate(-45deg) translateY(-8px);
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 40px;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 32px;
            margin: 0;
        }

        .nav-links a {
            font-size: 16px;
            font-weight: 500;
            color: var(--text-color);
            position: relative;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--primary-color);
            transition: width 0.3s ease;
        }

        .nav-links a:hover::after,
        .nav-links a.active::after {
            width: 100%;
        }

        .nav-links a.active {
            color: var(--primary-color);
        }

        .btn-sm {
            padding: 8px 20px;
            font-size: 14px;
        }

        /* Mobile Styles */
        @media (max-width: 992px) {
            .mobile-menu-toggle {
                display: flex;
            }

            .nav-menu {
                position: fixed;
                top: 80px;
                left: 0;
                right: 0;
                background-color: var(--light-color);
                flex-direction: column;
                padding: 30px 20px;
                box-shadow: var(--shadow-lg);
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .nav-menu.active {
                transform: translateX(0);
            }

            .nav-links {
                flex-direction: column;
                gap: 20px;
                width: 100%;
            }

            .nav-links li {
                width: 100%;
            }

            .nav-links a {
                display: block;
                padding: 10px 0;
                font-size: 18px;
            }

            .nav-actions {
                width: 100%;
            }

            .nav-actions .btn {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .logo a {
                font-size: 20px;
            }

            .logo i {
                font-size: 28px;
            }
        }

        /* Add padding to body to prevent content from going under fixed header */
        body {
            padding-top: 80px;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuToggle = document.getElementById('mobileMenuToggle');
            const navMenu = document.getElementById('navMenu');

            if (mobileMenuToggle) {
                mobileMenuToggle.addEventListener('click', function() {
                    this.classList.toggle('active');
                    navMenu.classList.toggle('active');
                });
            }

            // Close mobile menu when clicking on a link
            const navLinks = document.querySelectorAll('.nav-links a');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    mobileMenuToggle.classList.remove('active');
                    navMenu.classList.remove('active');
                });
            });

            // Close mobile menu when clicking outside
            document.addEventListener('click', function(event) {
                if (!event.target.closest('.nav-wrapper')) {
                    mobileMenuToggle.classList.remove('active');
                    navMenu.classList.remove('active');
                }
            });
        });
    </script>
</header>
