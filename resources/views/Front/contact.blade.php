@extends('Front.layout.app')
@section('main-content')


        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Contact</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->


        <!-- Contact Start -->
        <div class="contact">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <div class="form">
                            <form action="" method="">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" placeholder="Your Name" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="email" class="form-control" placeholder="Your Email" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Subject" />
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="5" placeholder="Message"></textarea>
                                </div>
                                <div><button type="submit">Send Message</button></div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="contact-info">
                            <div class="section-header">
                                <h3>Get in Touch</h3>
                                <p class="mt-4">We'd love to hear from you! If you have any questions, concerns, or feedback, please feel free to reach out to us using the contact form below or through our provided contact details. Your satisfaction is our priority, and we strive to provide you with the best possible service.</p><br>
                                <p>We aim to respond to your inquiries as promptly as possible. Thank you for choosing Wardrobe Display for your fashion styling needs.</p>

                            </div>
                            <h4><i class="fa fa-map-marker"></i>41/Gha, Hatkhola Road, Dhaka-1203</h4>
                            <h4><i class="fa fa-envelope"></i>wardrobedisplay.og@gmail.com</h4>
                            <h4><i class="fa fa-phone"></i>+880-1511-369287</h4>
                            <div class="social">
                                <a href="{{ url('https://www.facebook.com/wardrobedisplay.bd/') }}"><i class="fa fa-facebook"></i></a>
                                <a href="{{ url('https://wa.me/+8801511369287') }}"><i class="fa fa-whatsapp"></i></a>
                                <a href="{{ url('https://www.instagram.com/wardrobedisplay?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==') }}"><i class="fa fa-instagram"></i></a>
                                <a href="{{ url('https://www.youtube.com/channel/UCBUhY8FTfob9H8xREfnkuTQ') }}"><i class="fa fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

@endsection
