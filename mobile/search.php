<?php
$kelime = $_GET['search'];

if (strlen($kelime) < 2)
    @header("location: /mobile/");

$link = @mysql_connect("127.0.0.1", "ann", "HypAIruV");
if (!$link) {
//    die("DB Connection Problem");
    $link = @mysql_connect("localhost", "root", "berkant");

    @mysql_select_db("facefinder", $link) or die("DB Selection Problem");
    if (!$link) {
        die("DB Connection Problem");
    }
} else {
    @mysql_select_db("bari", $link) or die("DB Selection Problem");
}

include('lokasyon.php');

//Sayfa Adresini Cikar
include('./ba_cevir.php');
$pageurl = "/mobile/";
foreach (str_split($bilgi->id, 2) as $k) {
    $pageurl .= $k . '/';
}
$name = ba_cevir($bilgi->name);
$pageurl .= $name .= ($name == '') ? 'x' : '';
$pageurl .= ".html";

$tmp_kelime = str_replace(" ", "%", $kelime);

$toplam = @mysql_query("SELECT count(*) FROM liste WHERE name LIKE '%" . mysql_real_escape_string($tmp_kelime) . "%' ORDER BY 'primary' DESC");
$toplam = mysql_fetch_row($toplam);
$toplam = (int) $toplam[0];

$sayfa = (int) $_GET['s'];

if (($sayfa < 1) || ($sayfa - 1) > round($toplam / 10))
    $sayfa = 1;

$results = @mysql_query("SELECT id,name FROM liste WHERE name LIKE '%" . mysql_real_escape_string($tmp_kelime) . "%' ORDER BY 'primary' DESC LIMIT " . ($sayfa - 1) . ", 10");
$sonuc_toplam = 0;
$sonuc = '';
while ($row = @mysql_fetch_array($results)) {

    $r_v_id = $row['id'];
    $r_v_title = str_replace(array('"', "'"), array('', ''), $row['name']);
    $r_v_img = "//graph.facebook.com/" . $r_v_id . "/picture?type=square";
    $r_p_url = ba_cevir_url($r_v_id, $r_v_title);

    $sonuc .= '<li><a href="' . $r_p_url . '"><img style="padding-top:10px;padding-left:10px;" src="' . $r_v_img . '" />' . $row['name'] . '</a></li>';
    $sonuc_toplam++;
}

if ($toplam < 1) {
    $toplam = "~";
    $sonuc = "<li>Not yet!</li>";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
    <title>Face Finder</title>
    <meta name="viewport" content="width=device-width, height=device-height, user-scalable=no" />
    <link rel="stylesheet" href="/mobile/jquery.mobile-1.1.0.min.css" />
    <script data-cfasync="false" src="/mobile/jquery-1.7.2.min.js"></script>
    <script data-cfasync="false" src="/mobile/jquery.mobile-1.1.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $( "#slider-fill" ).change(function() {
                var s = $(this).val();
                window.location.href = window.location.pathname + "?search=<?= urlencode($kelime) ?>&s=" + s;
            });
        });
    </script>

    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-33898084-1']);
        _gaq.push(['_setDomainName', 'none']);
	_gaq.push(['_setAllowLinker', true]);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

    </script>
</head>
<body>
<div data-role="page" id="index">

    <div data-role="header" data-position="inline" data-theme="b">
        <a href="/mobile/#index" data-icon="home" data-direction="reverse" data-iconpos="notext"></a>
        <h1>Face Finder</h1>
    </div><!-- /header -->

    <div data-role="content">
        <div data-role="fieldcontain">
            <form action="search.php" method="get">
                <label for="search">Whose Face?</label>
                <input type="search" name="search" id="search" value="<?= ($kelime != "") ? $kelime : "" ?>" placeholder="eg: James Bond" />

                <? if ($kelime != "") { ?>
                    <div style="height:20px;"></div>

                    <label for="slider-fill">Page Slider</label>
                    <input type="range" name="s" id="slider-fill" value="<?= $sayfa ?>" min="1" max="<?= round($toplam / 10) + 1 ?>" data-highlight="true" />
                    <input type="submit" name="submit" value="Go" />

                <? } ?>

            </form>
        </div>

        <div style="height:20px;">&nbsp;</div>

        <div id="sponsor" style="padding-bottom:20px;margin-left:-15px;margin-right: -15px;">
            <script type="text/javascript"><!--
                google_ad_client = "ca-pub-2117122105352979";
                /* face-finder.com-mobile */
                google_ad_slot = "6783680096";
                google_ad_width = 320;
                google_ad_height = 50;
                //-->
            </script>
            <script type="text/javascript"
                    src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
            </script>
        </div>

        <div class="liste">
            <ul data-role="listview">

                <li data-role="list-divider">Page <?= $sayfa ?> of about <?= $toplam ?> results</li>

                <?= $sonuc ?>
            </ul>
        </div>

        <div id="sponsor" style="padding-top:20px;margin-left:-15px;margin-right: -15px;">
            <script type="text/javascript"><!--
                google_ad_client = "ca-pub-2117122105352979";
                /* face-finder.com-mobile */
                google_ad_slot = "6783680096";
                google_ad_width = 320;
                google_ad_height = 50;
                //-->
            </script>
            <script type="text/javascript"
                    src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
            </script>
        </div>

    </div><!-- /content -->

    <div data-role="footer" data-theme="b">
        <div data-role="navbar">
            <ul>
                <li><a href="/mobile/#index" data-icon="search">Search</a></li>
                <li><a href="mailto:vstcmail@gmail.com?subject=FaceFinderApp" data-icon="info">Contact Us</a></li>
                <li><a href="/mobile/#settings" data-icon="gear">Settings</a></li>

            </ul>
        </div><!-- /navbar -->
    </div><!-- /footer -->

</div><!-- /page index -->

<div data-role="page" id="settings">

    <div data-role="header" data-position="inline" data-theme="b">
        <a href="/mobile/#index" data-icon="home" data-direction="reverse" data-iconpos="notext"></a>
        <h1>Face Finder</h1>
    </div><!-- /header -->

    <div data-role="content">

        <p><h2>What is Face Finder ?</h2>Face Finder, always search the internet and collect human information for you. Face Finder, Can not guarantee the accuracy of information.</p>

    </div><!-- /content -->

    <div data-role="footer" data-position="fixed" data-theme="b">
        <div data-role="navbar">
            <ul>
                <li><a href="/mobile/#index" data-icon="search">Search</a></li>
                <li><a href="mailto:vstcmail@gmail.com?subject=FaceFinderApp" data-icon="info">Contact Us</a></li>
                <li><a href="/mobile/#settings" data-icon="gear">Settings</a></li>

            </ul>
        </div><!-- /navbar -->
    </div><!-- /footer -->

</div><!-- /page - settings -->

</body>
</html>
