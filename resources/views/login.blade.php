<html>
<head>
    <title>Login System</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>

&nbsp;&nbsp;

<div class="container">
    <div class="row">
        <div class="col-sm">

        </div>
        <div class="col-sm">

            {{--pesan error--}}
            @if(\Session::has('Pesan'))
                <div class="alert alert-warning" role="alert">
                    {{Session::get('Pesan')}}
                </div>
            @endif

            <form method="post" action="{{route('auth.verify')}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" required class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>

                <p></p>
                <button type="submit" class="btn btn-primary">Submit</button>

{{--                <p>&nbsp;</p>--}}
{{--                <span>{{Helper::dateConverter(date('m/d/Y'))}}</span>--}}

            </form>

        </div>
        <div class="col-sm">

        </div>
    </div>
</div>

<div class="col-md-ofset-4">
</div>

</body>
</html>
