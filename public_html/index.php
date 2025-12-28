<?php
// Secure session configuration
if (session_status() === PHP_SESSION_NONE) {
  ini_set('session.cookie_httponly', 1);
  ini_set('session.use_strict_mode', 1);
  session_start();
}

// Generate CSRF token if not exists
if (empty($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Track form load time for bot detection
$_SESSION['form_loaded'] = time();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr" prefix="og: https://ogp.me/ns#">

<head>
  <!-- Primary Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  
  <!-- SEO Title - Keep under 60 characters -->
  <title>Favlyo - Fashion E-Commerce Marketplace</title>
  
  <!-- SEO Description - Keep between 150-160 characters -->
  <meta name="description" content="Favlyo connects professionals across India. Join 500+ designers. Curated collections, sustainable fashion & fast delivery.">
  
  <!-- SEO Keywords - Focus on primary keywords -->
  <meta name="keywords" content="fashion marketplace India, designer marketplace, tailor jobs India, fashion e-commerce, sustainable fashion, curated fashion, designer jobs Hyderabad, fashion platform, clothing marketplace, boutique fashion India, Favlyo">
  
  <!-- Canonical URL - Prevents duplicate content -->
  <link rel="canonical" href="https://favlyo.com/">
  
  <!-- Robots & Crawling -->
  <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
  <meta name="googlebot" content="index, follow">
  <meta name="bingbot" content="index, follow">
  
  <!-- Author & Publisher -->
  <meta name="author" content="Favlyo">
  <meta name="publisher" content="Favlyo">
  <meta name="copyright" content="© 2025 Favlyo. All rights reserved.">
  
  <!-- Geographic Targeting -->
  <meta name="geo.region" content="IN-TG">
  <meta name="geo.placename" content="Hyderabad, Telangana, India">
  <meta name="geo.position" content="17.385044;78.486671">
  <meta name="ICBM" content="17.385044, 78.486671">
  <meta name="language" content="English">
  
  <!-- Mobile App Meta -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <meta name="apple-mobile-web-app-title" content="Favlyo">
  <meta name="application-name" content="Favlyo">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="theme-color" content="#667eea">
  <meta name="msapplication-TileColor" content="#667eea">
  
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Favlyo">
  <meta property="og:url" content="https://favlyo.com/">
  <meta property="og:title" content="Favlyo - Fashion E-Commerce Marketplace">
  <meta property="og:description" content="Join Favlyo, India's premier fashion marketplace. Connect with 500+ designers & tailors. Discover curated, sustainable fashion collections.">
  <meta property="og:image" content="https://favlyo.com/assets/img/favlyo-og-image.jpg">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:image:alt" content="Favlyo - India's Premier Fashion E-commerce Platform">
  <meta property="og:locale" content="en_IN">
  
  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@favlyo">
  <meta name="twitter:creator" content="@favlyo">
  <meta name="twitter:title" content="Favlyo - Fashion E-Commerce Marketplace">
  <meta name="twitter:description" content="Join Favlyo, India's premier fashion marketplace. Connect with 500+ designers & tailors. Discover curated, sustainable fashion.">
  <meta name="twitter:image" content="https://favlyo.com/assets/img/favlyo-twitter-card.jpg">
  <meta name="twitter:image:alt" content="Favlyo Fashion Marketplace">
  
  <!-- Favicons - Multiple sizes for all devices -->
  <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
  <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">
  <link rel="mask-icon" href="assets/img/safari-pinned-tab.svg" color="#667eea">
  <link rel="shortcut icon" href="assets/img/Favlyo_Logo_01.jpg">
  
  <!-- Preconnect for Performance -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="dns-prefetch" href="https://fonts.googleapis.com">
  <link rel="dns-prefetch" href="https://code.jquery.com">
  <link rel="dns-prefetch" href="https://www.google-analytics.com">
  
  <!-- Structured Data - Organization -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "@id": "https://favlyo.com/#organization",
    "name": "Favlyo",
    "alternateName": "Favlyo Fashion Marketplace",
    "url": "https://favlyo.com/",
    "logo": {
      "@type": "ImageObject",
      "url": "https://favlyo.com/assets/img/Favlyo_Logo_01.jpg",
      "width": 512,
      "height": 512
    },
    "image": "https://favlyo.com/assets/img/favlyo-og-image.jpg",
    "description": "Fashion e-commerce platform connecting professionals with customers.",
    "email": "info@favlyo.com",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "Hyderabad",
      "addressRegion": "Telangana",
      "addressCountry": "IN"
    },
    "contactPoint": [{
      "@type": "ContactPoint",
      "email": "info@favlyo.com",
      "contactType": "customer support",
      "availableLanguage": ["English", "Hindi", "Telugu"]
    }],
    "sameAs": [
      "https://www.facebook.com/favlyo",
      "https://www.instagram.com/favlyo",
      "https://twitter.com/favlyo",
      "https://www.linkedin.com/company/favlyo"
    ],
    "foundingDate": "2024",
    "founders": [{
      "@type": "Person",
      "name": "Favlyo Founder"
    }],
    "numberOfEmployees": {
      "@type": "QuantitativeValue",
      "minValue": 1,
      "maxValue": 50
    },
    "slogan": "Unfold the Happiness with Fashion"
  }
  </script>
  
  <!-- Structured Data - WebSite with SearchAction -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "WebSite",
    "@id": "https://favlyo.com/#website",
    "name": "Favlyo",
    "url": "https://favlyo.com/",
    "description": "India's premier fashion designer and tailor marketplace",
    "publisher": {
      "@id": "https://favlyo.com/#organization"
    },
    "inLanguage": "en-IN"
  }
  </script>
  
  <!-- Structured Data - WebPage -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "WebPage",
    "@id": "https://favlyo.com/#webpage",
    "url": "https://favlyo.com/",
    "name": "Favlyo - Fashion E-Commerce Marketplace",
    "description": "Join Favlyo, India's premier fashion marketplace. Connect with designers, tailors & creative professionals.",
    "isPartOf": {
      "@id": "https://favlyo.com/#website"
    },
    "about": {
      "@id": "https://favlyo.com/#organization"
    },
    "datePublished": "2024-01-01",
    "dateModified": "<?php echo date('Y-m-d'); ?>",
    "inLanguage": "en-IN"
  }
  </script>
  
  <!-- Structured Data - LocalBusiness -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "LocalBusiness",
    "@id": "https://favlyo.com/#localbusiness",
    "name": "Favlyo",
    "image": "https://favlyo.com/assets/img/Favlyo_Logo_01.jpg",
    "description": "Fashion e-commerce platform connecting designers and customers in India",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "Hyderabad",
      "addressRegion": "Telangana",
      "postalCode": "500001",
      "addressCountry": "IN"
    },
    "geo": {
      "@type": "GeoCoordinates",
      "latitude": 17.385044,
      "longitude": 78.486671
    },
    "url": "https://favlyo.com/",
    "email": "info@favlyo.com",
    "priceRange": "$$",
    "openingHoursSpecification": {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
      "opens": "00:00",
      "closes": "23:59"
    },
    "sameAs": [
      "https://www.facebook.com/favlyo",
      "https://www.instagram.com/favlyo"
    ]
  }
  </script>
  
  <!-- Structured Data - BreadcrumbList -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [{
      "@type": "ListItem",
      "position": 1,
      "name": "Home",
      "item": "https://favlyo.com/"
    }]
  }
  </script>
  
  <!-- Structured Data - FAQPage (for future FAQ section) -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [{
      "@type": "Question",
      "name": "What is Favlyo?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Favlyo is India's premier fashion e-commerce platform that connects designers, tailors, and creative professionals with customers looking for curated, sustainable fashion collections."
      }
    }, {
      "@type": "Question",
      "name": "How can I register as a designer on Favlyo?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "You can register as a designer by filling out the registration form on our website. We welcome stitchers, tailors, cutting masters, drapists, creative designers, and weavers."
      }
    }, {
      "@type": "Question",
      "name": "Where is Favlyo located?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Favlyo is headquartered in Hyderabad, India, and serves customers across 50+ cities in India."
      }
    }]
  }
  </script>

  <!-- Google Fonts - Async Loading -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&family=Montserrat:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
  <noscript>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&family=Montserrat:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  </noscript>
  
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
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
    
    /* Contact Form Styles */
    #contact-form .form-control:focus {
      border-color: #667eea !important;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.15) !important;
      outline: none;
    }
    
    #contact-form .form-control:hover {
      border-color: #667eea;
    }
    
    #contact-submit-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 15px 40px rgba(102, 126, 234, 0.4) !important;
    }
    
    @keyframes spin {
      from { transform: rotate(0deg); }
      to { transform: rotate(360deg); }
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

<body itemscope itemtype="https://schema.org/WebPage">
  <!-- Skip to Main Content - Accessibility -->
  <a href="#main" class="visually-hidden-focusable skip-link" style="position:absolute;top:-100px;left:0;background:#667eea;color:#fff;padding:10px 20px;z-index:100000;transition:top 0.3s;" onfocus="this.style.top='0'" onblur="this.style.top='-100px'">Skip to main content</a>

  <!-- ======= Header ======= -->
  <header class="fixed-top d-flex align-items-center header-transparent" id="header" role="banner" itemscope itemtype="https://schema.org/WPHeader">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="logo" itemscope itemtype="https://schema.org/Brand">
        <h1><a href="#hero" aria-label="Favlyo - Go to Homepage" itemprop="name"><span>FAVLYO</span></a></h1>
      </div>

      <nav class="navbar" id="navbar" role="navigation" aria-label="Main Navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
        <ul role="menubar">
          <li role="none"><a class="nav-link scrollto active" href="#hero" role="menuitem" aria-current="page">Home</a></li>
          <li role="none"><a class="nav-link scrollto" href="#about" role="menuitem">About</a></li>
          <li role="none"><a class="nav-link scrollto" href="#features" role="menuitem">Services</a></li>
          <li role="none"><a class="nav-link scrollto" href="#register" role="menuitem">Register</a></li>
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
          <li role="none"><a class="nav-link scrollto" href="#contact" role="menuitem">Contact</a></li>
        </ul>
      </nav>
      <!-- .navbar -->
    </div>
  </header>
  <!-- End Header -->
  
  <!-- ======= Hero Section ======= -->
  <section id="hero" role="banner" aria-label="Welcome to Favlyo">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
          <div data-aos="fade-up">
            <p style="color: rgba(255,255,255,0.8); font-size: 18px; letter-spacing: 3px; text-transform: uppercase; margin-bottom: 15px;" role="doc-subtitle">🎉 India's Premier Fashion Platform</p>
            <h1 itemprop="headline">Let's unfold the <br><span>happiness</span> with <span>Favlyo</span></h1>

            <h2 itemprop="description">Connecting Professionals with the World</h2>

            <div class="text-center text-lg-start" style="display: flex; gap: 15px; flex-wrap: wrap;">
              <a class="btn-get-started scrollto" href="#about" role="button" aria-label="Learn more about Favlyo">
                <span>Get Started</span>
                <i class="bi bi-arrow-right" aria-hidden="true"></i>
              </a>
              <a class="btn-get-started scrollto" href="#register" role="button" aria-label="Register as a designer or tailor" style="background: rgba(255,255,255,0.15); backdrop-filter: blur(10px); box-shadow: 0 10px 40px rgba(0,0,0,0.2);">
                <span>Join Now</span>
                <i class="bi bi-person-plus" aria-hidden="true"></i>
              </a>
            </div>
            
            <!-- Trust badges -->
            <!-- <div style="margin-top: 50px; display: flex; gap: 30px; flex-wrap: wrap; align-items: center;">
              <div style="text-align: center;">
                <div style="font-size: 32px; font-weight: 800; color: #fff;">500+</div>
                <div style="color: rgba(255,255,255,0.7); font-size: 14px;">Designers</div>
              </div>
              <div style="text-align: center;">
                <div style="font-size: 32px; font-weight: 800; color: #fff;">50+</div>
                <div style="color: rgba(255,255,255,0.7); font-size: 14px;">Cities</div>
              </div>
              <div style="text-align: center;">
                <div style="font-size: 32px; font-weight: 800; color: #fff;">24/7</div>
                <div style="color: rgba(255,255,255,0.7); font-size: 14px;">Support</div>
              </div>
            </div> -->
          </div>
        </div>

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
        <use x="50" xlink:href="#wave-path" y="3"> </use>
      </g>
      <g class="wave2">
        <use x="50" xlink:href="#wave-path" y="0"> </use>
      </g>
      <g class="wave3">
        <use x="50" xlink:href="#wave-path" y="9"> </use>
      </g>
    </svg>
  </section>
  <!-- End Hero -->

  <main id="main" role="main" itemprop="mainContentOfPage">
    
    <!-- ======= About Section ======= -->
    <section class="about" id="about" aria-labelledby="about-title" itemscope itemtype="https://schema.org/AboutPage">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch"
            data-aos="fade-right">
          </div>

          <div
            class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5"
            data-aos="fade-left">
            <h3 id="about-title" itemprop="name">Join us to step towards global market from local</h3>

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

          <p>What We Offer</p>
        </div>

        <div class="row justify-content-center" data-aos="fade-up">
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="0">
              <i class="ri-t-shirt-line" style="color: #667eea;"></i>
              <h3><a href="">Premium Apparel</a></h3>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="50">
              <i class="ri-truck-line" style="color: #00d9a5;"></i>
              <h3><a href="">Fast Delivery</a></h3>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <i class="ri-palette-line" style="color: #764ba2;"></i>
              <h3><a href="">Custom Designs</a></h3>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="150">
              <i class="ri-price-tag-3-line" style="color: #ffbb2c;"></i>
              <h3><a href="">Best Prices</a></h3>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <i class="ri-shield-check-line" style="color: #00cec9;"></i>
              <h3><a href="">Quality Assured</a></h3>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="250">
              <i class="ri-customer-service-2-line" style="color: #e74c3c;"></i>
              <h3><a href="">24/7 Support</a></h3>
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
          <h2>Register</h2>
          <p>Join Favlyo Today</p>
        </div>
        <div class="register-card" data-aos="fade-up">
          <form action="assets/vendor/php-email-form/register_works_config_02.php" method="post" class="php-email-form"
            enctype="multipart/form-data">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            
            <!-- Honeypot fields - hidden from humans, bots fill these -->
            <div style="position: absolute; left: -9999px;" aria-hidden="true">
              <input type="text" name="website" tabindex="-1" autocomplete="off">
              <input type="text" name="fax" tabindex="-1" autocomplete="off">
              <input type="text" name="company" tabindex="-1" autocomplete="off">
            </div>
            
            <div class="row">
              <div class="col-md-6 form-group">
                <label><i class="bi bi-person"></i> Name *</label>
                <input type="text" name="name" class="form-control" required maxlength="100" placeholder="Enter your full name">
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-envelope"></i> Email *</label>
                <input type="email" name="email" class="form-control" required placeholder="your@email.com">
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-telephone"></i> Phone Number *</label>
                <input type="text" name="phone" class="form-control" required pattern="\d{10}" maxlength="10" placeholder="10 digit mobile">
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-person-badge"></i> Role *</label>
                <select name="role" class="form-control" required>
                  <option value="">Select your role</option>
                  <option>Stitcher</option>
                  <option>Tailor</option>
                  <option>Cutting Master</option>
                  <option>Drapist</option>
                  <option>Creative Designer</option>
                  <option>Weaver</option>
                </select>
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-award"></i> Experience *</label>
                <select name="experience" class="form-control" required>
                  <option value="">Select experience</option>
                  <option>Fresher</option>
                  <option>0-3 Years</option>
                  <option>3-6 Years</option>
                  <option>7-10 Years</option>
                  <option>11-14 Years</option>
                  <option>Above 15 Years</option>
                </select>
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-clock-history"></i> Work Type *</label>
                <select name="work_type[]" class="form-control" multiple required>
                  <option>Hourly</option>
                  <option>Per Day</option>
                  <option>Weekly</option>
                  <option>Monthly</option>
                  <option>Yearly</option>
                </select>
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-calendar-check"></i> Availability *</label>
                <select name="join_time" class="form-control" required>
                  <option value="">When can you start?</option>
                  <option>Immediately</option>
                  <option>In a Week</option>
                  <option>In a Month</option>
                  <option>In 3 Months</option>
                </select>
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-journal-check"></i> Recent Training *</label>
                <select name="training" class="form-control" required>
                  <option value="">Select</option>
                  <option>Yes</option>
                  <option>No</option>
                </select>
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-geo-alt"></i> Area *</label>
                <input type="text" name="area" class="form-control" required maxlength="100" placeholder="Your area">
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-building"></i> City *</label>
                <select name="city" id="city" class="form-control" required>
                  <option value="">Select City</option>
                </select>
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-flag"></i> State *</label>
                <input type="text" name="state" id="state" class="form-control" required maxlength="100" placeholder="State" readonly>
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-pin-map"></i> PIN Code *</label>
                <input type="text" name="pincode" class="form-control" required maxlength="6" pattern="\d{6}" placeholder="6 digit PIN">
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-question-circle"></i> Ready for Interview *</label>
                <select name="interview_ready" class="form-control" required>
                  <option value="">Select</option>
                  <option>Yes</option>
                  <option>No</option>
                </select>
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-gender-ambiguous"></i> Gender *</label>
                <select name="gender" class="form-control" required>
                  <option value="">Select</option>
                  <option>Male</option>
                  <option>Female</option>
                </select>
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-person-lines-fill"></i> Age *</label>
                <input type="number" name="age" class="form-control" required min="16" max="99" placeholder="Your age">
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-chat-dots"></i> Languages *</label>
                <select name="languages[]" id="languages" class="form-control" multiple required>
                </select>
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-truck"></i> Own Vehicle *</label>
                <select name="vehicle" class="form-control" required>
                  <option value="">Select</option>
                  <option>Yes</option>
                  <option>No</option>
                </select>
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-info-circle"></i> How did you find us?</label>
                <input type="text" name="know_about" class="form-control" maxlength="100" placeholder="Referral source">
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-gift"></i> Referral Code</label>
                <input type="text" name="referral_code" class="form-control" maxlength="50" placeholder="Optional">
              </div>
              <div class="col-md-6 form-group">
                <label><i class="bi bi-phone"></i> Alternative Phone</label>
                <input type="text" name="alt_phone" class="form-control" pattern="\d{10}" maxlength="10" placeholder="Optional">
              </div>
            </div>
            <div class="text-center mt-4">
              <button type="submit" class="btn">
                <i class="bi bi-send"></i> Submit Registration
              </button>
            </div>
          </form>
          <div id="register-response" style="margin-top: 20px;"></div>
        </div>
      </div>
    </section>

    <section class="counts" id="counts">
      <div class="container">
        <div class="row" data-aos="fade-up">
        </div>
      </div>
    </section>
    <!-- End Counts Section -->

    <!-- ======= Details Section ======= -->
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
          <p>Get In Touch With Us</p>
        </div>

        <div class="row" data-aos="fade-up">
          <!-- Contact Info -->
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Hyderabad, India</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p><a href="mailto:info@favlyo.com">info@favlyo.com</a></p>
              </div>

              <div class="phone">
                <i class="bi bi-whatsapp" style="background: linear-gradient(135deg, #25d366 0%, #128c7e 100%); box-shadow: 0 8px 25px rgba(37, 211, 102, 0.3);"></i>
                <h4>WhatsApp:</h4>
                <p><a href="https://wa.me/916309989019?text=Hi%20Favlyo!" target="_blank" style="color: #25d366;">Chat with us</a></p>
              </div>
            </div>

            <!-- Map -->
            <div class="mt-4">
              <iframe 
                style="border:0; width: 100%; height: 200px; border-radius: 15px;" 
                loading="lazy"
                src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Hyderabad,India&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                allowfullscreen>
              </iframe>
            </div>
          </div>

          <!-- Contact Form -->
          <div class="col-lg-8">
            <div class="contact-form-wrapper" style="background: #fff; padding: 40px; border-radius: 20px; box-shadow: 0 10px 40px rgba(102, 126, 234, 0.1); border: 1px solid rgba(102, 126, 234, 0.1);">
              <h3 style="margin-bottom: 25px; font-weight: 700; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Send us a Message</h3>
              
              <form id="contact-form" method="post" action="forms/contact_smtp.php">
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                
                <!-- Honeypot fields - hidden from humans, bots fill these -->
                <div style="position: absolute; left: -9999px;" aria-hidden="true">
                  <input type="text" name="website" tabindex="-1" autocomplete="off">
                  <input type="text" name="fax" tabindex="-1" autocomplete="off">
                  <input type="text" name="company" tabindex="-1" autocomplete="off">
                </div>
                
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <label for="contact-name" style="font-weight: 600; color: #333; margin-bottom: 8px; display: block;">
                        <i class="bi bi-person me-2" style="color: #667eea;"></i>Your Name *
                      </label>
                      <input type="text" name="name" id="contact-name" class="form-control" required 
                        placeholder="John Doe"
                        style="border-radius: 12px; border: 2px solid #e0e0e0; padding: 12px 15px; font-size: 15px; transition: all 0.3s ease;">
                    </div>
                  </div>
                  
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <label for="contact-email" style="font-weight: 600; color: #333; margin-bottom: 8px; display: block;">
                        <i class="bi bi-envelope me-2" style="color: #667eea;"></i>Your Email *
                      </label>
                      <input type="email" name="email" id="contact-email" class="form-control" required 
                        placeholder="john@example.com"
                        style="border-radius: 12px; border: 2px solid #e0e0e0; padding: 12px 15px; font-size: 15px; transition: all 0.3s ease;">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <label for="contact-phone" style="font-weight: 600; color: #333; margin-bottom: 8px; display: block;">
                        <i class="bi bi-telephone me-2" style="color: #667eea;"></i>Phone Number
                      </label>
                      <input type="tel" name="phone" id="contact-phone" class="form-control" 
                        placeholder="+91 98765 43210"
                        style="border-radius: 12px; border: 2px solid #e0e0e0; padding: 12px 15px; font-size: 15px; transition: all 0.3s ease;">
                    </div>
                  </div>
                  
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <label for="contact-subject" style="font-weight: 600; color: #333; margin-bottom: 8px; display: block;">
                        <i class="bi bi-chat-dots me-2" style="color: #667eea;"></i>Subject *
                      </label>
                      <input type="text" name="subject" id="contact-subject" class="form-control" required 
                        placeholder="How can we help?"
                        style="border-radius: 12px; border: 2px solid #e0e0e0; padding: 12px 15px; font-size: 15px; transition: all 0.3s ease;">
                    </div>
                  </div>
                </div>

                <div class="mb-4">
                  <div class="form-group">
                    <label for="contact-message" style="font-weight: 600; color: #333; margin-bottom: 8px; display: block;">
                      <i class="bi bi-pencil me-2" style="color: #667eea;"></i>Your Message *
                    </label>
                    <textarea name="message" id="contact-message" class="form-control" rows="5" required 
                      placeholder="Write your message here..."
                      style="border-radius: 12px; border: 2px solid #e0e0e0; padding: 12px 15px; font-size: 15px; transition: all 0.3s ease; resize: vertical;"></textarea>
                  </div>
                </div>

                <!-- Response Messages -->
                <div id="contact-response" style="margin-bottom: 20px;"></div>

                <div class="text-center">
                  <button type="submit" id="contact-submit-btn" 
                    style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: #fff; border: none; padding: 15px 50px; border-radius: 50px; font-size: 16px; font-weight: 600; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);">
                    <span id="btn-text">Send Message</span>
                    <span id="btn-loading" style="display: none;">
                      <i class="bi bi-arrow-repeat" style="animation: spin 1s linear infinite;"></i> Sending...
                    </span>
                    <i class="bi bi-send ms-2"></i>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Contact Section -->
  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" role="contentinfo" itemscope itemtype="https://schema.org/WPFooter">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <!-- Company Info -->
          <div class="col-lg-4 col-md-6">
            <div class="footer-info" itemscope itemtype="https://schema.org/Organization">
              <h3 itemprop="name">FAVLYO</h3>
              <p class="pb-3"><em itemprop="description">Your Premier Fashion & Apparel Destination in India</em></p>
              <address itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                <span itemprop="addressLocality">Hyderabad</span>, 
                <span itemprop="addressRegion">Telangana</span><br>
                <span itemprop="addressCountry">India</span><br><br>
                <strong>Email:</strong> <a href="mailto:info@favlyo.com" itemprop="email">info@favlyo.com</a><br>
                <strong>WhatsApp:</strong> <a href="https://wa.me/916309989019" itemprop="telephone">+91 6309989019</a>
              </address>
              
              <!-- Social Links -->
              <div class="social-links mt-3" aria-label="Social Media Links">
                <a href="#" aria-label="Follow us on Twitter" title="Twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" aria-label="Follow us on Facebook" title="Facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" aria-label="Follow us on Instagram" title="Instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" aria-label="Follow us on LinkedIn" title="LinkedIn"><i class="bi bi-linkedin"></i></a>
              </div>
              <link itemprop="url" href="https://favlyo.com">
            </div>
          </div>

          <!-- Quick Links -->
          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Quick Links</h4>
            <nav aria-label="Footer Quick Links">
              <ul>
                <li><a href="#hero" title="Go to Home">Home</a></li>
                <li><a href="#about" title="Learn About Us">About Us</a></li>
                <li><a href="#services" title="Our Services">Services</a></li>
                <li><a href="#contact" title="Contact Us">Contact</a></li>
                <li><a href="#" title="Privacy Policy">Privacy Policy</a></li>
                <li><a href="#" title="Terms of Service">Terms of Service</a></li>
              </ul>
            </nav>
          </div>

          <!-- Services Links -->
          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Our Services</h4>
            <nav aria-label="Footer Services">
              <ul>
                <li><a href="#services" title="Premium Fashion">Premium Fashion</a></li>
                <li><a href="#services" title="Custom Apparel">Custom Apparel</a></li>
                <li><a href="#services" title="Bulk Orders">Bulk Orders</a></li>
                <li><a href="#services" title="Design Consultation">Design Consultation</a></li>
                <li><a href="#services" title="Quality Assurance">Quality Control</a></li>
              </ul>
            </nav>
          </div>

          <!-- Newsletter -->
          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Stay Updated</h4>
            <p>Subscribe to our newsletter for the latest fashion trends and exclusive offers!</p>
            <form action="#" method="post" aria-label="Newsletter Subscription">
              <label for="newsletter-email" class="visually-hidden">Email Address</label>
              <input type="email" id="newsletter-email" name="email" placeholder="Enter your email" required aria-required="true">
              <input type="submit" value="Subscribe" aria-label="Subscribe to Newsletter">
            </form>
            <p class="mt-2" style="font-size: 12px; color: #adb5bd;"><i class="bi bi-shield-check me-1"></i>We respect your privacy. Unsubscribe anytime.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Copyright Section -->
    <div class="container">
      <div class="copyright">
        <p>&copy; <span id="current-year"></span> <strong><span itemprop="name">Favlyo</span></strong>. All Rights Reserved.</p>
        <p style="font-size: 12px; margin-top: 5px;">Made with <i class="bi bi-heart-fill" style="color: #e74c3c;"></i> in India</p>
      </div>
      <script>document.getElementById('current-year').textContent = new Date().getFullYear();</script>
    </div>
  </footer>
  <!-- End Footer -->

  <!-- WhatsApp Floating Button - With Full Inline Styles -->
  <a href="https://wa.me/916309989019?text=Hi%20Favlyo!" 
     target="_blank" 
     rel="noopener noreferrer"
     title="Chat with us on WhatsApp"
     style="position:fixed !important; bottom:30px !important; right:30px !important; width:60px !important; height:60px !important; background:#25d366 !important; border-radius:50% !important; display:flex !important; align-items:center !important; justify-content:center !important; box-shadow:0 4px 15px rgba(37,211,102,0.5) !important; z-index:999999 !important; text-decoration:none !important;">
    <i class="bi bi-whatsapp" style="color:#fff !important; font-size:30px !important;"></i>
  </a>

  <!-- Back to Top Button -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center" id="back-to-top"
     style="position:fixed !important; bottom:110px !important; right:35px !important; width:45px !important; height:45px !important; z-index:99990 !important;">
    <i class="bi bi-arrow-up-short"></i>
  </a>

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
      
      // ============================================
      // MULTI-STEP FORM FUNCTIONALITY
      // ============================================
      let currentStep = 1;
      const totalSteps = 4;
      
      // Initialize progress steps
      updateProgressSteps();
      
      // Make step functions globally available
      window.nextStep = function(step) {
        // Validate current step before proceeding
        if (!validateStep(step)) {
          shakeForm();
          return;
        }
        
        if (step < totalSteps) {
          currentStep = step + 1;
          showStep(currentStep);
          updateProgressSteps();
          scrollToForm();
        }
      };
      
      window.prevStep = function(step) {
        if (step > 1) {
          currentStep = step - 1;
          showStep(currentStep);
          updateProgressSteps();
          scrollToForm();
        }
      };
      
      function showStep(step) {
        document.querySelectorAll('.form-step').forEach(function(el) {
          el.classList.remove('active');
        });
        var stepEl = document.getElementById('step-' + step);
        if (stepEl) {
          stepEl.classList.add('active');
        }
      }
      
      function updateProgressSteps() {
        document.querySelectorAll('.progress-step').forEach(function(el, index) {
          var stepNum = index + 1;
          el.classList.remove('active', 'completed');
          
          if (stepNum === currentStep) {
            el.classList.add('active');
          } else if (stepNum < currentStep) {
            el.classList.add('completed');
          }
        });
        
        // Update progress lines
        document.querySelectorAll('.progress-line').forEach(function(el, index) {
          if (index < currentStep - 1) {
            el.classList.add('active');
          } else {
            el.classList.remove('active');
          }
        });
      }
      
      function validateStep(step) {
        var stepEl = document.getElementById('step-' + step);
        if (!stepEl) return true;
        
        var inputs = stepEl.querySelectorAll('input[required], select[required]');
        var valid = true;
        
        inputs.forEach(function(input) {
          if (!input.value || (input.type === 'radio' && !document.querySelector('input[name="' + input.name + '"]:checked'))) {
            valid = false;
            input.classList.add('is-invalid');
            // Add shake animation
            input.style.animation = 'shake 0.5s ease';
            setTimeout(function() { input.style.animation = ''; }, 500);
          } else {
            input.classList.remove('is-invalid');
          }
        });
        
        // Check radio buttons separately
        var radioGroups = stepEl.querySelectorAll('.radio-group, .toggle-group');
        radioGroups.forEach(function(group) {
          var radios = group.querySelectorAll('input[type="radio"]');
          if (radios.length > 0 && radios[0].required) {
            var anyChecked = Array.from(radios).some(function(r) { return r.checked; });
            if (!anyChecked) {
              valid = false;
              group.style.animation = 'shake 0.5s ease';
              setTimeout(function() { group.style.animation = ''; }, 500);
            }
          }
        });
        
        return valid;
      }
      
      function shakeForm() {
        var card = document.querySelector('.register-card');
        if (card) {
          card.style.animation = 'shake 0.5s ease';
          setTimeout(function() { card.style.animation = ''; }, 500);
        }
      }
      
      function scrollToForm() {
        var registerSection = document.getElementById('register');
        if (registerSection) {
          registerSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
      }
      
      // Add shake animation CSS
      var shakeStyle = document.createElement('style');
      shakeStyle.textContent = '@keyframes shake { 0%, 100% { transform: translateX(0); } 10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); } 20%, 40%, 60%, 80% { transform: translateX(5px); } }';
      document.head.appendChild(shakeStyle);
      
      // ============================================
      // REGISTRATION FORM SUBMISSION
      // ============================================
      var form = document.querySelector('.php-email-form');
      if (form) {
        form.onsubmit = function(e) {
          e.preventDefault();
          
          var submitBtn = form.querySelector('button[type="submit"]');
          var responseEl = document.getElementById('register-response');
          var originalBtnText = submitBtn ? submitBtn.innerHTML : '';
          
          // Show loading state
          if (submitBtn) {
            submitBtn.innerHTML = '<i class="bi bi-arrow-repeat spin"></i> Submitting...';
            submitBtn.disabled = true;
          }
          
          var data = new FormData(form);
          
          fetch(form.action, { method: 'POST', body: data })
            .then(function(r) {
              return r.text();
            })
            .then(function(msg) {
              console.log('Server response:', msg); // Debug log
              if (msg.trim() === 'success') {
                responseEl.innerHTML = '<div class="alert alert-success" style="background: linear-gradient(135deg, #00b894 0%, #00cec9 100%); color: #fff; padding: 15px 20px; border-radius: 12px; font-weight: 600;"><i class="bi bi-check-circle-fill me-2"></i> 🎉 Registration successful! Welcome to Favlyo family!</div>';
                form.reset();
              } else {
                responseEl.innerHTML = '<div class="alert alert-danger" style="background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%); color: #fff; padding: 15px 20px; border-radius: 12px; font-weight: 600;"><i class="bi bi-exclamation-circle-fill me-2"></i> ' + msg + '</div>';
              }
            })
            .catch(function(err) {
              console.error('Registration error:', err); // Debug log
              responseEl.innerHTML = '<div class="alert alert-danger" style="background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%); color: #fff; padding: 15px 20px; border-radius: 12px; font-weight: 600;"><i class="bi bi-exclamation-circle-fill me-2"></i> Registration failed: ' + err.message + '</div>';
            })
            .finally(function() {
              if (submitBtn) {
                submitBtn.innerHTML = originalBtnText;
                submitBtn.disabled = false;
              }
            });
        };
      }

      // ============================================
      // CONTACT FORM SUBMISSION
      // ============================================
      var contactForm = document.getElementById('contact-form');
      if (contactForm) {
        contactForm.onsubmit = function(e) {
          e.preventDefault();
          
          var submitBtn = document.getElementById('contact-submit-btn');
          var btnText = document.getElementById('btn-text');
          var btnLoading = document.getElementById('btn-loading');
          var responseEl = document.getElementById('contact-response');
          
          // Show loading state
          btnText.style.display = 'none';
          btnLoading.style.display = 'inline';
          submitBtn.disabled = true;
          submitBtn.style.opacity = '0.7';
          
          var data = new FormData(contactForm);
          
          fetch(contactForm.action, { method: 'POST', body: data })
            .then(function(r) {
              if (!r.ok) throw new Error('Service unavailable');
              return r.json();
            })
            .then(function(result) {
              if (result.status === 'success') {
                responseEl.innerHTML = '<div style="background: linear-gradient(135deg, #00b894 0%, #00cec9 100%); color: #fff; padding: 15px 20px; border-radius: 12px; font-weight: 600;"><i class="bi bi-check-circle me-2"></i>' + result.message + '</div>';
                contactForm.reset();
              } else {
                responseEl.innerHTML = '<div style="background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%); color: #fff; padding: 15px 20px; border-radius: 12px; font-weight: 600;"><i class="bi bi-exclamation-circle me-2"></i>' + result.message + '</div>';
              }
            })
            .catch(function(err) {
              responseEl.innerHTML = '<div style="background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%); color: #fff; padding: 15px 20px; border-radius: 12px; font-weight: 600;"><i class="bi bi-exclamation-circle me-2"></i>Error: ' + err.message + '</div>';
            })
            .finally(function() {
              // Reset button state
              btnText.style.display = 'inline';
              btnLoading.style.display = 'none';
              submitBtn.disabled = false;
              submitBtn.style.opacity = '1';
            });
        };
      }

      // ============================================
      // POPULATE DROPDOWNS
      // ============================================
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
      
      // ============================================
      // FLOATING LABEL ANIMATION FIX
      // ============================================
      document.querySelectorAll('.floating-label input').forEach(function(input) {
        input.addEventListener('focus', function() {
          this.parentElement.classList.add('focused');
        });
        input.addEventListener('blur', function() {
          if (!this.value) {
            this.parentElement.classList.remove('focused');
          }
        });
      });
    });

    // Disable right-click
    document.addEventListener('contextmenu', function(e) { e.preventDefault(); });
  </script>

</body>

</html>