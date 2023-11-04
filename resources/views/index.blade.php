<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('homes/images/site.png')}}">
    <title>QR Certificate Generator | Pangasinan State University</title>
    <link rel="icon" type="image/png" href="../assets/psu_logo.png">

    <!-- Bootstrap core CSS -->
    <link href="  {{asset('homes/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <!-- <link rel="stylesheet" href="{{asset('homes/css/fontawesome.css ')}}"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="{{asset('homes/css/styl.css?ver=01')}}">
    <link rel="stylesheet" href="{{asset('homes/css/owl.css')}}">
    <link rel="stylesheet" href="{{asset('homes/css/lightbox.css ')}}">
</head>
<style>
    /* Scroll Bar */
    /* width */
    ::-webkit-scrollbar {
        width: 8px;
      }
      
      /* Track */
      ::-webkit-scrollbar-track {
        background: #fff; 
      }
      
      /* Handle */
      ::-webkit-scrollbar-thumb {
        background: rgb(0, 0, 131); 
        transition: 0.5s ease-in-out;
      }
      
      /* Handle on hover */
      ::-webkit-scrollbar-thumb:hover {
        background: rgb(0, 0, 255); 
      }
</style>

<body>
  <!-- Sub Header -->
  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-sm-8">
          <div class="left-content">
          <p> <i class="fa fa-location-dot" aria-hidden="true"></i> Urdaneta City, Pangasinan, Philippines</p>
          </div>
        </div>
        <div class="col-lg-4 col-sm-4">
          <div class="right-icons">
            <ul>
            <li><a href="https://www.facebook.com/PSUUrdSSU" target="_blank" ><i class="fa-brands fa-facebook"></i></a></li>
              <li><a href="https://psu.edu.ph/" target="_blank"><i class="fa-brands fa-google"></i></a></li>
            
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a href="/" class="logo" style="color: rgb(0, 0, 131);">
                      <img src=" {{asset('homes/images/psu logo.png')}}" alt="" class="logos">
                      QR Certificate Generator
                      </a>
              
                      <ul class="nav">
                      <li class="scroll-to-section"><a href="#top">Home</a></li>
                          <li class="scroll-to-section"><a href="#about">About</a></li>
                          <li class="scroll-to-section"><a href="#features">Features</a></li> 
                          <li class="main-button-blue "><a  href="{{asset('login')}}" style="color: white;"><span >Login/Sign Up</span></a> </li>
                          <li > 
                            <a href="https://drive.google.com/file/d/1eTHYL-hQ3-D6wytI5T_fEEMpykdB2lRe/view?usp=sharing" target="_blank" class="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Download User Manual">
                              <i class="fa fa-download" aria-hidden="true"></i>
                            </a>
                          </li> 
                      </ul>  
                           
                      <a class='menu-trigger'>
                          <span>Menu</span>
                      </a>
                      <!-- ***** Menu End ***** -->
                  </nav>
              </div>
          </div>
      </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <!-- ***** Main Banner Area Start ***** -->
  <section class="section main-banner" id="top" data-section="section1">
      <div id="bg-video">
      <img src=" {{asset('homes/images/land_bg.jpg')}}" alt="">
      </div>
      <div class="video-overlay header-text">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="caption">
              <h2>Welcome to <span style="color:yellow;"> PSU Urdaneta City Campus </span></h2>
              <!-- <h6>QR Certificate Generator for Student Organizations</h6><br> -->
                        <p>Check and verify the authenticity of your certificate. </p>
              <div class="main-button-red">
                  <div ><a href="/home">Verify Certificate <i class="fa fa-arrow-right" aria-hidden="true"></i></a></div>
              </div>
          </div>
              </div>
            </div>
          </div>
      </div>
  </section>
  <!-- ***** Main Banner Area End ***** -->

  <section class="services" >
 
    <div class="container">
      
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-service-item owl-carousel">
            <div class="item">
              <div class="icon">
                <img src=" {{asset('homes/images/code.png')}}" alt="">
              </div>
              <div class="down-content" >
                <h4>Dynamic QR Codes</h4>
                <p>You can be able tp Edit and change your QR codes anytime. </p>
              </div>
            </div>
            
            <div class="item">
              <div class="icon">
                <img src=" {{asset('homes/images/scan.png')}}" alt="">
              </div>
              <div class="down-content">
                <h4>Scan Statistics</h4>
                <p>Track your QR codes and get insights about scans.</p>
              </div>
            </div>
            
            <div class="item">
              <div class="icon">
                <img src=" {{asset('homes/images/add-folder.png')}}" alt="">
              </div>
              <div class="down-content">
                <h4>Bulk Creation</h4>
                <p>Create and edit many QR codes in no time.</p>
              </div>
            </div>
        
            
            <div class="item">
              <div class="icon">
                <img src=" {{asset('homes/images/windows.png')}}" alt="">
              </div>
              <div class="down-content">
                <h4>Product Grouping</h4>
                <p> 
                Create transparent QR codes and reusable design templates.
            </p>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
    
 
  
  <section class="upcoming-meetings" id="about">
    <div class="container"><br><br>
      <div class="row">
        <div class="col-lg-12 pt-5">
          <div class="section-heading">
            <h2 class="text-black">About The System <br><br><hr></h2>
          </div>
        </div>
        
        <div class="col-lg-12 justify-content-center">
          <div class="row justify-content-center">
                   
            <div class="col-lg-6">
              <div class="meeting-item">
                <div class="thumb">
                  <img src="{{asset('homes/images/create.jpg')}}" alt="Welcome image">
                </div>
                <div class="down-content text-center">
                  <h4>SET QR CONTENT</h4>
                  <div class=" text-center">
                  <a class="texts" >Creating content is the first step of customer feedback QR Code generates. You need to create content that is consistent with the purpose of the QR code. Give Example: If you want to listen to your guest experience for your hospitality business, then you should create content relevant to the hospitality industry.</a>
              </div>
                </div>
              </div>
            </div>

            

            <div class="col-lg-6">
              <div class="meeting-item">
                <div class="thumb">
                 
                  <img src="{{asset('homes/images/customize.jpg')}}" alt="Welcome image">
                </div>
                <div class="down-content text-center">
                  
                 
                  <h4>CUSTOMIZE DESIGN</h4>
                
                  <div class=" text-center">
                  <a class="texts" >
                    Make your customer feedback QR Code really unique with our customized design options. You can customize the shape, color, and form of the corner elements and the body with your own style of the QR code. You can add a gradient color to the QR code body and make it really stand out. Remember, 
                    attractive QR codes can increase the number of scans </a>
              </div>
                </div>
              </div>
            </div>


            <div class="col-lg-6">
              <div class="meeting-item">
                <div class="thumb">
                 
                 <img src="{{asset('homes/images/qrcode.jpg')}}" alt="Welcome image">
                </div>
                <div class="down-content text-center">
                  
                 
                 <h4>GENERATE QR CODE</h4>
                
                  <div class=" text-center">
                  <a class="texts" >
                    QR codes are scan-able using smartphone devices. These codes are generated using an online QR code generator that displays information to the scanner. You can customize the QR codes provided by us to include details about your company or the promotions you are running. 
                    Please do get in touch for further details. </a>
              </div>
                </div>
              </div>
            </div>
            
            <div class="col-lg-6">
              <div class="meeting-item">
                <div class="thumb">
                 
                  <img src="{{asset('homes/images/cert2.jpg')}}" alt="Welcome image">
                </div>
                <div class="down-content text-center">
                  
                 
                  <h4>DOWNLOAD IMAGE</h4>
                
                  <div class=" text-center">
                  <a class="texts" >
                  
                    Now it's time to download the generated QR Code and use it in your products. We have generated a QR Code for you with the content and the design you shared. You can either download the QR code or we provide the option to mail the same to the provided mail id.
                     So, get your customized QR codes and expand the possibilities of your business. </a>
              </div>
                </div>
              </div>
            </div>
                  
           
    


            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="apply-now" >
    <div class="container">
      <div class="row">
        <div class="col-lg-12 align-self-center">
          <div class="row">
            <div class="col-lg-12">
              <div class="item" style="border-radius: 15px;">
                <h3>Are you an Individual?</h3>
                <p style="text-align: justify;">
