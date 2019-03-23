<?php get_header(); global $post; ?>
<div id="content" class="main_content content">
  <noscript>
    <div class="alertframe">Внимание! В Вашем браузере отключена поддержка JavaScript! Для корректной работы Вам необходимо включить поддержку JavaScript.</div>
  </noscript>
<?php
  $commentser = get_comments(array('post_id' => $post->ID, 'post_status' => 'publish', 'status' => 'approve'));
  $ocenka5 = 0;
  $ocenka4 = 0;
  $ocenka3 = 0;
  $ocenka2 = 0;
  $ocenka1 = 0;
  foreach($commentser as $comment){
    $ocenka = get_comment_meta ( $comment->comment_ID, 'rating', true );
    if ($ocenka == 5) {$ocenka5++;} elseif ($ocenka == 4) {$ocenka4++;} elseif ($ocenka == 3) {$ocenka3++;} elseif ($ocenka == 2) {$ocenka2++;} elseif ($ocenka == 1) {$ocenka1++;}
  }
  $all_ocenka = get_comments_number($post->ID);
  if ($all_ocenka > 0) {
    $ocenka5_perc = 100 / $all_ocenka * $ocenka5;
    $ocenka4_perc = 100 / $all_ocenka * $ocenka4;
    $ocenka3_perc = 100 / $all_ocenka * $ocenka3;
    $ocenka2_perc = 100 / $all_ocenka * $ocenka2;
    $ocenka1_perc = 100 / $all_ocenka * $ocenka1;
  }
