<!DOCTYPE html>
<html lang="en">
<head>
    <title>Atur Ulang Kata Sandi</title>
    <!-- CSS only -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

</head>
<body class="bg-gradient-primary">
&nbsp;&nbsp;
<div class="container">
    <div class="row">


            <div class="container">

                <!-- Outer Row -->
                <div class="row justify-content-center">

                    <div class="col-xl-6 col-lg-12 col-md-9">

                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->

            {{--pesan error--}}

            @if(\Session::has('pesan'))
                <div class="alert alert-danger" role="alert">
                    {{Session::get('pesan')}}
                </div>
            @endif
                                <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="p-5">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-10"><b>Selamat Datang di Sistem Inventory</b></h1>
                                            </div>
            <form method="post" action="{{route('auth.renew')">
                @csrf
                
                <div class="form-group">
                    <label for="exampleInputPassword1">Password Baru</label>
                    <input type="password" name="password" required class="form-control" id="password" placeholder="Password">
                </div>
                
                <div class="form-group">
                    <label for="exampleInputPassword1">Konfirmasi Password Baru</label>
                    <input type="password" name="new_password" required class="form-control" id="new_password" placeholder="Password">
                </div>

                <div class="form-group">
                    <a href="{{route('auth.index')}}">Kembali Login</a>
                </div>

                <input type="hidden" name="token" value ="{{$emailHash}}">

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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

                <!-- Bootstrap core JavaScript-->
                <script src="/assets/vendor/jquery/jquery.min.js"></script>
                <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                <!-- Core plugin JavaScript-->
                <script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Custom scripts for all pages-->
                <script src="/assets/js/sb-admin-2.min.js"></script>

</body>
</html>
