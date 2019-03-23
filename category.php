<?php get_header(); global $post; $category = get_queried_object(); ?>
  <div id="content" class="main_content content" style="padding: 16px;background-color: white;box-shadow: 0 0 8px 1px rgba(0,0,0,0.08);border-radius: 3px;">
    <noscript>
      <div class="alertframe">Внимание! В Вашем браузере отключена поддержка JavaScript! Для корректной работы Вам необходимо включить поддержку JavaScript.</div>
    </noscript>

    <div class="breadcrumbs">
      <a href="/">Отзывы</a> › <a href="/auto/">Авто и мото</a></div>

    <h1><?php echo get_cat_name( $category->term_id ) ?> - отзывы</h1>

    <div class="cat-panel-box">
      <div id="cat-panel" class="cat-panel" data-cid="171">
        <div class="cat-panel-left">
          По категориям:
          <div><a><?php echo get_cat_name( $category->term_id ) ?> <span class="icons icon-down"></span></a></div>
        </div>
        <div class="cat-panel-right">
          Найден <b><?php echo $category->count; ?></b> объект </div>
        <div style="clear: both;"></div>
      </div>
    </div>
    <script type="text/javascript">
      $(function() {
        var scripturl = '/scripts/function/load_filter_panel.php';
        var cat_id = $('#cat-panel').attr('data-cid');
        scripturl += '?cat_id=' + cat_id;
        $.get(scripturl, function(data) {
          if (!data) {
            $('#load_filter_panel').remove();
            $('.product-list').removeClass('filtered');
          } else {
            $('#load_filter_panel').html(data);
          }
        });
      });
    </script>

    <div id="load_filter_panel" class="filter-panel" style="display: none !important; z-index:-9999;">


      <style type="text/css">
        .filter{display:none;background-color:#fff;border-top:1px solid #e2e6e9;position:relative}.filter .check-box{width:1.5em;height:1.5em}.filter-all.check-wrap{position:absolute}.filter-global-bottom{padding:16px;border-top:1px solid #e2e6e9;display:none;overflow:hidden}.filter-num{color:#8d9399;font-size:smaller;vertical-align:super}.filter.active .filter-num{color:#b74746}.filter.active .filter-unset{visibility:visible}.filter-tbl select{width:100%;padding:3px 2px;height:auto;vertical-align:middle}#cancel_filter{float:left}#sel_filter{float:right}.filter-panel .button,.filter-panel button{line-height:normal;padding:4px;font-weight:400;height:auto}.filter-panel button .icons,.mobile-cancel-filter .icons{width:9px;height:9px;margin-right:4px!important;vertical-align:baseline}.range-switch{float:right;cursor:pointer;margin-top:5px;opacity:.6}.range-switch:hover{opacity:1}input.minmax{width:60px;height:auto;line-height:normal;background-color:#fff;text-align:right;padding:4px;margin:0 4px;color:#2c2c2c}.filter .slider{margin-top:4px!important}.filter-trg,.filter-trg-clickload{display:block;white-space:nowrap;padding:16px;overflow:hidden;color:#2c2c2c}.filter-trg-clickload:hover,.filter-trg:hover{background-color:#ecf0f366;color:#000}.filter-trg .loader,.filter-trg-clickload .loader{position:absolute;right:0;top:0;margin:16px}.active .filter-trg{padding:13px;border:3px solid transparent;border-left-color:#13709b;background-color:#ecf0f399}.filter-trg-waiting{display:block;position:relative;color:#2c2c2c;white-space:nowrap;overflow:hidden;opacity:.4;padding:16px}.filter-trg-waiting:hover{box-shadow:0 0 2px rgba(0,0,0,.1);color:#000}.filter-all{display:none}.active .filter-all,.unfolded .filter-all{display:inline-block}.filter-cap{overflow:hidden}.enum.active .filter-cap,.enum.unfolded .filter-cap{margin-left:2em}.filter-ind:after{position:absolute;right:0;top:0;margin:16px;font-size:large;font-family:"courier new";background-color:#fff;border-radius:3px;width:1em;height:1em;text-align:center}.filter-ind.mns:after{content:'-'}.filter-ind.pls:after{content:'+'}.filter-pop{display:none;padding:16px;padding-top:0;border-top:1px solid #ebeff2;font-size:smaller}.filter-list{max-height:350px;overflow:auto;padding:4px 0}.filter-list *{vertical-align:text-bottom}.filter.range .filter-list{padding:16px 0 4px 0;overflow:visible}.filter.range .filter-list *{vertical-align:middle}.filter-list label{display:block;padding:2px 0}.filter-list label.sel{color:#000}.filter-list label:hover{color:#000;background-color:#ecf0f366}.filter-list input{margin-right:4px}.filter-pnl{text-align:center;padding-top:16px;overflow:hidden;border-top:1px solid #ebeff2}.filter-pnl a{display:inline-block;text-decoration:none;border:1px solid silver;border-radius:3px;padding:2px 10px;color:#666}.filter-pnl a:hover{box-shadow:0 0 3px rgba(0,0,0,.3);color:#000;border-color:gray}.filter-pnl .filter-unset{float:left}.filter-pnl .filter-apply{float:right}.filter-unset{visibility:hidden}.slider{margin:5px 0 6px 0}.ui-slider-horizontal{height:34px!important;background:#ecf0f3!important;border:15px solid #fff!important;border-left:0!important;border-right:0!important}.ui-slider-horizontal .ui-slider-range{background-color:#13709b!important;border:0!important;margin:0!important}.ui-slider-horizontal .ui-slider-handle{top:-7px!important;margin-left:-9px!important;border:3px solid #fff!important;width:12px!important;height:12px!important;border-radius:50%!important;background:#13709b!important;box-shadow:0 0 4px 0 silver!important;box-sizing:content-box}.mobile-cancel-filter,.mobile-filter-desc,.mobile-filter-panel-trigger{margin:8px;display:none;vertical-align:middle}.mobile-cancel-filter,.mobile-filter-desc{color:#b74746;font-size:small}.mobile-filter-panel-trigger .icons{margin-left:6px}@media screen and (max-width:767px){.filter-trg,.filter-trg-clickload,.filter-trg-waiting{padding:8px}.filter-ind::after,.filter-trg .loader,.filter-trg-clickload .loader{margin:8px}.filter-pop{padding:8px}.filter-pnl{padding-top:8px}.active .filter-trg{padding:5px}.filter-global-bottom{padding:8px}.filter.range .filter-list{padding:0}.filter-list{max-height:240px}.mobile-cancel-filter,.mobile-filter-desc,.mobile-filter-panel-trigger{display:inline-block}}
      </style>



      <h2>Фильтры:</h2>
      <a class="mobile-filter-panel-trigger">Фильтры<span class="icons icon-down"></span></a>

      <div class="filter-tbl decor-n">
        <div id="b" class="filter" style="display: block;"><a class="filter-trg-clickload" title="Выбрать значения фильтра"><span class="filter-cap">Бренд</span> <span class="filter-num">Все</span><span class="filter-ind pls"></span></a>
          <div class="filter-pop" style="display: none;">
            <div class="filter-list"></div>
            <div class="filter-pnl">
              <button class="filter-unset button-4 nobox"><span class="icons icon-delete-red"></span><span>Cнять</span></button>
              <button class="filter-apply button-2 nobox"><span class="icons icon-check-blue"></span><span>Применить</span></button>
            </div>
          </div>
        </div>
        <div id="1335" class="filter range range-between" style="display: block;"><a class="filter-trg" title="Выбрать значения фильтра"><span class="filter-cap">Год выпуска</span> <span class="filter-num">от 1970 до 2019</span><span class="filter-ind pls"></span></a>
          <div class="filter-pop" style="display: none;">
            <div class="filter-list"><span class="range-switch icons icon-settings"></span>от
              <input id="min_1335" class="minmax" type="text" value="1970"> до
              <input id="max_1335" class="minmax" type="text" value="2019">
              <div class="slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false">
                <div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div>
                <a class="ui-slider-handle ui-state-default ui-corner-all" style="left: 0%;"></a>
                <a class="ui-slider-handle ui-state-default ui-corner-all" style="left: 100%;"></a>
              </div>
            </div>
            <div class="filter-pnl">
              <button class="filter-unset button-4 nobox"><span class="icons icon-delete-red"></span><span>Cнять</span></button>
              <button class="filter-apply button-2 nobox"><span class="icons icon-check-blue"></span><span>Применить</span></button>
            </div>
          </div>
        </div>
        <div id="r" class="filter range range-from" style="display: block;"><a class="filter-trg" title="Выбрать значения фильтра"><span class="filter-cap">Кол-во отзывов</span> <span class="filter-num">от 1</span><span class="filter-ind pls"></span></a>
          <div class="filter-pop" style="display: none;">
            <div class="filter-list"><span class="range-switch icons icon-settings"></span>от
              <input id="val_r" class="minmax" type="text" value="1">
              <div class="slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false">
                <a class="ui-slider-handle ui-state-default ui-corner-all" style="left: 0%;"></a>
              </div>
            </div>
            <div class="filter-pnl">
              <button class="filter-unset button-4 nobox"><span class="icons icon-delete-red"></span><span>Cнять</span></button>
              <button class="filter-apply button-2 nobox"><span class="icons icon-check-blue"></span><span>Применить</span></button>
            </div>
          </div>
        </div>
        <div class="filter-global-bottom">
          <a id="sel_filter">
            <button class="button-2 nobox"><span class="icons icon-check-blue"></span><span>Применить</span></button>
          </a>
        </div>
      </div>
    </div>

    <div class="product-list filtered" style="margin-right: unset!important;">
      <table>
        <colgroup>
          <col width="90px">
            <col>
              <col width="120px">
        </colgroup>
        <thead>
          <tr>
            <th>
              <a class="tooltip-bottom" title="Сортировать по дате добавления">
                <span>По дате</span><span class="icons icon-arrow-down"></span>
              </a>
            </th>
            <th>
              <a class="tooltip-bottom" title="Сортировать по названию">
                <span>Название</span><span class="icons icon-arrow-"></span>
              </a>
            </th>
            <th>
              <a class="tooltip-bottom" title="Сортировать по рейтингу">
                <span>Рейтинг</span><span class="icons icon-arrow-"></span>
              </a>
            </th>
          </tr>
        </thead>
        <tbody>
          <?php
          $posts = get_posts( array(
              'numberposts' => 0,
              'category'    => $wp_query->get_queried_object_id(),
              'post_type'   => 'page',
              'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            ) );
            if ( $posts ){ ?>
              <?php foreach ($posts as $poste) {
                setup_postdata( $poste ); ?>
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
                      <span class="icons icon-star-1"></span><span class="icons icon-star-0"></span><span class="icons icon-star-0"></span><span class="icons icon-star-0"></span><span class="icons icon-star-0"></span> </div>
                    <a href="<?php the_permalink(); ?>" class="reviews-counter"><?php echo get_comments_number($poste->ID); ?> отзыв</a> </td>
                </tr>
              <?php wp_reset_postdata(); } ?>
            <?php } else {
              echo wpautop( 'Постов для вывода не найдено.' );
            }
            ?>
        </tbody>
      </table>
    </div>


    <div style="clear: both;"></div>
  </div>
  <?php get_footer(); ?>
