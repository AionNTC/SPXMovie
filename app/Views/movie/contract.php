<section id="contract">
    <div class="container">
        <div class="content">
            <div class="content-data">
                <div class="tab-container">
                    <div class="tab-header">
                        <div data-tab="request" class="tab-title active">ขอหนัง</div>
                        <div data-tab="ads" class="tab-title  ">ติดต่อลงโฆษณา</div>
                    </div>
                    <div class="tab-body">
                        <div data-tab="request" class="tab-content active">
                            <form class="movie-formcontract" novalidate method="POST" action="">
                                <input id="request_text" name="request_text" type="text" class="form-control" required autocomplete="off">
                                <div class="text-right"><button class="btn" type="submit" class="movie-btnrequest">ตกลง</button></div>
                            </form>
                        </div>
                        <div data-tab="ads" class="tab-content ">
                            <form class="movie-formcontract" novalidate method="POST" action="">
                                <label for="ads_con_name">ชื่อ สกุล :</label>
                                <input id="ads_con_name" name="ads_con_name" type="text" class="form-control" required autocomplete="off"  pattern="([^,<>;]+)">
                                <div class="invalid-feedback">กรุณากรอกชื่อ นามสกุล และ ห้ามใช้ เครื่องหมาย  < > , ;</div>

                                <label for="ads_con_email">Email :</label>
                                <input id="ads_con_email" type="text" class="form-control" pattern="(^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,4}$)" required autocomplete="off">
                                <div class="invalid-feedback">กรุณากรอก Email เช่น " xxx@xxx.com " และ ห้ามใช้ เครื่องหมาย  < > , ;</div>

                                <label for="ads_con_line">Line ID :</label>
                                <input id="ads_con_line" type="text" class="form-control" required autocomplete="off" pattern="([^,<>;]+)">
                                <div class="invalid-feedback">กรุณากรอก Line ID และ ห้ามใช้ เครื่องหมาย  < > , ;</div>

                                <label for="ads_con_tel">เบอร์โทรศัพท์ :</label>
                                <input id="ads_con_tel" type="text" class="form-control" required autocomplete="off" pattern="(^0([8|9|6])([0-9]{8}$))">
                                <div class="invalid-feedback">กรุณากรอก เบอร์โทรศัพท์ 10หลัก เช่น " 0600000000 " และ ห้ามใช้ เครื่องหมาย  < > , ;</div>

                                <br />
                                <label id="ads_con_all_alt">**กรุณากรอกข้อมูลให้ครบทุกช่อง</label>
                                
                                <div class="text-right">
                                    <button class="btn" type="submit" class="movie-btnrequest">ตกลง</button>
                                </div>
                            </form>
                        </div>
                    </div>
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

<script type="text/javascript">
    $(document).ready(function() {
        $('.tab-header').on('click', '.tab-title:not(".disabled")',function() {
            $('.tab-header .tab-title').addClass('disabled')
            setTimeout(() => {
                $('.tab-header .tab-title').removeClass('disabled')
            }, 1000);
            if(!$(this).hasClass('active')) {
                let data = $(this).data('tab');
                $('.tab-header .tab-title').removeClass('active');
                $(this).addClass('active');
                $('.tab-body .tab-content').fadeOut('fast');
                setTimeout(() => {
                    $('.tab-body .tab-content[data-tab="'+data+'"]').fadeIn('fast');
                }, 400);
            }     
        })
    })
</script>