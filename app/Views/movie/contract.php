<section id="contract">
    <div class="container">
        <div class="content">
            <div class="content-data">
                <div class="tab-container">
                    <div class="tab-header">
                        <div data-tab="request_movie" class="tab-title active">ขอหนัง</div>
                        <div data-tab="request_anime" class="tab-title">ขออนิเมะ</div>
                        <div data-tab="ads" class="tab-title  ">ติดต่อลงโฆษณา</div>
                    </div>
                    <div class="tab-body">
                        <div data-tab="request_movie" class="tab-content active">
                            <form class="movie-formcontract" novalidate method="POST" action="">
                                <input id="request_movie_text" name="request_movie_text" type="text" class="form-control" required autocomplete="off">
                                <div class="text-right"><button class="btn" type="submit" class="movie-btnrequest">ตกลง</button></div>
                            </form>
                        </div>
                        <div data-tab="request_anime" class="tab-content">
                            <form class="movie-formcontract" novalidate method="POST" action="">
                                <input id="request_anime_text" name="request_anime_text" type="text" class="form-control" required autocomplete="off">
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
        </div>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function() {
        $('#searchicon').hide();
        $('.tab-header').on('click', '.tab-title:not(".disabled")',function() {
            $('.tab-header .tab-title').addClass('disabled')
            setTimeout(() => {
                $('.tab-header .tab-title').removeClass('disabled')
            }, 1000);
            if(!$(this).hasClass('active')) {
                let data = $(this).data('tab');
                $('.tab-header .tab-title').removeClass('active');
                $(this).addClass('active');
                $('.tab-body .tab-content').fadeOut(200);
                setTimeout(() => {
                    $('.tab-body .tab-content[data-tab="'+data+'"]').fadeIn('fast');
                }, 190);
            }     
        });

        $(".movie-formcontract").on("submit", function() {

            var form = $(this)[0];
            var request_movie_text = $.trim($("#request_movie_text").val());
            var request_anime_text = $.trim($("#request_anime_text").val());
            var ads_con_name = $.trim($("#ads_con_name").val());
            var ads_con_email = $.trim($("#ads_con_email").val());
            var ads_con_line = $.trim($("#ads_con_line").val());
            var ads_con_tel = $.trim($("#ads_con_tel").val());

            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            } else if (request_movie_text) {
                $.ajax({
                    url: "<?php echo $urlrequests  ?>",
                    type: 'POST',
                    async: false,
                    data: {
                        request_movie_text: request_movie_text
                    },
                    success: function(data) {
                        alert('ดำเนินการเรียบร้อยแล้วครับ')
                        setInterval(function(){  window.location.href = "<?= base_url() ?>";}, 2000);
                        
                        return false;
                    }
                });
                return false;

            } else if (request_anime_text) {
                $.ajax({
                    url: "<?php echo $urlrequestanime  ?>",
                    type: 'POST',
                    async: false,
                    data: {
                        request_anime_text: request_anime_text
                    },
                    success: function(data) {
                        alert('ดำเนินการเรียบร้อยแล้วครับ')
                        setInterval(function(){  window.location.href = "<?= base_url().'/anime' ?>";}, 2000);
                        
                        return false;
                    }
                });
                return false;

            } else {
            
            $.ajax({
                url: " <?php echo $urlconads ?>",
                type: 'POST',
                data: {
                ads_con_name: ads_con_name,
                ads_con_email: ads_con_email,
                ads_con_line: ads_con_line,
                ads_con_tel: ads_con_tel,

                },
                success: function(data) {
                alert('ดำเนินการเรียบร้อยแล้วครับ')
                setInterval(function(){  window.location.href = "<?= base_url() ?>";}, 2000);
                return false;

                }
            });
            return false;

            }



            form.classList.add('was-validated')
        });
    })
</script>