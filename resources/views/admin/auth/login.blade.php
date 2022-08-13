<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Alif Tech International - Admin Login</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/assets/images/favicon.png')}}">

    <!-- Toaster  -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet"/>
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">
    
</head>

<body class="h-100">
    
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    



    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">

                                <a class="text-center" href=""> <h4>Admin Sign In</h4></a>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                @if (session('status'))
                                    <div class="mb-4 font-medium text-sm text-green-600">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <form class="mt-5 mb-5 login-input" method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input id="email" type="email" name="email" class="form-control" placeholder="Email" :value="old('email')" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="password" class="form-control" placeholder="Password" name="password" required autocomplete="current-password">
                                    </div>

                                    <div class="form-group">
                                         <x-jet-checkbox id="remember_me" name="remember" />
                                         <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                    </div>
                                    <button class="btn login-form__btn submit w-100">Sign In</button>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script src="{{ asset('backend/plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('backend/js/custom.min.js') }}"></script>
    <script src="{{ asset('backend/js/settings.js') }}"></script>
    <script src="{{ asset('backend/js/gleek.js') }}"></script>
    <script src="{{ asset('backend/js/styleSwitcher.js') }}"></script>
    
    <script>
      @if(Session::has('message'))
        var type="{{Session::get('alert-type','info')}}"
        switch(type){
            case 'info':
                 toastr.info("{{ Session::get('message') }}");
                 break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
      @endif
    </script>
</body>
</html>


