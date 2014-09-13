<?
if (strpos($_SERVER["REQUEST_URI"], "mobile/?id=") !== FALSE) {
    @header("location: " . rtrim(str_replace("mobile/?id=", "mobile/", $_SERVER["REQUEST_URI"]), ".html") . ".html");
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
        <a href="#index" data-icon="home" data-direction="reverse" data-iconpos="notext"></a>
        <h1>Face Finder</h1>
    </div><!-- /header -->

    <div data-role="content">
        <div data-role="fieldcontain">
            <form action="search.php" method="get">
                <label for="search">Whose Face?</label>
                <input type="search" name="search" id="search" value="" placeholder="eg: James Bond" />
                <input type="submit" name="submit" value="find" />
            </form>
        </div>

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

</div><!-- /page index -->

<div data-role="page" id="settings">

    <div data-role="header" data-position="inline" data-theme="b">
        <a href="#index" data-icon="home" data-direction="reverse" data-iconpos="notext"></a>
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
