<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MSABS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  {{-- template_css START--}}
  <!-- Favicons -->
  <link rel="icon" type="text/css" href="{{asset('assets/img/test_logo.png')}}" >
  <link rel="apple-touch-icon" type="text/css" href="{{asset('assets/img/apple-touch-icon.png')}}">

  <!-- Google Fonts -->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/googlefont.css')}}">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/aos/aos.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/custom_style.css')}}" rel="stylesheet">
  {{-- template_css END--}}
  </head>

<body>
<!-- ======= Navbar ======= -->
  <header id="header">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="{{ url('/') }}">MSABS<img src="assets/img/test_logo.png" alt="" class="img-fluid"> </a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="{{ route('services') }}">Services</a></li>
          <li><a class="nav-link scrollto" href="#about">About Us</a></li>
          <li><a class="nav-link scrollto" href="#features">Features</a></li>
          <li><a class="nav-link scrollto" href="#faq">FAQ</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          
          <li><a class="getstarted scrollto" href="{{ route('login') }}">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header>
  <!-- End Navbar -->

<!-- ======= Hero Section ======= -->
  <section id="hero">

    <div class="container">
      <div class="row d-flex align-items-center">
      <div class=" col-lg-6 py-5 py-lg-0 order-2 order-lg-1" data-aos="fade-right">
        <h1>Multi-Service Appointment Booking System</h1>
        <h2>Why wait for lucky occurences if you can plan ahead.</h2>
        <a href="{{ route('services') }}" class="btn-get-started scrollto">View Our Services!</a>
      </div>
      <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
        <img src="assets/img/test_bg.png" class="img-fluid" alt="">
      </div>
    </div>
    </div>

  </section>
  <!-- End Hero Section -->

  <main id="main">

<!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
      <div class="container">

        <div class="row no-gutters clients-wrap clearfix wow fadeInUp">

          <div class="col-lg-2 col-md-4 col-6">
            <div class="client-logo">
              <img src="assets/img/clients/test_partners_01.png" class="img-fluid" alt="" data-aos="flip-right">
            </div>
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <div class="client-logo">
              <img src="assets/img/clients/test_partners_02.png" class="img-fluid" alt="" data-aos="flip-right" data-aos-delay="100">
            </div>
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <div class="client-logo">
              <img src="assets/img/clients/test_partners_03.png" class="img-fluid" alt="" data-aos="flip-right" data-aos-delay="200">
            </div>
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <div class="client-logo">
              <img src="assets/img/clients/test_partners_04.png" class="img-fluid" alt="" data-aos="flip-right" data-aos-delay="300">
            </div>
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <div class="client-logo">
              <img src="assets/img/clients/test_partners_05.png" class="img-fluid" alt="" data-aos="flip-right" data-aos-delay="400">
            </div>
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <div class="client-logo">
              <img src="assets/img/clients/test_partners_06.png" class="img-fluid" alt="" data-aos="flip-right" data-aos-delay="500">
            </div>
          </div>

        </div>

      </div>
    </section>
  <!-- End Clients Section -->

<!-- ======= About Section ======= -->
<section id="about" class="about section-bg">
  <div class="container">

        <div class="row gy-4">
          <div class="image col-xl-5"></div>
          <div class="col-xl-7">
            <div class="content d-flex flex-column justify-content-center ps-0 ps-xl-4">
              <h3 data-aos="fade-in" data-aos-delay="100">About Us</h3>
              <p data-aos="fade-in">
                Suspendisse metus turpis, accumsan sit amet malesuada non, euismod vitae erat. Mauris aliquam mi est, nec porttitor est congue vitae. Curabitur vel egestas justo, et laoreet lectus. Nulla ultricies finibus ipsum nec sollicitudin. Phasellus blandit elit sit amet eros rhoncus, at efficitur quam commodo.
              </p>
              <div class="row gy-4 mt-3">
                <div class="col-md-6 icon-box" data-aos="fade-up">
                  <i class="bx bx-receipt"></i>
                  <h4><a href="#">What</a></h4>
                  <p>MSABS is a system proposal for a web application that can book appointments for any applicable businesses such as restaurants, barber shops, malls, etc.</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                  <i class="bx bx-question-mark"></i>
                  <h4><a href="#">Why</a></h4>
                  <p>The application aims to reduce traffic when people visit thier favorite shops by allowing them to schedule appointments and help them plan their day better.</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                  <i class="bx bx-current-location"></i>
                  <h4><a href="#">Where</a></h4>
                  <p>The initial application will first be tested with selected shops in Baguio City.</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                  <i class="bx bx-timer"></i>
                  <h4><a href="#">When</a></h4>
                  <p>Only time will tell.</p>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div><!-- End .content-->
      </div>
    </div>

  </div>
