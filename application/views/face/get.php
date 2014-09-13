<div class="row" itemscope itemtype="http://schema.org/Person">

    <div class="span12">
        <h6>advertisements</h6>
        <div>
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- ReverseFacebook728x90 -->
            <ins class="adsbygoogle"
                 style="display:inline-block;width:728px;height:90px"
                 data-ad-client="ca-pub-9516652609628392"
                 data-ad-slot="1947267588"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
    </div>

    <div class="span3">
        <h5>&nbsp;</h5>
        <div>
            <img class="thumbnail" style="max-width: 175px;" src="<?= $person->picture ?>" alt="Photo of <?= convert_accented_characters($person->name) ?>" title="<?= $person->name ?>" id="pic" itemprop="image" />
        </div>

        <h6>advertisements</h6>
        <div>
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- ReverseFacebook160x600 -->
            <ins class="adsbygoogle"
                 style="display:inline-block;width:160px;height:600px"
                 data-ad-client="ca-pub-9516652609628392"
                 data-ad-slot="3424000789"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>

        <h5>What is Face Finder ?</h5>
        <div class="well">
            Face Finder, always search the internet and collect human information for you.
            Face Finder, can not guarantee the accuracy of information.<br />
            <a href="<?= base_url() ?>">Click to discover or find new faces.</a>
        </div>

    </div>
    <div class="span9">

        <h5>Search</h5>
        <div class="well">
            <input name="search" class="search input-xxlarge" />
            <span class="help-inline">e.g. James Bond</span>
        </div>

        <h5>What is meaning name of <?= $person->first_name ?> ?</h5>
        <div class="well">
            Look at the <a href="http://getbabyname.com/name/<?= strtolower($person->first_name) ?>" target="_blank" rel="dofollow">meaning of <?= $person->first_name ?></a> from <a href="http://getbabyname.com/name/<?= strtolower($person->first_name) ?>" target="_blank" rel="dofollow">getbabyname</a> site.
        </div>

        <h5 itemprop="description">Who is <span itemprop="name"><?= convert_accented_characters($person->name) ?></span> ?</h5>
        <div class="well">
            <dl class="dl-horizontal">
                <dt>The File Number:</dt>
                <dd><?= $person->id ?></dd>
                <dt>Name:</dt>
                <dd><span itemprop="givenName"><?= $person->first_name ?></span></dd>
                <dt>Surname:</dt>
                <dd><span itemprop="familyName"><?= $person->last_name ?></span></dd>
                <dt>Gender:</dt>
                <dd><span itemprop="gender"><?= $person->gender ?></span></dd>
                <dt>Language:</dt>
                <dd><?= get_lokasyon($person->locale) ?></dd>
            </dl>
        </div>

        <? if (count($same_wiki) > 0) : ?>
            <h5>Same first named <?= count($same_wiki) ?> wiki persons</h5>
            <ul>
                <? foreach ($same_wiki as $k): ?>
                    <li>
                        <a href="<?= site_url('wiki/get/' . genid_from_id($k->id) . '/' . url_title($k->name).'?q='.urlencode($k->name)) ?>" title="<?= convert_accented_characters($k->name) ?>">
                            <?=$k->name?>
                        </a>
                        <?=$k->short_desc?>
                    </li>
                <? endforeach ?>
            </ul>
        <? endif ?>

        <h5>Google Results</h5>
        <div class="well">
            <script>
                (function() {
                    var cx = '011344583839495027160:oq0rw3uohiq';
                    var gcse = document.createElement('script');
                    gcse.type = 'text/javascript';
                    gcse.async = true;
                    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
                            '//www.google.com/cse/cse.js?cx=' + cx;
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(gcse, s);
                })();
            </script>
            <gcse:searchresults-only></gcse:searchresults-only>
        </div>

        <h5>Connect to <?= $person->name ?> on Facebook</h5>
        <div class="well">
            <span class="label label-info">Facebook</span> Direct link of <a itemprop="contactPoint" href="<?= site_url('link/facebook/' . genid_from_id($person->id) . '/' . url_title($person->name)) ?>" rel="nofollow" target="_blank"><?= convert_accented_characters($person->name) ?>'s facebook profile</a>.
        </div>

        <? if (count($same_last) > 0) : ?>
            <h5>Same last named <?= count($same_last) ?> persons</h5>
            <ul class="media-grid">
                <? foreach ($same_last as $k): ?>
                    <li>
                        <a href="<?= site_url('face/get/' . genid_from_id($k->id) . '/' . url_title($k->name).'?q='.urlencode($k->name)) ?>" class="thumbnail" rel="popover" title="<?= convert_accented_characters($k->name) ?>">
                            <img src="//graph.facebook.com/<?= $k->id ?>/picture?type=square" alt="Photo of <?= convert_accented_characters($k->name) ?>" width="50" height="50"/>
                            <? /* <div class="caption"><h5><?= convert_accented_characters($k->name) ?></h5></div> */ ?>
                        </a>
                    </li>
                <? endforeach ?>
            </ul>
        <? endif ?>
        <? if (count($same_first) > 0) : ?>
            <h5>Same first named <?= count($same_first) ?> persons</h5>
            <ul class="media-grid">
                <? foreach ($same_first as $k): ?>
                    <li>
                        <a href="<?= site_url('face/get/' . genid_from_id($k->id) . '/' . url_title($k->name).'?q='.urlencode($k->name)) ?>" class="thumbnail" rel="popover" title="<?= convert_accented_characters($k->name) ?>">
                            <img src="//graph.facebook.com/<?= $k->id ?>/picture?type=square" alt="Photo of <?= convert_accented_characters($k->name) ?>" width="50" height="50"/>
                            <? /* <div class="caption"><h5><?= convert_accented_characters($k->name) ?></h5></div> */ ?>
                        </a>
                    </li>
                <? endforeach ?>
            </ul>
        <? endif ?>

        <div id="disqus_thread"></div>
        <script type="text/javascript">
            /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
            var disqus_shortname = 'facefinder'; // required: replace example with your forum shortname

            /* * * DON'T EDIT BELOW THIS LINE * * */
            (function() {
                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
    </div>
</div>
