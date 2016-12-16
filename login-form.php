<?php  ob_start(); ?>

<!doctype html>
<html>
<head>
<?php include_once("panel-html-head.php");?>
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

      <form class="form-signin" role="form" action="login-exec.php" method="post" enctype="multipart/form-data">
<img src="assets/images/logo-big.png" width="290" height="290">
        <input name="login" type="text" autofocus required class="form-control" id="login" placeholder="Kullancı Adı">
        <input name="password" type="password" required class="form-control" id="password" placeholder="Şifre">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Giriş</button>
      </form>
    </div> <!-- /container -->

    <div id="footer">
      <div class="container">
        <p class="text-muted"> <a href="#" class="btn btn-xs btn-link">Şifremi Unuttum</a> <a href="#" class="btn btn-xs btn-link">Kullanım Koşulları</a>      
</p>
      </div>
    </div>


</body>
</html>
<?php ob_end_flush();?>
