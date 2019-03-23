<?php get_header(); ?>

  <div id="content" class="main_content content">
    <noscript>
      <div class="alertframe">Внимание! В Вашем браузере отключена поддержка JavaScript! Для корректной работы Вам необходимо включить поддержку JavaScript.</div>
    </noscript>



    <div class="content-left">

      <div class="useful home-box glory-box">
        <h1><?php the_field('head_block'); ?></h1>
        <?php the_field('text_block'); ?>
      </div>

      <div class="vitrina home-box glory-box">
        <h3>Новое</h3>
        <a class="vitrina-prev icons icon-left"></a>
        <a class="vitrina-next icons icon-right"></a>
        <div class="vitrina-wrap">
          <?php $recent_comments = get_comments( array(
            'number'      => 15, // number of comments to retrieve.
            'status'      => 'approve', // we only want approved comments.
            'post_status' => 'publish' // limit to published comments.
        ) );
        if ( $recent_comments ) {
          $fl = 0;
            foreach ( (array) $recent_comments as $comment ) { $page = get_post($comment->comment_post_ID); $fl = $fl + 1; ?>
            <?php
                $commentser = get_comments(array('post_id' => $page->ID, 'post_status' => 'publish', 'status' => 'approve'));
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

              <a class="<?php if ($fl < 3) { ?>gr gr05 <?php } elseif ($fl < 7 && $fl > 2) { ?>gr gr025 <?php } else { ?> gr-after <?php } ?> decor-n" href="<?php echo get_permalink($page->ID); ?>" title="<?php echo $page->post_title; ?>">
                <?php if (has_post_thumbnail( $page->ID )) { ?>
                  <div class="image" data-url="<?php echo get_the_post_thumbnail_url($page->ID, array(300, 200)) ?>" style="background-image: url(<?php echo get_the_post_thumbnail_url($page->ID, array(300, 200)) ?>)"></div>
                  <?php } else { ?>
                    <div class="image" data-url="http://otzovik.com/static/img/2018/icons/default_photo.svg" style="background-image: url(http://otzovik.com/static/img/2018/icons/default_photo.svg)"></div>
                    <?php } ?>
                      <div class="product-name">
                        <?php echo $page->post_title; ?>
                      </div>
                      <span class="product-rating tooltip-right" title="Общий рейтинг: 4.78">
                      <?php
                      for ($key = 0; $key < 5; $key++) {
                        if ($key < get_comment_meta ( end($commentser)->comment_ID, 'rating', true )) {
                          echo '<span class="icons icon-star-1"></span>'; } else { echo '<span class="icons icon-star-0"></span>'; } } ?>
                      </span>
                      <span class="reviews-counter"><?php echo get_comments_number($page->ID); ?> отзыва</span>
              </a>
              <?php } } ?>
        </div>
      </div>

      <script type="text/javascript">
        function load_bg(selector, limit) {
          limit = limit || 6;
          $(selector).each(function(index) {
            if (index < limit) {
              var self = this;
              var url = this.getAttribute('data-url');
              if (!url) return false;
              this.removeAttribute('data-url');
              var l_img = new Image();
              l_img.onload = function() {
                self.style.backgroundImage = "url(" + url + ")";
              };
              l_img.src = url;
            }
          });
        }

        $(function() {
          load_bg('.vitrina .gr .image', 6);

          $('.vitrina-prev').hide().click(function() {
            $('.gr').last().removeClass('gr').addClass('gr-after');
            $('.gr-behind').last().removeClass('gr-behind').addClass('gr');
            load_bg('.gr:first .image');
            $('.gr').slice(0, 2).removeClass('gr025').addClass('gr05');
            $('.gr').slice(2).addClass('gr05').addClass('gr025');
            if ($('.gr-behind').length === 0) $(this).hide();
            $('.vitrina-next').show();
            return false;
          });
          $('.vitrina-next').click(function() {
            $('.gr').first().removeClass('gr').addClass('gr-behind');
            $('.gr-after').first().removeClass('gr-after').addClass('gr');
            load_bg('.gr:last .image');
            $('.gr').slice(0, 2).removeClass('gr025').addClass('gr05');
            $('.gr').slice(2).addClass('gr05').addClass('gr025');
            if ($('.gr-after').length === 0) $(this).hide();
            $('.vitrina-prev').show();
            return false;
          });
        });
      </script>
      <div class="reviews home-box glory-box">
        <div class="home-reviews-bar tab-bar decor-n">
          <span class="tab active">Лучшие отзывы</span><a class="tab inactive">Все последние отзывы</a>
        </div>
        <div id="home-reviews" class="home-reviews">
          <div class="review-list-chunk">
            <div class="review-list-1 review-list-chunk">

              <?php $pages_for_random = get_posts(array('numberposts' => 100, 'post_type' => 'page'));
              for ($p = 0; $p < 16; $p++) {
                $random = rand(0, count($pages_for_random));
                $rand_page = $pages_for_random[$random];
                $comments_for_random = get_comments( array('post_id' => $rand_page->ID, 'post_status' => 'publish', 'post_type' => 'page') );
                $testerok = rand(0, count($comments_for_random));
                if (array_key_exists($testerok, $comments_for_random)) {
                  $rcomment = $comments_for_random[$testerok]; ?>
                  <div class="item mshow1" data-id="7915445" data-pid="391542" data-time="2019-03-20 15:33:51">
                    <div class="item-left">
                      <a class="product-photo" href="<?php echo get_permalink( $rand_page->ID ); ?>" title="<?php echo get_the_title( $rand_page->ID ); ?>">
                        <?php if(has_post_thumbnail($rand_page->ID)) { ?>
                          <img alt="<?php echo $rand_page->post_title; ?>" src="<?php echo get_the_post_thumbnail_url( $rand_page->ID, $size ); ?>">
                        <?php } else { ?>
                          <img alt="<?php echo $rand_page->post_title; ?>" src="http://otzovik.com/static/img/2018/icons/default_photo.svg">
                        <?php } ?>
                      </a>
                      <div class="product-rating tooltip-right" title="Общий рейтинг: <?php echo get_comment_meta($rcomment->comment_ID, 'rating', true); ?>">
                        <?php
                        for ($key = 0; $key < 5; $key++) {
                          if ($key < get_comment_meta ( $rcomment->comment_ID, 'rating', true )) {
                            echo '<span class="icons icon-star-1"></span>';
                          } else {
                            echo '<span class="icons icon-star-0"></span>';
                          }
                        } ?>
                      </div>
                      <a class="reviews-counter"><?php echo get_comments_number($rand_page->ID); ?> отзывов</a>
                      <div class="recommend-ratio yes">
                        Рекомендуют 100%
                      </div>
                    </div>
                    <div class="item-right">
                      <h3><a class="product-name" href="<?php echo get_permalink( $rand_page->ID ); ?>"><?php echo get_the_title( $rand_page->ID ); ?></a></h3>
                      <div class="user-info">
                        <a class="avatar">
                          <img src="//i.otzovik.com/2017/03/avatar/1086723.jpg">
                        </a>
                        <a class="user-login fit-with-ava"><?php echo $rcomment->comment_author; ?></a>
                        <br>
                        <span class="review-postdate"><?php echo get_comment_date( "j F Y", $rcomment->comment_ID ); ?></span>
                      </div>
                      <div class="review-title">"<?php echo get_comment_meta( $rcomment->comment_ID, 'title', true ); ?>"</div>
                      <span class="review-photo-video">
                        <span class="icons icon-photo tooltip-top hover-brace" title="Есть фото"></span>
                      </span>

                      <div class="plus-title"><span class="icons icon-plus"></span><b>Отзыв:</b></div>
                      <div class="review-plus"><?php echo wp_trim_words($rcomment->comment_content, 20); ?></div>

                      <!--<div class="minus-title"><span class="icons icon-minus"></span><b>Недостатки:</b></div>
                      <div class="review-minus">Для меня не было.</div>-->
                      <div class="review-bar">
                        <a class="review-btn review-read-link" href="<?php echo get_comment_link( $rcomment->comment_ID ); ?>">
                          <span class="icons icon-views"></span><b>Читать весь отзыв</b>
                        </a>
                        <span class="review-bar-right">
                        <span class="review-btn review-yes" title="<?php $like_rand = rand(10, 50); echo $like_rand; ?>">
                            <b>Отзыв понравился:</b><span class="icons icon-like"></span><?php echo $like_rand; ?></span>
                        </span>
                      </div>
                    </div>
                    <div style="clear: left;"></div>
                  </div>
                <?php } else { continue; } } ?>
            </div>
          </div>
        </div>

        <div class="home-reviews-bottom">
          <button id="home-load-more" class="home-load-more button-2"><span>Загрузить ещё</span><span class="icons icon-down"></span></button>
        </div>
      </div>

      <div class="stats home-box glory-box">
        <div class="home-stat-line">
          <div class="home-stat" style="width: 39%; border-right: 1px solid gainsboro;">Авторов сейчас на сайте
            <div>3522</div>
          </div>
          <div class="home-stat" style="width: 25%;">Всего отзывов
            <div>6352389</div>
          </div>
          <div class="home-stat" style="width: 36%;">Всего комментариев
            <div>30741318</div>
          </div>
        </div>
        <div class="home-stat-line">
          <div class="home-stat" style="width: 26%;">Официальных представителей
            <div><a class="decor-u2n">1661</a></div>
          </div>
          <div class="home-stat" style="width: 35%; border-right: 1px solid gainsboro;">всего у них комментариев
            <div>106166</div>
          </div>
          <div class="home-stat" style="width: 39%;">Отмечено мест на карте
            <div><a class="decor-u2n">98186</a></div>
          </div>
        </div>
      </div>

      <div class="top home-box glory-box">
        <div class="top-wrap">
          <a ><span><span class="icons icon-top">100</span><br>ТОП-100 Авторов<br><span class="icons icon-arrow-right-long"></span></span></a>
          <a ><span><span class="icons icon-top">5</span><br>ТОП-5 Успешных<br><span class="icons icon-arrow-right-long"></span></span></a>
          <a ><span><span class="icons icon-top"><span class="icons icon-delete"></span></span><br>Анти-ТОП<br><span class="icons icon-arrow-right-long"></span></span></a>
        </div>
      </div>

      <input id="howto-checkbox" type="checkbox" class="toggle-checkbox">
      <style>
        .howto.home-box.glory-box h3 {
          margin-top: 21px;
        }
      </style>
      <div class="howto home-box glory-box">
        <?php the_content(); ?>
          <a class="howto-read">
            <label class="toggle-label" for="howto-checkbox">Читать дальше<span class="icons icon-down"></span></label>
          </a>
      </div>
    </div>

    <div class="content-right">

      <div class="officials home-box glory-box">
        <h2>Официальные представители</h2>
        <div>Представители различных фирм оперативно помогают на Отзовике решить любые вопросы прямо в отзывах недовольных клиентов:</div>
        <br>
        <div class="home-official" data-cid="75204445">
          <table>
            <tr>
              <td><img src="//i.otzovik.com/objects/m/10000/3887.png" alt="МГТС"></td>
              <td><a class="home-official-name tooltip-top" title="Посмотреть профиль представителя">Московская городская телефонная сеть "МГТС" (Россия, Москва)</a></td>
            </tr>
          </table>
          <a class="home-official-text tooltip-top" title="Открыть комментарий">&laquo;Добрый день! Об изменении стоимости тарифных планов мы информировали на сайте, в соответствии со ст.28 Федерального закона "О связи", п.24 "Порядок оказания услуг связи".&raquo;</a>
        </div>
        <div class="home-official" data-cid="75161859">
          <table>
            <tr>
              <td><img src="//i.otzovik.com/2014/07/avatar/84848.jpg" alt="svyaznoyofficial"></td>
              <td><a class="home-official-name tooltip-top" title="Посмотреть профиль представителя">Салон сотовой связи "Связной"</a></td>
            </tr>
          </table>
          <a class="home-official-text tooltip-top" title="Открыть комментарий">&laquo;Приветствуем! Пришлите, пожалуйста, ссылку на данный пост, фото/скан чека о покупке на адрес otzyv@svyaznoy.ru. Спасибо!&raquo;</a>
        </div>
        <div class="home-official" data-cid="75128769">
          <table>
            <tr>
              <td><img src="//i6.otzovik.com/2018/03/avatar/71083505.jpeg?8e6a" alt="Альфа-Банк"></td>
              <td><a class="home-official-name tooltip-top" title="Посмотреть профиль представителя">Банк "Альфа-Банк"</a></td>
            </tr>
          </table>
          <a class="home-official-text tooltip-top" title="Открыть комментарий">&laquo;Добрый день, Ирина!

