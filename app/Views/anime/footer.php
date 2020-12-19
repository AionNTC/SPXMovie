<footer>
    <div class="wrapper">
        <div class="container">
            <span>ดูอนิเมะออนไลน์</span> SPXMOVIE ดูอนิเมะออนไลน์ฟรี 2020 เต็มเรื่อง ดูการ์ตูน ANIME ดูการ์ตูนออนไลน์ อนิเมะพากษ์ไทย อนิเมะซับไทย เว็บดูอนิเมะฟรี HD อนิเมะชนโรง คมชัด ระดับ4K คุณภาพสูง : ALL RIGHT RESERVED COPYRIGHT © WWW.SPXMOVIE.COM 2020-2021
        </div>
    </div>
</footer>

<script>
  function goView(id, name, ep, nameep) {
    if(!nameep){
      nameep == ' '
    }
    countView(id);

    window.location.href = "/anime/" + id + '/' + name + '/' + ep + '/' + nameep;


  }

  function countView(id) {
      // alert(id);
      var base_url = '<?= base_url() ?>anime';
      $.ajax({

        url: base_url + "/countview/" + id,
        method: "GET",

        async: true,

        success: function(response) {

          console.log(response); // server response

        }


      });

    }
  

  function goCate(id, name) {
    window.location.href = "<?=base_url()?>/anime/category/" + id + '/' + name ;
  }

  /* Set the width of the side navigation to 0 */
  /* Set the width of the side navigation to 250px */
  function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.body.style.overflow = 'hidden'
    document.getElementById("overlay").style.display = "block";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.body.style.overflow = 'auto'
    document.getElementById("overlay").style.display = "none";
  }
    
</script>