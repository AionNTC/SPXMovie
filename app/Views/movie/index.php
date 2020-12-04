
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <a href="#" class="swiper-slide"><img src="https://dummyimage.com/242x248/b8c200/000000&text=Anime1"></a>
            <a href="#" class="swiper-slide"><img src="https://dummyimage.com/242x248/b8c200/000000&text=Anime2"></a>
            <a href="#" class="swiper-slide"><img src="https://dummyimage.com/242x248/b8c200/000000&text=Anime3"></a>
            <a href="#" class="swiper-slide"><img src="https://dummyimage.com/242x248/b8c200/000000&text=Anime4"></a>
            <a href="#" class="swiper-slide"><img src="https://dummyimage.com/242x248/b8c200/000000&text=Anime5"></a>
            <a href="#" class="swiper-slide"><img src="https://dummyimage.com/242x248/b8c200/000000&text=Anime6"></a>
            <a href="#" class="swiper-slide"><img src="https://dummyimage.com/242x248/b8c200/000000&text=Anime7"></a>
            <a href="#" class="swiper-slide"><img src="https://dummyimage.com/242x248/b8c200/000000&text=Anime8"></a>
            <a href="#" class="swiper-slide"><img src="https://dummyimage.com/242x248/b8c200/000000&text=Anime9"></a>
            <a href="#" class="swiper-slide"><img src="https://dummyimage.com/242x248/b8c200/000000&text=Anime10"></a>
            <a href="#" class="swiper-slide"><img src="https://dummyimage.com/242x248/b8c200/000000&text=Anime11"></a>
            <a href="#" class="swiper-slide"><img src="https://dummyimage.com/242x248/b8c200/000000&text=Anime12"></a>
            <a href="#" class="swiper-slide"><img src="https://dummyimage.com/242x248/b8c200/000000&text=Anime13"></a>
            <a href="#" class="swiper-slide"><img src="https://dummyimage.com/242x248/b8c200/000000&text=Anime14"></a>
            <a href="#" class="swiper-slide"><img src="https://dummyimage.com/242x248/b8c200/000000&text=Anime15"></a>
            <a href="#" class="swiper-slide"><img src="https://dummyimage.com/242x248/b8c200/000000&text=Anime16"></a>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    <div class="wrapper">
        <section class="container">
            <div class="caption">
                WWW.SPXMOVIE.COM ยินดีต้อนรับ ขอต้อนรับเข้าสู่ แหล่งรวมอนิเมะที่มีคุณภาพ ระดับความชัดสูง ดูไได้ไหลลื่นไม่มีขีดสุด ขอให้ทุกท่านมีความสุขกับการรับชมภาพยนต์
            </div>


            <?php
            if( !empty($adstop) ){
            foreach($adstop as $ads){
            ?>
            <a href="#"><img src="https://dummyimage.com/1286x218/b8c200/000000&text=Ads"></a>
            <?php
            }
            }
            ?>
        </section>

        <section class="container">
            <div class="content">
                <div class="content-title">
                    <div class="title">หนังอัพเดทล่าสุด</div>
                    <div class="filter active">ALL MOVIE</div>
                    <div class="filter">TOP MOVIE</div>
                </div>
                <div class="content-grid">
                    <div class="content-list">
                    <?PHP
                        foreach ($list['list'] as $val) {
                            if (substr($val['movie_picture'], 0, 4) == 'http') {
                                $movie_picture = $val['movie_picture'];
                            } else {
                                $movie_picture = $path_thumbnail . $val['movie_picture'];
                            }

                            $url_name = urlencode(str_replace(' ', '-', $val['movie_thname']));
                    ?>
                        <a onclick="goView('<?= $val['movie_id'] ?>', '<?=$url_name?>' , '<?=$val['movie_type']?>')" alt="<?= $val['movie_thname'] ?>" title="<?= $val['movie_thname'] ?>" class="card-content" style="background-image: url('<?= $movie_picture ?>')">
                        <?php
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
                        
                        <?php 
                            if(!empty($val['movie_quality'])){ 
                        ?>
                            <div class="card-quality"><span><?=$val['movie_quality']?></span></div>
                        <?php } ?>

                            <div class="card-description">
                                <div class="card-description-content">
                                    <div class="card-description-top">
                                    <?php
                                        $score = $val['movie_ratescore'];
                                        if( strpos($score,'.') ){
                                            $score = substr($score,0,3);
                                        }else{
                                            $score = substr($score,0);
                                        }
                                    ?>
                                        <div class="card-description-rate"><?=$score?>/10</div>
                                    
                                    <?php
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
                                        }
                                    ?>
                                        <div class="card-description-type"><?=$sound?></div>
                                    </div>
                                    <div class="card-description-nema"><?= $val['movie_thname'] ?></div>
                                </div>
                            </div>
                        </a>
                    <?php 
                        }
                    ?>
                    </div>
                </div>
                <div class="content-cate">
                    <div class="cate-group">
                        <div class="cate-title">อนิเมะแนะนำ</div>
                        <a href="#" class="thumbnail-cate">
                            <img src="https://dummyimage.com/86x120/b8c200/000000&text=thumbnail">
                            <div class="thumbnail-text">
                                <div class="thumbnail-title">BLACK CLOVER แบล็คโคลเวอร์ ตอนที่ 1-151+OVA ซับไทย</div>
                                <div class="thumbnail-rate">7.92/100</div>
                                <div class="thumbnail-description">SOUND: ซับไทย</div>
                            </div>
                        </a>
                        <a href="#" class="thumbnail-cate">
                            <img src="https://dummyimage.com/86x120/b8c200/000000&text=thumbnail">
                            <div class="thumbnail-text">
                                <div class="thumbnail-title">BLACK CLOVER แบล็คโคลเวอร์ ตอนที่ 1-151+OVA ซับไทย</div>
                                <div class="thumbnail-rate">7.92/100</div>
                                <div class="thumbnail-description">SOUND: ซับไทย</div>
                            </div>
                        </a>
                        <a href="#" class="thumbnail-cate">
                            <img src="https://dummyimage.com/86x120/b8c200/000000&text=thumbnail">
                            <div class="thumbnail-text">
                                <div class="thumbnail-title">BLACK CLOVER แบล็คโคลเวอร์ ตอนที่ 1-151+OVA ซับไทย</div>
                                <div class="thumbnail-rate">7.92/100</div>
                                <div class="thumbnail-description">SOUND: ซับไทย</div>
                            </div>
                        </a>
                        <a href="#" class="thumbnail-cate">
                            <img src="https://dummyimage.com/86x120/b8c200/000000&text=thumbnail">
                            <div class="thumbnail-text">
                                <div class="thumbnail-title">BLACK CLOVER แบล็คโคลเวอร์ ตอนที่ 1-151+OVA ซับไทย</div>
                                <div class="thumbnail-rate">7.92/100</div>
                                <div class="thumbnail-description">SOUND: ซับไทย</div>
                            </div>
                        </a>
                        <a href="#" class="thumbnail-cate">
                            <img src="https://dummyimage.com/86x120/b8c200/000000&text=thumbnail">
                            <div class="thumbnail-text">
                                <div class="thumbnail-title">BLACK CLOVER แบล็คโคลเวอร์ ตอนที่ 1-151+OVA ซับไทย</div>
                                <div class="thumbnail-rate">7.92/100</div>
                                <div class="thumbnail-description">SOUND: ซับไทย</div>
                            </div>
                        </a>
                    </div>  
                    <div class="cate-group">
                        <div class="cate-title">หมวดหมู่</div>
                        <a href="#" class="fullline-cate">อนิเมะทั้งหมด <span>729</span></a>
                        <a href="#" class="fullline-cate">ซับไทย <span>129</span></a>
                        <a href="#" class="fullline-cate">พากษ์ไทย <span>29</span></a>
                        <a href="#" class="fullline-cate">Movie <span>5</span></a>
                        <a href="#" class="fullline-cate">อนิเมะ HENTAI <span>729</span></a>
                        <a href="#" class="fullline-cate">จบแล้ว <span>129</span></a>
                        <a href="#" class="fullline-cate">ยังไม่จบ <span>29</span></a>
                        <a href="#" class="fullline-cate">กำลังมา-(การ์ตูนใหม่) <span>5</span></a>
                        <a href="#" class="fullline-cate">อนิเมะ 18+ <span>3</span></a>
                    </div>
                    <div class="cate-group">
                        <div class="cate-title">ประเภทอนิเมะ</div>
                        <a href="#" class="halfline-cate">ACTION</a>
                        <a href="#" class="halfline-cate">SAMURAI</a>
                        <a href="#" class="halfline-cate">ADVENTURE</a>
                        <a href="#" class="halfline-cate">ROMANCE</a>
                        <a href="#" class="halfline-cate">CARS</a>
                        <a href="#" class="halfline-cate">SCHOOL</a>
                        <a href="#" class="halfline-cate">COMEDY</a>
                        <a href="#" class="halfline-cate">SCI-FI</a>
                        <a href="#" class="halfline-cate">DEMENTIA</a>
                        <a href="#" class="halfline-cate">SHOUJO</a>
                        <a href="#" class="halfline-cate">DEMONS</a>
                        <a href="#" class="halfline-cate">SHOUJO AI</a>
                        <a href="#" class="halfline-cate">MYSTERY</a>
                        <a href="#" class="halfline-cate">SHOUNEN</a>
                        <a href="#" class="halfline-cate">DRAMA</a>
                        <a href="#" class="halfline-cate">SHOUNEN AI</a>
                        <a href="#" class="halfline-cate">ECCHI</a>
                        <a href="#" class="halfline-cate">SPACE</a>
                        <a href="#" class="halfline-cate">FANTASY</a>
                        <a href="#" class="halfline-cate">SPORTS</a>
                        <a href="#" class="halfline-cate">GAME</a>
                        <a href="#" class="halfline-cate">SUPER POWER</a>
                        <a href="#" class="halfline-cate">HENTAI</a>
                        <a href="#" class="halfline-cate">VAMPIRE</a>
                        <a href="#" class="halfline-cate">HISTORICAL</a>
                        <a href="#" class="halfline-cate">YAOI</a>
                        <a href="#" class="halfline-cate">HORROR</a>
                        <a href="#" class="halfline-cate">YURI</a>
                        <a href="#" class="halfline-cate">KIDS</a>
                        <a href="#" class="halfline-cate">HAREM</a>
                        <a href="#" class="halfline-cate">MAGIC</a>
                        <a href="#" class="halfline-cate">SLICE OF LIFE</a>
                        <a href="#" class="halfline-cate">MARTIAL ARTS</a>
                        <a href="#" class="halfline-cate">SUPERNATURE</a>
                        <a href="#" class="halfline-cate">MECHA</a>
                        <a href="#" class="halfline-cate">MILITARY</a>
                        <a href="#" class="halfline-cate">MUSIC</a>
                        <a href="#" class="halfline-cate">POLICE</a>
                        <a href="#" class="halfline-cate">PARODY</a>
                        <a href="#" class="halfline-cate">PSYCHOLOGICAL</a>
                        <a href="#" class="halfline-cate">SEINEN</a>
                        <a href="#" class="halfline-cate">THRILLER</a>
                    </div>
                </div>
            </div>
        </section>
        <div class="web-description">
            <div class="title">เว็บ ดูหนังออนไลน์ ดูหนังฟรี ทุกเรื่องไม่มีจำกัด SPXMOVIE</div>
            หนังคุณภาพ ความคมชัดระดับ FULL HD 4K 5K เล่นหนังได้ไม่กระตุกทุกเฟรมเรท (frame rate) หรือก็คือจำนวนภาพ ที่ใช้ต่อหน่วยเป็นวินาทีหรือ per second
            เช่น เฟรมเรท 60 คือมีภาพ 60 ภาพต่อ 1 วินาที พร้อมรับประกันทุกคุณภาพ ภาพ และเสียง เว็บหนัง ของเราทำการ อัพเดท (Update) หนังใหม่ๆ ลงเว็บทุกๆ 1-2 วัน
            หรือทุกครั้งที่มีหนังใหม่ๆเข้าโรงเพื่อที่จะให้ทุกท่านได้ติดตามรับชมกันอย่างไม่ขาดสาย ทั้งนี้ทางเว็บ SPXMOVIE ได้จัดทำระบบตั้งค่าความละเอียด ไว้ให้ท่านได้เลือก
            เพื่อให้เหมาะสมกับอุปการณ์ของท่านและความเร็วของ อินเตอร์เน็ต (Internet) ตั้งแต่ 360p 720p 1080p UHD 4K 8k เป็นต้น<br><br><br>

            ท่านสามารถ ดูหนัง ผ่านอุปกรณ์ที่หลากหลายเช่น Android , Iphone , Ipad , Smartphone ต่างๆ เป็นต้น หากท่านใดที่เป็นนักศึกษาหรือกำลังศึกษาในเรื่อง
            ของภาษาอยู่ ณ ขณะนี้ ทางเวบเราได้จัดทำ ตัวเลือกสำหรับการเลือกภาษา ไว้ให้แล้ว มีทั้ง SoundTrack , Thai และภาษาหลักของทางต้นค่ายหนัง และในส่วน
            ของหมวดหมู่หนังนั้น ทางเว็บ SPEXMOVIE คัดแยก ไว้ให้เป็นหมวดหมู่ต่าง ๆ ตามความเหมาะสม และ รสนิยม ของแต่ละบุคคล แนวหนัง เช่น หนังไทย หนังตลก 
            (Comedy) หนังฝรั่ง การ์ตูน (animation) อิโรติค บู๊ (Action) ดราม่า (Drama) ผจญภัย (Adventure) สยองขวัญ (Horror) ครอบครัว (Family) 
            โรแมนติก (Romance) วิทยาศาสตร์ เทพนิยาย ชีวิต (History) ซุปเปอร์ฮีโร่<br><br><br>

            ทางเวบหนังของเรา ได้ทำการรวบรวมไว้ทั้ง หนังเก่า และ หนังใหม่ ไว้ให้ท่านด้วยเพื่อที่จะได้ครบทุกอรรถรส ในการรับ ชมภาพยนตร์ ทั้งนี้ หากเกิดปัญหาในเรื่อง
            ของไฟล์หนังเสีย ท่านสามารถแจ้งปัญหา เกี่ยวกับตัวหนังได้ โดยกดที่ ติดต่อเรา ทุกๆ อย่างที่เราได้ทำการจัดทำขึ้นนี้ก็เพื่อที่จะได้ให้ทุกท่านได้ ดูหนังฟรี ไม่มีค่าใช้
            จ่ายใดๆ ทั้งสิ้นตลอดการ ดูหนังออนไลน์ฟรี
        </div>
    </div>
