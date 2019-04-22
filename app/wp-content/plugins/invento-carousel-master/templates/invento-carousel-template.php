<?php

$args = array(
    'post_type' => 'banners_home',
    'posts_per_page' => 5,
    'order' => 'DESC' 
);

$loop = new WP_Query($args);

?>
<section id="banners-home" class="half-grey-top">
    <div class="container">
        <div class="row">
        <ul class="banners-list">
            
<?php
foreach ($loop->posts as $key => $post):
	$image = get_the_post_thumbnail_url($post->ID);
?>
            <li id="banner-<?php echo $key?>">
                <a href="<?php echo site_url('calcados'); //echo get_permalink(); ?>" class="">
                    <img src="<?php echo $image; ?>" class="horizontal-center img-fluid" title="<?php //echo get_the_title(); ?>" alt="<?php echo get_the_title(); ?>" />
                </a>
            </li>	

<?php endforeach; ?>
        </ul>

<!-- Exibe a navegaçao dos banners apenas quando houver mais do que UM banner -->
<?php if (count($loop->posts) > 1): ?>
        <ul class="banners-control clearfix horizontal-center">
            <?php foreach ($loop->posts as $key => $post): ?>
                <li><a href="#banner-<?php echo $key?>" class="ir"><?php echo get_the_title(); ?></a></li>             
            <?php endforeach ?>        
        </ul>
        </div>
<?php endif ?>
    
    </div>
</section>