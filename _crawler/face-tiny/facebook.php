<?php

$i = (int)$argv[1];

	$durum = @file_get_contents("http://graph.facebook.com/".$i);

	$data = json_decode($durum);

	if($data->name != '' && $data->gender != '' && $data->locale != ''){

/*

		//Eski yöntemle depola
		$yol = '';

                foreach(str_split($data->id, 2) as $k)
                {
                        $yol .= $k.'/';
                }

                $dizin = "/var/www/face/data/".$yol;

                @mkdir($dizin, 0777, true);
                @mkdir($dizin."bilgi", 0777, true);
                @mkdir($dizin."resim", 0777, true);

                file_put_contents($dizin."bilgi/".$i.".txt", $durum);
                system("wget http://graph.facebook.com/".$i."/picture/?type=large -O ".$dizin."resim/".$i.".jpg > /dev/null");

		//Yeni yöntemle DB'ye aktar
	        @mysql_connect("localhost", "root", "berkant") or die("db error");
	        @mysql_select_db("vstc_face") or die("db error");
	        $data_for_insert = mysql_real_escape_string(json_encode($data));

		$data->id = mysql_real_escape_string($data->id);
	        $data->name = mysql_real_escape_string($data->name);
	        $data->first_name = mysql_real_escape_string($data->first_name);
	        $data->last_name = mysql_real_escape_string($data->last_name);
	        $data->link = mysql_real_escape_string($data->link);
	        $data->username = mysql_real_escape_string($data->username);
	        $data->gender = mysql_real_escape_string($data->gender);
	        $data->locale = mysql_real_escape_string($data->locale);

	        @mysql_query("INSERT INTO liste (id,name,first_name,last_name,link,username,gender,locale,data) VALUES (
'".$data->id."',
'".$data->name."',
'".$data->first_name."',
'".$data->last_name."',
'".$data->link."',
'".$data->username."',
'".$data->gender."',
'".$data->locale."',
'".$data_for_insert."'
)");

*/

//Bir kopyası ana makinaya:

//@file_get_contents("http://192.168.1.34/face/facebook-remote.php?id=".$i);
@file_get_contents("http://localhost/face/facebook-remote.php?id=".$i);

//Bir kopyası da sunucuya:

@file_get_contents("http://face-finder.com/v.php?id=".$i);


//İşaretçi
file_put_contents("/var/www/face-tiny/son_basarili_cekim", $i);

	}else{
		die();
	}
?>
