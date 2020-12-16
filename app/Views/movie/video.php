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
            var_dump($videodata);
            $url_name = urlencode(str_replace(' ', '-', $videodata['movie_thname']))
        ?>
    </pre> -->
    <div class="container">
        <div class="preview">
            <div class="preview-image"><img src="<? echo $videodata['movie_picture'] ?>" alt="<? echo $videodata['movie_thname'] ?>"></div>
            <div class="preview-data">
                <div class="preview-title"><? echo $videodata['movie_thname'] ?></div>
                <div class="preview-rate">MYMOVIELIST: <span><? echo $videodata['movie_ratescore'] ?>/10</span></div>
                <div class="preview-view">VIEW: <span><? echo $videodata['movie_view'] ?></span></div>
                <div class="preview-sound">SOUND: <span><? echo $videodata['movie_sound'] ?></span></div>
                <div class="preview-shared">SHARE: 
                    <a href="#"><i class="fab fa-facebook-square"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter-square"></i></a>
                    <a href="#"><i class="fab fa-tumblr-square"></i></a>
                    <a href="#"><i class="fab fa-google-plus"></i></a>
                </div>
                <div class="preview-description"><? echo $videodata['movie_des'] ?></div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="content">
            <div class="content-data">
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

                <video src="#" width="100%"></video>

                <div class="btn-group">
                    <button class="btn">หนังไม่เล่น กดที่นี่ <i class="fas fa-redo"></i></button>
                    <button class="btn">แจ้งหนังเสีย</button>
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
                    ป้ายกำกับ : <span><a href="#">หนัง</a> | <a href="#">อนิเมะ</a> | <a href="#">ไทย</a> | <a href="#">ซับ</a></span></span>
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
                                
                                $url_name = urlencode(str_replace(' ', '-', $popular['movie_thname']));
                        ?>
                            <a onclick="goView('<?= $popular['movie_id'] ?>', '<?=$url_name?>' , '<?=$popular['movie_type']?>')" alt="<?= $popular['movie_thname'] ?>" title="<?= $popular['movie_thname'] ?>" class="thumbnail-cate">
                                <img style="max-width: 86px;" src="<? echo $popular['movie_picture'] ?>">
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
