@extends('main-website.layouts.main')

@section('title', 'Contact Us | Digital Sindh Institute')
@section('description', 'Contact Digital Sindh Institute for IT courses, admissions, and career counseling.')

@section('content')
<!-- Start Contact Area -->
<section id="contact-us" class="contact-us section">
        <div class="container" >
            <div class="row">
                <div class="col-12">
                    <div class="section-title align-center gray-bg">
                        <div class="section-icon wow zoomIn" data-wow-delay=".4s">
                            <i class="lni lni-user"></i>
                        </div>
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Contact Us</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s" style="color: lightgray;background-color: #012169;border-radius: 2px;">Connect with us today! Reach out for inquiries, assistance, or collaboration through our Contact Us page. We're here to help.</p>
                    </div>
                </div>


                <div class="col-lg-8 col-md-12 col-12">
                    <div class="form-main">
                        <h3 class="title"><span>Ready to Start?</span>
                            Let's Talk
                        </h3>
                        <form class="form" method="post" action="#">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Your Name</label>
                                        <input name="name" type="text" placeholder="" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Your Subject</label>
                                        <input name="subject" type="text" placeholder=""
                                            required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Your Email Address</label>
                                        <input name="email" type="email" placeholder="" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Your Phone Number</label>
                                        <input name="phone" type="text" placeholder="" required="required">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group message">
                                        <label>Your Message</label>
                                        <textarea name="message" placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group button">
                                        <button type="submit" class="btn">Submit Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="contact-info">
                        <!-- Start Single Info -->
                        <div class="single-info">
                            <i class="lni lni-map-marker"></i>
                            <h4>Visit Our Office</h4>
                            <p class="no-margin-bottom">
                                House no B-88 near the post office opp govt girls school phase-1 qasimabad Hyderabad, Hyderabad, Pakistan</p>
                        </div>
                        <!-- End Single Info -->
                        <!-- Start Single Info -->
                        <div class="single-info">
                            <i class="lni lni-phone"></i>
                            <h4>Let's Talk</h4>
                            <p class="no-margin-bottom">Mobile: (+92) 306 0934322
                                <br> Phone: 0226138792</p>
                        </div>
                        <!-- End Single Info -->
                        <!-- Start Single Info -->
                        <div class="single-info">
                            <i class="lni lni-envelope"></i>
                            <h4>E-mail Us</h4>
                            <p class="no-margin-bottom"><a href="mailto:info@yourdomain.com">info@dsimt.edu.pk</a>
                                <br> <a href="mailto:contact@yourdomain.com">digitalsindhimt@gmail.com</a></p>
                        </div>
                        <!-- End Single Info -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Contact Area -->

    <!-- Start Google-map Area -->
    <div class="map-section">
        <div class="mapouter">
            <div class="gmap_canvas">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3604.264103252153!2d68.357776!3d25.395968699999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x394c7b97266a2801%3A0xfb9646c0252e07a6!2sDigital%20sindh%20Institute%20of%20Managment%20%26%20Technology!5e0!3m2!1sen!2s!4v1718129677020!5m2!1sen!2s" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> 
            </div>
        </div>
    </div>
    <!-- End Google-map Area -->
@endsection
