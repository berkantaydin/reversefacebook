<?php
error_reporting(0);

$i = $_GET['id'];

//Sayfa Adresini Cikar
include('./ba_cevir.php');

if (strlen($i) < 1)
    die;

$i = id_from_genid($i);

//id kontrol
$i = (int) $i;
if ($i < 1)
    die();

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

$query = @mysql_query("SELECT * FROM liste WHERE id='$i'");

if (!$query)
    die();

$data = @mysql_fetch_object($query);

if (!($data->id > 0)) //MySQL'de varsa
    die();

$bilgi = $data;

include('lokasyon.php');

$pageurl = ba_cevir_url($bilgi->id, $bilgi->name);


$same_lastname = @mysql_query("SELECT id,name FROM liste WHERE last_name = '" . mysql_real_escape_string($bilgi->last_name) . "' AND id != '" . (int) $bilgi->id . "' ORDER BY id DESC LIMIT 10");
$table_same_lastname_total = 0;
$table_same_lastname = '';
while ($row = @mysql_fetch_array($same_lastname)) {

    $r_v_id = $row['id'];
    $r_v_title = str_replace(array('"', "'"), array('', ''), $row['name']);
    $r_v_img = "//graph.facebook.com/" . $r_v_id . "/picture?type=square";
    $r_p_url = ba_cevir_url($r_v_id, $r_v_title);

    $table_same_lastname .= '<li><a href="' . $r_p_url . '"><img style="padding-top:10px;padding-left:10px;" src="' . $r_v_img . '" />' . $row['name'] . '</a></li>';
    $table_same_lastname_total++;
}

$same_firstname = @mysql_query("SELECT id,name FROM liste WHERE first_name = '" . mysql_real_escape_string($bilgi->first_name) . "' AND id != '" . (int) $bilgi->id . "' ORDER BY id DESC LIMIT 10");
$table_same_firstname_total = 0;
$table_same_firstname = '';
while ($row = @mysql_fetch_array($same_firstname)) {

    $r_v_id = $row['id'];
    $r_v_title = str_replace(array('"', "'"), array('', ''), $row['name']);
    $r_v_img = "//graph.facebook.com/" . $r_v_id . "/picture?type=square";
    $r_p_url = ba_cevir_url($r_v_id, $r_v_title);

    $table_same_firstname .= '<li><a href="' . $r_p_url . '"><img style="padding-top:10px;padding-left:10px;" src="' . $r_v_img . '" />' . $row['name'] . '</a></li>';
    $table_same_firstname_total++;
}


@mysql_close($link);
unset($data, $link);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
    <title><?= $bilgi->name ?></title>
    <meta name="viewport" content="width=device-width, height=device-height, user-scalable=no" />
    <link rel="stylesheet" href="/mobile/jquery.mobile-1.1.0.min.css" />
    <script data-cfasync="false" src="/mobile/jquery-1.7.2.min.js"></script>
    <script data-cfasync="false" src="/mobile/jquery.mobile-1.1.0.min.js"></script>

    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-33898084-1']);
        _gaq.push(['_setDomainName', 'none']);
        _gaq.push(['_setAllowLinker', true]);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();

    </script>
</head>

<body>
<div data-role="page" id="index">

    <div data-role="header" data-position="inline" data-theme="b">
        <a href="/mobile/" data-icon="home" data-direction="reverse" data-iconpos="notext"></a>
        <h1><?= $bilgi->name ?></h1>
    </div><!-- /header -->

    <div data-role="content">
        <center>
            <img src="//graph.facebook.com/<?= $i ?>/picture?type=large" title="<?= $bilgi->name ?>" alt="Photo of <?= $bilgi->name ?>" id="pic"/>
        </center>

        <div style="padding-top:20px;">&nbsp;</div>

        <div class="bilgiler">
            <ul data-role="listview">
                <li data-role="list-divider">File Number</li>
                <li><?= $bilgi->id ?></li>
                <li data-role="list-divider">Name</li>
                <li><?= $bilgi->name ?></li>
                <li data-role="list-divider">First Name</li>
                <li><?= $bilgi->first_name ?></li>
                <li data-role="list-divider">Last Name</li>
                <li><?= $bilgi->last_name ?></li>
                <li data-role="list-divider">Gender</li>
                <li><?= $bilgi->gender ?></li>
                <li data-role="list-divider">Language</li>
                <li><?= ((!array_key_exists($bilgi->locale, $lokasyon)) ? $bilgi->locale : $lokasyon[$bilgi->locale]) ?></li>
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
                <li><a href="/mobile/" data-icon="search">Search</a></li>
                <li><a href="<?= $pageurl ?>#social" data-icon="star">Social Media</a></li>
                <li><a href="<?= $pageurl ?>#same" data-icon="grid">Same People</a></li>
            </ul>
        </div><!-- /navbar -->
    </div><!-- /footer -->

