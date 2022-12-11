<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TP_MODUL5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 vh-100" style="background-image: url({{url('gambar/bg.jpg')}}); background-size:cover;">

            </div>
            <div class="col-6 mx-auto my-auto" style="padding: 0 50px 0 50px">
                <br>
                <br>
                <br>
                <p style="font-size: 40px;">Login</p>
                <form action="/login" method="POST">
                    @csrf
                    <div class="mb-3">
                        <b><label class="form-label">Email</label></b>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <b><label class="form-label">Kata Sandi</label></b>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="remember" name="remember" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Remember Me
                        </label>
                    </div>
                    <button class="btn btn-primary" type="submit">Login</button>
                    <p>Anda belum punya akun? <a href="/register">Daftar</a></p>
                </form>
            </div>
        </div>
    </div>


</body>

</html>