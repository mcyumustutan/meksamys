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
          <h2 class="sub-header">MEKSA-MBS Hakkında</h2>


<div class="row">
        <div class="col-sm-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Proje Ekibi</h3>
            </div>
            
            <div class="panel-body">

			<!-- col-xs telefon için col-sm tablet için col md desktop için-->
			<div class="col-xs-12 col-sm-12 col-md-12" >
            
                    <a href="#MCY" class="list-group-item "><span class="text-muted"> </span><strong> Mehmet Can YUMUŞTUTAN</strong></a>
                    <a href="#MCY" class="list-group-item "><span class="text-muted"> </span><strong> Kübra SARIOĞLU</strong></a>
                    <a href="#MCY" class="list-group-item "><span class="text-muted"> </span><strong> Arzu UYSAL</strong></a>
                    <a href="#MCY" class="list-group-item "><span class="text-muted"> </span><strong> Ezgül SOYSAL</strong></a>
                    <a href="#MCY" class="list-group-item "><span class="text-muted"> </span><strong> Sergen SINAR</strong></a>
            
            
            </div><!--col-xs-12 col-sm-10 col-md-8 -->
            </div><!--panel-body -->
          </div><!--panel panel-primary -->
          
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">MEKSA MYS</h3>
            </div>
            
            <div class="panel-body">

			<!-- col-xs telefon için col-sm tablet için col md desktop için-->
			<div class="col-xs-12 col-sm-12 col-md-12" >
            <ul class="list-group">
                   <li class="list-group-item">Program Sürümü: <?php echo $ProjeVersion?></li>
                   <li class="list-group-item">Sürüm Notları: <a href="assets/changelog.docx">Chaneglog</a></li>
                   <li class="list-group-item">Kullanım Koşulları: <a href="#">Kullanım Koşulları</a></li>
                   <li class="list-group-item">Lisans: <a href="#">GPL (Genel Kamu Lisansı) ile lisanslanmıştır.</a></li>
            </ul>
            
            </div><!--col-xs-12 col-sm-10 col-md-8 -->
            </div><!--panel-body -->
          </div><!--panel panel-primary -->          
        </div><!--col-sm-12 -->
        
        
        
        
      </div>  <!--row son -->
    
         
    
    
    </div><!--md9 son -->
    
    </div><!--row son --><hr>
    </div>

<?php include_once("footer.php");?>

</body>
</html>
<?php ob_end_flush();?>
