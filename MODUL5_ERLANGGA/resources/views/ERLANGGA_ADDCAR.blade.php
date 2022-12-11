@extends('ERLANGGA_TEMPLATE')
@section('content')
<div class="container">
    <h1 class="text" style="font-size:32px;">Tambah Mobil</h1>
    <h6 class="mb-3" style="font-size:16px;">Tambah Mobil Baru Anda Ke List Show Room </h6><br>
    <form action="/showroom" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <b><label class="form-label">Nama Mobil</label></b>
            <input type="text" class="form-control" name="nama">
        </div>
        <div class="mb-3">
            <b><label class="form-label">Nama Pemilik</label></b>
            <input type="text" class="form-control" name="pemilik" value="Erlangga_1202204110" readonly>
        </div>
        <div class="mb-3">
            <b><label class="form-label">Merk</label></b>
            <input type="text" class="form-control" name="merk">
        </div>
        <div class="mb-3">
            <b><label class="form-label">Tanggal Beli</label></b>
            <input type="date" class="form-control" name="tanggal">
        </div>
        <div class="mb-3">
            <b><label class="form-label">Deskripsi</label></b>
            <textarea class="form-control" name="deskripsi"></textarea>
        </div>
        <div class="mb-3">
            <b><label class="form-label">Foto</label></b>
            <input class="form-control" type="file" name="foto">
        </div>
        <div class="mb-3">
            <b><label>Status Pembayaran</label></b><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status_pembayaran" value="Lunas">
                <label class="form-check-label">Lunas</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status_pembayaran" value="Belum-Lunas">
                <label class="form-check-label">Belum Lunas</label>
            </div>
        </div>
        <div class="mb-3">
            <div>
                <button class="btn btn-primary" type="submit" >Selesai</button>
                <br>
            </div>
        </div>
    </form>
</div>
    
@endsection