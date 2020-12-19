    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.2/jquery.twbsPagination.min.js"></script>
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

            
        function goSearch() {
            var search = $.trim($("#movie-search").val())

            if (search) {
                window.location.href = "/search/" + $("#movie-search").val();
            } else {
                window.location.href = "<?= base_url() ?>";
            }
        }

        $(document).ready(function() {
            <? if(isset($list) && $list['total_page'] != 0) { ?>
                var $pagination = $('#pagination-demo');
                var defaultOpts = {
                    next: '>',
                    prev: '<',
                    first: '<<',
                    last: '>>',
                    hideOnlyOnePage: true,
                    startPage: parseInt(`<? echo $list['page']; ?>`),
                    totalPages: parseInt(`<? echo $list['total_page']; ?>`),
                    initiateStartPageClick: false,
                    onPageClick: function (event, page) {
                        $params = 'page='+page;
                        <? if(isset($order) && $order == 'top-view') { ?>
                            $params += '&order=top-view'
                        <? } ?>
                        window.location.href = "<? base_url() ?>"+'?'+$params;
                    }
                };
                $pagination.twbsPagination(defaultOpts);
            <? } ?>

            

            $('#movie-formsearch').submit(function(e) {
                goSearch();
                return false; //<---- Add this line
            });

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

            $('.navbar').on('click', '.fas.fa-search:not(".disabled")',function() {
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