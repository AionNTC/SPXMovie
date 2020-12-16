<footer>
    <div class="wrapper">
        <div class="container">
            <span>ดูหนังออนไลน์</span> SPXMOVIE ดูหนังออนไลน์ฟรี 2020 เต็มเรื่อง ดูการ์ตูน ANIME ดูการ์ตูนออนไลน์ หนังพากษ์ไทย หนังซับไทย เว็บดูหนังฟรี HD หนังชนโรง คมชัด ระดับ4K คุณภาพสูง : ALL RIGHT RESERVED COPYRIGHT © WWW.SPXMOVIE.COM 2020-2021
        </div>
    </div>
</footer>

<script>
  function goView(id, name, type) {
    countView(id);

    var url = '';
    if(type=='se'){
      url = "<?=base_url()?>/series/" + id + '/' + name ;
    }else{
      url = "<?=base_url()?>/video/" + id + '/' + name ;
    }

    window.open(url, '_blank');

  }

  function goEP(id, name, index, epname) {
    countView(id);
    window.location.href = "<?=base_url()?>/series/" + id + '/' + name + '/' + index + '/' + epname ;
  }

  function countView(id) {
      // alert(id);
      var base_url = '<?= base_url() ?>';
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
    window.location.href = "<?=base_url()?>/category/" + id + '/' + name ;
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