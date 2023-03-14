 @php
    $route= Route::current()->getName();
@endphp
<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
        <span class="icon-close2 js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>
<header class="site-navbar site-navbar-target" role="banner" >
        <div class="container" style="padding-bottom: 0">
          <div class="row align-items-center position-relative">

            <div class="col-3">
              <a href="{{route('frontend.index')}}" class="site-logo img-fluid" style="display: flex; flex-direction:column; align-items: flex-start; justify-content: center">
                {{-- <img style="max-width: 5rem; " src="{{asset('images/semut-tok.png')}}" alt=""> --}}
                <h2 class="color-red " style="font-family: 'Poppins-Bold'; line-height: 1.5rem; font-size: 1.5rem">INISIASI</h2>
                <h3 class="color-red" style="font-family: 'Poppins-Regular'; margin-bottom: 0">FTI UAJY 2022</h3>
              </a>
            </div>
            <style>
              .color-red{
                color: #5E1A20
              }
              .color-red:hover{
                color:#5E1A20
              }
            </style>
            <script>
              $(document).ready(function(){       
                  var scroll_pos = 0;
                  $(document).scroll(function() { 
                      scroll_pos = $(this).scrollTop();
                      if(scroll_pos > 250) {
                          $('.color-red').css('color', '#FFD5A9');
                          $('.color-red').css('transition', '.2s');
                          
                          $('.site-navbar').css('background', '#321519');
                          $('.site-navbar').css('padding', '.5rem');
                          $('.site-navbar').css('transition', '.2s');
                          
                        } else {
                          $('.color-red').css('color', '#5E1A20');
                          $('.color-red').css('transition', '.2s');
                          
                          $('.site-navbar').css('background', '');
                          $('.site-navbar').css('padding', '');
                          $('.site-navbar').css('transition', '.2s');
                        }
                  });
              });
            </script>

            <div class="col-9  text-right">
              

              <span class="d-inline-block d-lg-none"><a href="#" class="text-primary site-menu-toggle js-menu-toggle py-5"><span class="icon-menu h3 text-white"></span></a></span>


              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li class="{{$route=='frontend.index' ? 'active' : ''}} color-red"><a href="{{route('frontend.index')}}" class="nav-link color-red">BERANDA</a></li>
                  <li class="{{$route=='frontend.filosofi' ? 'active' : ''}} color-red"><a href="{{route('frontend.filosofi')}}" class="nav-link color-red">FILOSOFI</a></li>
                  <li class="{{$route=='frontend.media' ? 'active' : ''}} color-red"><a href="{{route('frontend.media')}}" class="nav-link color-red">MEDIA</a></li>
                  <li class="{{$route=='frontend.panitia' ? 'active' : ''}} color-red"><a href="{{route('frontend.panitia')}}" class="nav-link color-red">PANITIA</a></li>
                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>
<style>
    /*.site-navbar-target{*/
    /*    position: fixed*/
    /*}*/
    .site-mobile-menu{
      background: #321519
    }
</style>