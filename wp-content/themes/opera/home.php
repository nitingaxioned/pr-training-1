<?php 
/**
* Template Name: Home
*/
get_header();
$title = get_field('title');
$disc = get_field('description');
$list_title = get_field('posts_list_title');
?>
<!--main section start-->
<main>
    <div class="wrapper">
      <?php if($title) {?>
        <h2><?php echo $title; ?></h2>
      <?php } ?>
      <?php if($disc) {?>
        <p><?php echo $disc; ?></p>
      <?php } ?>
      <?php if($list_title) {?>
        <h3><?php echo $list_title; ?></h3>
        <?php get_template_part('template-parts/pages/home/content', 'post-list'); ?>
      <?php } ?>
    </div>
</main>
<!--main section end-->
<?php
get_footer(); 