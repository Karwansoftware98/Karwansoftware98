<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Examination Committe System</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:400,300'>
<link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'><link rel="stylesheet" href="./style.css">

</head>
<body>

<div class="cotn_principal">
<div class="cont_centrar">

  <div class="cont_login">
<div class="cont_info_log_sign_up">
      <div class="col_md_login">
<div class="cont_ba_opcitiy">

        <h2>LOGIN AS Teacher </h2>
  <p>    </p>
  <button class="btn_login" onclick="cambiar_login()">LOGIN</button>
  </div>
  </div>
<div class="col_md_sign_up">
<div class="cont_ba_opcitiy">
  <h2>LOGIN AS STUDENT</h2>


  <p></p>

  <button class="btn_sign_up" onclick="cambiar_sign_up()">LOG IN</button>
</div>
  </div>
       </div>


    <div class="cont_back_info">
       <div class="cont_img_back_grey">
       <img src="assets/images/University_of_Koya.png" alt="" />
       </div>

    </div>
<div class="cont_forms" >
    <div class="cont_img_back_">
       <img src="assets/images/University_of_Koya.png" alt="" />
       </div>
 <div class="cont_form_login">
<a href="#" onclick="ocultar_login_sign_up()" ><i class="material-icons">&#xE5C4;</i></a>
   <h2>LOGIN AS LEARNER </h2>
 <input type="email" placeholder="Username" />
<input type="password" placeholder="Password" />
<button class="btn_login" onclick="cambiar_login()">LOGIN</button>
  </div>

   <div class="cont_form_sign_up">
<a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
     <h2>LOGIN AS STUDENT </h2>

<input type="email" placeholder="Username" />
<input type="password" placeholder="Password" />

<button class="btn_sign_up" onclick="cambiar_sign_up()">LOGIN</button>

  </div>

    </div>

  </div>
 </div>
</div>

  <script  src="./script.js"></script>

</body>
</html>
