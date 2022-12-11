@extends('ERLANGGA_TEMPLATE')
@section('content')
<br>
<br>
<br>
<br>
<br>
<div class="clearfix">
    <div class="container">
        <div class="row">
            <div class="col">
                <b>
                    <h1>
                        <p class="fw-bold">Selamat Datang Di Show Room Erlangga</p>
                    </h1>
                </b>
                <p class="text-secondary">At lacus vitae nulla sagittis scelerisque nist. Pellentesque duis curcus
                    vestibulum, facilisi ac, sed faucibus.</p>
                <br>
                @auth
                    <div class="card-body">
                        <div class='container'>
                            <a class="nav-link text-secondary"><a href="MY_ITEM.php" class="btn btn-primary"> MyCar </a>
                        </div>
                    </div>
                @endauth
                <div class="col">
                    <br><br><img src="gambar/logo-ead.png" style="width: 100px;height: 25px;"> <a>
                        Erlangga_1202204110</a>
                </div>
            </div>
            <div class="col">
                <img src="gambar/MOBIL1.png" style="width:600px;height:380px;">
            </div>
        </div>
    </div>
</div>
@endsection