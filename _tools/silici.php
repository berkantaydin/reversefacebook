<?php

die;

$id = (int) $argv[1];
if ($id < 1)
    exit("\nArguman Eksik\n");

include("/var/www/face/reddedilenler.txt");

if (!is_array($reddedilenler))
    exit("\nDosya okunamadı.\n");

$reddedilenler[] = (int) $id;
asort($reddedilenler);
$reddedilenler = array_unique($reddedilenler);

$data = "<?\n\$reddedilenler = array(\n";
$data .= implode(",\n", $reddedilenler);
$data .= "\n);\n";

$yaz = file_put_contents("/var/www/face/reddedilenler.txt", $data);

if($yaz !== FALSE)
{
    shell_exec("ncftpput -m -u vstc -p hv%BkGzA2j vs.tc /public_html/face-finder.com/ /var/www/face/reddedilenler.txt");
}

/*
// Birikenleri silme
DELETE FROM liste WHERE id IN (
sayilar,
sayilar,
sayilar
);

#Information Removed. Sorry for inconvenience.
*/
