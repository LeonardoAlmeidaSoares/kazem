<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>@yield('title')</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset("img/favicons/apple-touch-icon.png") }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset("img/favicons/favicon-32x32.png") }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset("img/favicons/favicon-16x16.png") }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset("img/favicons/favicon.ico") }}">
    <link rel="manifest" href="{{asset("img/favicons/manifest.json") }}">
    <meta name="msapplication-TileImage" content="{{asset("img/favicons/mstile-150x150.png") }}">
    <meta name="theme-color" content="#ffffff">
    <script src="{{asset("js/config.js") }}"></script>
    <script src="{{asset("vendors/overlayscrollbars/OverlayScrollbars.min.js") }}"></script>
   

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="{{asset("vendors/overlayscrollbars/OverlayScrollbars.min.css") }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/v/dt/dt-2.1.6/datatables.min.css" rel="stylesheet">
    <link href="{{asset("css/theme-rtl.min.css") }}" rel="stylesheet" id="style-rtl">
    <link href="{{asset("css/theme.min.css") }}" rel="stylesheet" id="style-default">
    <link href="{{asset("css/user-rtl.min.css") }}" rel="stylesheet" id="user-style-rtl">
    <link href="{{asset("css/user.min.css") }}" rel="stylesheet" id="user-style-default">
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.1.0/ckeditor5.css">
    <script>
      var isRTL = JSON.parse(localStorage.getItem('isRTL'));
      if (isRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
    </script>
  </head>

  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <div class="container" data-layout="container">
        <script>
          var isFluid = JSON.parse(localStorage.getItem('isFluid'));
          if (isFluid) {
            var container = document.querySelector('[data-layout]');
            container.classList.remove('container');
            container.classList.add('container-fluid');
          }
        </script>

        @include('template.inc.layout.menu')
        
        <div class="content">
          <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand">
           @include('template.inc.layout.topo')
          </nav>
            @yield('content')
            <footer class="footer">
            <div class="row g-0 justify-content-between fs--1 mt-4 mb-3">
              <div class="col-12 col-sm-auto text-center"><!-- RODAPÉ AQUI --></div>
              <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 text-600">v0.0.1</p>
              </div>
            </div>
            </footer>
        </div>
        <div class="modal fade" id="authentication-modal" tabindex="-1" role="dialog" aria-labelledby="authentication-modal-label" aria-hidden="true">
          <div class="modal-dialog mt-6" role="document">
            <div class="modal-content border-0">
              <div class="modal-header px-5 position-relative modal-shape-header bg-shape">
                <div class="position-relative z-index-1 light">
                  <h4 class="mb-0 text-white" id="authentication-modal-label">Register</h4>
                  <p class="fs--1 mb-0 text-white">Please create your free Falcon account</p>
                </div>
                <button class="btn-close btn-close-white position-absolute top-0 end-0 mt-2 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body py-4 px-5">
                <form>
                  <div class="mb-3">
                    <label class="form-label" for="modal-auth-name">Name</label>
                    <input class="form-control" type="text" autocomplete="on" id="modal-auth-name" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="modal-auth-email">Email address</label>
                    <input class="form-control" type="email" autocomplete="on" id="modal-auth-email" />
                  </div>
                  <div class="row gx-2">
                    <div class="mb-3 col-sm-6">
                      <label class="form-label" for="modal-auth-password">Password</label>
                      <input class="form-control" type="password" autocomplete="on" id="modal-auth-password" />
                    </div>
                    <div class="mb-3 col-sm-6">
                      <label class="form-label" for="modal-auth-confirm-password">Confirm Password</label>
                      <input class="form-control" type="password" autocomplete="on" id="modal-auth-confirm-password" />
                    </div>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="modal-auth-register-checkbox" />
                    <label class="form-label" for="modal-auth-register-checkbox">I accept the <a href="#!">terms </a>and <a href="#!">privacy policy</a></label>
                  </div>
                  <div class="mb-3">
                    <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Register</button>
                  </div>
                </form>
                <div class="position-relative mt-5">
                  <hr class="bg-300" />
                  <div class="divider-content-center">or register with</div>
                </div>
                <div class="row g-2 mt-2">
                  <div class="col-sm-6"><a class="btn btn-outline-google-plus btn-sm d-block w-100" href="#"><span class="fab fa-google-plus-g me-2" data-fa-transform="grow-8"></span> google</a></div>
                  <div class="col-sm-6"><a class="btn btn-outline-facebook btn-sm d-block w-100" href="#"><span class="fab fa-facebook-square me-2" data-fa-transform="grow-8"></span> facebook</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="{{asset("vendors/popper/popper.min.js") }}"></script>
    <script src="{{asset("vendors/bootstrap/bootstrap.min.js") }}"></script>
    <script src="{{asset("vendors/anchorjs/anchor.min.js") }}"></script>
    <script src="{{asset("vendors/is/is.min.js") }}"></script>
    <script src="{{asset("vendors/echarts/echarts.min.js") }}"></script>
    <script src="{{asset("vendors/fontawesome/all.min.js") }}"></script>
    <script src="{{asset("vendors/lodash/lodash.min.js") }}"></script>
    <script src="{{asset("vendors/list.js/list.min.js") }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-2.1.6/datatables.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    
    <script src="{{asset("js/theme.js") }}"></script>
    <script>
      CKEDITOR.replace( 'descricao', {
	uiColor: '#14B8C4',
	toolbar: [
		[ 'Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink' ],
		[ 'FontSize', 'TextColor' ]
	]
});
      </script>
  </body>

</html>