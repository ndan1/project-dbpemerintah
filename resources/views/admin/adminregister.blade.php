<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- MDB --}}
    {{-- <link rel="icon" href="mdb/img/mdb-favicon.ico" type="image/x-icon" /> --}}
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <link rel="stylesheet" href="mdb/css/mdb.min.css" />
    <style>
        body{
            overflow-y: hidden;
        }
    </style>
    </head>
<body>
    <section class="form-container">
    <form action="{{route('registering.admin')}}" method="POST">
        @csrf
        <h1 class="mb-4 text-center">Admin Register</h1>
        {{-- Name Input --}}
        <div data-mdb-input-init class="form-outline mb-4">
            <input type="text" class="form-control @error('name_pegawai') is-invalid @enderror" id="name" name="name_pegawai" required>
            <label class="form-label" for="form2Example1">Name</label>
        </div>
        <!-- Email input -->
        <div data-mdb-input-init class="form-outline mb-4">
          <input type="email" id="form2Example2" class="form-control" name="email"/>
          <label class="form-label" for="form2Example2">Email address</label>
        </div>

        <!-- Password input -->
        <div data-mdb-input-init class="form-outline mb-4">
          <input type="password" id="form2Example3" class="form-control" name="password"/>
          <label class="form-label" for="form2Example3">Password</label>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-secondary btn-block mb-4">Sign up</button>
        {{-- <button type="submit" form="form1" value="Submit">Submit</button> --}}

      </form>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
{{-- MDB --}}
<script type="text/javascript" src="mdb/js/mdb.umd.min.js"></script>
</html>
