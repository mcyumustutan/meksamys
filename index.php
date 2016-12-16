<?php ob_start();?>
<!doctype html>
<html>
<head>
<?php 

/*
/////////TODO/////////
#
# Tüm simgeler glyphicons ile değiştirilecek
#
#
#
#
#
/////////TODO/////////
*/

require("auth.php"); 
include_once("panel-html-head.php");


$MusterileriGetir_SQL="SELECT *  FROM  `tbl_musteriler` ORDER BY ID DESC LIMIT 0,5";
$GelenMusteriler=mysql_query($MusterileriGetir_SQL);


$UrunHizmetGetir_SQL="SELECT *  FROM  `tbl_hizmetler` ORDER BY ID DESC LIMIT 0,5";
$UrunHizmetMusteriler=mysql_query($UrunHizmetGetir_SQL);
?>
<title><?php echo $ProjeAdi?></title>

</head>
<body style="padding-top:50px;">
<?php include_once("navbar.php");?>

    <div class="container-fluid">
      <div class="row">
	<?php include("sidebar.php");?>
 
	<div class="col-md-9">
      <h1 class="page-header">Başlangıç Ekranı</h1>

<div class="well">
            	<div class="col-xs-4 col-sm-2">
					<img src="assets/images/icons/user1.png" width="128" height="128" class="img-responsive img-thumbnail" alt="<?php echo $ProjeAdi?>">
               </div>

				<div class="col-xs-7 col-sm-7">
               <span class="text-muted">Hoşgeldiniz:</span> <span><?php echo $_SESSION['SESS_FIRST_NAME'] . " " . $_SESSION['SESS_LAST_NAME'];?></span><br>
               <span class="text-muted">IP:</span> <span><?php echo $_SERVER['REMOTE_ADDR'] ." - "; echo gethostbyaddr($_SERVER['REMOTE_ADDR']); ?></span><br>
               <span class="text-muted">Server Bilgisi:</span> <span><?php echo $_SERVER['SERVER_SOFTWARE']?></span><br>
               <a class="btn btn-sm btn-primary " href="hesabim.php">Bilgilerinizi Güncelleyin</a>
               </div>
    <div class="clearfix"></div>
</div>



          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3">
			<img src="assets/images/icons/musteriler-icon.jpg" width="129" height="129" class="img-responsive img-thumbnail" alt="<?php echo $ProjeAdi?>">
				<h4>Müşteriler</h4>
              <span class="text-muted"><a class="btn btn-xs btn-primary" href="musteri-gor.php">Tümünü Görün</a></span><hr>
            </div>
            <div class="col-xs-6 col-sm-3">
			<img src="assets/images/icons/fihrist-icon.jpg" width="129" height="129" class="img-responsive img-thumbnail" alt="<?php echo $ProjeAdi?>">
				<h4>Adres ve Telefon Defteri</h4>
              <span class="text-muted"><a class="btn btn-xs btn-primary" href="fihrist.php">Tümünü Görün</a></span><hr>
            </div>
            <div class="col-xs-6 col-sm-3">
			<img src="assets/images/icons/ayarlar-icon.jpg" width="128" height="129" class="img-responsive img-thumbnail" alt="<?php echo $ProjeAdi?>">
				<h4>Ayarlar</h4>
              <span class="text-muted"><a class="btn btn-xs btn-primary" href="hesabim.php">Ayarlara Gidin</a></span><hr>
              </div>
            <div class="col-xs-6 col-sm-3">
			<img src="assets/images/icons/database.png" width="128" height="128" class="img-responsive img-thumbnail" alt="<?php echo $ProjeAdi?>">
				<h4>Yedekleme Modülü</h4>
              <span class="text-muted"><a class="btn btn-xs btn-primary" href="backup.php">Sistemi Yedekleyin</a></span><hr>
              </div>
      	 </div>
         
         
          <h2 class="sub-header">Hızlı Bilgiler</h2>


<div class="row">
        <div class="col-sm-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Son 5 Müşteri</h3>
            </div>
            <div class="panel-body"><a class="btn btn-sm btn-primary" href="musteri-ekle.php">Yeni Ekleyin</a> <a class="btn btn-sm btn-info" href="musteri-gor.php">Tümünü Görün</a><hr>
               <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Şirket/Müşteri Adı</th>
                  <th>Şirket Yetkilisi</th>
                  <th>Yetkili Kişi E-Posta</th>
                  <th>Şirket E-Posta</th>
                  <th>İşlemler</th>
                </tr>
              </thead>
              <tbody>
