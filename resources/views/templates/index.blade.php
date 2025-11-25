<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>PMS - Product Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --primary: #10b981;
            --secondary: #059669;
            --accent: #34d399;
            --dark: #1e293b;
            --light: #f0fdf4;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--dark);
        }

        .navbar {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            padding: 1rem 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: white !important;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            margin: 0 0.5rem;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: white !important;
        }

        .btn-register {
            background: white !important;
            color: var(--primary) !important;
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            transition: transform 0.3s, box-shadow 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            color: var(--primary) !important;
            background: white !important;
        }

        .hero {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 5rem 0;
            text-align: center;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
        }

        .hero p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            opacity: 0.95;
        }

        .section-padding {
            padding: 4rem 0;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 3rem;
            text-align: center;
            color: var(--dark);
        }

        .service-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .service-icon {
            font-size: 3rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .faq-item {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .faq-question {
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .contact-section {
            background: var(--light);
        }

        .contact-form {
            background: white;
            border-radius: 15px;
            padding: 2.5rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            border-radius: 10px;
            padding: 0.75rem;
            border: 2px solid #e2e8f0;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(99, 102, 241, 0.25);
        }

        .btn-primary-custom {
            background: white;
            color: var(--primary);
            border: 2px solid var(--primary);
            padding: 0.75rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            transition: transform 0.3s, box-shadow 0.3s, background 0.3s;
        }

        .btn-primary-custom:hover {
            background: white;
            color: var(--primary);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(16, 185, 129, 0.4);
        }

        footer {
            background: var(--dark);
            color: white;
            padding: 2rem 0;
            text-align: center;
        }
    </style>
</head>

<body>

    @if (session('message'))
        @php
            $msg = session('message');
        @endphp

        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ $msg }}',
                confirmButtonColor: '#10b981'
            });
        </script>
    @endif

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-box-seam"></i> PMS
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#faq">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item ms-3">
                        <a href="{{ route('registerpage') }}" class="btn btn-register">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1><i class="bi bi-rocket-takeoff"></i> Product Management System</h1>
            <p class="lead">The first product management system designed for beginners. Simple, powerful, and completely
                free!</p>
            <a href="{{ route('registerpage') }}" class="btn btn-light btn-lg btn-primary-custom">Get Started Now</a>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="section-padding">
        <div class="container">
            <h2 class="section-title">Our Services</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="service-card text-center">
                        <i class="bi bi-speedometer2 service-icon"></i>
                        <h4>Fast & Efficient</h4>
                        <p>Manage your products with lightning-fast performance and intuitive workflows designed for
                            maximum productivity.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-card text-center">
                        <i class="bi bi-shield-check service-icon"></i>
                        <h4>Secure & Reliable</h4>
                        <p>Your data is protected with industry-standard security measures and reliable backup systems.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-card text-center">
                        <i class="bi bi-people service-icon"></i>
                        <h4>Beginner Friendly</h4>
                        <p>Designed specifically for beginners with easy-to-use interfaces and helpful guides every step
                            of the way.</p>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('registerpage') }}" class="btn btn-lg btn-primary-custom">Register Now</a>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="section-padding bg-light">
        <div class="container">
            <h2 class="section-title">Frequently Asked Questions</h2>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="faq-item">
                        <div class="faq-question"><i class="bi bi-question-circle"></i> What is PMS?</div>
                        <p class="mb-0">PMS is the first product management system designed for beginners. It provides
                            an intuitive platform to manage your products efficiently.</p>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question"><i class="bi bi-question-circle"></i> Is it free?</div>
                        <p class="mb-0">That is correct! It is 100% free with no hidden costs or subscription fees.</p>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question"><i class="bi bi-question-circle"></i> Is there a technical support
                            team?</div>
                        <p class="mb-0">We have the best support team that is available 24/7 to help you with any
                            questions or issues.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section-padding contact-section">
        <div class="container">
            <h2 class="section-title">Contact Us</h2>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form">
                        <form method="post" action="{{ route('Contact') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter your name">
                                @error('name')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Your Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter your email">
                                @error('email')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject"
                                    placeholder="Enter subject">
                                @error('subject')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Your Message</label>
                                <textarea class="form-control" id="message" name="message" rows="5"
                                    placeholder="Write your message here..."></textarea>
                                @error('message')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button onclick="style.display = 'none' " type="submit" class="btn btn-primary-custom">
                                    <i class="bi bi-send"></i> Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p class="mb-0">&copy; 2025 PMS - Product Management System. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>



</body>

</html>