<span class="ps-5">QR</span> Codes are great for businesses and marketers, but there are more practical uses of QR Codes than you might think. This could be you.
You could be a student celebrating a birthday, a working parent looking for a new job, or just someone interested in using new technologies. 
Whoever you may be, QR Code is the perfect accessory to enhance everyday life. This is what makes the QR code an individual QR code because a specific Individual name is set for a certain QR code. 
To have an individual QR code, please visit our Website for further details.</p>
              <div class="main-button-red">
                  <div><a href="/home">Generate QR Now</a></div>
              </div>
              </div>
            </div>
           
          </div>
        </div>
       
            </article>
        </div>
        </div>
      </div>
    </div>
  </section>

  <section class="our-courses" id="features" style="background: white;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading" style="text-align: center;">
            <h2 style="color: black; font-size: 50px;">Get more features when using the QR Generator<hr></h2>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="row">
            <div class="col-6">
              <img src="{{asset('assets/safe.png')}}" alt="Safe Feature">
            </div>
            <div class="col-6 align-self-center">
              <h1 class="display-1">Safe</h1><br>
              <h3 style="font-weight: 200;">The system will guarantee the security and protection of your information.</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-6 align-self-center">
              <h1 class="display-1">Fast</h1><br>
              <h3 style="font-weight: 200;">In terms of creating and scanning certificates, the system will offer users a quick interface.</h3>
            </div>
            <div class="col-6">
              <img src="{{asset('assets/fast.png')}}" alt="Safe Feature">
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <img src="{{asset('assets/reliable.png')}}" alt="Safe Feature">
            </div>
            <div class="col-6 align-self-center">
              <h1 class="display-1">Reliable</h1><br>
              <h3 style="font-weight: 200;">Users may guaranteed that every information they access through the system is reliable.</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>    

  <footer id="footer">

