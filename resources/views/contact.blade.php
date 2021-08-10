<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact for All types of building contract works - Nanthiat Builders, Kottayam</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta content="Reach to us if you dream to build a new house or commercial property.  Nanthiat Builders aids you in sorting out your needs and materializing your dreams" name="description" />
<meta content="Interior design, contemporary house in kerala, nalukettu builders in Kerala, construction management, construction contractor" name="keywords" />
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" type="text/css">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-145466145-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-145466145-1');
</script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<nav id="nanthiat-nav" class="navbar navbar-expand-lg navbar-light headerbg fixed-top">
  <div class="container">
    <div class="col-md-2 p-0"><a class="navbar-brand" href="{{ url('/') }}"><img src="images/nanthiat-logo.png" alt=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    </div>
    <div class="col-md-10 p-0">
      <div class="nanthiat-contacts">
        <!--<div class="social-icons"><a href="" class="slinks"><img src="images/icon-facebook.png" alt=""></a><a href="" class="slinks"><img src="images/icon-twitter.png" alt=""></a><a href="" class="slinks"><img src="images/icon-youtube.png" alt=""></a></div>-->
        <div class="topcontacts"><img src="images/icon-phone.png" alt=""><a href="tel:04812434951">0481- 2434951</a></div>
        <div class="topcontacts"><img src="images/icon-whatsapp.png" alt=""><a href="https://wa.me/9349503683" target="_blank">93495 03683</a></div>
      </div>
      <div class="clearfix"></div>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <div class="clearfix"></div>
        <ul class="navbar-nav ml-auto">
         <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home
            <!--<span class="sr-only">(current)</span>-->
            </a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('about') }}">About Us</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('projects') }}">Our Projects</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('photo-gallery') }}">Photo Gallery</a></li>
          <!--<li class="nav-item"><a class="nav-link" href="{{ url('news-events') }}">News & BLogs</a></li>-->
          <li class="nav-item"><a class="nav-link active" href="{{ url('contact') }}">Contact</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<header>
  <div class="innerbanner"><img src="images/inner-banner-contact.jpg" alt="" class="img-fluid"></div>
</header>
<!-- Page Content -->

<section id="newsandevent" class="my-3">
  <div class="container">
    <div class="row">
      <div class="col-md-6 p-0">
        <div class="aboutus-cont">
          <h2>Contact</h2>
          <p><span>Nanthiat Builders</span></p>
          <div class="pcaption">Address</div>
          <div class="clearfix"></div>
          <p>Chingavanam<br>
            Kottayam - 686531<br>
            Kerala, India<br>
          </p>
          <div class="pcaption">Telephone</div>
          <div class="clearfix"></div>
          <p><a href="tel:04812434951">0481- 2434951</a></p>
          <div class="pcaption">Mobile</div>
          <div class="clearfix"></div>
          <p><a href="tel:9349503683">9349503683</a></p>
          <div class="pcaption">email</div>
          <div class="clearfix"></div>
          <p><a href="mailto:info@nanthiatbuilders.com">info@nanthiatbuilders.com</a></p>
        </div>
      </div>
      <div id="nbform" class="col-md-6 py-4">
        <form method="post" action="{{ route('contactus.store') }}">

            <!-- CROSS Site Request Forgery Protection -->
            @csrf
          <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" placeholder="Name *" required="">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email *" required="">
          </div>
          <div class="form-group">
            <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Mobile *" pattern="^\d{10}$" required="">
          </div>
          <div class="form-group">
            <textarea placeholder="Comments" name="message" required=""></textarea>
          </div>
          <div class="form-group">
            <div class="g-recaptcha" data-sitekey="6Let7LIUAAAAAMX_eD1Lk3as2wup4v5SwjM8QGOT" required=""></div>
          </div>
          
          <!-- <input type="submit"  class="btn btn-primary" value="Submit"> -->
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</section>
<section id="nb-footer">
  <div class="container">
    <div class="row">
      <!--<div class="col-md-12 pb-4"><a href=""><img src="images/nanthiat-logo.png" alt=""></a></div>-->
      <div class="col-md-5 pr-5">
        <p>Nanthiat started its journey in 1995 providing contracting services in Kottayam. Now, Nanthiat, nearing to its 25 years of service, has already given services as a builder, contractor, and consultant. Currently, we undertake all types of projects and cover services in all verticals of construction – planning, building structures, landscaping, interiors, and exteriors.</p>
></div>
      <div class="col-md-2">
        <h2>Navigation</h2>
        <p><a href="{{ url('/') }}">Home</a></p>
        <p><a href="{{ url('about') }}">About Us</a></p>
        <p><a href="{{ url('projects') }}">Our Projects</a></p>
        <p><a href="{{ url('photo-gallery') }}">Photo Gallery</a></p>
        <!--<p><a href="{{ url('news-events') }}">News & Events</a></p>-->
        <p><a href="{{ url('contact') }}">Contact</a></p>
      </div>
      <div class="col-md-3">
        <h2>Contact Us</h2>
        <p>Nanthiat Builders<br>
          Chingavanam<br>
          Kottayam - 686531<br>
          Kerala, India<br>
          Phone : (office) <a href="tel:04812434951">0481- 2434951</a><br>
          Mob : <a href="tel:9349503683">9349503683</a></p>
      </div>
      <div class="col-md-2">
        <!--<div class="social-icons"><a href="" class="slinks"><img src="images/icon-facebook.png" alt=""></a><a href="" class="slinks"><img src="images/icon-twitter.png" alt=""></a><a href="" class="slinks"><img src="images/icon-youtube.png" alt=""></a></div>-->
      </div>
    </div>
  </div>
  <div class="container-fluid footertop">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <p class="text-left">Nanthiat Builders © 2019. All Rights Reserved |<a href="">Privacy Policy</a></p>
        </div>
        <div class="col-md-2">
          <p class="oms"><a href="http://www.onlinemediaspace.com"><img src="images/oms-logo.png" alt="" class="img-fluid"></a></p>
        </div>
      </div>
    </div>
  </div>
</section>
<body>
<script src="{{ URL::asset('js/jquery-3.3.1.min.js') }}"></script> 
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script> 
<script src="{{ URL::asset('js/carousel.js') }}"></script> 
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>--> 
<script src="{{ URL::asset('js/popper.min.js') }}"></script> 
<!-- new --> 
<script>
	$(document).ready(function() {
  $(window).on("scroll", function() {
    if ($(window).scrollTop() >= 20) {
      $(".navbar").addClass("compressed");
    } else {
      $(".navbar").removeClass("compressed");
    }
  });
});
	</script> 
<script>
      $(function() {
        var t0, t1;

        // Test to show that the carousel doesn't slide when the current tab isn't visible
        // Test to show that transition-duration can be changed with css
        $('#carousel-banner').on('slid.bs.carousel', function(event) {
          t1 = performance.now()
          console.log('transition-duration took' + (t1 - t0) + 'ms, slid at ', event.timeStamp)
        }).on('slide.bs.carousel', function() {
          t0 = performance.now()
        })
      })
    </script>
</body>
</html>