Вы можете отправить заказным письмом нам официальный запрос на корреспонденцию
Адрес: 107078, Москва, ул. Каланчевская, 27
Тел.: +7 495 620-91-91
Телекс: 412089 ALFA RU&raquo;</a>
        </div>
        <div class="home-official" data-cid="75111388">
          <table>
            <tr>
              <td><img src="//i6.otzovik.com/2018/04/avatar/9008101.jpeg?295" alt="YandexTaxi"></td>
              <td><a class="home-official-name tooltip-top" title="Посмотреть профиль представителя">Такси "Яндекс.Такси" (Россия, Москва)</a></td>
            </tr>
          </table>
          <a class="home-official-text tooltip-top" title="Открыть комментарий">&laquo;Здравствуйте! Платёж с карты может пройти только тогда, когда вы выбрали этот способ в приложении. Давайте мы всё проверим. Пожалуйста, отправьте подробности поездки нам на blogs@taxi.yandex.ru.&raquo;</a>
        </div>
        <div class="home-official" data-cid="74377023">
          <table>
            <tr>
              <td><img src="//i6.otzovik.com/2018/08/avatar/34966403.png?8cff" alt="TEZ TOUR"></td>
              <td><a class="home-official-name tooltip-top" title="Посмотреть профиль представителя">Туроператор "Тез тур"</a></td>
            </tr>
          </table>
          <a class="home-official-text tooltip-top" title="Открыть комментарий">&laquo;Добрый день.
