<section id="video">
    <div class="container">
        <?
            if( !empty($adstop) ){
                foreach($adstop as $ads){
                    if(substr($ads['ads_picture'], 0, 4) == 'http'){
                        $ads_picture = $ads['ads_picture'];
                    }else{
                        $ads_picture = $path_ads . $ads['ads_picture'];
                    }
        ?>
            <a onclick="onClickAds(<?= $ads['ads_id']; ?>, <?= $branch ?>)" href="<?=$ads['ads_url']?>" alt="<?=$ads['ads_name']?>" title="<?=$ads['ads_name']?>">
                <img src="<?=$ads_picture?>" alt="<?=$ads['ads_name']?>" title="<?=$ads['ads_name']?>" class="img-banners">
            </a>
        <?
                }
            }
        ?>
    </div>
    <?
        if (substr($videodata['movie_picture'], 0, 4) == 'http') {
            $premovie_picture = $videodata['movie_picture'];
        } else {
            $premovie_picture = $path_thumbnail . $videodata['movie_picture'];
        }
        $url_name = urlencode(str_replace(' ', '-', $videodata['movie_thname']));
        
        if (!empty($videodata['movie_sound'])) {
            $presound = $videodata['movie_sound'];
            if (strtolower($videodata['movie_sound'])=='th' || 
            strtolower($videodata['movie_sound'])=='thai' ||
            strpos(strtolower($videodata['movie_sound']),'thai')==true ||
            strtolower($videodata['movie_sound'])=='ts') {
                $presound = 'พากษ์ไทย';
            } else if (strtolower($videodata['movie_sound'])=='eng') {
                $presound = 'Soundtrack';
            } else if (strtolower($videodata['movie_sound'])=='st' ||
            strpos(strtolower($videodata['movie_sound']),'(t)')==true) {
                $presound = 'ซับไทย';
            }
        }
    ?>
    <div class="container">
        <div class="preview">
            <div class="preview-image"><img src="<? echo $premovie_picture ?>" alt="<? echo $videodata['movie_thname'] ?>"></div>
            <div class="preview-data">
                <div class="preview-title"><? echo $videodata['movie_thname'] ?></div>
                <div class="preview-rate">Score: <span><? echo $videodata['movie_ratescore'] / 10 ?>/10</span></div>
                <div class="preview-view">View: <span><i class="fas fa-eye"></i>  <? echo $videodata['movie_view'] ? $videodata['movie_view'] : '1' ?></span></div>
                <? if(isset($presound)) { ?>
                    <div class="preview-sound">Sound: <span><? echo $presound ?></span></div>
                <? } ?>
                <div class="preview-shared">Shared:
                    <a href="https://www.facebook.com/sharer/sharer.php?kid_directed_site=0&sdk=joey&u=<?= urlencode(base_url(uri_string())) ?>&display=popup&ref=plugin&src=share_button" target="_blank"><i class="fab fa-facebook-square"></i></a>
                    <a href="https://twitter.com/share?hashtags=ดูอนิเมะออนไลน์,ดูอนิเมะใหม่&text=<?= $url_name ?>" target="_blank"><i class="fab fa-twitter-square"></i></a>
                    <a href="https://social-plugins.line.me/lineit/share?url=<?= urlencode(base_url(uri_string())) ?>" target="_blank"><i class="fab fa-line"></i></a>
                </div>
                <div class="preview-description"><? echo $videodata['movie_des'] ?></div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="content">
            <div class="content-data">
                <? if ($videodata['movie_preview'] != '') { ?>
                    <div class="title">
                        <i class="fas fa-film"></i> ตัวอย่างอนิเมะ
                    </div>
                <?
                        $yb = explode('embed', $videodata['movie_preview']);
                        if (count($yb) > 1) {
                            $urlyb = "https://www.youtube.com/embed/" . $yb[1];
                        } else {
                            $urlyb = "https://www.youtube.com/embed/" . $yb[0];
                        }
                ?>
                    <iframe width="100%" src="<? echo $urlyb ?>"></iframe>
                <? } ?>
                
                <div class="title">
                    <i class="fas fa-scroll"></i> เรื่องย่อ
                </div>
                <div class="des">
                    <? echo $videodata['movie_des'] != '' ? $videodata['movie_des'] : '-' ?>
                </div>

                <div id="ads">
                    <?
                        if( !empty($adsmiddle) ){
                            foreach($adsmiddle as $ads){
                                if(substr($ads['ads_picture'], 0, 4) == 'http'){
                                    $ads_picture = $ads['ads_picture'];
                                }else{
                                    $ads_picture = $path_ads . $ads['ads_picture'];
                                }
                    ?>
                        <a onclick="onClickAds(<?= $ads['ads_id']; ?>, <?= $branch ?>)" href="<?=$ads['ads_url']?>" alt="<?=$ads['ads_name']?>" title="<?=$ads['ads_name']?>">
                            <img src="<?=$ads_picture?>" alt="<?=$ads['ads_name']?>" title="<?=$ads['ads_name']?>" class="img-banners">
                        </a>
                    <?
                            }
                        }
                    ?>
                </div>

                <div class="title white">
                    <? echo $videodata['movie_thname'] ?>
                </div>

                <iframe id="player" width="100%"  class="player" src="<?= base_url('anime/player/' . $videodata['movie_id'] . '/' . $index) ?>" scrolling="no" frameborder="0" allowfullscreen="yes"></iframe>

                
                <div class="cate-list">
                    ป้ายกำกับ : 
                    <span>
                    <?
                        $cateneme = '';
                        $numItems = count($videodata['cate_data']);
                        $i = 0;
                        if ($numItems == 0) {
                            echo '-';
                        } else {
                        foreach ($videodata['cate_data'] as $key => $val) {
                    ?>
                        <a style="cursor:pointer;" onclick="goCate('<?= $val['category_id'] ?>', '<?= $val['category_name'] ?>')" alt="<?= $val['category_name'] ?>"><? echo $val['category_name'] ?></a>
                    <?
                            if(++$i != $numItems) {
                    ?>
                                |
                    <?
                            }
                        }}
                    ?>  
                    </span>
                </div>

                <div class="btn-group">
                    <button class="btn" onclick="document.getElementById('player').contentWindow.location.reload();">อนิเมะไม่เล่น กดที่นี่ <i class="fas fa-redo"></i></button>
                    <button class="btn" onclick="get_Report()">แจ้งอนิเมะเสีย</button>
                </div>

                <?
                    if( !empty($videodata['ep_data']) ){
                ?>
                    <div class="title white text-center">
                        <? echo $videodata['movie_thname'] ?>
                    </div>

                <?
                        foreach ($videodata['ep_data'] as $key => $val) { 
                            $active = '';
                            if($index==$key){
                                $active = 'active';
                            }
                            $url_nameep = $videodata['movie_thname'].urlencode(str_replace(' ', '-', $val['NameEp']));
                ?>
                    <a class="ep-link" onclick="goView('<?= $videodata['movie_id'] ?>', '<?=$url_nameep?>' , <?=$key?>,'<?= $url_nameep ?>')" tabindex="-1">
                        <span class="<?=$active?>"><?= $videodata['movie_thname'] . '-' . $videodata['ep_data'][$key]['NameEp'] ?></span>
                    </a>
                <?
                        }
                    }
                ?>
            </div>
            <div class="content-cate">
                <div class="cate-group">
                    <div class="cate-title">อนิเมะแนะนำ</div>
                    
                        <?
                            $list_popular_slice = array_slice($list_popular, 0, 5, true);
                            foreach($list_popular_slice as $popular) {
                                if (!empty($popular['movie_sound'])) {
                                    $sound = $popular['movie_sound'];
                                    if (strtolower($popular['movie_sound'])=='th' || 
                                    strtolower($popular['movie_sound'])=='thai' ||
                                    strpos(strtolower($popular['movie_sound']),'thai')==true ||
                                    strtolower($popular['movie_sound'])=='ts') {
                                        $sound = 'พากษ์ไทย';
                                    } else if (strtolower($popular['movie_sound'])=='eng') {
                                        $sound = 'Soundtrack';
                                    } else if (strtolower($popular['movie_sound'])=='st' ||
                                    strpos(strtolower($popular['movie_sound']),'(t)')==true) {
                                        $sound = 'ซับไทย';
                                    }
                                }

                                $score = $popular['movie_ratescore'] / 10;
                                if( strpos($score,'.') ){
                                    $score = substr($score,0,3);
                                }else{
                                    $score = substr($score,0);
                                }

                                if (substr($popular['movie_picture'], 0, 4) == 'http') {
                                    $movie_picture = $popular['movie_picture'];
                                } else {
                                    $movie_picture = $path_thumbnail . $popular['movie_picture'];
                                }
                                
                                $url_name = urlencode(str_replace(' ', '-', $popular['movie_thname']));
                        ?>
                            <a onclick="goView('<?= $popular['movie_id'] ?>', '<?=$url_name?>' , '0','<?= $url_name ?>')" alt="<?= $popular['movie_thname'] ?>" title="<?= $popular['movie_thname'] ?>" class="thumbnail-cate">
                                <img style="max-width: 86px;" src="<? echo $movie_picture ?>">
                                <div class="thumbnail-text">
                                    <div class="thumbnail-title"><? echo $popular['movie_thname'] ?></div>
                                    <div class="thumbnail-rate"><? echo $score ?>/10</div>
                                    <? if(isset($sound)) { ?>
                                        <div class="thumbnail-description">Sound: <? echo $sound ?></div>
                                    <? } ?>
                                </div>
                            </a>
                        <? } ?>
                    
                </div>  
                <div class="cate-group">
                    <div class="cate-title">หมวดหมู่</div>
                    <? foreach($list_category as $cate) { ?>
                        <a onclick="goCate('<?= $cate['category_id'] ?>', '<?= $cate['category_name'] ?>')" alt="<?= $cate['category_name'] ?>" title="<?= $cate['category_name'] ?>" class="fullline-cate"><? echo $cate['category_name']; ?> <span><? echo $cate['movie_nb']; ?></span></a>        
                    <? } ?>
                </div>
            </div>
        </div>
        
        <div id="ads" style="margin-top: 15px;">
            <?
                if( !empty($adsbottom) ){
                    foreach($adsbottom as $ads){
                        if(substr($ads['ads_picture'], 0, 4) == 'http'){
                            $ads_picture = $ads['ads_picture'];
                        }else{
                            $ads_picture = $path_ads . $ads['ads_picture'];
                        }
            ?>
                <a onclick="onClickAds(<?= $ads['ads_id']; ?>, <?= $branch ?>)" href="<?=$ads['ads_url']?>" alt="<?=$ads['ads_name']?>" title="<?=$ads['ads_name']?>">
                    <img src="<?=$ads_picture?>" alt="<?=$ads['ads_name']?>" title="<?=$ads['ads_name']?>" class="img-banners">
                </a>
            <?
                    }
                }
            ?>
        </div>
    </div>
</section>


<script>
  function get_Report() {
    var request = prompt('แจ้งอนิเมะเสีย');
    var movie_id = '<?= $videodata['movie_id'] ?>';
    var movie_name = '<?= $videodata['movie_thname'] ?>';
    var movie_ep_name = '';
    <?php if($videodata['movie_type']=='se'){ ?>
        movie_ep_name = '<?= $videodata['ep_data'][$index]['NameEp'] ?>';
    <?php } ?>

    if (request != '' & request != null) {
        $.ajax({
        url: "<?= base_url('anime/saveReport') ?>",
        data: {
            movie_id: movie_id,
            movie_name: movie_name,
            movie_ep_name: movie_ep_name,
            reason: request
        },
        type: 'POST',
        async: false,
        success: function(data) {
            alert('แจ้งเรียบร้อยจะดำเนินการโดยเร็ว');
        }
        });
    }
  }
</script>