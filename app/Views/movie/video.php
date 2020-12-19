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
            <a href="onClickAds(<?= $ads['ads_id']; ?>, <?= $branch ?>)" href="<?=$ads['ads_url']?>" alt="<?=$ads['ads_name']?>" title="<?=$ads['ads_name']?>">
                <img src="<?=$ads_picture?>" alt="<?=$ads['ads_name']?>" title="<?=$ads['ads_name']?>">
            </a>
        <?
                }
            }
        ?>
    </div>
    <!-- <pre>
        <?
            $url_name = urlencode(str_replace(' ', '-', $videodata['movie_thname']));
            if (substr($videodata['movie_picture'], 0, 4) == 'http') {
                $movie_picture = $videodata['movie_picture'];
            } else {
                $movie_picture = $path_thumbnail . $videodata['movie_picture'];
            }
        ?>
    </pre> -->
    <div class="container">
        <div class="preview">
            <div class="preview-image"><img src="<? echo $movie_picture ?>" alt="<? echo $videodata['movie_thname'] ?>"></div>
            <div class="preview-data">
                <div class="preview-title"><? echo $videodata['movie_thname'] ?></div>
                <div class="preview-rate">MYMOVIELIST: <span><? echo $videodata['movie_ratescore'] ?>/10</span></div>
                <div class="preview-view">VIEW: <span><? echo $videodata['movie_view'] ?></span></div>
                <div class="preview-sound">SOUND: <span><? echo $videodata['movie_sound'] ?></span></div>
                <div class="preview-shared">SHARE:
                    <a href="https://www.facebook.com/sharer/sharer.php?kid_directed_site=0&sdk=joey&u=<?= urlencode(base_url(uri_string())) ?>&display=popup&ref=plugin&src=share_button" target="_blank"><i class="fab fa-facebook-square"></i></a>
                    <a href="https://twitter.com/share?hashtags=ดูหนังออนไลน์,ดูหนังใหม่&text=<?= $url_name ?>" target="_blank"><i class="fab fa-twitter-square"></i></a>
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
                        <i class="fas fa-film"></i> ตัวอย่างหนัง
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
                    <? echo $videodata['movie_des'] ?>
                </div>

                <div id="ads">
                    <?
                        if( !empty($adstop) ){
                            foreach($adstop as $ads){
                                if(substr($ads['ads_picture'], 0, 4) == 'http'){
                                    $ads_picture = $ads['ads_picture'];
                                }else{
                                    $ads_picture = $path_ads . $ads['ads_picture'];
                                }
                    ?>
                        <a href="onClickAds(<?= $ads['ads_id']; ?>, <?= $branch ?>)" href="<?=$ads['ads_url']?>" alt="<?=$ads['ads_name']?>" title="<?=$ads['ads_name']?>">
                            <img src="<?=$ads_picture?>" alt="<?=$ads['ads_name']?>" title="<?=$ads['ads_name']?>">
                        </a>
                    <?
                            }
                        }
                    ?>
                </div>

                <?
                    if( empty($videodata['name_ep']) ){
                ?>
                    <div class="des">
                        <? echo $videodata['movie_thname'] ?>
                    </div>
                <?
                    }
                ?>

                <div class="title white">
                    <? echo $videodata['movie_thname'] ?>
                </div>

                <iframe id="player" width="100%"  class="player" src="<?= base_url('player/' . $videodata['movie_id'] . '/' . $index) ?>" scrolling="no" frameborder="0" allowfullscreen="yes"></iframe>


                <div class="btn-group">
                    <button class="btn" onclick="document.getElementById('player').contentWindow.location.reload();">หนังไม่เล่น กดที่นี่ <i class="fas fa-redo"></i></button>
                    <button class="btn" onclick="get_Report()">แจ้งหนังเสีย</button>
                </div>

                <?
                    if( !empty($videodata['name_ep']) ){
                ?>
                    <div class="title white text-center">
                        <? echo $videodata['movie_thname'] ?>
                    </div>

                <?
                        foreach ($videodata['epdata'] as $key => $val) { 
                            $active = '';
                            if($index==$key){
                                $active = 'active';
                            }
                            $url_nameep = urlencode(str_replace(' ', '-', $videodata['name_ep'][$key]));
                ?>
                    <a class="ep-link" onclick="goEP('<?=$videodata['movie_id']?>','<?=$url_name?>','<?= trim($key) ?>','<?= $url_nameep ?>')" tabindex="-1">
                        <span class="<?=$active?>"><?= $videodata['movie_thname'] . '-' . $videodata['name_ep'][$key] ?></span>
                    </a>
                <?
                            }
                    }
                ?>

                <div id="ads">
                    <?
                        if( !empty($adstop) ){
                            foreach($adstop as $ads){
                                if(substr($ads['ads_picture'], 0, 4) == 'http'){
                                    $ads_picture = $ads['ads_picture'];
                                }else{
                                    $ads_picture = $path_ads . $ads['ads_picture'];
                                }
                    ?>
                        <a href="onClickAds(<?= $ads['ads_id']; ?>, <?= $branch ?>)" href="<?=$ads['ads_url']?>" alt="<?=$ads['ads_name']?>" title="<?=$ads['ads_name']?>">
                            <img src="<?=$ads_picture?>" alt="<?=$ads['ads_name']?>" title="<?=$ads['ads_name']?>">
                        </a>
                    <?
                            }
                        }
                    ?>
                </div>

                <div class="cate-list">
                    ป้ายกำกับ : 
                    <span>
                    <?
                        $cateneme = '';
                        $numItems = count($videodata['cate_data']);
                        $i = 0;
                        foreach ($videodata['cate_data'] as $key => $val) {
                    ?>
                        <a style="cursor:pointer;" onclick="goCate('<?= $val['category_id'] ?>', '<?= $val['category_name'] ?>')" alt="<?= $val['category_name'] ?>"><? echo $val['category_name'] ?></a>
                    <?
                            if(++$i != $numItems) {
                    ?>
                                |
                    <?
                            }
                        }
                    ?>  
                    </span>
                </div>

            </div>
            <div class="content-cate">
                <div class="cate-group">
                    <div class="cate-title">หนังแนะนำ</div>
                    
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
                                        $sound = 'SOUNDTRACK';
                                    } else if (strtolower($popular['movie_sound'])=='st' ||
                                    strpos(strtolower($popular['movie_sound']),'(t)')==true) {
                                        $sound = 'ซับไทย';
                                    }
                                }

                                $score = $popular['movie_ratescore'];
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
                            <a onclick="goView('<?= $popular['movie_id'] ?>', '<?=$url_name?>' , '<?=$popular['movie_type']?>')" alt="<?= $popular['movie_thname'] ?>" title="<?= $popular['movie_thname'] ?>" class="thumbnail-cate">
                                <img style="max-width: 86px;" src="<? echo $movie_picture ?>">
                                <div class="thumbnail-text">
                                    <div class="thumbnail-title"><? echo $popular['movie_thname'] ?></div>
                                    <div class="thumbnail-rate"><? echo $score ?>/100</div>
                                    <? if(isset($sound)) { ?>
                                        <div class="thumbnail-description">SOUND: <? echo $sound ?></div>
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
    </div>
</section>


<script>
  function get_Report() {
    var movie_id = '<?= $videodata['movie_id'] ?>';
    var movie_name = '<?= $videodata['movie_thname'] ?>';
    var movie_ep_name = '';
    <?php if($videodata['movie_type']=='se'){ ?>
      movie_ep_name = '<?= $videodata['name_ep'][$index] ?>';
    <?php } ?>

    $.ajax({
      url: "<?= base_url('saveReport') ?>",
      data: {
        movie_id: movie_id,
        movie_name: movie_name,
        movie_ep_name: movie_ep_name
      },
      type: 'POST',
      async: false,
      success: function(data) {
        alert('แจ้งเรียบร้อยจะดำเนินการโดยเร็ว');
      }
    });
  }
</script>