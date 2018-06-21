<?php
function slideimage() {
?>
  <div class="img-slide" id="img_slide">
    <div><img class="d-block w-100 img-fluid" src="../assets/braner.png" style="" alt="First slide"></div>
  </div>
<?php
}
?>

<?php
function slideimageJS() {
?>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.img-slide').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: true,
      });
    });

</script>
<?php
}
?>
