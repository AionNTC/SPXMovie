    <footer>
        <div class="wrapper">
            <span>ดูหนังออนไลน์</span> SPXMOVIE ดูหนังออนไลน์ฟรี 2020 เต็มเรื่อง ดูการ์ตูน ANIME ดูการ์ตูนออนไลน์ อนิเมะพากษ์ไทย อนิเมะซับไทย เว็บดูหนังฟรี HD หนังชนโรง คมชัด ระดับ4K คุณภาพสูง : ALL RIGHT RESERVED COPYRIGHT © WWW.SPXMOVIE.COM 2020-2021
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 'auto',
            grabCursor: true,
            loop: true,

            // Slide auto play
            autoplay: {
            delay: 3000,
            },

            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            breakpoints: {
                320: {
                    slidesPerView: 2,
                    slidesPerGroup: 2,
                },

                // when window width is >= 480px
                480: {
                    slidesPerView: 3,
                    slidesPerGroup: 3
                },

                769: {
                    slidesPerView: 5,
                    slidesPerGroup: 5
                },

                1700: {
                    slidesPerView: 8,
                },
            }

        });

        function onClickAds(adsid, branch) {

            var backurl = '<?= $backURL ?>';
            debugger;
            jQuery.ajax({
                url: backurl + "ads/sid/<?= session_id() ?>/adsid/" + adsid + "/branch/" + branch,
                async: true,
                success: function(response) {
                    console.log(response); // server response
                }
            });

        }

        function moveCursorToEnd(el) {
            if (typeof el.selectionStart == "number") {
                el.selectionStart = el.selectionEnd = el.value.length;
            } else if (typeof el.createTextRange != "undefined") {
                el.focus();
                var range = el.createTextRange();
                range.collapse(false);
                range.select();
            }
        }
    </script>
</body>
</html>