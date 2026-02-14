<!-- Start Footer Area -->
<footer class="footer">
    <div class="footer-middle">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="f-about single-footer footer-brand">
                        <div class="logo">
                            <a href="{{ route('index') }}"><img src="{{ asset('dsimt/images/logo/logo1.png') }}" alt="Digital Sindh Institute"></a>
                        </div>
                        <p class="footer-tagline">Empowering the next generation with cutting-edge IT & digital skills training.</p>
                        <div class="footer-social">
                            <ul>
                                <li><a href="https://www.facebook.com/DSIMTHYD" aria-label="Facebook"><i class="lni lni-facebook-original"></i></a></li>
                                <li><a href="https://twitter.com/DigitalSindhIMT" aria-label="Twitter"><i class="lni lni-twitter-original"></i></a></li>
                                <li><a href="https://www.linkedin.com/company/digital-sindh-institute-of-management-and-technology/" aria-label="LinkedIn"><i class="lni lni-linkedin-original"></i></a></li>
                                <li><a href="mailto:digitalsindhimt@gmail.com" aria-label="Email"><i class="lni lni-envelope"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-footer sm-custom-border recent-blog">
                        <h3>Latest Events</h3>
                        <ul>
                            <li>
                                <a href="{{ route('dsimt.events') }}"><img src="{{ asset('dsimt/images/dsimt_imgs/news.jpg') }}" alt="Event">Chief Guests on Grand opening ceremony</a>
                                <span class="date"><i class="lni lni-calendar"></i>September 26, 2024</span>
                            </li>
                            <li>
                                <a href="{{ route('dsimt.events') }}"><img src="{{ asset('dsimt/images/dsimt_imgs/wall2.jpg') }}" alt="Event">Free Scholarships certificates distribution ceremony</a>
                                <span class="date"><i class="lni lni-calendar"></i>July 1, 2023</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-footer sm-custom-border f-link">
                        <h3>Quick Links</h3>
                        <ul>
                            <li><a href="{{ route('lms.index') }}">LMS Portal</a></li>
                            <li><a href="{{ route('courses.index') }}">Web Development</a></li>
                            <li><a href="{{ route('courses.index') }}">DIT/CIT</a></li>
                            <li><a href="{{ route('courses.index') }}">iOS/Android App Development</a></li>
                            <li><a href="{{ route('courses.index') }}">Website Design</a></li>
                            <li><a href="{{ route('courses.index') }}">Graphic Designing</a></li>
                            <li><a href="{{ route('courses.index') }}">Digital Marketing</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-footer footer-newsletter">
                        <h3>Newsletter</h3>
                        <p>Stay updated with our latest courses, events, and scholarship opportunities.</p>
                        <form action="#" method="get" class="newsletter-form">
                            <input name="EMAIL" placeholder="Enter your email" class="common-input" required="" type="email">
                            <div class="button">
                                <button class="btn" type="submit">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="inner">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-12">
                        <div class="left">
                            <p>© 2025 Digital Sindh Institute of Management & Technology. All rights reserved.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="footer-bottom-links">
                            <a href="{{ route('dsimt.about-us') }}">About</a>
                            <span class="separator">|</span>
                            <a href="{{ route('dsimt.contact') }}">Contact</a>
                            <span class="separator">|</span>
                            <a href="{{ route('lms.index') }}">LMS</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
