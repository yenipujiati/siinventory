
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   
</head>
<body>  
    <h3 align="center"><b> List Data Costumer</b></h3>
    <table style="margin-left:auto;margin-right:auto" border="1">
 
@csrf
    <thead style="background: #2d2e33">
        <tr>

            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Email</th>
        </tr>
    </thead>

    <tbody>
    @foreach($costomer as $row)
        <tr>
            <td>{{$row->name}}</td>
            <td>{{$row->alamat}}</td>
            <td>{{$row->nomber}}</td>
            <td>{{$row->email}}</td>
        </tr>
    @endforeach
    </tbody>

    </table>
    <script type="text/javascript">
        window.print();

    </script>
    
</body>
</html>

