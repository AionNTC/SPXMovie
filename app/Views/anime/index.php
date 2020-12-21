    <section id="homepage">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?
                foreach($list_popular as $popular) { 
                    $url_name = urlencode(str_replace(' ', '-', $popular['movie_thname']));
                    if (substr($popular['movie_picture'], 0, 4) == 'http') {
                        $movie_picture = $popular['movie_picture'];
                    } else {
                        $movie_picture = $path_thumbnail . $popular['movie_picture'];
                    }
            ?>
                <a onclick="goView('<?= $popular['movie_id'] ?>', '<?=$url_name?>' , '0','<?= $url_name ?>')" alt="<?= $popular['movie_thname'] ?>" title="<?= $popular['movie_thname'] ?>" class="swiper-slide"><img src="<? echo $movie_picture ?>"></a>
            <? } ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    <div class="wrapper">
        <section class="container">

            <marquee behavior="scroll" direction="left"  class="caption">WWW.SPXMOVIE.COM ยินดีต้อนรับ ขอต้อนรับเข้าสู่ แหล่งรวมอนิเมะที่มีคุณภาพ ระดับความชัดสูง ดูไได้ไหลลื่นไม่มีขีดสุด ขอให้ทุกท่านมีความสุขกับการรับชมภาพยนต์</marquee>
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
                    <img src="<?=$ads_picture?>" alt="<?=$ads['ads_name']?>" title="<?=$ads['ads_name']?>" class="img-banners">
                </a>
            <?
                    }
                }
            ?>
        </section>

        <section class="container">
            <div class="content">
                <div class="content-title">
                    <div class="title">อนิเมะอัพเดทล่าสุด</div>
                    <a href="<?php echo base_url().'/anime' ?>" class="filter <? if($order == 'all') echo 'active'; ?>">ALL ANIME</a>
                    <a href="<?php echo base_url().'/anime?order=top-view' ?>" class="filter <? if($order == 'top-view') echo 'active'; ?>">TOP ANIME</a>
                </div>
                <div class="content-data">
                    <div class="content-list">
                        <?
                            if ($list['total_record'] != 0) {
                                foreach ($list['list'] as $val) {
                                    if (substr($val['movie_picture'], 0, 4) == 'http') {
                                        $movie_picture = $val['movie_picture'];
                                    } else {
                                        $movie_picture = $path_thumbnail . $val['movie_picture'];
                                    }

                                    $url_name = urlencode(str_replace(' ', '-', $val['movie_thname']));
                        ?>
                            <a onclick="goView('<?= $val['movie_id'] ?>', '<?=$url_name?>' , '0','<?= $url_name ?>')" alt="<?= $val['movie_thname'] ?>" title="<?= $val['movie_thname'] ?>" class="card-content" style="background-image: url('<?= $movie_picture ?>')">
                            <?
                                if (!($val['movie_view'])) {
                                    $view = 0;
                                } else if (strlen($val['movie_view']) >= 5) {
                                    $view =  substr($val['movie_view'], 0, -3) . 'K';
                                } else {
                                    $view = $val['movie_view'];
                                }
                            ?>
                                <div class="card-view">
                                    <i class="fas fa-eye"></i> <span> <?=$view?></span>
                                </div>
                            
                            <? 
                                if(!empty($val['movie_quality'])){ 
                            ?>
                                <div class="card-quality"><span><?=$val['movie_quality']?></span></div>
                            <? } ?>

                                <div class="card-description">
                                    <div class="card-description-content">
                                        <div class="card-description-top">

                                        
                                        <?
                                            if (!empty($val['movie_sound'])) {
                                                $sound = $val['movie_sound'];
                                                if (strtolower($val['movie_sound'])=='th' || 
                                                strtolower($val['movie_sound'])=='thai' ||
                                                strpos(strtolower($val['movie_sound']),'thai')==true ||
                                                strtolower($val['movie_sound'])=='ts') {
                                                    $sound = 'พากษ์ไทย';
                                                } else if (strtolower($val['movie_sound'])=='eng') {
                                                    $sound = 'SOUNDTRACK';
                                                } else if (strtolower($val['movie_sound'])=='st' ||
                                                strpos(strtolower($val['movie_sound']),'(t)')==true) {
                                                    $sound = 'ซับไทย';
                                                }
                                        ?>
                                            <div class="card-description-type"><?=$sound?></div>
                                        <?
                                            } else {
                                        ?>
                                            <div class="card-description-type" style="opacity: 0;">.</div>
                                        <?
                                            }
                                        ?>
                                        <?
                                            $score = $val['movie_ratescore'] / 10;
                                            if( strpos($score,'.') ){
                                                $score = substr($score,0,3);
                                            }else{
                                                $score = substr($score,0);
                                            }
                                        ?>
                                            <div class="card-description-rate"><?=$score?>/10</div>
                                        
                                        </div>
                                        <div class="card-description-nema"><?= $val['movie_thname'] ?></div>
                                    </div>
                                </div>
                            </a>
                        <? 
                                }
                            } else {
                        ?>
                            <div class="title text-center">ไม่พบอนิเมะ</div>
                        <?
                            }
                        ?>
                    </div>
                    <div class="content-pagination">
                        <ul id="pagination-demo" class="pagination">
                        </ul>
                    </div>
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
                                        $sound = 'SOUNDTRACK';
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
        </section>
        <section class="container">
            <div class="web-description">
                <div class="title">เว็บ ดูอนิเมะออนไลน์ ดูอนิเมะฟรี ทุกเรื่องไม่มีจำกัด SPXMOVIE</div>
                อนิเมะคุณภาพ ความคมชัดระดับ FULL HD 4K 5K เล่นอนิเมะได้ไม่กระตุกทุกเฟรมเรท (frame rate) หรือก็คือจำนวนภาพ ที่ใช้ต่อหน่วยเป็นวินาทีหรือ per second
                เช่น เฟรมเรท 60 คือมีภาพ 60 ภาพต่อ 1 วินาที พร้อมรับประกันทุกคุณภาพ ภาพ และเสียง เว็บอนิเมะ ของเราทำการ อัพเดท (Update) อนิเมะใหม่ๆ ลงเว็บทุกๆ 1-2 วัน
                หรือทุกครั้งที่มีอนิเมะใหม่ๆเข้าโรงเพื่อที่จะให้ทุกท่านได้ติดตามรับชมกันอย่างไม่ขาดสาย ทั้งนี้ทางเว็บ SPXMOVIE ได้จัดทำระบบตั้งค่าความละเอียด ไว้ให้ท่านได้เลือก
                เพื่อให้เหมาะสมกับอุปการณ์ของท่านและความเร็วของ อินเตอร์เน็ต (Internet) ตั้งแต่ 360p 720p 1080p UHD 4K 8k เป็นต้น<br><br><br>

                ท่านสามารถ ดูอนิเมะ ผ่านอุปกรณ์ที่หลากหลายเช่น Android , Iphone , Ipad , Smartphone ต่างๆ เป็นต้น หากท่านใดที่เป็นนักศึกษาหรือกำลังศึกษาในเรื่อง
                ของภาษาอยู่ ณ ขณะนี้ ทางเวบเราได้จัดทำ ตัวเลือกสำหรับการเลือกภาษา ไว้ให้แล้ว มีทั้ง SoundTrack , Thai และภาษาหลักของทางต้นค่ายอนิเมะ และในส่วน
                ของหมวดหมู่อนิเมะนั้น ทางเว็บ SPEXMOVIE คัดแยก ไว้ให้เป็นหมวดหมู่ต่าง ๆ ตามความเหมาะสม และ รสนิยม ของแต่ละบุคคล แนวอนิเมะ เช่น อนิเมะตลก 
                (Comedy) การ์ตูน (animation) อิโรติค บู๊ (Action) ดราม่า (Drama) ผจญภัย (Adventure) สยองขวัญ (Horror) ครอบครัว (Family) 
                โรแมนติก (Romance) วิทยาศาสตร์ เทพนิยาย ชีวิต (History) ซุปเปอร์ฮีโร่<br><br><br>

                ทางเวบอนิเมะของเรา ได้ทำการรวบรวมไว้ทั้ง อนิเมะเก่า และ อนิเมะใหม่ ไว้ให้ท่านด้วยเพื่อที่จะได้ครบทุกอรรถรส ในการรับ ชมภาพยนตร์ ทั้งนี้ หากเกิดปัญหาในเรื่อง
                ของไฟล์อนิเมะเสีย ท่านสามารถแจ้งปัญหา เกี่ยวกับตัวอนิเมะได้ โดยกดที่ ติดต่อเรา ทุกๆ อย่างที่เราได้ทำการจัดทำขึ้นนี้ก็เพื่อที่จะได้ให้ทุกท่านได้ ดูอนิเมะฟรี ไม่มีค่าใช้
                จ่ายใดๆ ทั้งสิ้นตลอดการ ดูอนิเมะออนไลน์ฟรี
            </div>
        </section>
    </div>
</section>
