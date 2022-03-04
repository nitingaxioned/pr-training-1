<?php
$posts = get_field('posts_for_list');
?>
<ul class="list">
    <?php 
    if ($posts) { 
        foreach ($posts as $val) {
            if($val->post_status == "publish") {
                $title = $val->post_title;
                $content = $val->post_content;
                $current_post_id = $val->ID;
				if (has_post_thumbnail($current_post_id)) {
					$img_url = get_the_post_thumbnail_url($current_post_id);
					$alt = get_post_meta( get_post_thumbnail_id($current_post_id), '_wp_attachment_image_alt', true);
				}
                ?>
                <li>
                    <?php
                    if ( $title ) {?>
                        <h4><?php echo $title; ?></h4>
                    <?php }
                    if ( has_post_thumbnail($current_post_id) ) {?>
                        <img src='<?php echo $img_url; ?>' alt='<?php echo $alt; ?>'>
                    <?php }  
                    if ( $content ) {?>
                        <div><?php echo $content; ?></div>
                    <?php } ?>
                    <a title="Read More" href="<?php echo $link; ?>"><button class='btn'>Read More</button></a>
                </li>
            <?php 
            }
        }
    } else {
        ?>
        <li><p>No posts available  :(</p></li>
        <?php
    } ?>
</ul>