</section>
<!-- End About Section -->


<!-- ======= Features Section ======= -->
    <section id="features" class="features section-bg">
      <div class="container">

        <div class="section-title">
          <h2 data-aos="fade-in">Features</h2>
          <p data-aos="fade-in">How will MSABS provide the solutions to achieve its purpose?</p>
        </div>

        <div class="row content">
          <div class="col-md-5" data-aos="fade-right">
            <img src="assets/img/features-1.svg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-4" data-aos="fade-left">
            <h3>Business Owners</h3>
            <p class="fst-italic">
              For any business that offers services to a limited amount of customers at a time. The MSABS will provide the following benefits:
            </p>
            <ul>
              <li><i class="bi bi-check"></i> Customer Management.</li>
              <li><i class="bi bi-check"></i> Schedule Handling.</li>
              <li><i class="bi bi-check"></i> Customer Statistics.</li>
              <li><i class="bi bi-check"></i> Online Advertisement.</li>
            </ul>
            <a href="{{ route('business.index') }}" class="btnCheckBusiness">Check the Business Portal for MSABS!</a>
          </div>
        </div>

        <div class="row content">
          <div class="col-md-5 order-1 order-md-2" data-aos="fade-left">
            <img src="assets/img/features-2.svg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5 order-2 order-md-1" data-aos="fade-right">
            <h3>Customers</h3>
            <p class="fst-italic">
              For anyone who would like to have a better experience with shops they frequent. The MSABS will help you:
            </p>
            <ul>
              <li><i class="bi bi-check"></i> View different shops and their availability.</li>
              <li><i class="bi bi-check"></i> Schedule appointments with your favorite stores.</li>
              <li><i class="bi bi-check"></i> Plan efficiently and manage your time.</li>
            </ul>
          </div>
        </div>

      </div>
    </section>
  <!-- End Features Section -->

<!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title">
          <h2 data-aos="fade-in">Frequently Asked Questions</h2>
        </div>

        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up">
          <div class="col-lg-5">
            <i class="bx bx-help-circle"></i>
            <h4>Non consectetur a erat nam at lectus urna duis?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-5">
            <i class="bx bx-help-circle"></i>
            <h4>Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim.
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-5">
            <i class="bx bx-help-circle"></i>
            <h4>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus.
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

      </div>
    </section>
  <!-- End Frequently Asked Questions Section -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Contact Us</h2>
      <p>Here are different ways you can try to reach us.</p>
      <div class="custom-social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>

    <div class="row">

      <div class="col-lg-6">

        <div class="row">
          <div class="col-md-12">
            <div class="info-box" data-aos="fade-up">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p>Nulla sed porta arcu. Mauris quis semper erat.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box mt-4" data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p>msabs@gmail.com <br> msabs2@gmail.com</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box mt-4" data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p>09999999999 <br>09999999999 </p>
            </div>
          </div>
        </div>

      </div>

      <div class="col-lg-6 mt-4 mt-lg-0">
        <form action="forms/contact.php" method="post" role="form" class="php-email-form w-100" data-aos="fade-up">
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
          </div>
          <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div>
          <div class="text-center"><button type="submit">Send Message</button></div>
        </form>
      </div>

    </div>

  </div>
</section>
<!-- End Contact Section -->

  </main><!-- End #main -->

<!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container footer-bottom clearfix align-center">
      <div class="credits">
        &copy; Copyright <strong><span>MSABS 2023</span></strong>. All Rights Reserved
      </div>
      
    </div>
  </footer>
  <!-- End Footer -->

<!-- ======= Back to Top Button ======= -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Back to Top Button End -->
{{-- template_js START--}}
  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/aos/aos.js')}}" defer></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}" defer></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}" defer></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}" defer></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}" defer></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}" defer></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}" defer></script>
  {{-- template_js END--}}
</body>

</html>