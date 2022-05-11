<!DOCTYPE html>
<html class="loaded" lang="en" data-textdirection="ltr" style="--vh:3.16px;">
   <!-- BEGIN: Head-->
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
      <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
      <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
      <meta name="author" content="PIXINVENT">
      <title>Creative Academy</title>
      <link rel="apple-touch-icon" href="{{ asset('vuexy') }}/images/ico/apple-icon-120.png">
      <link rel="shortcut icon" type="image/x-icon" href="{{ asset('vuexy') }}/images/ico/kecil1.ico">
      <!-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
         <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
         <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet"> -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/css/font.css') }}">
      <!-- BEGIN: Vendor CSS-->
      <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/vendors/css/vendors.min.css">
      <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/vendors/css/forms/select/select2.min.css">
      <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/vendors/css/tables/datatable/responsive.bootstrap4.min.css">
      <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
      <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css">
      <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/vendors/css/pickers/flatpickr/flatpickr.min.css">
      <!-- END: Vendor CSS-->
      <!-- BEGIN: Theme CSS-->
      <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/css/pages/page-auth.css">
      <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/css/pages/page-auth.min.css">
      <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/css/bootstrap-extended.css">
      <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/css/colors.css">
      <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/css/components.css">
      <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/css/themes/dark-layout.css">
      <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/css/themes/bordered-layout.css">
      <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/css/themes/semi-dark-layout.css">
      <!-- BEGIN: Page CSS-->
      <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/css/core/menu/menu-types/vertical-menu.css">
      <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/css/plugins/forms/pickers/form-flat-pickr.css">
      <!-- END: Page CSS-->
      <!-- BEGIN: Custom CSS-->
      <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/style.css">
      <!-- END: Custom CSS-->
      <!-- Sweetalert-->
      <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/vendors/css/extensions/sweetalert2.min.css') }}">
      <!-- Toastr -->
      <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/vendors/css/extensions/toastr.min.css') }}">
      @yield('mycss')
   </head>
   <body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static    pace-done" data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
      <div class="pace  pace-inactive">
         <div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
            <div class="pace-progress-inner"></div>
         </div>
         <div class="pace-activity"></div>
      </div>
      <!-- BEGIN: Content-->
      <div class="app-content content ">
         <div class="content-overlay"></div>
         <div class="header-navbar-shadow"></div>
         <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
               <div class="auth-wrapper auth-v2">
                  <div class="auth-inner row m-0">
                     <!-- Brand logo-->
                     <a class="brand-logo" href="javascript:void(0);">
                        <!-- <svg viewBox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="28"> -->
                        <img src="{{ asset('vuexy') }}/images/logo/favicon.ico" alt="">
                            <defs>
                              <linearGradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                 <stop stop-color="#000000" offset="0%"></stop>
                                 <stop stop-color="#FFFFFF" offset="100%"></stop>
                              </linearGradient>
                              <linearGradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                 <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                 <stop stop-color="#FFFFFF" offset="100%"></stop>
                              </linearGradient>
                           </defs>
                           <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                 <g id="Group" transform="translate(400.000000, 178.000000)">
                                    <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill: currentColor"></path>
                                    <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                                    <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                    <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                    <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                 </g>
                              </g>
                           </g>
                        <!-- </svg> -->
                        <h2 class="brand-text text-primary ml-1">Creative Academy</h2>
                     </a>
                     <!-- /Brand logo-->
                     <!-- Left Text-->
                     <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                        <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="{{ asset('vuexy/images/pages/login-v2.svg') }}" alt="Login V2"></div>
                     </div>
                     <!-- /Left Text-->
                     <!-- Login-->
                     <div class="d-flex align-items-center auth-bg px-2 p-lg-5 col-lg-4">
                        <div class="px-xl-2 mx-auto col-12 col-sm-8 col-md-6 col-lg-12 ">
                           <h1 class="card-title">Welcome to Creative Academy! 👋</h1>
                           <p class="card-text mb-2">Please sign-in to your account and start the adventure</p>
                           <form method="POST" action="{{ route('login') }}">
                            @csrf
                              <div class="form-group">
                                 <label class="form-label" for="login-email">Email</label>
                                 <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                 @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                              <div class="form-group">
                                 <div class="d-flex justify-content-between">
                                    <label for="login-password">Password</label>
                                 </div>
                                 <div class="input-group input-group-merge form-password-toggle">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="input-group-append">
                                       <span class="input-group-text cursor-pointer">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                             <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                             <circle cx="12" cy="12" r="3"></circle>
                                          </svg>
                                       </span>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">
                              </div>
                              <button class="btn btn-primary btn-block waves-effect waves-float waves-light" tabindex="4">Sign in</button>
                              <input name="__RequestVerificationToken" type="hidden" value="CfDJ8NvmGNF6miNPtWS80ATXHa5q3vQVpWCSCoXyPxSwD7LWYh0aqCSVc0NY0nkatToEODLsJnIla28-ZcIdzUPTQwIJDwWNHyfV0qgZg9U-atzVEFTBF6SEjd9DvpG9GnCJephyEvBnjSXK5OBQTyn2Ihk">
                           </form>
                           <p class="text-center mt-2"><span>New on our platform?</span><a href="{{ url('/register')}}"><span>&nbsp;Create an account</span></a></p>
                        </div>
                     </div>
                     
                     <!-- /Login-->
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- END: Content-->
      <!-- BEGIN: Vendor JS-->
      <script src="{{ asset('vuexy') }}/vendors/js/vendors.min.js"></script>
      <!-- BEGIN Vendor JS-->
      <!-- BEGIN: Page Vendor JS-->
      <script src="{{ asset('vuexy') }}/vendors/js/forms/select/select2.full.min.js"></script>
      <script src="{{ asset('vuexy') }}/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
      <script src="{{ asset('vuexy') }}/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
      <script src="{{ asset('vuexy') }}/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
      <script src="{{ asset('vuexy') }}/vendors/js/tables/datatable/responsive.bootstrap4.js"></script>
      <script src="{{ asset('vuexy') }}/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
      <script src="{{ asset('vuexy') }}/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
      <script src="{{ asset('vuexy') }}/vendors/js/tables/datatable/jszip.min.js"></script>
      <script src="{{ asset('vuexy') }}/vendors/js/tables/datatable/pdfmake.min.js"></script>
      <script src="{{ asset('vuexy') }}/vendors/js/tables/datatable/vfs_fonts.js"></script>
      <script src="{{ asset('vuexy') }}/vendors/js/tables/datatable/buttons.html5.min.js"></script>
      <script src="{{ asset('vuexy') }}/vendors/js/tables/datatable/buttons.print.min.js"></script>
      <script src="{{ asset('vuexy') }}/vendors/js/tables/datatable/dataTables.rowGroup.min.js"></script>
      <script src="{{ asset('vuexy') }}/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
      <script src="{{ asset('vuexy') }}/vendors/js/charts/chart.min.js"></script>
      <!-- END: Page Vendor JS-->
      <!-- BEGIN: Theme JS-->
      <script src="{{ asset('vuexy') }}/js/core/app-menu.js"></script>
      <script src="{{ asset('vuexy') }}/js/core/app.js"></script>
      <!-- END: Theme JS-->
      <!-- BEGIN: Page JS-->
      <script src="{{ asset('vuexy') }}/js/scripts/forms/form-select2.js"></script>
      <script src="{{ asset('vuexy') }}/js/scripts/tables/table-datatables-basic.js"></script>
      <!-- END: Page JS-->
      <!-- SweetAlert -->
      <script src="{{ asset('vuexy/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
      <!-- TOASTR -->
      <script src="{{ asset('vuexy/vendors/js/extensions/toastr.min.js') }} "></script>
      <script src="{{ asset('vuexy/js/scripts/components/components-modals.js') }}" ></script>
      <script src="{{ asset('vuexy/js/scripts/components/components-dropdowns.js') }}" ></script>
      <script>
         $(window).on('load', function () {
             if (feather) {
                 feather.replace({
                     width: 14,
                     height: 14
                 });
             }
         })
      </script>
      <!-- END: Body-->
   </body>