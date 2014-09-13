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
        <h5>What is Face Finder ?</h5>
        <div class="well">
            Face Finder, always search the internet and collect human information for you.
            Face Finder, can not guarantee the accuracy of information.<br />
            <a href="<?= base_url() ?>">Click to discover or find new faces.</a>
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

    </div>
    <div class="span9">

        <h5>Search</h5>
        <div class="well">
            <input name="search" class="search input-xxlarge" />
            <span class="help-inline">e.g. James Bond</span>
        </div>

        <h5 itemprop="description">Who is <span itemprop="name"><?= convert_accented_characters($person->name) ?></span> ?</h5>
        <div class="well">
            <dl class="dl-horizontal">
                <dt>The File Number:</dt>
                <dd>w<?= $person->id ?></dd>
                <? if (strlen($person->first_name) > 0): ?>
                <dt>Name:</dt>
                <dd><span itemprop="givenName"><?= $person->first_name ?></span></dd>
                <? endif ?>
                <? if (strlen($person->last_name) > 0): ?>
                <dt>Surname:</dt>
                <dd><span itemprop="familyName"><?= $person->last_name ?></span></dd>
                <? endif ?>
                <? if (strlen($person->alternative_names) > 0): ?>
                <dt>Alternative Names:</dt>
                <dd><span itemprop="gender"><?= $person->alternative_names ?></span></dd>
                <? endif ?>
                <? if (strlen($person->birth_date) > 0 || strlen($person->birth_place) > 0 ): ?>
                <dt>Birth Date and Place:</dt>
                <dd><span><?= $person->birth_date ?> <?= $person->birth_place ?></span></dd>
                <? endif ?>
                <? if (strlen($person->death_date) > 0 || strlen($person->death_place) > 0 ): ?>
                <dt>Death Date and Place:</dt>
                <dd><span><?= $person->death_date ?> <?= $person->death_place ?></span></dd>
                <? endif ?>
                <? if (strlen($person->short_desc) > 0): ?>
                <dt>Short Description:</dt>
                <dd><span><code><?= $person->short_desc ?></code></span></dd>
                <? endif ?>
            </dl>
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

    </div>
</div>
