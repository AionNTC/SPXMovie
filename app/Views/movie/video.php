<section id="video">
    <div class="container">
        <?php
            if( !empty($adstop) ){
                foreach($adstop as $ads){
        ?>
            <a href="#"><img src="https://dummyimage.com/1286x218/b8c200/000000&text=Ads"></a>
        <?php
                }
            }
        ?>
    </div>
    <!-- <pre>
        <?php
            var_dump($videodata);
        ?>
    </pre> -->
    <div class="container">
        <div class="preview">
            <div class="preview-image"><img src="<?php echo $videodata['movie_picture'] ?>" alt="<?php echo $videodata['movie_thname'] ?>"></div>
            <div class="preview-data">
                <div class="preview-title"><?php echo $videodata['movie_thname'] ?></div>
                <div class="preview-rate">MYMOVIELIST: <span><?php echo $videodata['movie_ratescore'] ?>/10</span></div>
                <div class="preview-view">VIEW: <span><?php echo $videodata['movie_view'] ?></span></div>
                <div class="preview-sound">SOUND: <span><?php echo $videodata['movie_sound'] ?></span></div>
                <div class="preview-shared">SHARE: 
                    <a href="#"><i class="fab fa-facebook-square"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter-square"></i></a>
                    <a href="#"><i class="fab fa-tumblr-square"></i></a>
                    <a href="#"><i class="fab fa-google-plus"></i></a>
                </div>
                <div class="preview-description"><?php echo $videodata['movie_des'] ?></div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="content">
            <div class="content-data">
                <div class="title">
                    <i class="fas fa-film"></i> ตัวอย่างหนัง
                </div>
                <iframe width="100%" height="527" src="<?php echo $videodata['movie_preview'] ?>"></iframe>
                
                <div class="title">
                    <i class="fas fa-scroll"></i> เรื่องย่อ
                </div>
                <div class="des">
                    <?php echo $videodata['movie_des'] ?>
                </div>

                <div id="ads">
                    <?php
                        if( !empty($adstop) ){
                            foreach($adstop as $ads){
                    ?>
                        <a href="#"><img src="https://dummyimage.com/1286x218/b8c200/000000&text=Ads"></a>
                    <?php
                            }
                        }
                    ?>
                </div>

                <div class="des">
                    <?php echo $videodata['movie_thname'] ?> <a href="#">สำรอง 1</a> <span>|</span> <a href="#">สำรอง 2</a> <span>|</span> <a href="#">สำรอง 3</a>
                </div>
                <div class="title white">
                    <?php echo $videodata['movie_thname'] ?>
                </div>

                <video src="#" width="100%" height="527"></video>

                <div class="btn-group">
                    <button class="btn">หนังไม่เล่น กดที่นี่ <i class="fas fa-redo"></i></button>
                    <button class="btn">แจ้งหนังเสีย</button>
                </div>

                <div id="ads">
                    <?php
                        if( !empty($adstop) ){
                            foreach($adstop as $ads){
                    ?>
                        <a href="#"><img src="https://dummyimage.com/1286x218/b8c200/000000&text=Ads"></a>
                    <?php
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
    </div>
</section>
