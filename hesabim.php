<?php ob_start();?>
<!doctype html>
<html>
<head>
<?php 
require("auth.php"); 
include_once("panel-html-head.php");
?>
<title><?php echo $ProjeAdi?></title>

</head>
<body style="padding-top:50px;">
<?php include_once("navbar.php");?>

    <div class="container-fluid">
      <div class="row">
	<?php include("sidebar.php");?>
 
	<div class="col-md-9">
          <h2 class="sub-header">Hesabınızı Yönetim</h2>


<div class="row">
        <div class="col-sm-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $_SESSION['SESS_FIRST_NAME'] . " " . $_SESSION['SESS_LAST_NAME'];?></h3>
            </div>
            
            <div class="panel-body">

			<!-- col-xs telefon için col-sm tablet için col md desktop için-->
			<div class="col-xs-12 col-sm-10 col-md-8">
            

            	<div class="col-xs-4 col-sm-2">
					<img src="assets/images/icons/user1.png" width="128" height="128" class="img-responsive img-thumbnail" alt="<?php echo $ProjeAdi?>">
               </div>

				<div class="col-xs-7 col-sm-7">
               <span class="text-muted">Hoşgeldiniz:</span> <span><?php echo $_SESSION['SESS_FIRST_NAME'] . " " . $_SESSION['SESS_LAST_NAME'];?></span><br>
               <span class="text-muted">IP:</span> <span><?php echo $_SERVER['REMOTE_ADDR'] ." - "; echo gethostbyaddr($_SERVER['REMOTE_ADDR']); ?></span><br>
               <span class="text-muted">Server Bilgisi:</span> <span><?php echo $_SERVER['SERVER_SOFTWARE']?></span><br>



                
</div>
            
            
            </div>
            </div>
          </div>
        </div><!-- /.col-sm-4 -->
        
              <div class="col-sm-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Bilgileriniz</h3>
            </div>
            
            <div class="panel-body">

			<!-- col-xs telefon için col-sm tablet için col md desktop için-->
			<div class="col-xs-12 col-sm-10 col-md-8">
            <?php 
			if($_POST[Olay] == "Guncelle"){
			echo $MusteriEkle_SQL = "
				UPDATE  `meksa-mys`.`members` SET  
				`firstname` =  '$_POST[Ad]',
				`lastname` =  '$_POST[SoyAd]',
				`login` =  '$_POST[username]',
				`passwd` =  '".md5($_POST[password])."' WHERE  `members`.`member_id` =$_POST[Kim];

			";
			if(mysql_query($MusteriEkle_SQL)){
			?>
            <div class="alert alert-success">
                <strong>Güncelleme İşlemi Başarılı! Şimdi "OTOMATİK ÇIKIŞ" yapacaksınız.</strong>
                <meta http-equiv="refresh" content="1;URL=logout.php">

            </div> 
            <?php }
			else { ?>     
            <div class="alert alert-danger">
                <strong>Güncelleme İşlemi Başarısız!</strong> <?php echo mysql_error();?>
            </div>            
            <?php }//sorgu kontrol 
			}//post kontrol ?>      

<?php
//Kullanıcı bilgilerini çeken kodlar $_SESSION['SESS_MEMBER_ID']
$Bilgiler_SQL="SELECT *  FROM  `members` WHERE  `member_id` ='$_SESSION[SESS_MEMBER_ID]'  ";
$Bilgiler=mysql_query($Bilgiler_SQL);
$fetch = mysql_fetch_array($Bilgiler)
?>
            
            <form action="hesabim.php" method="post" enctype="multipart/form-data" name="BilgiGuncelle" class="form" >
            <input name="Olay" type="hidden" value="Guncelle">
			<input name="Kim" type="hidden" value="<?php echo $_SESSION[SESS_MEMBER_ID]?>">
      
            <label for="Ad">Görünen Ad</label>
            <input type="text" name="Ad" id="Ad"  class="form-control" placeholder="Görünen Ad" value="<?php echo $fetch[firstname]?>" required>
            
            <label for="SoyAd">Görünen Soyad</label>
            <input type="text" name="SoyAd" id="SoyAd" class="form-control" placeholder="Görünen Soyad" value="<?php echo $fetch[lastname]?>" >

			<label for="Kullanıcı Adı">Kullanıcı Adı</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Kullanıcı Adı" value="<?php echo $fetch[login]?>" required>


			<label for="Kullanıcı Adı">Yeni Şifre</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Şifreniz" value="" required>

                    
            
            <input name="" type="submit" value="Güncelleyin" class="btn btn-sm btn-success"> <input  class="btn btn-sm btn-danger" name="" type="reset" value="Vazgeçin">
			</form>
            </div>
            </div>
          </div>
        </div><!-- /.col-sm-4 -->
        
        
      </div>  <!--row son -->
    
         
    
    
    </div><!--md9 son -->
    
    </div><!--row son --><hr>
    </div>

<?php include_once("footer.php");?>

</body>
</html>
<?php ob_end_flush();?>