<?php
while($MusterilerBilgi = mysql_fetch_array($GelenMusteriler))
{ ?>
			<tr>
                  <td><?php echo $MusterilerBilgi[SirketAdi]?></td>
                  <td><?php echo $MusterilerBilgi[SirketSorumlusu]?></td>
                  <td><?php echo $MusterilerBilgi[SirketSorumluEposta]?></td>
                  <td><?php echo $MusterilerBilgi[SirketEposta]?></td>
                  <td>
                
              <form action="musteri-detay.php" method="post" enctype="multipart/form-data" name="IsEkle" class="form" style="float:left">
                    <input name="HangiSirket" type="hidden" value="<?php echo $MusterilerBilgi[ID]?>">
                    <input name="" type="submit" class="btn btn-xs btn-info" value="Detaylar" style="margin-right:2px;"> 
                    </form>
                    
              <form action="is-ekle.php" method="post" enctype="multipart/form-data" name="IsEkle" class="form" style="float:left">
                    <input name="HangiSirket" type="hidden" value="<?php echo $MusterilerBilgi[ID]?>">
                    <input name="" type="submit" class="btn btn-xs btn-primary" value="İş Ekleyin"  style="margin-right:2px;"> 
                    </form>
                                               
                  
                  </td>
                </tr>
<?php }	?>                      
              </tbody>
            </table>
          </div>
            </div>
          </div>
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Ürün / Hizmetler</h3>
            </div>
            <div class="panel-body"><a class="btn btn-sm btn-primary" href="hizmet-ekle.php">Yeni Ekleyin</a> <a class="btn btn-sm btn-info" href="hizmet-gor.php">Tümünü Görün</a><hr>
                          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Ürün/Hizmeti Adı</th>
                  <th>Özet</th>
                  <th>İşlemler</th>
                  </tr>
              </thead>
              <tbody>
<?php
while($UrunHizmetBilgi = mysql_fetch_array($UrunHizmetMusteriler))
{ ?>
				<tr>
                  <td><?php echo $UrunHizmetBilgi[HizmetAdi]?></td>
                  <td><?php echo $UrunHizmetBilgi[HizmetOzet]?></td>
                  <td>
              <form action="hizmet-detay.php" method="post" enctype="multipart/form-data" name="IsEkle" class="form" style="float:left">
                    <input name="HangiHizmet" type="hidden" value="<?php echo $UrunHizmetBilgi[ID]?>">
                    <input name="" type="submit" class="btn btn-xs btn-info" value="Detaylar" style="margin-right:2px;"> 
                    </form>
                    
              <form action="is-ekle.php" method="post" enctype="multipart/form-data" name="IsEkle" class="form" style="float:left">
                    <input name="HangiHizmet" type="hidden" value="<?php echo $UrunHizmetBilgi[ID]?>">
                    <input name="" type="submit" class="btn btn-xs btn-primary" value="Müşteriye Ekleyin"  style="margin-right:2px;"> 
                    </form>
                  
                  
                  </td>
                </tr>
<?php }	?>                      
              
              </tbody>
            </table>
          </div>
            </div>
          </div>
        </div><!-- /.col-sm-4 -->
        
        
        
        <div class="col-xs-12 col-sm-12 col-md-12">
                    <a href="hizmet-gor.php" class="list-group-item "><img src="assets/images/icons/gear32.png" width="24" height="24" class=""> Ürün/Hizmet Yönetimi</a>
                    <a href="musteri-gor.php" class="list-group-item"><img src="assets/images/icons/users32.png" width="24" height="24" class=""> Müşteri Yönetimi</a>
                    <a href="fihrist.php" class="list-group-item"><img src="assets/images/icons/contactbook32.png" width="24" height="24" class=" "> Adres ve Telefon Defteri</a>
                    <a href="yardim.php" class="list-group-item"><img src="assets/images/icons/questionbook32.png" width="24" height="24" class=" "> Tüm Yardım Belgeleri</a>
                    <a href="destek-masasi.php" class="list-group-item"><img src="assets/images/icons/spanner32.png" width="24" height="24" class=""> Destek Masası</a>                    
        </div>
        
        
        
      </div>  <!--row son -->
    
         
    
    
    </div><!--md9 son -->
    
    </div><!--row son --><hr>
    </div>

<?php include_once("footer.php");?>

</body>
</html>
<?php ob_end_flush();?>
