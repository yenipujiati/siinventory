
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   
</head>
<body>  
    <h3 align="center"><b> List Data Admin</b></h3>
<table border="1" width="100%" style="text-align:center;">
 
    
@csrf
        <thead style="background: #2d2e33">
        <tr>

        <th scope="col">Nama</th>
        <th scope="col">Role</th>
        <th scope="col">Email</th>
        <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>

        @foreach($pengguna as $row)
    <tr>
        <td>{{$row->name}}</td>
        <td>{{$row->role}}</td>
        <td>{{$row->email}}</td>
        <td>{{Helper::active($row->status)}}</td>     
        
    </tr>


        @endforeach
           </tbody>
    </table>
    <script type="text/javascript">
        window.print();

    </script>
    
</body>
</html>
