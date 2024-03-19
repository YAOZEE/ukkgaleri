<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman login</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link rel="stylesheet" href="sign-in.css">


    
  </head>
  <body class="d-flex align-items-center py-4 ">


    
<main class="form-signin w-100 m-auto">
  <form action="/login" method="POST">
    @csrf
    <h1 class="h3 mb-3 fw-normal text-center text-white"><b>LOGIN</b></h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="email" name="email" placeholder="email@example.com">
      <label for="email">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="password" name="password" placeholder="password">
      <label for="password">Password</label>
    </div>
    <button class="btn btn-primary w-100 py-2 mb-4" type="submit">Sign in</button>
    <p class="text-white">dont have account yet?<a href="/register" class="text-decoration-none"> click here.</a></p>
    <p class="mt-3 mb-3 text-white">&copy; Yao 2024</p>
  </form>
  
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
