<?php
/*
Template Name: Шаблон страницы со всеми компаниями
Template Post Type: post, page, product
*/
?>
  <?php get_header(); ?>



    <div id="content" class="main_content content">
      <noscript>
        <div class="alertframe">Внимание! В Вашем браузере отключена поддержка JavaScript! Для корректной работы Вам необходимо включить поддержку JavaScript.</div>
      </noscript>

      <div class="breadcrumbs"><a href="/">Главная</a></div>
      <h1>Каталог</h1>

      <div class="sitemap">
        <div class="sitemap-left">
          <ul class="level1">
            <?php
               $categories = get_categories(array(
	               'orderby' => 'name',
	               'order' => 'ASC',
                 'parent' => '0',
                  'hide_empty'   => 0,
               ));
               $categories_count = count($categories);
               foreach( $categories as $category ){ if ($tmp++ < ($categories_count / 2)) { ?>
                 <li>
                   <h2>
                     <span class="icons"></span>
                     <a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->name; ?></a>
                   </h2>
                   <?php
                      $categories_child = get_categories(array(
                        'orderby' => 'name',
                        'order' => 'ASC',
                         'hide_empty'   => 0,
                        'parent' => $category->term_id
                      ));
                      if ($categories_child) { ?>
                        <ul class="level2">
                        <?php foreach( $categories_child as $category_child ){ ?>
                          <li>
                            <h3><a href="<?php echo get_category_link( $category_child->term_id ); ?>"><?php echo $category_child->name; ?></a></h3>
                          </li>
                        <?php } ?>
                        </ul>
                      <?php } ?>
                 </li>
               <?php }} ?>
          </ul>
        </div>
        <div class="sitemap-right">
          <ul class="level1">
            <?php
               $categories = get_categories(array(
	               'orderby' => 'name',
	               'order' => 'ASC',
                 'parent' => '0',
                  'hide_empty'   => 0,
               ));
               $categories_count = count($categories);
               $tmp = 0;
               foreach( $categories as $category ){ if ($tmp > ($categories_count / 2)) { $tmp++; ?>
                 <li>
                   <h2>
                     <span class="icons"></span>
                     <a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->name; ?></a>
                   </h2>
                   <?php
                      $categories_child = get_categories(array(
                        'orderby' => 'name',
                        'order' => 'ASC',
                         'hide_empty'   => 0,
                        'parent' => $category->term_id
                      ));
                      if ($categories_child) { ?>
                        <ul class="level2">
                        <?php foreach( $categories_child as $category_child ){ ?>
                          <li>
                            <h3><a href="<?php echo get_category_link( $category_child->term_id ); ?>"><?php echo $category_child->name; ?></a></h3>
                          </li>
                        <?php } ?>
                        </ul>
                      <?php } ?>
                 </li>
               <?php } else { $tmp++; } } ?>
          </ul>
        </div>
        <div style="clear: left;"></div>
      </div>
    </div>



    <?php get_footer(); ?>