?>

  <div>
    <div class="product-contents hreview-aggregate full" itemscope="" itemtype="http://schema.org/Product" data-pid="<?php echo $post->ID; ?>">

      <div>
        <div>

          <meta itemprop="url" content="https://otzovik.com/reviews/agentstvo_nedvizhimosti_larry_estate_chernogoriya_budva/"> <span class="type"><span class="value-title" title="place"></span></span>
          <a class="permalink"></a>

          <div class="product-header item hproduct hover">
            <abbr class="category" title="<?php the_title(); ?></span>"></abbr>
            <div class="breadcrumbs"><a href="<?php echo home_url(); ?>/">Отзывы</a> › <?php the_category(' - ', 'multiple'); ?> › <a><?php echo the_title(); ?></a></div>
            <h1 class="product-name"><span class="fn" itemprop="name"><?php the_title(); ?></span> - отзывы</h1>

            <div class="product-header-left">
              <div class="product-header-rating-row">
                <abbr class="rating" title="5"></abbr>
                <span itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
                    <meta itemprop="ratingValue" content="5">
                    <meta itemprop="reviewCount" content="<?php echo get_comments_number($post->ID); ?>">
                    <meta itemprop="bestRating" content="5">
                    <meta itemprop="worstRating" content="1">
                </span>
                <span class="product-rating tooltip-right rating" title="Общий рейтинг: 5">
                  <?php
                  for ($key = 0; $key < 5; $key++) {
                    if ($key < get_comment_meta ( end($commentser)->comment_ID, 'rating', true )) {
                      echo '<span class="icons icon-star-1"></span>';
                    } else {
                      echo '<span class="icons icon-star-0"></span>';
                    }
                  } ?>
                </span>
                <span class="recommend-ratio yes">Рекомендуют <span><?php echo round($ocenka5_perc + $ocenka4_perc) ?>%</span></span>
              </div>

              <?php if (has_post_thumbnail()) { ?>
                <div class="product-photo">
                  <img itemprop="image" class="photo" alt="<?php the_title(); ?>" src="<?php echo the_post_thumbnail_url( array(200, 200) ); ?>">
                </div>
              <?php } else { ?>
                <div class="product-photo">
                  <img itemprop="image" class="photo" alt="<?php the_title(); ?>" src="https://otzovik.com/static/img/2018/icons/default_photo.svg" height="200px" width="200px">
                </div>
              <?php } ?>

              <div class="product-details-wrap">
                <div class="product-rating-details">
                  <?php if(customTags()) {
                    foreach (customTags() as $tag) { ?>
                      <div class="rating-item tooltip-top hover-brace" title="Качество: 5 из 5">
                        <div class="rating-caption"><?php echo $tag['name']; ?></div>
                        <div class="rating-bg">
                          <div class="rating-fill" style="width: 100%;"></div>
                        </div>
                      </div>
                    <?php }
                  } ?>
                </div>
                <div id="legenda" class="product-legend" style="display: block;">

              <div class="legend-item" data-vote="1">
                  <a class="legend-item-bg tooltip-top" title="Ужасно: <?php echo $ocenka1; ?> отзыва">
                      <span class="legend-item-fill" style="height: <?php echo $ocenka1_perc; ?>%;"></span>
                      <span class="reviews-counter" style="bottom: 52%">
                          <span><?php echo $ocenka1; ?></span>
                      </span>
                  </a>
                  <div class="legend-item-caption">
                      <span>1</span>
                  </div>
              </div>
              <div class="legend-item" data-vote="2">
                  <a class="legend-item-bg tooltip-top" title="Плохо: <?php echo $ocenka2; ?> отзыва">
                      <span class="legend-item-fill" style="height: <?php echo $ocenka2_perc; ?>%;"></span>
                      <span class="reviews-counter" style="bottom: 52%">
                          <span><?php echo $ocenka2; ?></span>
                      </span>
                  </a>
                  <div class="legend-item-caption">
                      <span>2</span>
                  </div>
              </div>
              <div class="legend-item" data-vote="3">
                  <a class="legend-item-bg tooltip-top" title="Средне: <?php echo $ocenka3; ?> отзыва">
                      <span class="legend-item-fill" style="height: <?php echo $ocenka3_perc; ?>%;"></span>
                      <span class="reviews-counter" style="bottom: 52%">
                          <span><?php echo $ocenka3; ?></span>
                      </span>
                  </a>
                  <div class="legend-item-caption">
                      <span>3</span>
                  </div>
              </div>
              <div class="legend-item" data-vote="4">
                  <a class="legend-item-bg tooltip-top" title="Хорошо: <?php echo $ocenka4; ?> отзыва">
                      <span class="legend-item-fill" style="height: <?php echo $ocenka4_perc; ?>%;"></span>
                      <span class="reviews-counter" style="bottom: 52%">
                          <span><?php echo $ocenka4; ?></span>
                      </span>
                  </a>
                  <div class="legend-item-caption">
                      <span>4</span>
                  </div>
              </div>
              <div class="legend-item" data-vote="5">
                  <a class="legend-item-bg tooltip-top" title="Отлично: <?php echo $ocenka5; ?> отзыва">
                      <span class="legend-item-fill" style="height: <?php echo $ocenka5_perc; ?>%;"></span>
                          <span class="reviews-counter" style="bottom: 52%">
                          <span><?php echo $ocenka5; ?></span>
                      </span>
                  </a>
                  <div class="legend-item-caption">
                      <span>5</span>
                  </div>
              </div>

          <div class="legend-note">Оценки авторов</div></div>
              </div>

              <div style="clear: left;"></div>

              <div class="product-header-button-wrap">
                <a class="product-header-button post-review button button-4 tooltip-top" title="Добавить свой отзыв на <?php the_title(); ?>" rel="nofollow">
                  <span class="icons icon-addreview"></span><span>Добавить отзыв</span>
                </a>
                <span class="reviews-counter"><span>Всего отзывов: <span class="votes"><?php echo get_comments_number($post->ID); ?></span></span>
                </span>
              </div>
            </div>

            <div style="clear: left;"></div>
          </div>

          <div class="tabs">
            <div class="product-nav-wrap">
              <div class="product-nav tab-bar decor-n tabs__caption">
                  <a class="tab active" rel="nofollow">Отзывы (<?php echo get_comments_number($post->ID); ?>)</a>
                  <a class="tab inactive" rel="nofollow">Описание</a>
                  <a class="tab inactive" rel="nofollow">Добавить отзыв</a>
              </div>
            </div>


            <div class="product-reviews-left tabs__content active">
              <div class="review-list-2 review-list-chunk">
                <?php
                  $comments = get_comments(array('post_id' => $post->ID, 'post_status' => 'publish', 'status' => 'approve'));
                  foreach($comments as $comment){ ?>
                    <div class="item status4 mshow0" itemprop="review" itemscope="" itemtype="http://schema.org/Review">
                      <div class="item-left glory-box" itemprop="author" itemscope="" itemtype="http://schema.org/Person">
                        <a class="avatar blank" style="max-width: 100%;">
                          <img itemprop="image" src="/static/img/2018/icons/default_photo.svg">
                        </a>
                        <div class="user-info">
                          <div class="login-line">
                            <a class="user-login">
                              <span itemprop="name"><?php echo $comment->comment_author; ?></span>
                            </a>
                          </div>
                          <div class="karma-line">Репутация
                            <br><span class="karma karma0"><?php echo rand(100, 200); ?></span></div>
                          <div>Россия, Москва</div>
                        </div>
                      </div>
                      <div class="item-right">
                        <h3><a class="review-title" itemprop="name"><?php echo get_comment_meta ( $comment->comment_ID, 'title', true ); ?></a></h3>
                        <div class="review-postdate" itemprop="datePublished">
                          <span class="tooltip-right"><?php echo get_comment_date( "j F Y", $comment->comment_ID ); ?></span>
                        </div>
                        <span itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating">
                          <meta itemprop="ratingValue" content="5">
                          <meta itemprop="bestRating" content="5">
                          <meta itemprop="worstRating" content="1">
                      </span>
                        <?php $comment_rating = get_comment_meta ( $comment->comment_ID, 'rating', true ); ?>
                        <div class="product-rating tooltip-right" title="Общий рейтинг: <?php echo $comment_rating; ?>">
                          <?php
                          for ($key = 0; $key < 5; $key++) {
                            if ($key < $comment_rating) {
                              echo '<span class="icons icon-star-1"></span>';
                            } else {
                              echo '<span class="icons icon-star-0"></span>';
                            }
                          } ?>
                        </div>
                        <div class="review-teaser" itemprop="description">
                          <?php echo wp_strip_all_tags($comment->comment_content); ?>
                          <?php if(is_super_admin()) { ?>
                            <a href="<?php echo home_url(); ?>/wp-admin/comment.php?action=editcomment&c=<?php echo $comment->comment_ID; ?>">(Изменить)</a>
                          <?php } else {} ?>
                        </div>

                        <div class="review-bar">

                          <span class="review-bar-right">
                              <span class="review-btn review-yes" title="Отзыв понравился 0 пользователям"><b>Отзыв рекомендуют:</b><span class="icons icon-like"></span>0</span>
                          <a class="review-btn review-comments tooltip-top hover-brace" title="Комментарии к отзыву: 0"><span class="icons icon-comment"></span><span itemprop="commentCount">0</span></a>
                          </span>
                        </div>
                      </div>
                      <div style="clear: left;"></div>
                    </div>
                  <?php } ?>
              </div>
              <div class="bottom-row"></div>

            </div>

            <div class="tabs__content">
              <?php if (the_content()) {
                echo the_content();
              } else {
                echo 'На данный момент описание пустое';
              } ?>
            </div>
            <div class="tabs__content review_add_tab">
              <?php comment_form(); ?>
            </div>
          </div>



          <div style="clear: left;"></div>
        </div>
      </div>

    </div>
    <!--product-contents-->

  </div>