<div class="footer-top">
  <div class="container">
    <div class="row">

      <div class="col-lg-4 col-md-12 footer-contact">
        <h3>QR Certificate Generator</h3>
        <p>Pangasinan State University - Urdaneta Campus <br><br>
          <strong>Phone:</strong> +1 5589 55488 55<br>
          <strong>Email:</strong> info@example.com<br>
        </p>
      </div>

      <div class="col-lg-4 col-md-12 footer-links">
        <h3 class="pb-2">Page Sections</h3>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="#top">Home</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#about">About</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#features">Features</a></li>
        </ul>
      </div>

      <div class="col-lg-4 col-md-12 footer-links">
        <h3>Our Socials</h3>
        <p>Follow The Pangasinan State University Social Media</p>
        <div class="social-links mt-3">
          <a href="https://twitter.com/PSUmainOfficial" target="_blank" class="twitter"><i class="fa-brands fa-twitter"></i></a>
          <a href="https://www.facebook.com/PSUroars" target="_blank" class="facebook"><i class="fa-brands fa-facebook"></i></a>
          <a href="https://www.instagram.com/psumainofficial/" target="_blank" class="instagram"><i class="fa-brands fa-instagram"></i></a>
          <a href="https://www.linkedin.com/company/psumainofficial/" target="_blank" class="linkedin"><i class="fa-brands fa-linkedin"></i></a>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="container footer-bottom" style="background: rgb(0, 0, 131);">
  <div class="row">
    <div class="col-6 d-flex justify-content-center">&copy; Copyright <?php $year = date("Y");  echo $year; ?> | All Rights Reserved</div>
    <div class="col-6 d-flex justify-content-center ">Designed by ELEVATE</div>
  </div>
</div>
</footer><!-- End Footer -->
  
  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src=" {{asset('homes/vendor/jquery/jquery.min.js')}}"></script>
    <script src=" {{asset('homes/vendor/bootstrap/js/bootstrap.bundle.min.js ')}}"></script>

    <script src=" {{asset('homes/js/isotope.min.js')}}"></script>
    <script src=" {{asset('homes/js/owl-carousel.js')}}"></script>
    <script src=" {{asset('homes/js/lightbox.js')}}"></script>
    <script src=" {{asset('homes/js/tabs.js ')}}"></script>
    <script src=" {{asset('homes/js/video.js')}}"></script>
    <script src=" {{asset('homes/js/slick-slider.js')}}"></script>
    <script src="{{asset('homes/js/custom.js')}}"></script>
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
          var
          direction = section.replace(/#/, ''),
          reqSection = $('.section').filter('[data-section="' + direction + '"]'),
          reqSectionPos = reqSection.offset().top - 0;

          if (isAnimate) {
            $('body, html').animate({
              scrollTop: reqSectionPos },
            800);
          } else {
            $('body, html').scrollTop(reqSectionPos);
          }

        };

        var checkSection = function checkSection() {
          $('.section').each(function () {
            var
            $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
              var
              currentId = $this.data('section'),
              reqLink = $('a').filter('[href*=\\#' + currentId + ']');
              reqLink.closest('li').addClass('active').
              siblings().removeClass('active');
            }
          });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
          e.preventDefault();
          showSection($(this).attr('href'), true);
        });

        $(window).scroll(function () {
          checkSection();
        });
    </script>
</body>

</body>
</html>