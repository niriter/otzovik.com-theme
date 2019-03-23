<?php get_header(); global $post; ?>





            <div id="content" class="main_content content" style="padding: 16px;background-color: white;box-shadow: 0 0 8px 1px rgba(0,0,0,0.08);border-radius: 3px;">
              <noscript>
                <div class="alertframe">Внимание! В Вашем браузере отключена поддержка JavaScript! Для корректной работы Вам необходимо включить поддержку JavaScript.</div>
              </noscript>


              <div class="breadcrumbs">
                <a href="<?php echo home_url(); ?>/">Отзывы</a> › Поиск</div>

              <h1>Отзывы о <?php echo get_search_query(); ?></h1>


              <script type="text/javascript">
                $(function() {
                  $('.sort-header').click(function() {
                    $('.sort-header.current').removeClass('current');
                    $('#search-sort-trigger > span:first-child').text($(this).text());
                    $(this).addClass('current');
                    var p = $('.product-list table');
                    var len = $('.sortable', p).length;
                    var sort = $(this).attr('data-sort');
                    var order = $(this).attr('data-order');
                    var superSlowJSSort = function() {
                      var rows = $('.sortable', p);
                      rows.sort(function(x, y) {
                        var a = parseFloat($(x).attr('data-' + sort));
                        var b = parseFloat($(y).attr('data-' + sort));
                        if (order == 'asc') {
                          if (a > b) {
                            return 1;
                          } else if (a < b) {
                            return -1;
                          } else {
                            return 0;
                          }
                        } else {
                          if (a < b) {
                            return 1;
                          } else if (a > b) {
                            return -1;
                          } else {
                            return 0;
                          }
                        }
                      });
                      var tbody = $('<tbody></tbody>').append(rows);
                      $('tbody', p).replaceWith(tbody);
                    }
                    if (len > 50) {
                      setTimeout(superSlowJSSort, 170);
                    } else {
                      superSlowJSSort();
                    }
                    $('#search-sort-popup').hide();
                    $('#search-sort-trigger .icons').toggleClass('icon-up icon-down');
                    return false;
                  });

                  $('#search-sort-trigger').click(function() {
                    $('#search-sort-trigger .icons').toggleClass('icon-up icon-down');
                    $('#search-sort-popup').toggle();
                  });
                });
              </script>
              <style type="text/css">
                .cat-panel-popup {
                  display: none;
                }

                .sort-header {
                  cursor: pointer;
                  white-space: nowrap;
                }

                .hasHover .sort-header:hover {
                  color: #2c2c2c;
                  text-decoration: underline;
                }
              </style>
              <div class="cat-panel-box">

                <div id="cat-panel" class="cat-panel">
                  <div class="cat-panel-left">
                    Сортировать:
                    <div>
                      <a id="search-sort-trigger" class="cat-panel-trigger"><span>По релевантности</span><span class="icons icon-down"></span></a>
                      <div id="search-sort-popup" class="cat-panel-popup glory-box cloud decor-n">
                        <div>
                          <a class="sort-header current" data-sort="i" data-order="asc">По релевантности</a>
                          <br>
                          <a class="sort-header" data-sort="reviews" data-order="desc">По числу отзывов</a>
                          <br>
                          <a class="sort-header" data-sort="rating" data-order="desc">Сначала лучшие</a>
                          <br>
                          <a class="sort-header" data-sort="rating" data-order="asc">Сначала худшие</a>
                          <br>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="cat-panel-right">
                    Найдено <b><?php global $wp_query; echo ($wp_query->found_posts - 1); ?></b> объектов </div>
                  <div style="clear: both;"></div>
                </div>
              </div>


              <div class="product-list">
                <table>
                  <colgroup>
                    <col width="90px">
                      <col>
                        <col width="120px">
                  </colgroup>
                  <thead>
                    <tr>
                      <th>

                      </th>
                      <th>
                        <span>Название</span>
                      </th>
                      <th>
                        <span>Рейтинг</span>
                      </th>
                    </tr>
                  </thead>
                  <tbody>



                    <?php if ( have_posts() ) : ?>
                      <?php while ( have_posts() ) : the_post(); ?>
                        <?php
                          $commentser = get_comments(array('post_id' => $post->ID, 'post_status' => 'publish', 'status' => 'approve'));
                          $ocenka5 = 0;
                          $ocenka4 = 0;
                          $ocenka3 = 0;
                          $ocenka2 = 0;
                          $ocenka1 = 0;
                          foreach($commentser as $comment){
                            $ocenka = get_comment_meta ( $comment->comment_ID, 'rating', true );
                            if ($ocenka == 5) {$ocenka5++;} elseif ($ocenka == 4) {$ocenka4++;} elseif ($ocenka == 3) {$ocenka3++;} elseif ($ocenka == 2) {$ocenka2++;} elseif ($ocenka == 1) {$ocenka1++;} else {}
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
                        <tr class="item" data-pid="1388677">
                          <td>
                            <div class="product-photo has-photo">
                              <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) { ?>
                                  <img alt="<?php the_title(); ?>" src="<?php echo the_post_thumbnail_url( array(60, 60) ); ?>">
                                <?php } else { ?>
                                  <img alt="<?php the_title(); ?>" src="//i.otzovik.com/nophoto_m.png">
                                <?php } ?>
                              </a>
                            </div>
                          </td>
                          <td>
                            <h3>
                              <a href="<?php the_permalink(); ?>" class="product-name"><?php the_title(); ?></a>
                            </h3>
                            <a href="<?php the_permalink(); ?>" rel="nofollow" class="button button-2" data-pid="1388677">+ Добавить отзыв</a>
                          </td>
                          <td>
                            <div class="product-rating tooltip-left hover-brace" title="Общий рейтинг: 1">
                              <?php
                              for ($key = 0; $key < 5; $key++) {
                                if ($key < get_comment_meta ( end($commentser)->comment_ID, 'rating', true )) {
                                  echo '<span class="icons icon-star-1"></span>';
                                } else {
                                  echo '<span class="icons icon-star-0"></span>';
                                }
                              } ?>
                              </div>
                            <a href="<?php the_permalink(); ?>" class="reviews-counter"><?php echo get_comments_number($post->ID); ?> отзыв</a> </td>
                        </tr>
                      <?php endwhile; ?>
                    <?php else : ?>
                      <tr><h4>По запросу <b>"<?php echo get_search_query(); ?>"</b> ничего не нашлось. Попробуйте изменить условия поиска.</h4></tr>
                    <?php endif; ?>


                  </tbody>
                </table>

              </div>

              <br>

            </div>


            <?php get_footer(); ?>