В стоимость экскурсионной программы TEZ TOUR заложена необходимая дополнительная страховка, которая покрывается все возможные риски ,что гарантирует туристам безопасность.&raquo;</a>
        </div>
        <div class="home-official" data-cid="55587750">
          <table>
            <tr>
              <td><img src="//i.otzovik.com/2016/01/avatar/684993.png" alt="Степан Титлин"></td>
              <td><a class="home-official-name tooltip-top" title="Посмотреть профиль представителя">Сертификат "Быстросервис" от "М-Видео"</a></td>
            </tr>
          </table>
          <a class="home-official-text tooltip-top" title="Открыть комментарий">&laquo;Добрый день. Сожалею, что у вас возникли проблемы при обращении в наш магазин. Уточните, пожалуйста, в какой магазин вы обращались?
Пришлите, пожалуйста, скриншот/фото чека на покупку и сертификата на электронный адрес: stepan.titlin@mvideo.ru . Мы об...&raquo;</a>
        </div>
        <div class="home-official" data-cid="69433436">
          <table>
            <tr>
              <td><img src="//i.otzovik.com/objects/m/40000/36231.png" alt="BGlobus"></td>
              <td><a class="home-official-name tooltip-top" title="Посмотреть профиль представителя">Туроператор "Библио Глобус"</a></td>
            </tr>
          </table>
          <a class="home-official-text tooltip-top" title="Открыть комментарий">&laquo;Уважаемый Александр, добрый день!

