<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Promotion</th>
      <th scope="col">Discount</th>
      <th scope="col">Categories</th>
    </tr>
  </thead>
  <tbody>

    <?php 

        if($loop->have_posts()) : 
            while($loop->have_posts()) : 
                $loop->the_post();
                $promotion_categories_meta_data = unserialize(get_post_meta(get_the_ID(), "_promotion_categories", true));
                $categories = $promotion_categories_meta_data ? implode(",",$promotion_categories_meta_data) : "All Products"; 
    ?>
                <tr>
                    <a href="#">
                    <th scope="row">#<?php echo get_the_ID()?></th>
                    <td><?php echo get_the_title()?></td>
                    <td><?php echo get_post_meta(get_the_ID(), "_discount_value", true)?></td>
                    <td><?php echo $promotion_categories_meta_data ?></td>
                    </a>
                </tr>
    <?php            
            endwhile;
        endif;
    
    ?>
  </tbody>
</table>