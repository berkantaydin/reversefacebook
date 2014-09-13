<?php

$i = (int)$_GET['id'];

	$durum = @file_get_contents("http://graph.facebook.com/".$i);

	$data = json_decode($durum);

//print_r($data);die();
	if($data->name != '' && $data->gender != '' && $data->locale != ''){

	        @mysql_connect("tunnel.pagodabox.com:3306", "ann", "HypAIruV") or die("db error1");
	        @mysql_select_db("bari") or die("db error2");
	        $data_for_insert = mysql_real_escape_string(json_encode($data));

		$data->id = mysql_real_escape_string($data->id);
	        $data->name = mysql_real_escape_string($data->name);
	        $data->first_name = mysql_real_escape_string($data->first_name);
	        $data->last_name = mysql_real_escape_string($data->last_name);
	        $data->link = mysql_real_escape_string($data->link);
	        $data->username = mysql_real_escape_string($data->username);
	        $data->gender = mysql_real_escape_string($data->gender);
	        $data->locale = mysql_real_escape_string($data->locale);

	        @mysql_query("INSERT INTO liste (id,name,first_name,last_name,link,username,gender,locale) VALUES (
'".$data->id."',
'".$data->name."',
'".$data->first_name."',
'".$data->last_name."',
'".$data->link."',
'".$data->username."',
'".$data->gender."',
'".$data->locale."'
)");

echo "OK -> $i\n";
die();

	}else{
		die();
	}
?>
