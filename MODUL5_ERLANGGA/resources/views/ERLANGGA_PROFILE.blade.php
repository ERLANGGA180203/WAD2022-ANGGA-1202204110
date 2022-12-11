@extends('ERLANGGA_TEMPLATE')
@section('content')
    <div class="container">
        <p class="text-center fw-bold" style="font-size:32px;">Profile</p>
        <form action="/user/{{Auth::user()->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" name="email"
                        value="{{ Auth::user()->email }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="name"
                        value="{{ Auth::user()->name }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="no_hp" class="col-sm-2 col-form-label">No Handphone</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="no_hp" name="no_hp"
                        value="{{ Auth::user()->no_hp }}">
                </div>
            </div>
            <hr>
            <div class="mb-3 row">
                <label for="pass" class="col-sm-2 col-form-label">Kata Sandi</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Kata Sandi">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="pass_con" class="col-sm-2 col-form-label">Konfirmasi Kata Sandi</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="pass_con" name="pass_con"
                        placeholder="Konfirmasi Kata Sandi">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="bgcolor" class="col-sm-2 col-form-label">Warna Navbar</label>
                <div class="col-sm-10">
                    <select class="form-select" name="bgcolor" id="bgcolor">
                        @php
                            $colors = ['#000' => 'Black', '#0d6efd' => 'Blue'];
                            foreach ($colors as $name => $value) {
                                $selected = $name == session('bgcolor') ? 'SELECTED="SELECTED"' : '';
                                echo '<option value= "' . $name . '"' . $selected . '>' . $value . '</option>';
                            }
                        @endphp

                    </select>
                </div>
            </div>
            <div class="mx-auto">
                <button class="btn btn-primary text-center mx-auto" type="submit">Update</button>
            </div>
        </form>
    </div>
@endsection
