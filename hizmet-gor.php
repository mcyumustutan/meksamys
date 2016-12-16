<?php ob_start();?>
<!doctype html>
<html>
<head>
<?php 
require("auth.php"); 
include_once("panel-html-head.php");


$UrunHizmetGetir_SQL="SELECT *  FROM  `tbl_hizmetler` ORDER BY ID DESC ";
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
          <h2 class="sub-header">Ürün / Hizmetler</h2>


<div class="row">
        <div class="col-sm-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Ürün / Hizmetler</h3>
            </div>
            
            <div class="panel-body">
            
                        <?php
				if($_POST[SilinecekHizmet])
				{
				$SQL_Sil = "DELETE FROM  `tbl_hizmetler` WHERE `tbl_hizmetler`.`ID` = $_POST[SilinecekHizmet]";
				$SilinenSirket_Bilgi=mysql_fetch_array(mysql_query($SQL_Sil)); 
				//  Bir hizmet silinnce işler tablosundan hizmet id eşit olanlar silnecel
				$SQL_SilHizmet = "DELETE FROM  `tbl_isler` WHERE `tbl_isler`.`HizmetID` = $_POST[SilinecekSirket]";
				$SilinenHizmet_Bilgi=mysql_fetch_array(mysql_query($SQL_SilHizmet)); 

				?>
				<div class="alert alert-success">
                <strong>Silme İşlemi Başarılı!</strong>
                </div> 
                <meta http-equiv="refresh" content="1;URL=hizmet-gor.php">

			<?php };
			?>
            
            
             <p class="">(<?php echo $HizmetSayisi = mysql_num_rows($UrunHizmetMusteriler);?> adet kayıt var)</p>
            <a class="btn btn-sm btn-primary" href="hizmet-ekle.php">Yeni Ürün / Hizmetler Ekleyin</a>

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
        
        
        
        
      </div>  <!--row son -->
    
         
    
    
    </div><!--md9 son -->
    
    </div><!--row son --><hr>
    </div>

<?php include_once("footer.php");?>

</body>
</html>
<?php ob_end_flush();?>
