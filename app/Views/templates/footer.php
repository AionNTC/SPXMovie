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

        $(document).ready(function() {
            $('.navbar').on('click', '.navbar-toggler:not(".disabled")',function() {
                $('.navbar .navbar-toggler').addClass('disabled')
                setTimeout(() => {
                    $('.navbar .navbar-toggler').removeClass('disabled')
                }, 1000);
                $('#navbarNavAltMarkup').toggleClass('active');
                if($('.search .search-form').hasClass('active')) {
                    $('.search .search-form').toggleClass('active')
                }     
            });

            $('.navbar').on('click', '.search:not(".disabled")',function() {
                $('.navbar .search').addClass('disabled')
                setTimeout(() => {
                    $('.navbar .search').removeClass('disabled')
                }, 1000);
                $('.search .search-form').toggleClass('active');
                if($('#navbarNavAltMarkup').hasClass('active')) {
                    $('#navbarNavAltMarkup').toggleClass('active')
                }     
            });
        })
    </script>
</body>
</html>