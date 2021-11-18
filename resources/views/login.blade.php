<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login System</title>
    <!-- CSS only -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

</head>
<body class="bg-gradient-primary"
      style="background-image: url('https://assets.pikiran-rakyat.com/crop/0x0:0x0/x/photo/2021/08/16/2135731607.jpg')">
<div class="container" >
    <div class="row">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-12 col-md-5">

                <div class="card shadow-lg my-5" style="top: 150px">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->

                        {{--pesan error--}}

                        @if(Session::has('pesan'))
                            <div class="alert alert-danger" role="alert">
                                {{Session::get('pesan')}}
                            </div>
                        @endif
                        <div class="col-lg-12 col-md-15 col-12 mx-auto">
                            <div class="card z-index-0 fadeIn3 fadeInBottom">
                                    <div class="card-header p-0 position-relative mt-n4 mx -3 z-index -2">

                                        <div class="bg-gradient-danger shadow-primary py-3 pe-1" style="border: red; border-radius: 15px">
                                            <h2 class="text-white font-weight-bolder text-center mt-2 mb-0">SELAMAT DATANG DI SISTEM INVENTORY</h2>
                                    </div>
                                        </div>
                                        <form method="post" action="{{route('auth.verify')}}">
                                            @csrf
                                            <div class="p-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" name="email" required class="form-control"
                                                       id="exampleInputEmail1" aria-describedby="emailHelp"
                                                       placeholder="Enter email">
                                            </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="password" name="password" required class="form-control"
                                                       id="exampleInputPassword1" placeholder="Password">
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                <label class="form-check-label" for="exampleCheck1">Check me
                                                    out</label>
                                            </div>
                                            <div class="form-group">
                                                <a href="{{route('auth.reset')}}">Lupa Password?</a>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <p>&nbsp;</p>
                                            <span>{{Helper::dateConverter(date('Y-m-d'))}}</span>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="/assets/vendor/jquery/jquery.min.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="/assets/js/sb-admin-2.min.js"></script>

</body>
</html>
