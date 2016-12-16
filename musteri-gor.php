<?php ob_start();?>
<!doctype html>
<html>
<head>
<?php 
require("auth.php"); 
include_once("panel-html-head.php");


$MusterileriGetir_SQL="SELECT *  FROM  `tbl_musteriler` ORDER BY ID DESC";
$GelenMusteriler=mysql_query($MusterileriGetir_SQL);


?>
<title><?php echo $ProjeAdi?></title>

</head>
<body style="padding-top:50px;">
<?php include_once("navbar.php");?>

    <div class="container-fluid">
      <div class="row">
	<?php include("sidebar.php");?>
 
	<div class="col-md-9">
          <h2 class="sub-header">Müşteriler</h2>


<div class="row">
        <div class="col-sm-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Müşteriler </h3>
            </div>
            
            <div class="panel-body">
            
            <?php
			if($_POST[SilinecekSirket])
			{
				$SQL_Sil = "DELETE FROM  `tbl_musteriler` WHERE `tbl_musteriler`.`ID` = $_POST[SilinecekSirket]";
				$SilinenSirket_Bilgi=mysql_fetch_array(mysql_query($SQL_Sil)); 
				//  Bir müşteri silinince işler tablosundan o müşteriye yapılan işler de silinecek.
				$SQL_SilHizmet = "DELETE FROM `meksa-mys`.`tbl_isler` WHERE `tbl_isler`.`MusteriID` = $_POST[SilinecekSirket]";
				$SilinenHizmet_Bilgi=mysql_fetch_array(mysql_query($SQL_SilHizmet)); 
				?>
				<div class="alert alert-success">
                <strong>Silme İşlemi Başarılı!</strong>
            </div> 
            <meta http-equiv="refresh" content="1;URL=musteri-gor.php">

			<?php };
			?>
            
            <p class="">(<?php echo $MusteriSayisi = mysql_num_rows($GelenMusteriler);?> adet kayıt var)</p>
            
            <a class="btn btn-sm btn-primary" href="musteri-ekle.php">Yeni Müşteri Ekleyin</a>

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
      </div><!-- /.col-sm-4 -->
        
        
        
        
      </div>  <!--row son -->
    
         
    
    
    </div><!--md9 son -->
    
</div><!--row son --><hr>
    </div>

<?php include_once("footer.php");?>

</body>
</html>
<?php ob_end_flush();?>