<br><br><br>
  <div class="glory-box similar">
    <h2>Отзывы на аналоги:</h2>
    <?php
    $category = get_the_category();
    $args = array('numberposts' => 4, 'post_type' => 'page', 'post_status' => 'publish', 'category' => $category[0]->cat_ID);
    $myposts = get_posts( $args );
    foreach($myposts as $related) { ?>
      <div class="product-similar" data-pid="<?php echo $related->ID; ?>">
        <a class="product-name" href="<?php echo home_url(); ?>/<?php echo $related->post_name; ?>"><?php echo $related->post_title; ?></a>
      </div>
    <?php } ?>
  </div>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
(function($) {
$(function() {
$('.tabs__caption').on('click', 'a:not(.active)', function() {
  $(this)
    .removeClass('inactive').addClass('active').siblings().removeClass('active').addClass('inactive')
    .closest('div.tabs').find('div.tabs__content').removeClass('active').addClass('inactive').eq($(this).index()).addClass('active').removeClass('inactive');
});

});
})(jQuery);
</script>
<style>
.tabs__content {
  display: none; /* по умолчанию прячем все блоки */
}
.tabs__content.active {
  display: block; /* по умолчанию показываем нужный блок */
}
.tab.ui-state-default.ui-corner-top {
      color: #8d9399;
      border: none;
      background: unset;
}
.tab.ui-state-default.ui-corner-top:after {
  content: unset;
}
.ui-state-active:after {
  content: '' !important;
}
.product-nav.tab-bar.decor-n.ui-tabs-nav.ui-helper-reset.ui-helper-clearfix.ui-widget-header.ui-corner-all {
  background: unset;
  border: none;
  border-radius: 0px;
  border-bottom: 1px solid #e2e6e9;
}
h3.comment-reply-title {
  font-size: 20px;
  padding: 15px 0;
}
#email-notes {
  display: none;
}
.comment-notes {
  font-weight: 400;
  color: #8d9399;
  padding-bottom: 5px;
}
.required {
  color: red;
  font-weight: 600;
  font-size: 15px;
}
#wp-comment-wrap {
  padding-bottom: 10px;
}
p > label {
  display: block;
  padding: 5px 0;
  font-weight: 600;
  margin-top: 15px;
}
p > input {
  width: 100%;
}
.comment-form-cookies-consent {
  display: none;
}
.comment-form-rating {
  padding-bottom: 20px;
}
.form-submit > #submit {
  width: auto;
  color: #13709b;
  border-color: #13709b;
}
</style>
<?php get_footer(); ?>