Мы запросили информацию в Принимающей Компании в Доминиканской республике и получили информацию,
что самолет приземлился в 16:40 местного времени.
Процесс пограничного и таможенного контроля может занять до двух час...&raquo;</a>
        </div>
        <div class="home-official" data-cid="62279943">
          <table>
            <tr>
              <td><img src="//i.otzovik.com/2014/07/avatar/214880.jpg" alt="Friend"></td>
              <td><a class="home-official-name tooltip-top" title="Посмотреть профиль представителя">Негосударственный пенсионный фонд Сбербанка (Россия, Москва)</a></td>
            </tr>
          </table>
          <a class="home-official-text tooltip-top" title="Открыть комментарий">&laquo;Добрый день. Для того, чтобы мы могли разобраться в сложившейся ситуации, пожалуйста, на электронный адрес: service@npfsb.ru направьте подробную информацию о ситуации (когда, в каком отделении происходило оформление договоров), а также Ваше ФИО, СНИЛС ...&raquo;</a>
        </div>
        <div class="home-official" data-cid="46115074">
          <table>
            <tr>
              <td><img src="//i.otzovik.com/2014/07/avatar/136367.jpg" alt="PEGAS Touristik"></td>
              <td><a class="home-official-name tooltip-top" title="Посмотреть профиль представителя">Туроператор Пегас Туристик</a></td>
            </tr>
          </table>
          <a class="home-official-text tooltip-top" title="Открыть комментарий">&laquo;Добрый день,
