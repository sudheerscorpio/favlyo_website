<?php
session_start();
if (empty($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Favlyo - India's Premier Fashion E-commerce | Designer Marketplace</title>
  <meta name="description"
    content="Favlyo is India's leading fashion e-commerce platform, connecting professionals with customers. Discover curated collections, sustainable fashion, and seamless shopping experiences.">
  <meta name="keywords"
    content="Favlyo, fashion, e-commerce, designer, tailor, sustainable, India, online shopping, curated, marketplace, apparel, clothing, boutique, global market, register, join, ethical, eco-friendly, designer jobs, creative, weaver, drapist, cutting master, trendy, affordable, speedy delivery, top sellers, market coverage, security, gallery, team, contact">
  <link rel="canonical" href="https://favlyo.com/">
  <meta name="robots" content="index, follow">
  <meta property="og:title" content="Favlyo - India's Premier Fashion E-commerce">
  <meta property="og:description"
    content="Join Favlyo, India's top fashion marketplace. Register as a designer, tailor, or creative professional. Shop curated, sustainable collections.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://favlyo.com/">
  <meta property="og:image" content="https://favlyo.com/assets/img/Favlyo_Logo_01.jpg">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Favlyo - India's Premier Fashion E-commerce">
  <meta name="twitter:description"
    content="Join Favlyo, India's top fashion marketplace. Register as a designer, tailor, or creative professional. Shop curated, sustainable collections.">
  <meta name="twitter:image" content="https://favlyo.com/assets/img/Favlyo_Logo_01.jpg">
  <link href="assets/img/Favlyo_Logo_01.jpg" rel="icon" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="dns-prefetch" href="https://fonts.googleapis.com">
  <link rel="dns-prefetch" href="https://code.jquery.com">
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "Favlyo",
    "url": "https://favlyo.com/",
    "logo": "https://favlyo.com/assets/img/Favlyo_Logo_01.jpg",
    "contactPoint": {
      "@type": "ContactPoint",
      "email": "info@favlyo.com",
      "contactType": "customer support"
    },
    "sameAs": [
      "https://www.facebook.com/favlyo",
      "https://www.instagram.com/favlyo"
    ]
  }
  </script>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&family=Montserrat:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap"
    rel="stylesheet" media="print" onload="this.media='all'" /><!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" /><!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet" />

  <style>
    .php-email-form .loading,
    .php-email-form .error-message,
    .php-email-form .sent-message {
      display: none;
    }
  </style>
  <!-- =======================================================
  * Template Name: Bootslander
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body><!-- ======= Header ======= -->
  <header class="fixed-top d-flex align-items-center header-transparent" id="header">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="logo"><!--        <h1><a href="index.htm"><span>FAVLYO</span></a></h1> -->
        <h1><a href="#hero" aria-label="Favlyo Home"><span>FAVLYO</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo --><!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="navbar" id="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#features">Services</a></li>
          <li><a class="nav-link scrollto" href="#register">Register</a></li>
          <!-- <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li> --><!-- <li><a class="nav-link scrollto" href="#team">Team</a></li> --><!-- <li><a class="nav-link scrollto" href="#pricing">Pricing</a></li> --><!--           <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
      </nav>
      <!-- .navbar -->
    </div>
  </header>
  <!-- End Header --><!-- ======= Hero Section ======= -->

  <section id="hero">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
          <div data-aos="zoom-out">
            <h1>Lets unfold the happiness with <span>Favlyo</span></h1>

            <h2></h2>

            <div class="text-center text-lg-start"><a class="btn-get-started scrollto" href="#about">Get Started</a>
            </div>
          </div>
        </div>
        <!-- <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300"> -->

        <div class="col-lg-4 order-1 order-lg-2 details-2" data-aos="fade-in" data-aos-delay="0">
          <!-- <img src="assets/img/hero-img.png" class="img-fluid animated" alt=""> -->
          <img alt="Favlyo Hero - Fashion Happiness" class="img-fluid animated" src="assets/img/Try_10.jpg" loading="eager" fetchpriority="high" />
        </div>
      </div>
    </div>
    <svg class="hero-waves" preserveaspectratio="none" viewbox="0 24 150 28 " xmlns="http://www.w3.org/2000/svg"
      xmlns:xlink="http://www.w3.org/1999/xlink">
      <defs>
        <path d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" id="wave-path"> </path>
      </defs>
      <g class="wave1">
        <use fill="rgba(255,255,255, .1)" x="50" xlink:href="#wave-path" y="3"> </use>
      </g>
      <g class="wave2">
        <use fill="rgba(255,255,255, .2)" x="50" xlink:href="#wave-path" y="0"> </use>
      </g>
      <g class="wave3">
        <use fill="#fff" x="50" xlink:href="#wave-path" y="9"> </use>
      </g>
    </svg>
  </section>
  <!-- End Hero -->

  <main id="main"><!-- ======= About Section ======= -->
    <section class="about" id="about">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch"
            data-aos="fade-right">
            <!-- <img src="assets/img/GPS_Try_02.jpg" class="img-fluid animated" alt=""> --><!-- <a href="https://www.youtube.com/watch?v=StpBR2W8G5A" class="glightbox play-btn mb-4"></a> -->
          </div>

          <div
            class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5"
            data-aos="fade-left">
            <h3>Join us to setp towards global market from local</h3>

            <p><br />
              Introducing &quot;<strong>FAVLYO</strong>&quot; - A Paradigm-Shifting E-commerce</p>

            <p>In the ever-evolving landscape of fashion, there emerges a beacon of innovation, sophistication, and
              unrivaled potential -&nbsp;startup transcends conventional e-commerce, inviting partners to embark on a
              journey of sartorial excellence.</p>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="0">
              <!-- <div class="icon"><i class="bx bx-fingerprint"></i></div> -->
              <div class="icon"></div>

              <h4 class="title"><a href="">Convenience</a></h4>

              <p class="description">Our mission is to redefine the boundaries of online apparel by providing an
                immersive,&nbsp;meticulously tailored experience that marries technology with timeless fashion.</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="50">
              <!-- <div class="icon"><i class="bx bx-gift"></i></div> -->
              <div class="icon"></div>

              <h4 class="title"><a href="">The Art of Curation</a></h4>

              <p class="description">we are in the business of elevating lifestyles. Every garment featured in our
                digital sanctuary is handpicked by our team of fashion connoisseurs, ensuring an unparalleled selection
                of tasteful attire. We go beyond trends, curating exclusive collections that epitomize elegance,
                sophistication, and individuality.</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"></div>

              <h4 class="title"><a href="">Sustainable Sourcing and Ethical Production:</a></h4>

              <p class="description">Favlyo is unwavering in its commitment to ethical sourcing and sustainable
                production. Our partnerships with eco-conscious suppliers and manufacturers reflect our dedication to
                reducing the fashion industry&#39;s carbon footprint, setting a standard for responsible retail.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End About Section --><!-- ======= Features Section ======= -->

    <section class="features" id="features">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>SERVICES</h2>

          <p>Potful of Services</p>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-lg-3 col-md-4">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="0">
              <!-- <i class="ri-store-line" style="color: #ffbb2c;"></i> -->
              <h3><a href="">Affordability</a></h3>
            </div>
          </div>

          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="0">
              <h3><a href="">Flexibility</a></h3>
            </div>
          </div>

          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="0">
              <h3><a href="">Speedy Delivery</a></h3>
            </div>
          </div>

          <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="0">
              <h3><a href="">Colourful Patterns</a></h3>
            </div>
          </div>

          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="0">
              <h3><a href="">Designers Stack</a></h3>
            </div>
          </div>
          <!--           <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
              <i class="ri-gradienter-line" style="color: #ffa76e;"></i>
              <h3><a href="">Recyclability</a></h3>
            </div>
          </div> -->

          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="0">
              <h3><a href="">Top Sellers</a></h3>
            </div>
          </div>
          <!--           <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="400">
              <i class="ri-price-tag-2-line" style="color: #4233ff;"></i>
              <h3><a href="">Less Feed</a></h3>
            </div>
          </div> --><!--           <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="450">
              <i class="ri-anchor-line" style="color: #b2904f;"></i>
              <h3><a href="">Dirada Pack</a></h3>
            </div>
          </div> --><!--           <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="500">
              <i class="ri-disc-line" style="color: #b20969;"></i>
              <h3><a href="">No Hiccups</a></h3>
            </div>
          </div> -->

          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="0">
              <h3><a href="">Market Coverage</a></h3>
            </div>
          </div>

          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="0">
              <h3><a href="">Security</a></h3>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Features Section --><!-- ======= Counts Section ======= -->

    <!-- ...existing code...
    <style>
      /* Elegant Register Section Styles */
      #register {
        background: linear-gradient(135deg, #f8fafc 0%, #e3e6f3 100%);
        padding: 40px 0;
      }

      .register-card {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 8px 32px rgba(60, 72, 88, 0.12);
        padding: 40px 32px;
        max-width: 900px;
        margin: 0 auto;
      }

      .register-card label {
        font-weight: 600;
        font-size: 1.08rem;
        color: #3a3a3a;
        margin-bottom: 6px;
        letter-spacing: 0.5px;
      }

      .register-card .form-control,
      .register-card select {
        border-radius: 10px;
        border: 1.5px solid #d1d5db;
        font-size: 1rem;
        padding: 12px 16px;
        margin-bottom: 18px;
        transition: border-color 0.2s;
        background: #f5f7fa;
        box-shadow: 0 1px 2px rgba(60, 72, 88, 0.04);
      }

      .register-card .form-control:focus,
      .register-card select:focus {
        border-color: #6c63ff;
        background: #eef1fb;
        outline: none;
      }

      .register-card .form-group {
        margin-bottom: 22px;
        position: relative;
      }

      .register-card .form-group i {
        position: absolute;
        left: 12px;
        top: 38px;
        color: #6c63ff;
        font-size: 1.1rem;
        opacity: 0.7;
      }

      .register-card .btn {
        background: linear-gradient(90deg, #6c63ff 0%, #48c6ef 100%);
        color: #fff;
        font-weight: 700;
        border: none;
        border-radius: 10px;
        padding: 12px 32px;
        font-size: 1.15rem;
        box-shadow: 0 2px 8px rgba(76, 110, 245, 0.12);
        transition: background 0.2s, box-shadow 0.2s;
      }

      .register-card .btn:hover {
        background: linear-gradient(90deg, #48c6ef 0%, #6c63ff 100%);
        box-shadow: 0 4px 16px rgba(76, 110, 245, 0.18);
      }

      @media (max-width: 768px) {
        .register-card {
          padding: 24px 8px;
        }
      }
    </style> -->

    <!-- ...existing code... -->
    <section id="register">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2 style="font-family: 'Montserrat', 'Poppins', sans-serif; font-weight: 700; color: #6c63ff;">Register</h2>
          <p style="font-size: 1.1rem; color: #444;">Fill in your details to join Favlyo</p>
        </div>
        <div class="register-card" data-aos="fade-up">
          <form action="assets/vendor/php-email-form/register_works_config_02.php" method="post" class="php-email-form"
            enctype="multipart/form-data">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <div class="row">
              <!-- ...all your form fields as before... -->
              <div class="col-md-6 form-group">
                <label><i class="bi bi-person"></i>Name</label>
                <input type="text" name="name" class="form-control" required maxlength="100"
                  placeholder="Enter your full name">
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-envelope"></i>Email Id</label>
                <input type="email" name="email" class="form-control" required placeholder="your@email.com">
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-telephone"></i>Phone Number</label>
                <input type="text" name="phone" class="form-control" required pattern="\d{10}" maxlength="10"
                  placeholder="10 digit mobile">
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-person-badge"></i>What are you</label>
                <select name="role" class="form-control" required>
                  <option value="">Select</option>
                  <option>Sitcher</option>
                  <option>Tailor</option>
                  <option>Cutting Master</option>
                  <option>Drapist</option>
                  <option>Creative Designer</option>
                  <option>Weaver</option>
                </select>
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-award"></i>Designer Experience</label>
                <select name="experience" class="form-control" required>
                  <option value="">Select</option>
                  <option>Fresher</option>
                  <option>0 -3 Years</option>
                  <option>3 - 6 Years</option>
                  <option>7 - 10 Years</option>
                  <option>11 - 14 Years</option>
                  <option>Above 15 Years</option>
                </select>
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-clock-history"></i> Work Type</label>
                <select name="work_type[]" class="form-control" multiple required>
                  <option>Hourly</option>
                  <option>Per Day</option>
                  <option>Weekly</option>
                  <option>Monthly</option>
                  <option>Yearly</option>
                </select>
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-calendar-check"></i> How soon you can join</label>
                <select name="join_time" class="form-control" required>
                  <option value="">Select</option>
                  <option>Immediately</option>
                  <option>In a Week</option>
                  <option>In a Month</option>
                  <option>In 3 Months</option>
                </select>
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-journal-check"></i> Did you take any training recently</label>
                <select name="training" class="form-control" required>
                  <option value="">Select</option>
                  <option>Yes</option>
                  <option>No</option>
                </select>
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-geo-alt"></i> Area</label>
                <input type="text" name="area" class="form-control" required maxlength="100" placeholder="Area">
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-building"></i> City</label>
                <!-- <input type="text" name="city" id="city" class="form-control" required maxlength="100"
                  placeholder="City"> -->
                <!-- With this: -->
                <select name="city" id="city" class="form-control" required>
                  <option value="">Select City</option>
                  <!-- Cities will be added by JS -->
                </select>
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-flag"></i> State</label>
                <input type="text" name="state" id="state" class="form-control" required maxlength="100"
                  placeholder="State">
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-pin-map"></i> Pin Code</label>
                <input type="text" name="pincode" class="form-control" required maxlength="10" placeholder="Pin Code">
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-question-circle"></i> Are you ready for Interview</label>
                <select name="interview_ready" class="form-control" required>
                  <option value="">Select</option>
                  <option>Yes</option>
                  <option>No</option>
                </select>
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-gender-ambiguous"></i> Gender</label>
                <select name="gender" class="form-control" required>
                  <option value="">Select</option>
                  <option>Male</option>
                  <option>Female</option>
                </select>
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-person-lines-fill"></i> Age</label>
                <input type="number" name="age" class="form-control" required min="16" max="99" placeholder="Age">
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-chat-dots"></i> Languages Speak</label>
                <!-- <input type="text" name="languages" class="form-control" required maxlength="100"
                  placeholder="Languages"> -->
                <select name="languages[]" id="languages" class="form-control" multiple required>
                  <!-- Languages will be added by JS -->
                </select>
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-truck"></i> Do you have own vehicle to travel within city</label>
                <select name="vehicle" class="form-control" required>
                  <option value="">Select</option>
                  <option>Yes</option>
                  <option>No</option>
                </select>
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-info-circle"></i> How did you get to know about us</label>
                <input type="text" name="know_about" class="form-control" maxlength="100" placeholder="Referral source">
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-gift"></i> Referral Code</label>
                <input type="text" name="referral_code" class="form-control" maxlength="50" placeholder="Referral Code">
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-phone"></i> Alternative Phone Number</label>
                <input type="text" name="alt_phone" class="form-control" pattern="\d{10}" maxlength="10"
                  placeholder="Alternative Phone">
              </div>
            </div>

            <!-- <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your registration has been submitted. Thank you!</div>
            </div> -->

            <div class="text-center">
              <button type="submit" class="btn">Register</button>
            </div>
          </form>
          <!-- Success/Error message container -->
          <div id="register-response" style="margin-top:20px;"></div>
        </div>
      </div>
    </section>
    <!-- ...existing code... -->

    <section class="counts" id="counts">
      <div class="container">
        <div class="row" data-aos="fade-up"><!--           <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-emoji-smile"></i>
              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
              <p>Happy Clients</p>
            </div>
          </div> --><!--           <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="bi bi-journal-richtext"></i>
              <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
              <p>Projects</p>
            </div>
          </div> --><!--           <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="bi bi-headset"></i>
              <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
              <p>Hours Of Support</p>
            </div>
          </div> --><!--           <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="bi bi-people"></i>
              <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
              <p>Hard Workers</p>
            </div>
          </div> --></div>
      </div>
    </section>
    <!-- End Counts Section --><!-- ======= Details Section ======= -->

    <section class="details" id="details">
      <div class="container">
        <div class="row content">
          <div class="col-md-4" data-aos="fade-up"><img alt="Favlyo Seamless Shopping" class="img-fluid"
              src="assets/img/details-1.png" loading="lazy" />
          </div>

          <div class="col-md-8 pt-4" data-aos="fade-up">
            <h3>Seamless shopping</h3>

            <p class="fst-italic">Always on toes to provide a smooth, convenient, and frictionless shopping experience
              to customers.</p>

            <ul>
              <li>Exclusive designs</li>
              <li>Payment and shipping options</li>
              <li>Accurate inventory management</li>
              <li>Responsive customer support</li>
            </ul>

            <p>We strive hard for an easy and stress-free as possible for customers, encouraging them to complete their
              purchases.</p>
          </div>
        </div>

        <div class="row content">
          <div class="col-md-4 order-1 order-md-2" data-aos="fade-up"><img alt="Favlyo Cumulative Selections"
              class="img-fluid" src="assets/img/details-2.png" loading="lazy" /></div>

          <div class="col-md-8 pt-5 order-2 order-md-1" data-aos="fade-up">
            <h3>Cumulative selections</h3>

            <p class="fst-italic"></p>

            <p>we pride ourselves on offering a curated selection of high-quality fashion brands that cater to every
              style and budget. From classic and timeless to edgy and trendy, our collection includes something for
              everyone.</p>

            <p>Each brand has its own unique style and aesthetic, so you&#39;re sure to find something that suits your
              taste. Plus, our easy-to-use platform solutions makes shopping a breeze. Browse our selection today and
              find your new favorite brand!</p>
          </div>
        </div>

        <div class="row content">
          <div class="col-md-4" data-aos="fade-up"><img alt="Favlyo Extensive Line of Products" class="img-fluid"
              src="assets/img/details-3.png" loading="lazy" />
          </div>

          <div class="col-md-8 pt-5" data-aos="fade-up">
            <h3>Extensive Line of Products</h3>

            <p>we offer an extensive line of high-quality products that cater to every need and lifestyle. Whether
              you&#39;re looking for clothing, accessories, or home decor, we&#39;ve got you covered. Our collection
              includes a wide range of products, including: Clothing From casual wear to formal attire, our clothing
              collection includes something for every occasion. We offer a variety of styles, including</p>

            <ul>
              <li>Tops: T-shirts, blouses, sweaters ..</li>
              <li>Bottoms: Pants, shorts, skirts ..</li>
              <li>Dresses: Maxi dresses, cocktail dresses ..</li>
              <li>Outerwear: Jackets, coats ..</li>
              <li>Activewear: Yoga pants, sports bras ..</li>
            </ul>

            <p>These are just a few of the products that we offer. Each product is carefully selected for its quality,
              style, and affordability. Plus, our easy-to-use platform solution makes shopping a breeze. Browse our
              collection today and find everything you need to live your best life!</p>

            <p></p>
          </div>
        </div>

        <div class="row content">
          <div class="col-md-4 order-1 order-md-2" data-aos="fade-up"><img alt="Favlyo Supreme Stores"
              class="img-fluid" src="assets/img/details-4.png" loading="lazy" /></div>

          <div class="col-md-8 pt-5 order-2 order-md-1" data-aos="fade-up">
            <h3>Supreme Stores</h3>

            <p class="fst-italic">&quot;Ensemble Essence&quot; is an exquisite apparel emporium nestled in the heart of
              India, where tradition and modernity converge seamlessly. Our boutique showcases an opulent array of
              clothing, meticulously crafted to celebrate the diverse culture and heritage of our nation.</p>

            <p>With unwavering dedication to quality and authenticity, we stand as a beacon of integrity, ensuring each
              garment is a masterpiece of artistry and elegance. At Ensemble Essence, we extend an invitation to
              experience India&#39;s rich textile heritage in its purest form a testament to our unwavering commitment
              to preserving the soul of Indian craftsmanship. Welcome to a world where clothing is not just a garment
              but a symphony of culture, color, and integrity.</p>

            <ul>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- End Details Section --><!-- ======= Gallery Section ======= -->

    <section class="gallery" id="gallery">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>Gallery</h2>

          <p>Check our Gallery</p>
        </div>

        <div class="row g-0" data-aos="fade-up">
          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="fade-up" data-aos-delay="0"><a class="gallery-lightbox"
                href="assets/img/gallery/gallery-1.jpg"><img alt="Favlyo Gallery 1" class="img-fluid"
                  src="assets/img/gallery/gallery-1.jpg" loading="lazy" /> </a></div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="fade-up" data-aos-delay="0"><a class="gallery-lightbox"
                href="assets/img/gallery/gallery-2.jpg"><img alt="Favlyo Gallery 2" class="img-fluid"
                  src="assets/img/gallery/gallery-2.jpg" loading="lazy" /> </a></div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="fade-up" data-aos-delay="0"><a class="gallery-lightbox"
                href="assets/img/gallery/gallery-3.jpg"><img alt="Favlyo Gallery 3" class="img-fluid"
                  src="assets/img/gallery/gallery-3.jpg" loading="lazy" /> </a></div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="fade-up" data-aos-delay="0"><a class="gallery-lightbox"
                href="assets/img/gallery/gallery-4.jpg"><img alt="Favlyo Gallery 4" class="img-fluid"
                  src="assets/img/gallery/gallery-4.jpg" loading="lazy" /> </a></div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="fade-up" data-aos-delay="0"><a class="gallery-lightbox"
                href="assets/img/gallery/gallery-5.jpg"><img alt="Favlyo Gallery 5" class="img-fluid"
                  src="assets/img/gallery/gallery-5.jpg" loading="lazy" /> </a></div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="fade-up" data-aos-delay="0"><a class="gallery-lightbox"
                href="assets/img/gallery/gallery-6.jpg"><img alt="Favlyo Gallery 6" class="img-fluid"
                  src="assets/img/gallery/gallery-6.jpg" loading="lazy" /> </a></div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="fade-up" data-aos-delay="0"><a class="gallery-lightbox"
                href="assets/img/gallery/gallery-7.jpg"><img alt="Favlyo Gallery 7" class="img-fluid"
                  src="assets/img/gallery/gallery-7.jpg" loading="lazy" /> </a></div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="fade-up" data-aos-delay="0"><a class="gallery-lightbox"
                href="assets/img/gallery/gallery-8.jpg"><img alt="Favlyo Gallery 8" class="img-fluid"
                  src="assets/img/gallery/gallery-8.jpg" loading="lazy" /> </a></div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Gallery Section --><!-- ======= Testimonials Section ======= -->

    <section class="testimonials" id="testimonials"><!--       <div class="container">

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div> --><!-- End testimonial item -->
      <div class="swiper-slide"><!--               <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div> --></div>
      <!-- End testimonial item -->

      <div class="swiper-slide"><!--               <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div> --></div>
      <!-- End testimonial item -->

      <div class="swiper-slide"><!--               <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div> --></div>
      <!-- End testimonial item -->

      <div class="swiper-slide"><!--               <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div> --></div>
      <!-- End testimonial item -->

      <div class="swiper-pagination"></div>
    </section>
    <!-- End Testimonials Section --><!-- ======= Team Section ======= -->

    <section class="team" id="team">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>Team</h2>

          <p></p>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="0">
              <div class="pic"><img alt="Favlyo Team Founder" class="img-fluid" src="assets/img/team/team-1.jpg" loading="lazy" />
              </div>

              <div class="member-info">
                <h4> </h4>
                <!-- <span>Chief Executive Officer</span> -->
                <span>Founder</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ======= F.A.Q Section ======= -->

    <section class="faq section-bg" id="faq"><!--       <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>F.A.Q</h2>
          <p>Frequently Asked Questions</p>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">Non consectetur a erat nam at lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
                  Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Feugiat scelerisque varius morbi enim nunc? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Dolor sit amet consectetur adipiscing elit? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div> --></section>
    <!-- End F.A.Q Section --><!-- ======= Contact Section ======= -->

    <section class="contact" id="contact">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>Contact</h2>

          <p>Contact Us</p>
        </div>

        <div>
          <iframe style="border:0; width: 50%; height: 270px;" loading="lazy" <!--
            src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Hyderabad+(FAVLYO)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
            -->

            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
            frameborder="0" allowfullscreen></iframe>
        </div>

        <br> <!-- This create a line break in html  -->

        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Hyderabad, India</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>
                  <a href="mailto:info@favlyo.com">info@favlyo.com</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>
    <!-- End Contact Section -->
  </main>
  <!-- End #main --><!-- ======= Footer ======= -->

  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="footer-info"><!-- <h3>Bootslander</h3> -->
              <h3>FAVLYO</h3>
              <!--          <p class="pb-3"><em>Qui repudiandae et eum dolores alias sed ea. Qui suscipit veniam excepturi quod.</em></p>
              <p>
                A108 Adam Street <br>
                NY 535022, USA<br><br> --><!-- <strong>Phone:</strong> +1 5589 55488 55<br> --><!--            <strong>Email:</strong> info@favlyo.com<br> --><!-- 			<strong></strong><br> -->

              <p></p>

              <div class="social-links mt-3"></div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>

            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">About us</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Terms of service</a></li>
              <li><a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Our Services</h4>

            <ul>
              <li><a href="#">Apparel Excellence </a></li>
              <!-- <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li> --><!-- <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li> -->
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>

            <p>Coming soon !!</p>

            <form action="" method="post"><input name="email" type="email" /><input type="submit" value="Subscribe" />
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">&copy; Copyright <strong><span>Favlyo</span></strong>. All Rights Reserved</div>

    </div>
  </footer>
  <!-- End Footer -->

  <div id="preloader"></div>
  <!-- Vendor JS Files - Optimized loading -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js" defer></script>
  <script src="assets/vendor/aos/aos.js" defer></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js" defer></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js" defer></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js" defer></script>
  <script src="assets/vendor/php-email-form/validate.js" defer></script><!-- Template Main JS File -->
  <script src="assets/js/main.js" defer></script>

  <!-- Consolidated and optimized inline scripts -->
  <script defer>
    // Data definitions (no jQuery needed)
    const indianLanguages = [
      "Assamese", "Bengali", "Bodo", "Dogri", "Gujarati", "Hindi", "Kannada", "Kashmiri", "Konkani", "Maithili",
      "Malayalam", "Manipuri", "Marathi", "Nepali", "Odia", "Punjabi", "Sanskrit", "Santali", "Sindhi", "Tamil",
      "Telugu", "Urdu", "English"
    ];

    const cityStateMap = {
      "Visakhapatnam": "Andhra Pradesh", "Vijayawada": "Andhra Pradesh", "Guntur": "Andhra Pradesh",
      "Nellore": "Andhra Pradesh", "Kurnool": "Andhra Pradesh", "Rajahmundry": "Andhra Pradesh",
      "Tirupati": "Andhra Pradesh", "Itanagar": "Arunachal Pradesh", "Guwahati": "Assam",
      "Silchar": "Assam", "Dibrugarh": "Assam", "Patna": "Bihar", "Gaya": "Bihar",
      "Bhagalpur": "Bihar", "Muzaffarpur": "Bihar", "Raipur": "Chhattisgarh", "Bhilai": "Chhattisgarh",
      "Bilaspur": "Chhattisgarh", "Panaji": "Goa", "Margao": "Goa", "Ahmedabad": "Gujarat",
      "Surat": "Gujarat", "Vadodara": "Gujarat", "Rajkot": "Gujarat", "Bhavnagar": "Gujarat",
      "Jamnagar": "Gujarat", "Faridabad": "Haryana", "Gurgaon": "Haryana", "Panipat": "Haryana",
      "Ambala": "Haryana", "Shimla": "Himachal Pradesh", "Solan": "Himachal Pradesh",
      "Ranchi": "Jharkhand", "Jamshedpur": "Jharkhand", "Dhanbad": "Jharkhand",
      "Bangalore": "Karnataka", "Mysore": "Karnataka", "Hubli": "Karnataka", "Mangalore": "Karnataka",
      "Thiruvananthapuram": "Kerala", "Kochi": "Kerala", "Kozhikode": "Kerala", "Thrissur": "Kerala",
      "Indore": "Madhya Pradesh", "Bhopal": "Madhya Pradesh", "Jabalpur": "Madhya Pradesh",
      "Gwalior": "Madhya Pradesh", "Mumbai": "Maharashtra", "Pune": "Maharashtra", "Nagpur": "Maharashtra",
      "Thane": "Maharashtra", "Nashik": "Maharashtra", "Aurangabad": "Maharashtra", "Imphal": "Manipur",
      "Shillong": "Meghalaya", "Aizawl": "Mizoram", "Kohima": "Nagaland", "Dimapur": "Nagaland",
      "Bhubaneswar": "Odisha", "Cuttack": "Odisha", "Rourkela": "Odisha", "Ludhiana": "Punjab",
      "Amritsar": "Punjab", "Jalandhar": "Punjab", "Patiala": "Punjab", "Jaipur": "Rajasthan",
      "Jodhpur": "Rajasthan", "Udaipur": "Rajasthan", "Kota": "Rajasthan", "Gangtok": "Sikkim",
      "Chennai": "Tamil Nadu", "Coimbatore": "Tamil Nadu", "Madurai": "Tamil Nadu",
      "Tiruchirappalli": "Tamil Nadu", "Salem": "Tamil Nadu", "Hyderabad": "Telangana",
      "Warangal": "Telangana", "Nizamabad": "Telangana", "Agartala": "Tripura",
      "Lucknow": "Uttar Pradesh", "Kanpur": "Uttar Pradesh", "Ghaziabad": "Uttar Pradesh",
      "Agra": "Uttar Pradesh", "Varanasi": "Uttar Pradesh", "Meerut": "Uttar Pradesh",
      "Allahabad": "Uttar Pradesh", "Dehradun": "Uttarakhand", "Haridwar": "Uttarakhand",
      "Kolkata": "West Bengal", "Howrah": "West Bengal", "Durgapur": "West Bengal",
      "Asansol": "West Bengal", "Delhi": "Delhi", "Chandigarh": "Chandigarh",
      "Srinagar": "Jammu & Kashmir", "Jammu": "Jammu & Kashmir", "Leh": "Ladakh", "Puducherry": "Puducherry"
    };

    // Wait for DOM and jQuery to be ready
    document.addEventListener('DOMContentLoaded', function() {
      // Form submission handler (vanilla JS - no jQuery needed)
      var form = document.querySelector('.php-email-form');
      if (form) {
        form.onsubmit = function(e) {
          e.preventDefault();
          var data = new FormData(form);
          var responseEl = document.getElementById('register-response');
          responseEl.innerHTML = '<div class="alert alert-info">Submitting...</div>';
          
          fetch(form.action, { method: 'POST', body: data })
            .then(function(r) {
              if (!r.ok) throw new Error('Registration service not available');
              return r.text();
            })
            .then(function(msg) {
              responseEl.innerHTML = msg === 'success'
                ? '<div class="alert alert-success">Registration successful!</div>'
                : '<div class="alert alert-danger">' + msg + '</div>';
              if (msg === 'success') form.reset();
            })
            .catch(function(err) {
              responseEl.innerHTML = '<div class="alert alert-danger">Registration failed: ' + err.message + '</div>';
            });
        };
      }

      // Populate dropdowns using vanilla JS (faster than jQuery)
      var languagesSelect = document.getElementById('languages');
      if (languagesSelect) {
        indianLanguages.sort().forEach(function(lang) {
          var opt = document.createElement('option');
          opt.value = lang;
          opt.textContent = lang;
          languagesSelect.appendChild(opt);
        });
      }

      var citySelect = document.getElementById('city');
      var stateInput = document.getElementById('state');
      if (citySelect) {
        Object.keys(cityStateMap).sort().forEach(function(city) {
          var opt = document.createElement('option');
          opt.value = city;
          opt.textContent = city;
          citySelect.appendChild(opt);
        });
        
        citySelect.addEventListener('change', function() {
          if (stateInput) stateInput.value = cityStateMap[this.value] || '';
        });
      }

      // Sort role options
      var roleSelect = document.querySelector('select[name="role"]');
      if (roleSelect) {
        var options = Array.from(roleSelect.options).slice(1);
        options.sort(function(a, b) { return a.text.localeCompare(b.text); });
        options.forEach(function(opt) { roleSelect.appendChild(opt); });
      }
    });

    // Disable right-click
    document.addEventListener('contextmenu', function(e) { e.preventDefault(); });
  </script>

</body>

</html>