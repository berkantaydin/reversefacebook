<?php
//--başlat
//nohup php /var/www/face-tiny/cekici.php > /dev/null 2>&1 &
//Burada internet baglantısı sınanacak.
//Bunun için fsockopen'a timeout verilerek uptime yuksek bir kaç adres denenecek
//Örneğin google.com.tr
//Sonuca göre devam edilecek.
//Zira RC.LOCAL kaydı; internet yokken açılışı engelliyor

$i = ((isset($argv[1])) ? (int)$argv[1] : 0);

if($i < 1){
	$i = (int)file_get_contents("/var/www/face-tiny/xnow");
	$i = $i + 5;
}

//Fark sayacı sıfırlanıyor yani $i eşitleniyor.
file_put_contents("/var/www/face-tiny/son_basarili_cekim", $i);

while(1 == 1){

$toplam = system('ps ax | grep "facebook.php" | wc -l');

if($toplam > 20)
	sleep(5);

sleep(2);

//usleep(700000);

$sbc = (int)file_get_contents("/var/www/face-tiny/son_basarili_cekim");

if(($i - $sbc) > 70) //Aradaki fark 70'den büyükse yukarı yuvarla - 4711185 SONRASINDA OLUSTURULDU
{
	$i = substr($i, 0, -3);
	$i = ($i + 1) * 1000;
	sleep(30); //30 saniye bekle ki diğer betikler bir durulsun
	file_put_contents("/var/www/face-tiny/son_basarili_cekim", $i);
}

system("php /var/www/face-tiny/facebook.php $i > /dev/null 2>&1 &");

file_put_contents("/var/www/face-tiny/xnow", "\n".$i."\n");

//--------------------------------------------------------//
//Basarisizlik durumuna gore imleci kaydir - Bu ozellik 7000048 nolu kayittan itibaren aktif edildi
//$enson = (int)@file_get_contents('xson_basarili'); //En son alinan basarili kaydi oku
//if(($i - $enson) > 100) //Arada 100 tane bos kayit varsa
//	$i = ($i + 50); //Imleci 100 rakam ileri at
//--------------------------------------------------------//

//echo "$i\n";

/* Birlestirmek icin
for i in `ls sitemap-sba*`; do cat $i >> kaynak.txt; done
*/

/* Ayristirmak icin
split -d -a 5 -l 50000 kaynak.txt sitemap-sba-
*/

/* Arka planda calistirmak icin
php cekici.php 2704561 > /dev/null 2>&1 &
*/

/* Arka planda upload icin
nohup ncftpput -R -v -u "vstc" -p "sifre" vs.tc /www/face/ . >/dev/null 2>&1 &
önce hedefdeki klasör adresi sonra localdeki klasör adresi yazılıyor.
*/

/*
ncftpput -m -u vstc -p hv%BkGzA2j vs.tc /public_html/face/ *.zip
*/

//die();
$i++;
}
