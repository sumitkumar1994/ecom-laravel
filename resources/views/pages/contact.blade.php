@extends('layouts.masterLayout')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mb-4 text-white">Contact Us</h1>
            <p class="text-center text-white mb-5">We'd love to hear from you. Send us a message!</p>
        </div>
    </div>
    
    <div class="row">
        <!-- Contact Form -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-4">Send us a Message</h4>
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone">
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <select class="form-select" id="subject" required>
                                <option value="">Choose a subject...</option>
                                <option value="general">General Inquiry</option>
                                <option value="support">Customer Support</option>
                                <option value="orders">Order Issues</option>
                                <option value="returns">Returns & Refunds</option>
                                <option value="partnership">Partnership</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Contact Information -->
        <div class="col-lg-4">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h4 class="card-title mb-4">Get in Touch</h4>
                    <div class="contact-info">
                        <div class="mb-3">
                            <h6><i class="fas fa-map-marker-alt"></i> Address</h6>
                            <p class="text-muted">123 Commerce Street<br>Business District<br>City, State 12345</p>
                        </div>
                        <div class="mb-3">
                            <h6><i class="fas fa-phone"></i> Phone</h6>
                            <p class="text-muted">+1 (555) 123-4567</p>
                        </div>
                        <div class="mb-3">
                            <h6><i class="fas fa-envelope"></i> Email</h6>
                            <p class="text-muted">support@shopease.com</p>
                        </div>
                        <div class="mb-3">
                            <h6><i class="fas fa-clock"></i> Business Hours</h6>
                            <p class="text-muted">
                                Monday - Friday: 9:00 AM - 6:00 PM<br>
                                Saturday: 10:00 AM - 4:00 PM<br>
                                Sunday: Closed
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Social Media -->
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-4">Follow Us</h4>
                    <div class="social-links">
                        <a href="#" class="btn btn-outline-primary btn-sm me-2 mb-2">
                            <i class="fab fa-facebook-f"></i> Facebook
                        </a>
                        <a href="#" class="btn btn-outline-info btn-sm me-2 mb-2">
                            <i class="fab fa-twitter"></i> Twitter
                        </a>
                        <a href="#" class="btn btn-outline-danger btn-sm me-2 mb-2">
                            <i class="fab fa-instagram"></i> Instagram
                        </a>
                        <a href="#" class="btn btn-outline-primary btn-sm mb-2">
                            <i class="fab fa-linkedin-in"></i> LinkedIn
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
.contact-info h6 {
    color: #667eea;
    font-weight: 600;
}

.contact-info i {
    margin-right: 8px;
    color: #667eea;
}

.social-links a {
    text-decoration: none;
}

.card {
    border: none;
    border-radius: 10px;
}
</style>
@endsection