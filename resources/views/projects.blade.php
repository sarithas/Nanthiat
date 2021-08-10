<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kerala and contemporary style houses construction - Nanthiat Builders, Kottayam</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta content="Nanthiat has delivered more than 300 projects which include different styles of houses, apartments, villas, office complexes, and commercial buildings" name="description" />
<meta content="Construction, leading construction firm, general construction company, industrial construction, building construction contractor, flooring, basement flooring, house with swimming pool, Kottayam, Pala, Thiruvalla, Changanacherry." name="keywords" />
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ URL::asset('css/swiper.min.css') }}">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-145466145-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-145466145-1');
</script>

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
          <li class="nav-item"><a class="nav-link " href="{{ url('about') }}">About Us</a></li>
          <li class="nav-item"><a class="nav-link active" href="{{ url('projects') }}">Our Projects</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('photo-gallery') }}">Photo Gallery</a></li>
          <!--<li class="nav-item"><a class="nav-link" href="{{ url('news-events') }}">News & Blogs</a></li>-->
          <li class="nav-item"><a class="nav-link" href="{{ url('contact') }}">Contact</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<header>
  <div class="innerbanner"><img src="images/inner-banner-project.jpg" alt="" class="img-fluid"></div>
</header>
<!-- Page Content -->

<section id="tabs" class="project-tab">
  <h2>Our Projects</h2>
  <nav>
    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist"><a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Ongoing</a><a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Completed</a><a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Upcoming</a></div>
  </nav>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 p-0">
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <?php $cnt=1 ?>
            @foreach ($ongoing as $ong)
            <div class="container-fluid">
              <div class="row">
                @if($cnt % 2 != 0)
                <div class="col-md-6 p-0">
                  <div id="projectcarousel{{$cnt}}" class="carousel slide" data-ride="carousel" data-interval="false">
                    <ol class="carousel-indicators">
                       <?php $pos=1 ?>
                        @foreach ($ong->media as $photo)
                            <li data-target="#projectcarousel{{$cnt}}" data-slide-to="{{ $pos }}" class="{{ $pos == 1 ? 'active' : '' }}"></li>
                            <?php $pos++ ?>
                        @endforeach
                    </ol>
                    <div class="carousel-inner" role="listbox">
                       <?php $pos=1 ?>
                       @foreach ($ong->media as $photo)
                        <div class="carousel-item {{ $pos == 1 ? 'active' : '' }}">
                            <img class="d-block mx-auto img-fluid" src="{{ asset($photo->name) }}" alt="First slide">
                            <?php $pos++ ?>
                         </div>
                      @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#projectcarousel{{$cnt}}" role="button" data-slide="prev"><img src="images/prev.png" alt=""></a><a class="carousel-control-next" href="#projectcarousel{{$cnt}}" role="button" data-slide="next"><img src="images/next.png" alt=""></a></div>
                </div>
                <div class="col-md-6 p-0">
                  <div class="projectsdet">
                    <div class="project-count">{{ $cnt }}</div>
                    <div class="clearfix"></div>
                    <div class="pcaption">Client</div>
                    <div class="clearfix"></div>
                    <h2>{{ $ong->client_name}}</h2>
                    <div class="pcaption">Location</div>
                    <div class="clearfix"></div>
                    <h3>{{ $ong->location}}</h3>
                    <div class="pcaption">Year</div>
                    <div class="clearfix"></div>
                    <h3>{{ $ong->year}}</h3>
                    <!-- <div class="pcaption">Project</div>
                    <div class="clearfix"></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget turpis in elit fringilla lobortis a sit amet orci. In cursus nibh urna, sit amet suscipit erat finibus ac.</p> -->
                    <!--<a href="" class="moreabt">View Project</a>-->
                    
                  </div>
                </div>
                @endif
                @if($cnt % 2 == 0)
                <div class="col-md-6 p-0 order-md-1 order-2">
                  <div class="projectsdet-l">
                    <div class="project-count">{{ $cnt }}</div>
                    <div class="clearfix"></div>
                    <div class="pcaption">Client</div>
                    <div class="clearfix"></div>
                    <h2>{{ $ong->client_name}}</h2>
                    <div class="pcaption">Location</div>
                    <div class="clearfix"></div>
                    <h3>{{ $ong->location}}</h3>
                    <div class="pcaption">Year</div>
                    <div class="clearfix"></div>
                    <h3>{{ $ong->year}}</h3>
                    <!-- <div class="pcaption">Project</div>
                    <div class="clearfix"></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget turpis in elit fringilla lobortis a sit amet orci. In cursus nibh urna, sit amet suscipit erat finibus ac.</p> -->
                    <!--<a href="" class="moreabt">View Project</a>-->
                    
                  </div>
                </div>

                <div class="col-md-6 p-0 order-1">
                  <div id="projectcarousel{{$cnt}}" class="carousel slide" data-ride="carousel" data-interval="false">
                    <ol class="carousel-indicators">
                       <?php $pos=1 ?>
                        @foreach ($ong->media as $photo)
                            <li data-target="#projectcarousel{{$cnt}}" data-slide-to="{{ $pos }}" class="{{ $pos == 1 ? 'active' : '' }}"></li>
                            <?php $pos++ ?>
                        @endforeach
                    </ol>
                    <div class="carousel-inner" role="listbox">
                       <?php $pos=1 ?>
                       @foreach ($ong->media as $photo)
                        <div class="carousel-item {{ $pos == 1 ? 'active' : '' }}">
                            <img class="d-block mx-auto img-fluid" src="{{ asset($photo->name) }}" alt="First slide">
                            <?php $pos++ ?>
                         </div>
                      @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#projectcarousel{{$cnt}}" role="button" data-slide="prev"><img src="images/prev.png" alt=""></a><a class="carousel-control-next" href="#projectcarousel{{$cnt}}" role="button" data-slide="next"><img src="images/next.png" alt=""></a></div>
                </div>
                
                @endif
              </div>
            </div>
             <?php $cnt++ ?>
            @endforeach
          </div>

          <!-- ***************** -->
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
           
            @foreach ($completed as $ong)
            <div class="container-fluid">
              <div class="row">
                @if($cnt % 2 != 0)
                <div class="col-md-6 p-0">
                  <div id="projectcarousel{{$cnt}}" class="carousel slide" data-ride="carousel" data-interval="false">
                    <ol class="carousel-indicators">
                       <?php $pos=1 ?>
                        @foreach ($ong->media as $photo)
                            <li data-target="#projectcarousel{{$cnt}}" data-slide-to="{{ $pos }}" class="{{ $pos == 1 ? 'active' : '' }}"></li>
                            <?php $pos++ ?>
                        @endforeach
                    </ol>
                    <div class="carousel-inner" role="listbox">
                       <?php $pos=1 ?>
                       @foreach ($ong->media as $photo)
                        <div class="carousel-item {{ $pos == 1 ? 'active' : '' }}">
                            <img class="d-block mx-auto img-fluid" src="{{ asset($photo->name) }}" alt="First slide">
                            <?php $pos++ ?>
                         </div>
                      @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#projectcarousel{{$cnt}}" role="button" data-slide="prev"><img src="images/prev.png" alt=""></a><a class="carousel-control-next" href="#projectcarousel{{$cnt}}" role="button" data-slide="next"><img src="images/next.png" alt=""></a></div>
                </div>
                <div class="col-md-6 p-0">
                  <div class="projectsdet">
                    <div class="project-count">{{ $cnt }}</div>
                    <div class="clearfix"></div>
                    <div class="pcaption">Client</div>
                    <div class="clearfix"></div>
                    <h2>{{ $ong->client_name}}</h2>
                    <div class="pcaption">Location</div>
                    <div class="clearfix"></div>
                    <h3>{{ $ong->location}}</h3>
                    <div class="pcaption">Year</div>
                    <div class="clearfix"></div>
                    <h3>{{ $ong->year}}</h3>
                    <!-- <div class="pcaption">Project</div>
                    <div class="clearfix"></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget turpis in elit fringilla lobortis a sit amet orci. In cursus nibh urna, sit amet suscipit erat finibus ac.</p> -->
                    <!--<a href="" class="moreabt">View Project</a>-->
                    
                  </div>
                </div>
                @endif
                @if($cnt % 2 == 0)
                <div class="col-md-6 p-0 order-md-1 order-2">
                  <div class="projectsdet-l">
                    <div class="project-count">{{ $cnt }}</div>
                    <div class="clearfix"></div>
                    <div class="pcaption">Client</div>
                    <div class="clearfix"></div>
                    <h2>{{ $ong->client_name}}</h2>
                    <div class="pcaption">Location</div>
                    <div class="clearfix"></div>
                    <h3>{{ $ong->location}}</h3>
                    <div class="pcaption">Year</div>
                    <div class="clearfix"></div>
                    <h3>{{ $ong->year}}</h3>
                    <!-- <div class="pcaption">Project</div>
                    <div class="clearfix"></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget turpis in elit fringilla lobortis a sit amet orci. In cursus nibh urna, sit amet suscipit erat finibus ac.</p> -->
                    <!--<a href="" class="moreabt">View Project</a>-->
                    
                  </div>
                </div>

                <div class="col-md-6 p-0 order-1">
                  <div id="projectcarousel{{$cnt}}" class="carousel slide" data-ride="carousel" data-interval="false">
                    <ol class="carousel-indicators">
                       <?php $pos=1 ?>
                        @foreach ($ong->media as $photo)
                            <li data-target="#projectcarousel{{$cnt}}" data-slide-to="{{ $pos }}" class="{{ $pos == 1 ? 'active' : '' }}"></li>
                            <?php $pos++ ?>
                        @endforeach
                    </ol>
                    <div class="carousel-inner" role="listbox">
                       <?php $pos=1 ?>
                       @foreach ($ong->media as $photo)
                        <div class="carousel-item {{ $pos == 1 ? 'active' : '' }}">
                            <img class="d-block mx-auto img-fluid" src="{{ asset($photo->name) }}" alt="First slide">
                            <?php $pos++ ?>
                         </div>
                      @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#projectcarousel{{$cnt}}" role="button" data-slide="prev"><img src="images/prev.png" alt=""></a><a class="carousel-control-next" href="#projectcarousel{{$cnt}}" role="button" data-slide="next"><img src="images/next.png" alt=""></a></div>
                </div>
                
                @endif
              </div>
            </div>
             <?php $cnt++ ?>
            @endforeach
          </div>
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
</div>
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
<!--	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>--> 

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

	</script>
</body>
</html>
