<div class="row">

    <div class="span3">
        <h6>advertisements</h6>
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

    <div class="span9">
        <h5>Search</h5>

        <div class="well">
            <input name="search" class="search input-xxlarge"/>
            <span class="help-inline">e.g. James Bond</span>
        </div>

        <h5>Random Faces</h5>
        <ul class="media-grid">
            <? foreach ($random_faces as $k): ?>
                <li>
                    <a href="<?= site_url('face/get/' . genid_from_id($k->id) . '/' . url_title($k->name) . '?q=' . urlencode($k->name)) ?>"
                       class="thumbnail" rel="popover" title="<?= convert_accented_characters($k->name) ?>">
                        <img src="//graph.facebook.com/<?= $k->id ?>/picture?type=square"
                             alt="Photo of <?= convert_accented_characters($k->name) ?>" width="50" height="50"/>
                        <? /* <div class="caption"><h5><?= convert_accented_characters($k->name) ?></h5></div> */ ?>
                    </a>
                </li>
            <? endforeach ?>
        </ul>

    </div>
</div>
