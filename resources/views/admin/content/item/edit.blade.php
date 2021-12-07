@extends('admin/layout/main')
@section('content')

    <body class="bg-gradient-primary">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-12 col-md-9">
                 <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">                        
                        <div class="col-lg-100">
                            <div class="p-4">
                                        
                                <form action="{{route('admin.item.update', $item->id)}}" method="post">
                                    @csrf
                            
                                    <div class="form-group">
                                        <label >Barcode</label>
                                        <input type="text" name="barcode" value="{{$item->barcode}}" class ="form-control" placeholder="Barcode" required>
                                    </div>
                            
                                    <div class="form-group">
                                        <label >Nama</label>
                                        <input type="text" name="name" value="{{$item->name}}" class="form-control" placeholder="Name" required>
                                    </div>
                            
                                    <div class="form-group">
                                        <label >Kategori</label>
                                        <select name="category_id" class="form-control">
                                            <option disabled selected>
                                                - Pilih -
                                            </option>
                                            @foreach($category as $row)
                                                <option value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label >Unit</label>
                                        <select name="unit_id" class="form-control">
                                            <option disabled selected>
                                                - Pilih -
                                            </option>
                                            @foreach($unit as $row)
                                                <option value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            
                                    
                                    <div class="form-group">
                                        <label >Price</label>
                                        <input type="number" name="price" value="{{$item->price}}" class="form-control" placeholder="Price" required>
                                    </div>                            
                            
                                    <div class="form-group">
                                        <input type="hidden" name="id" value{{$item->id}}>
                                        <input type="submit" value="Simpan" class="btn-sm btn-primary">
                                        <a href="{{route('admin.item.index')}}"class ="btn btn-sm btn-danger" ><i class="fas fa-back"></i>Batal</a>
                            
                                    </div>
                            
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
