<?php
$queryArr = array(
    'posts_per_page' => 5,
    'post_type' => 'post',
    'post_status' => array('publish'),
);
$res = new wp_Query($queryArr);
?>
<ul>
    <?php if ($res->found_posts < 1 ) { ?>
        <li><p>No posts available  :(</p></li>
        <?php
    } else {
        while ( $res->have_posts() ) { 
            $res->the_post(); 
            $title = get_the_title();
            $content = get_the_content();
            if (has_post_thumbnail()) {
                $img_url = get_the_post_thumbnail_url();
                $alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
            }
            $link = get_permalink();
            ?>
            <li>
                <?php
                if ( $title ) {?>
                    <h4><?php echo $title; ?></h4>
                <?php }
                if ( has_post_thumbnail() ) {?>
                    <img src='<?php echo $img_url; ?>' alt='<?php echo $alt; ?>'>
                <?php }  
                if ( $content ) {?>
                    <p><?php echo $content; ?></p>
                <?php } ?>
                <a title="Read More" href="<?php echo $link; ?>"><button class='btn'>Read More</button></a>
            </li>
            <?php 
        }
    } ?>
</ul>