От лица компании "Пегас Туристик" приносим свои извинения за доставленное неудобство и просим направить Вашу жалобу в отдел контроля качества, воспользовавшись данной ссылкой >> http://pegast.ru/feedback, для принятия соответствующих мер.&raquo;</a>
        </div>
        <div class="home-official" data-cid="46127921">
          <table>
            <tr>
              <td><img src="//i.otzovik.com/2014/07/avatar/163613.png" alt="Alexey24"></td>
              <td><a class="home-official-name tooltip-top" title="Посмотреть профиль представителя">Банк "ВТБ"</a></td>
            </tr>
          </table>
          <a class="home-official-text tooltip-top" title="Открыть комментарий">&laquo;Игорь, добрый день!

Пришлите, пожалуйста, Ваши ФИО и номер претензии по адресу complaint_book@vtb24.ru
В теме письма прошу указать "для Алексея - Отзовик.com"

С уважением,
Алексей&raquo;</a>
        </div>
        <a>Все официальные представители</a>
        <br>
        <a>Как стать представителем?</a>
      </div>

      <div class="news home-box glory-box">
        <h2>Новости</h2>
        <noindex>
          <div class="home-news-item">
            <h3><font style="color:#b50000">С Новым 2019 годом!</font></h3>
            <div class="home-news-timestamp">30.12.2018</div>
            Традиционно желаем всем в новом году как можно больше приятных эмоций и впечатлений от ваших покупок и приключений, с которыми вы с удовольствием будете делиться со своими друзьями на Отзовике!
            <br>
            <br>А мы постараемся приложить все усилия, чтобы подобное общение и творчество вам доставляло огромное удовольствие.
            <br>
            <br>
            <br>С заботой о Вас,
            <br>Команда Отзовика </div>
          <div class="home-news-item">
            <h3><font style="color:#b50000">Мы в Топ-50 интернет-проектов</font></h3>
            <div class="home-news-timestamp">16.11.2018</div>
            Отзовик вошел в Топ-50 интернет-проектов в России и стал самым популярным сервисом отзывов Рунета по версии Яндекс Радар! Это первый открытый рейтинг, в котором представлены все наиболее посещаемые проекты и доступны подробные данные о российской аудитории.
            С удовольствием поздравляем всех участников нашего сообщества с этим приятным достижением. </div>
          <div class="home-news-item">
            <h3><font style="color:#b50000">8 лет Отзовику!</font></h3>
            <div class="home-news-timestamp">30.03.2018</div>
            За это время мы написали более 5 млн. отзывов и стали самым большим сайтом русскоязычных отзывов в интернете, с чем всех и поздравляем!
            <br>
            <br>Спасибо всем, кто участвует в жизни нашего сообщества и делится своими интересными и полезными отзывами!
            <br> </div>
          <div class="home-news-item">
            <h3>Новый дизайн</h3>
            <div class="home-news-timestamp">28.03.2018</div>
            Мы обновили дизайн Отзовика! Личный кабинет и некоторые другие страницы обновлены частично, но они будут доработаны в ближайшие дни. </div>
          <div class="home-news-item">
            <h3><font style="color:#b50000">&#10048; 8 Марта!</font></h3>
            <div class="home-news-timestamp">08.03.2018</div>
            Поздравляем наших прекрасных дам с женским днем! Любви, добра, тепла и только положительных отзывов Вам! </div>
          <div class="home-news-item">
            <h3>Авария в дата-центре</h3>
            <div class="home-news-timestamp">09.11.2017</div>
            К сожалению, из-за аварии в дата-центре некоторые изображения временно могут не отображаться на сайте. Добавление новых изображений будет доступно ориентировочно после 13:00 по московскому времени. Спасибо за понимание. </div>
          <div class="home-news-item">
            <h3>Блокировка рекламы</h3>
            <div class="home-news-timestamp">02.08.2017</div>
            Для корректной работы Отзовика рекомендуем отключить все плагины блокировки рекламы в своем браузере: AdBlock, NoScript и т.п. (в браузерах Opera и Яндекс.Браузер может быть включен встроенный блокировщик рекламы) либо добавить otzovik.com в исключения.
            Затем следует перезапустить браузер. В противном случае, помимо рекламы, вам может быть недоступна часть функций, а скорость загрузки страниц существенно увеличится из-за их автоматической перезагрузки и отсутствия нормального кеширования
            в браузере. </div>
          <div class="home-news-item">
            <h3>Сбой с новыми фото</h3>
            <div class="home-news-timestamp">16.01.2017</div>
            Вечером 15.01.17 произошел небольшой сбой с обработкой некоторых новых фото в отзывах из-за DDoS-атаки на сайт, которая была быстро нейтрализована. Если вы добавляли фото в это время и заметили, что в соответствующих отзывах не отображаются какие-либо
            фото или пришло сообщение об их удалении модератором, то просто добавьте такие фото заново через редактирование отзыва в разделе "Мои отзывы". Спасибо за понимание. </div>
          <div class="home-news-item">
            <h3>Подписка на отзывы!</h3>
            <div class="home-news-timestamp">09.12.2016</div>
            Уважаемые авторы! В ближайшее время функционал Друзей будет заменен на Подписчиков. Таким образом, на отзывы автора сможет подписаться любой желающий (не требуя от него обязательного добавления в Друзья). Это более гибко и логично, а так же позволит авторам
            иметь более 200 подписчиков на свои отзывы, вместо 200 друзей. </div>
          <div class="home-news-item">
            <h3>Претензии на отзывы</h3>
            <div class="home-news-timestamp">30.09.2016</div>
            В связи с тем, что в компетенцию техподдержки более не входит рассмотрение претензий на отзывы от Официальных представителей организаций, мы запустили новый интерфейс, который отправляет все претензии на рассмотрение в Администрацию сервиса.
            <br>
            <br>Официальным представителям по-прежнему следует использовать кнопку для блокировки внизу отзыва, которая теперь будет открывать новую форму претензии.
            <br>
            <br>Подробнее о рассмотрении претензий на отзывы можно ознакомиться в <a>разделе Помощи</a>.
            <br>
            <br> </div>
        </noindex>
      </div>

    </div>
    <div style="clear: both;"></div>
  </div>
  <!-- #content -->


  <?php get_footer(); ?>
