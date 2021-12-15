
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Examination Committee System</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:400,300'>
<link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'><link rel="stylesheet" href="./style.css">

</head>
<body>

<div class="cotn_principal" >
<div class="cont_centrar" >

  <div class="cont_login">
<div class="cont_info_log_sign_up">
      <div class="col_md_login">
<div class="cont_ba_opcitiy">

        <h2>Login As Teacher </h2>
  <p>    </p>
  <button class="btn_login" onclick="cambiar_login()">Log in</button>
  </div>
  </div>
<div class="col_md_sign_up">
<div class="cont_ba_opcitiy">
  <h2>Login As Student</h2>


  <p></p>

  <button class="btn_sign_up" onclick="cambiar_sign_up()">Log in</button>
</div>
  </div>
       </div>


    <div class="cont_back_info" >
       <div class="cont_img_back_grey">
       <img src="assets/images/University_of_Koya.png" alt="" />
       </div>

    </div>
<div class="cont_forms" >
    <div class="cont_img_back_">
       <img src="assets/images/University_of_Koya.png" alt="" />
       </div>
       <form method="POST" action="{{route('login.teacher')}}">
        @csrf

 <div class="cont_form_login">
<a href="#" onclick="ocultar_login_sign_up()" ><i class="material-icons">&#xE5C4;</i></a>
   <h2>Login As Teacher </h2>

 <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
 @error('email')
 <span class="invalid-feedback" role="alert">
     <strong>{{ $message }}</strong>
 </span>
@enderror



 <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password" />
 @error('password')
 <span class="invalid-feedback" role="alert">
     <strong>{{ $message }}</strong>
 </span>
@enderror


<button type="submit" class="btn_login">
    {{ __('Login') }}
</button>

  </div>
</form>

<form method="POST" action="{{route('login.student')}}">
    @csrf
   <div class="cont_form_sign_up">
<a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
     <h2>Login As Student </h2>

     <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
     @error('email')
     <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
     </span>
 @enderror
     <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password" />
     @error('password')
     <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
     </span>
 @enderror


     <button type="submit" class="btn_login">
        {{ __('Login') }}
    </button>

      </div>
    </form>

    </div>

  </div>
 </div>
</div>

  <script  src="./script.js"></script>

</body>
</html>
