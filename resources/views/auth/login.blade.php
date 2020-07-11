<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">

       <!-- CSRF Token -->
       <meta name="csrf-token" content="{{ csrf_token() }}">
       <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo.jpeg') }}" />


       <title>DGPJ</title>

       <!-- Scripts -->
       <script src="{{ asset('js/app.js') }}" defer></script>

       <!-- Fonts -->
       <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
       <link href="https://fonts.googleapis.com/css?family=Merriweather|Ubuntu&display=swap" rel="stylesheet">

       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

       <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow:wght@700&display=swap" rel="stylesheet">


       <!-- Styles -->
       <link href="{{ asset('css/app.css') }}" rel="stylesheet">
       <link href="{{ asset('css/login.css') }}" rel="stylesheet">

   </head>
   <body>

      <div class="row mx-1">
         <div class="col-md-5" id="presentacion">
            <div class="text-center">
               <img class="align-self-center" src="{{ asset('images/secretaria_justicia.png') }}" id="logo">
            </div>
            <div class="d-flex justify-content-center text-center">
                  <h1 class="display-5" id="title">Dirección General de Personas Jurídicas</h1>    
            </div>
                        
            <div class="login-main-text">
               <h2>PJadmin v 1.0 <br> </h2>
               <h3>Sistema de Seguimiento de Legajos</h3>
               <p>Iniciar Sección para acceder.</p>
            </div>
         </div>
         <div class="col-md-7 my-3">
            <div class="centrar">
               <div class="col-md-6 col-sm-12">
                  <div class="login-form">
                     <h2 style="font-family: 'Archivo Narrow', sans-serif;">Iniciar Sección</h2>
                     <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                           <label><strong>Correo Electrónico</strong></label>
                           <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Ingresé Email">
                           @error('email')
                           <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label><strong>Contraseña</strong></label>
                           <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Ingresé Contraseña">
                           @error('password')
                           <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        <button type="submit" class="btn btn-black">Ingresar</button>
                     </form>
                  </div>
               </div>
            </div>  
         </div>   
      </div>

   </body>
</html>




   