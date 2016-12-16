<?php
	/*
	# MEHMET CAN YUMUSTUTAN
	# mehmetcy01@gmail.com
	# MEKSA-MBS (MEKSA Müşteri Bilgi Sistemi)
	Çalışma zamanım : NOT: sadece ne kadar zamanda yazdığımı bilmek için burada küçük bir kayıt tutuyorum :)
	1. Gün => Cuma 6:30 saat
	2. Gün => Cts. 3:30 saat
	3. Gün => Pzr. 3:50 saat
	
	Version Geçmişi tutulacak kıvama gelmiştir artık :)
	Bunun için changelog.docx dosyasına bakabilirsiniz.
	
	TODO
	-members scripitini geliştir
	
	bir hizmet silerken hizmetler tablosundan ve işler tablosundan ID ile silme işlemi yap
	bir müşteri silerken müşteriler ve işler tablosundan ID ile silme işlmei yap
	bir iş silerken sadece iş ID'si ile silme işlemi yap
	
	
	*/
error_reporting(0); 
$ProjeAdi = "MEKSA-MBS | Müşteri Bilgi Sistemi";
$ProjeVersion = "0.5";


	define('DB_HOST', 'localhost');
    define('DB_USER', 'root'); 
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'meksa');


	$VeritabaninaBaglan = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if (!$VeritabaninaBaglan){die('bağlanamadı: ' . mysql_error());}
	//else{echo "Baglanti olumlu";}
	
	$VeriTabaniSec = mysql_select_db(DB_DATABASE);
	if (!$VeriTabaniSec){die('veri tabanı seçilemedi: ' . mysql_error());}
	//else{echo "</br>VT Secildi";}	

	mysql_query("SET NAMES UTF8");
?>