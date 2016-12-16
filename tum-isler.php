<?php ob_start();?>
<!doctype html>
<html>
<head>
<?php 
require("auth.php"); 

/*echo "Bu sayfada yapılacaklar <br>
1- Kayıt göstermi sıkıntılı ilişkisel SQL düzenlenecek<br>
2- şimdilik bu kadar	";*/

include_once("panel-html-head.php");


$MusterileriGetir_SQL="
SELECT  
	tbl_musteriler.ID, 
	tbl_musteriler.SirketAdi,
	tbl_hizmetler.ID, 
	tbl_hizmetler.HizmetAdi, 
	tbl_isler.IsID, 
	tbl_isler.MusteriID, 
	tbl_isler.HizmetID, 
	tbl_isler.IsMiktari, 
	tbl_isler.IsTutari
FROM 
	tbl_musteriler, 
	tbl_hizmetler, 
	tbl_isler 
WHERE 
	tbl_isler.MusteriID  = tbl_musteriler.ID 
AND 
	tbl_isler.HizmetID = tbl_hizmetler.ID  
ORDER BY 
	tbl_musteriler.SirketAdi";
//$GelenMusteriler=mysql_query($MusterileriGetir_SQL);


?>
<title><?php echo $ProjeAdi?></title>

</head>
<body style="padding-top:50px;">
<?php include_once("navbar.php");?>

    <div class="container-fluid">
      <div class="row">
	<?php include("sidebar.php");?>
 
	<div class="col-md-9">
          <h2 class="sub-header">Tüm İşler</h2>


<div class="row">
        <div class="col-sm-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Tüm İşler </h3>
            </div>
            
            <div class="panel-body">
            
            <?php
			if($_POST[Silinecek_is])
			{
				$SQL_Sil = "DELETE FROM `meksa-mys`.`tbl_isler` WHERE `tbl_isler`.`IsID` = $_POST[Silinecek_is]";
				$SilinenSirket_Bilgi=mysql_fetch_array(mysql_query($SQL_Sil)); 
				?>
				<div class="alert alert-success">
                <strong>Silme İşlemi Başarılı!</strong>
            </div> 
            <meta http-equiv="refresh" content="1;URL=musteri-gor.php">

			<?php };
			?>
            
            <p class="">(<?php echo $MusteriSayisi = mysql_num_rows($GelenMusteriler);?> adet kayıt var)</p>
          <!--  
            <a class="btn btn-sm btn-info" href="musteri-gor.php">Tüm Müşterileri Görün</a>
            <a class="btn btn-sm btn-info" href="hizmet-gor.php">Tüm Hizmetleri Görün</a>
-->
	 <div class="table-responsive">
            <!--<table class="table table-striped">
              <thead>
                <tr>
                  <th>Şirket/Müşteri Adı</th>
                  <th>Ürün/Hizmet Adı</th>
                  <th>İş Miktarı</th>
                  <th>İş Tutarı</th>
                  <th>İşlemler</th>
                </tr>
              </thead>
              <tbody>
<?php
while($MusterilerBilgi = mysql_fetch_array($GelenMusteriler))
{ ?>
				<tr>
             	 <td><?php echo $MusterilerBilgi[SirketAdi]?></td>
                  <td><?php echo $MusterilerBilgi[HizmetAdi]?></td>
                  <td><?php echo $MusterilerBilgi[IsMiktari]; $ToplamIsMiktari += $MusterilerBilgi[IsMiktari]?></td>
                  <td><?php echo $MusterilerBilgi[IsTutari]; $ToplamTutar += $MusterilerBilgi[IsTutari]?></td>
                  <td>
                    
              <form action="is-detaylari.php" method="post" enctype="multipart/form-data" name="IsEkle" class="form" style="float:left">
                    <input name="Hangi_Hizmet" type="hidden" value="<?php echo $MusterilerBilgi[HizmetID]?>">
                    <input name="Hangi_Musteri" type="hidden" value="<?php echo $MusterilerBilgi[MusteriID]?>">
                    <input name="Hangi_is" type="hidden" value="<?php echo $MusterilerBilgi[IsID]?>">
                    <input name="" type="submit" class="btn btn-xs btn-info" value="İş Detayları" style="margin-right:2px;" title="Bu işin bilgilerini günceleyin"> 
                    </form>
                    
                 <form action="tum-isler.php" method="post" enctype="multipart/form-data" name="IsEkle" class="form" style="float:left" >
                <input name="Silinecek_is" type="hidden" value="<?php echo $MusterilerBilgi[IsID]?>">
                <input name="" type="submit" class="btn btn-xs btn-danger" value="Silin" style="margin-right:2px;" onClick="return confirm('Bu işlemi geri alamazsınız, silmeye devam edelim mi?')"> 
            </form>              
                </td>
                </tr>

			<?php }	?>             
				<tr>
				  <td><strong>TOPLAM</strong></td>
				  <td>&nbsp;</td>
				  <td><strong><?php echo $ToplamIsMiktari?> Adet</strong></td>
				  <td><strong><?php echo $ToplamTutar?> TL</strong></td>
				  <td>&nbsp;</td>
				  </tr>                              
              </tbody>
            </table>-->
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
