<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body style="overflow-y: hidden;">
    <div class="bg-mlg">
        <div class="card main-card">
                <div class="row">
                    <div class="col-5 side-image">
                        <h4 style="position: absolute; padding-left: 6vw;padding-top: 5vh;">Selamat Datang di Website <br>Pemerintah Kota Malang</h4>
                        <img src="{{asset('images/wallpaper.png')}}" alt="gambar" style="max-width:90vw;max-height:88.65vh;z-index:-1;background-size: cover; border-radius: 1px;">
                    </div>
                    <div class="col-7 side-form form-position">
                        <h2 class="mb-4" style="margin: 0 auto">LOGIN</h2>
                        @if (@session('error'))
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ session('error') }}</strong>
                                </span>

                        @endif
                        <form action="{{route('actionLogin')}}" method="POST" id="form1">
                            @csrf
                            <div class="input-group mb-3">
                                                    @if ($errors->any())
                        <div class="col-12">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        </div>

                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                                <span class="input-group-text">@</span>
                                <div class="form-floating">
                                  <input type="email" class="form-control" id="email" name="customer_email" placeholder="Email" required>
                                  <label for="email">Email</label>
                                </div>
                              </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
                                <div class="form-floating">
                                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                  <label for="password">Password</label>
                                </div>
                              </div>
                              <div class="register-button-position">
                                  <button type="submit" form="form1" value="Submit">Submit</button>
                                  <p>Apakah Anda belum memiliki akun? <a href="{{url('register')}}">Daftar</a></p>
                              </div>
                            </form>
                    </div>
                </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
