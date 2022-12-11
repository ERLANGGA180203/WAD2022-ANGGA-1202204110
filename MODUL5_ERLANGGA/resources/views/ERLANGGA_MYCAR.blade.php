@extends('ERLANGGA_TEMPLATE')
@section('content')
    <div class="container">
        <p style="font-size: 32px; font-weight:bold;">My Show Room</p>
        <p style="font-size: 16px;">List Show Room Erlangga - 1202204110</p>
        <div class="row">
            @foreach ($mycar as $data_mobil)
                <div class="col">
                    <div class="card" style="width: 400px;">
                        <img src="gambar_mobil/{{ $data_mobil->image }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $data_mobil->name }}</h5>
                            <p class="card-text">{{ $data_mobil->description }}</p>
                            <form action="/showroom/{{ $data_mobil->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="/showroom/{{ $data_mobil->id }}" class="btn btn-primary">Detail</a>
                                <button type="submit" name='delete' class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
