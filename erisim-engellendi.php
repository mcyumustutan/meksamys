<?php  ob_start(); 
include_once("panel-html-head.php");?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">

<style type="text/css">
#footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  /* Set the fixed height of the footer here */
  height: 60px;
}
.container {
  width: auto;
  max-width: 350px;
  padding: 0 15px;
}
.container .text-muted {
  margin: 20px 0;
}

</style>

<title><?php echo $ProjeAdi?></title>

</head>

<body>

<?php //echo md5(e66f3bab)?>

    <div class="container">

      <form class="form-signin" role="form" action="login-exec.php" method="post">
<img src="assets/images/logo-big.png" width="290" height="212"><br>
<br>
<h2>Kullanıcı adı veya Şifre yanlış</h2><br>

        <input name="login" type="text" autofocus required class="form-control" id="login" placeholder="Kullancı Adı">
        <input name="password" type="password" required class="form-control" id="password" placeholder="Şifre">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Giriş</button>
      </form>
    </div> <!-- /container -->

    <div id="footer">
      <div class="container">
        <p class="text-muted"> <a href="#" class="btn btn-xs btn-link">Şifremi Unuttum</a> <a href="#" class="btn btn-xs btn-link">Kullanım Koşullar</a>      
</p>
      </div>
    </div>


</body>
</html>
<?php ob_end_flush();?>
