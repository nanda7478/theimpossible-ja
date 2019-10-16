<?php
/*
 Display Template Name: Play Video
*/
get_header();
while ( have_posts() ) :
			the_post();
?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
 <div class="topbanner paint-border  paint-bottom position-relative" style="background-image: url(<?php if($image[0]){ echo $image[0];  }else{ echo 'http://theimpossibleco.com/wp-content/uploads/2019/04/image-1.png';  } ?>);">
	
  <div class=" w-100 d-table h-100">
    <div class="d-table-cell w-100 h-100 align-middle">
    		<div class="container">
  		
  	</div>
    </div>
  </div>
</div>
<div class="p-t-0 py-50-30">
<div class="container ">
<div class="row">
 <div class="col-md-12 t-t d-none d-md-block text-center">
     <?php 
    $play_id = $_GET['video_id'];
    $video_section =  get_field('vimeo_video_url',$play_id);
    if($video_section)
    {
      ?>
    <h2 class="f-56"><?php the_field('video_title', $play_id);?></h2>
  <?php } ?>
  </div>
</div>
  <div class="row">
    <div class="col-md-4">
      <nav class="woocommerce-MyAccount-navigation">
  <ul>
          <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard is-active">
        <a href="<?php echo site_url();?>/myaccount/">ライブラリ</a>
      </li>
          <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders">
        <a href="<?php echo site_url();?>/myaccount/orders/">注文履歴</a>
      </li>
          <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account">
        <a href="<?php echo site_url();?>/myaccount/edit-account/">アカウント詳細</a>
      </li>
          <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--customer-logout">
        <a href="<?php echo wp_logout_url(home_url('/myaccount/'));?>">ログアウト</a>
      </li>
      </ul>
</nav>
    </div>
      <div class="col-md-8 t-t">
        
        <div class="d-block d-md-none text-center">      
         <?php 
    $play_id = $_GET['video_id'];
    $video_section =  get_field('vimeo_video_url',$play_id);
    if($video_section)
    {
      ?>
    <h2 class="f-56"><?php the_field('video_title', $play_id);?></h2>
  <?php } ?>

</div>


        <div class="play_video_id">
        <?php
        $play_id = $_GET['video_id'];
        ?>

        <?php //echo $play_id;?>
        <?php 
	  $video_section =  get_field('vimeo_video_url',$play_id);
	  if($video_section)
	  {
	  	?>

       <?php //echo $video_section;?>
<div class="res-video">
       <iframe id="thevideo" src="<?php echo $video_section;?>" width="700" height="450" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
</div>

       <!-- <div class="vimeo_description"><?php //the_field('video_title', $play_id);?></div> -->
       <div class="links">
        <div class="chapter_title"><?php the_field('chapter_title', $play_id);?></div>
        <?php while(have_rows('vimeo_chapter_repeater', $play_id)): the_row(); ?>
          <?php
          $time = get_sub_field('vimeo_chapter_time');
$time  = explode(":",$time);
$sec = ($time[0]*60*60) + ($time[1]*60) + ($time[2]);
?>
    <a href="#" data-seek="<?php echo $sec;?>" class="timecode"><?php the_sub_field('vimeo_chapter_title');?></a><br/>
  <?php endwhile;?>
</div>
  <script type="text/javascript" src="https://f.vimeocdn.com/js/froogaloop2.min.js"></script>
<script>
      jQuery(function ($) {// Document Ready (important!)

  // Get the video element that we wish to control
  var iframe = document.getElementById('thevideo');

  // Initialize Froogaloop (linked .js.min file) on the captured video
  var player = $f(iframe);

  // When a link with a class of "timecode" is clicked, capture the event
  $('.timecode').on('click', function (e) {
    // Prevent the default link (typically a hash) from executing
    e.preventDefault();
    // Get the location value from the HTML5 data parameter
    var seekVal = $(this).attr('data-seek');
    // Using Froogaloop, trigger the SeekTo method using the captured value
    player.api('seekTo', seekVal);
  });

});
      //# sourceURL=pen.js
    </script>

       <!-- <video controls width="700">
  <source src="<?php echo $video_section;?>" type="video/mp4">
  Your browser does not support the video tag.
</video> -->
		         
   <?php } ?> 
    </div>
    <div class="vimeo_description"><?php //the_field('vimeo_description', $play_id);?></div>
    

       </div> 
     </div> 

<?php the_content(); ?>	

</div>
</div>

	


<?php endwhile; ?>


<?php
get_footer();
?>
