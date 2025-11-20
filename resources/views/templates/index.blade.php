<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PMS - Index Page</title>
</head>
<body>

    <header>
        <nav>
            <a href="#services">Our Services</a>
            <a href="#faq">Frequent Questions</a>
            <a href="#contact">Contact Us</a>
        </nav>
        <a href="{{ route('registerpage') }}" class="register-top">Register</a>
    </header>

    <section id="services" class="section">
        <h2>Our Services</h2>
        <div class="services">
            <p>Here you can explain the services of your PMS system...</p>
        </div>
        <a href="{{ route('registerpage') }}" class="register-center">Register Now</a>
    </section>

    <section id="faq" class="section">
        <h2>Frequent Questions</h2>
        <div class="faq">
            <p><strong>Q:</strong> What is PMS?</p>
            <p><strong>A:</strong> PMS is the first product Management system desinged for biggners.</p>
            <br>
            <p><strong>Q:</strong> Is it free?</p>
            <p><strong>A:</strong> that is coret it is 100% free!</p>
            <br>
            <p><strong>Q:</strong> Is there a tecnecal support team?</p>
            <p><strong>A:</strong> We have the best support team that is avaliabe 24/7.</p>
        </div>
    </section>

    <section id="contact" class="section">
        <h2>Contact Us</h2>
        <div class="contact-form">
            <form method="post" action="{{ route('Contact') }}">
                @csrf
                <input type="text" placeholder="Your Name" required name="name" />
                @error('name')
                    <div style="color: red;">
                        {{ $message }}
                    </div>
                @enderror
                <input type="email" placeholder="Your Email" required name="email" />
                @error('email')
                    <div style="color: red;">
                        {{ $message }}
                    </div>
                @enderror
                <input type="text" placeholder="Your subject" required name="subject" />
                @error('subject')
                    <div style="color: red;">
                        {{ $message }}
                    </div>
                @enderror
                <textarea placeholder="Your Message" rows="5" required name="message"></textarea>
                @error('message')
                    <div style="color: red;">
                        {{ $message }}
                    </div>
                @enderror
                <button type="submit">Send Message</button>
            </form>
        </div>
    </section>

</body>
</html>