</div><!-- /page index -->








<div data-role="page" id="social">

    <div data-role="header" data-position="inline" data-theme="b">
        <a href="#index" data-icon="home" data-direction="reverse" data-iconpos="notext"></a>
        <h1><?= $bilgi->name ?></h1>
    </div><!-- /header -->

    <div data-role="content">

        <div class="bilgiler">
            <ul data-role="listview">
                <li data-role="list-divider">Connect to <?= $bilgi->name ?> on Facebook</li>
                <li><a href="//facebook.com/profile.php?id=<?= $i ?>" rel="nofollow" target="_blank">Direct link of <?= $bilgi->first_name ?>'s facebook profile</a></li>		
            </ul>
        </div>

        <div style="padding-top:20px;">&nbsp;</div>

        <div id="sponsor" style="margin-left:-15px;margin-right: -15px;">
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
        <!--
                <div class="twitter">
                    <script src="//widgets.twimg.com/j/2/widget.js"></script>
                    <script>
                        new TWTR.Widget({
                            version: 2,
                            type: 'search',
                            search: '<?= $bilgi->name ?>',
                            interval: 30000,
                            title: 'Face Finder',
                            subject: 'Real-time <?= $bilgi->name ?> Twitter Results',
                            width: 'auto',
                            height: 300,
                            theme: {
                                shell: {
                                    background: '#8ec1da',
                                    color: '#ffffff'
                                },
                                tweets: {
                                    background: '#ffffff',
                                    color: '#444444',
                                    links: '#1985b5'
                                }
                            },
                            features: {
                                scrollbar: false,
                                loop: true,
                                live: true,
                                behavior: 'default'
                            }
                        }).render().start();
                    </script>
                </div>
        -->
    </div><!-- /content -->

    <div data-role="footer" data-theme="b">
        <div data-role="navbar">
            <ul>
                <li><a href="/mobile/" data-icon="search">Search</a></li>
                <li><a href="<?= $pageurl ?>#social" data-icon="star">Social Media</a></li>
                <li><a href="<?= $pageurl ?>#same" data-icon="grid">Same People</a></li>
            </ul>
        </div><!-- /navbar -->
    </div><!-- /footer -->

</div><!-- /page social -->







<div data-role="page" id="same">

    <div data-role="header" data-position="inline" data-theme="b">
        <a href="/mobile/" data-icon="home" data-direction="reverse" data-iconpos="notext"></a>
        <h1><?= $bilgi->name ?></h1>
    </div><!-- /header -->

    <div data-role="content">
        <center>
            <img src="//graph.facebook.com/<?= $i ?>/picture?type=large" title="<?= $bilgi->name ?>" alt="Photo of <?= $bilgi->name ?>" id="pic"/>
        </center>

        <div style="padding-top:20px;">&nbsp;</div>

        <div class="bilgiler">
            <ul data-role="listview">
                <li data-role="list-divider">Same Last Named <?= $table_same_lastname_total ?> persons</li>
                <?= $table_same_lastname ?>
                <div style="padding-top:20px;">&nbsp;</div>
                <li data-role="list-divider">Same First Named <?= $table_same_firstname_total ?> persons</li>
                <?= $table_same_firstname ?>
            </ul>
        </div>

    </div><!-- /content -->

    <div data-role="footer" data-theme="b">
        <div data-role="navbar">
            <ul>
                <li><a href="/mobile/" data-icon="search">Search</a></li>
                <li><a href="<?= $pageurl ?>#social" data-icon="star">Social Media</a></li>
                <li><a href="<?= $pageurl ?>#same" data-icon="grid">Same People</a></li>
            </ul>
        </div><!-- /navbar -->
    </div><!-- /footer -->

</div><!-- /page same -->


</body>
</html>
