<!DOCTYPE html>
<!-- Code By Webdevtrick ( https://webdevtrick.com ) -->
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Password Strength Validator | Webdevtrick.com</title>
  <link href="https://fonts.googleapis.com/css?family=Muli:400,600&display=swap" rel="stylesheet">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css'>
<link rel="stylesheet" href="style.css">
<style>
/* Code By Webdevtrick ( https://webdevtrick.com ) */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body {
  font-family: 'Muli', sans-serif;
  font-size: 16px;
  /* color: #2c2c2c; */
}
body a {
  color: inherit;
  text-decoration: none;
}
.content {
  width: 95%;
  margin: 0 auto 50px;
  margin-top: 15%;
}
.password-strength {
  /* box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.14), 0 1px 10px 0 rgba(0, 0, 0, 0.12), 0 2px 4px -1px rgba(0, 0, 0, 0.3); */
}
.js-hidden {
  display: none;
}
.btn-outline-secondary {
  color: #28a745;
  /* border-color: #28a745; */
}
.btn-outline-secondary:hover {
  background: #28a745;
}
.text-muted {
    color: #6c757d!important;
}
</style>
</head>

<body>
 
<div class="content">
  <div class="content__inner">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 m-auto">
          <form class="password-strength form p-4">
            <h3 class="form__title text-center mb-4">Enter the Password</h3>
            <div class="form-group">
              <label for="password-input">Password</label>
              <div class="input-group">
                <input class="password-strength__input form-control" type="password" id="password-input" aria-describedby="passwordHelp" placeholder="Enter password"/>
                <div class="input-group-append">
                  <button class="password-strength__visibility btn btn-outline-secondary" type="button"><span class="password-strength__visibility-icon" data-visible="hidden"><i class="fas fa-eye-slash"></i></span><span class="password-strength__visibility-icon js-hidden" data-visible="visible"><i class="fas fa-eye"></i></span></button>
                </div>
              </div><small class="password-strength__error text-danger js-hidden">This symbol is not allowed!</small><small class="form-text text-muted mt-2" id="passwordHelp">Add 9 charachters or more, lowercase letters, uppercase letters, numbers and symbols to make the password really strong!</small>
            </div>
            <div class="password-strength__bar-block progress mb-4">
              <div class="password-strength__bar progress-bar bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <button class="password-strength__submit btn btn-success d-flex m-auto" type="button" disabled="disabled">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
 
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js'></script>
<script  src="js/function.js"></script>
 
</body>
</html>