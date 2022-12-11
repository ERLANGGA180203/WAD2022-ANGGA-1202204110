@extends('ERLANGGA_TEMPLATE')
@section('content')
<div class="container">
    <h1 class="text">{{$data_mobil->name}}</h1>
    <h6 class="mb-3">Detail Mobil {{$data_mobil->name}}</h6><br>
    <div class='row'>
        <div class="col">
            <img src="{{asset('gambar_mobil/'.$data_mobil->image)}}" width="500" height="500">
        </div>
        <div class="col">
            <form action="create.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <b><label class="form-label">Nama Mobil</label></b>
                    <input type="text" class="form-control" name="nama" value="{{$data_mobil->name}}" readonly>
                </div>
                <div class="mb-3">
                    <b><label class="form-label">Nama Pemilik</label></b>
                    <input type="text" class="form-control" name="pemilik" value="Erlangga_1202204110" readonly>
                </div>
                <div class="mb-3">
                    <b><label class="form-label">Merk</label></b>
                    <input type="text" class="form-control" name="merk" value="{{$data_mobil->brand}}" readonly>
                </div>
                <div class="mb-3">
                    <b><label class="form-label">Tanggal Beli</label></b>
                    <input type="date" class="form-control" name="tanggal" value="{{$data_mobil->purchase_date}}" readonly>
                </div>
                <div class="mb-3">
                    <b><label class="form-label">Deskripsi</label></b>
                    <textarea class="form-control" name="deskripsi" readonly>{{$data_mobil->description}}</textarea>
                </div>
                <div class="mb-3">
                    <b><label class="form-label">Foto</label></b>
                    <input class="form-control" type="file" name="foto" readonly>
                </div>
                <div class="mb-3">
                    <b><label>Status Pembayaran</label></b><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status_pembayaran" value="Lunas" <?php if($data_mobil['status'] == 'Lunas')echo "checked";?> disabled>
                        <label class="form-check-label">Lunas</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status_pembayaran" value="Belum Lunas" <?php if($data_mobil['status'] == 'Belum-Lunas')echo "checked";?> disabled>
                        <label class="form-check-label">Belum Lunas</label>
                    </div>
                </div>
                <div class="mb-3">
                    <div>
                        <a class="btn btn-primary" href="/showroom/{{$data_mobil->id}}/edit">Edit</a>
                        <br>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection