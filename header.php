
<!DOCTYPE HTML>
<html lang="ru">
    <head>
        <base href="http://otzovik.com/" />
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0,  user-scalable=no">
        <meta name="keywords" content="отзывы туристов, отзывы владельцев авто, отзывы покупателей, отзывы о компаниях, банк отзывы, отзывы о работе, отзывы о фильмах, отзывы о книгах, отзывы о ноутбуках, отзывы автовладельцев">
        <title>Отзовик - отзывы туристов об отелях и отдыхе, владельцев об авто, пользователей о ноутбуках, модниц о косметике, родителей о детских товарах и многое другое!</title>
                                            <script type="text/javascript">
                    (function() {window.o_math = {sign: '1158303923', ext_uid: '5c923a41c73c4859696929'};window.o_aab = null;document.createElement = document.createElement;if(Element.prototype.attachShadow && ShadowRoot && !(document.createElement("div").attachShadow({mode:'closed'}) instanceof ShadowRoot)){Element.prototype.attachShadow = undefined;}else{var sepa = Element.prototype.attachShadow;Object.defineProperty(Element.prototype, 'attachShadow', {get: function() { return sepa; },set: function() {}}); } })();
                </script>
            <link rel="stylesheet" type="text/css" href="/static/styles2.css?v=49">

        <link href="/static/img/favicon.ico" rel="SHORTCUT ICON">
        <script src="/static/jquery-1.11.0.min.js" type="text/javascript"></script>
        <script src='/static/jquery-ui-1.10.4.min.js' type='text/javascript'></script>
        <script src="/reviews/1p17G2/fhg036f2/rKLiM/UDaIB/dJgK7s/w3doAwl/IRX/kXJt1/HcAN/N_lgU/dU9Uh/gX3/t_N/lNfgZ/JA5VW/9YFfg/IiT3/ss31" type="text/javascript"></script>
        <?php wp_head(); ?>
    </head>
<?php the_post(); ?>
    <body class="body_home <?php if (is_home()) { ?> body_home <?php } elseif (is_page()) { ?> body_product_contents body_white <?php } else { ?> body_home <?php } ?>">
        <div id="header" class="header">
            <div class="header-nav-row">
                <div class="header-nav">
                    <div class="header-nav-left">
                        <div class="header-nav-site">
                            <div class="header-nav-sitemap-btn">
                                <a href="<?php echo home_url(); ?>/catalog-all">Отзывы</a>
                                <div class="header-nav-sitemap-popup glory-box cloud">
                                    <a href="<?php echo home_url(); ?>/category/turizm/"><span class="icons icon-cat-travel"></span>Туризм</a>
                                    <a href="<?php echo home_url(); ?>/category/avto/"><span class="icons icon-cat-auto"></span>Авто</a>
                                    <a href="<?php echo home_url(); ?>/category/knigi/"><span class="icons icon-cat-books"></span>Книги</a>

                                    <a href="<?php echo home_url(); ?>/category/filmy/"><span class="icons icon-cat-video"></span>Фильмы</a>
                                    <a href="<?php echo home_url(); ?>/category/kompjutery/"><span class="icons icon-cat-it"></span>Компьютеры</a>
                                    <a href="<?php echo home_url(); ?>/category/tehnika/"><span class="icons icon-cat-equipment"></span>Техника</a>

                                    <a href="<?php echo home_url(); ?>/category/dom-i-sad/"><span class="icons icon-cat-home"></span>Дом и сад</a>
                                    <a href="<?php echo home_url(); ?>/category/zdorove-i-gigiena/"><span class="icons icon-cat-beauty"></span>Здоровье и гигиена</a>
                                    <a href="<?php echo home_url(); ?>/category/detskoe/"><span class="icons icon-cat-kids"></span>Детское</a>

                                    <a href="<?php echo home_url(); ?>/category/sport/"><span class="icons icon-cat-sport"></span>Спорт</a>
                                    <a href="<?php echo home_url(); ?>/category/igry/"><span class="icons icon-cat-games"></span>Игры</a>
                                    <a href="<?php echo home_url(); ?>/category/eshhjo/"><span class="icons icon-circle"></span>Ещё...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-nav-right">
                        <span class="header-nav-auth" data-reg-url="<?php echo home_url(); ?>/wp-login.php?action=register" data-auth-url="<?php echo home_url(); ?>/wp-login.php">
                            <span class="css-loader-1"></span>
                        </span>
                        <a class="header-nav-profile-btn header-nav-mobile-btn button button-3" href="/postreview.php">
                            <span class="icons icon-postreview"></span>
                        </a>
                        <a id="header-mobile-btn" class="header-nav-profile-btn header-nav-mobile-btn">
                            <span class="icons icon-mobile-menu"></span>
                        </a>
                    </div>
                    <div style="clear: both;"></div>

                </div>
            </div>

            <div class="header-main-row">
                <div class="header-main">
                    <div class="header-logo" style="background-image: url(/static/img/2018/logos/logo_default.svg);">
                        <a href="<?php echo home_url(); ?>/"></a>
                    </div>

                    <form id="searchform" class="header-search-form" method="get" role="search" action="<?php echo home_url( '/' ) ?>" >
                        <div class="header-search-form-block">
                            <input type="text" id="s" class="header-search-input input box-width" autocomplete="off" value="<?php echo get_search_query() ?>" name="s" placeholder="Пример: Фильм Подарок с характером">
                            <input type="image" class="header-search-btn" src="/static/img/1px.gif" alt="Поиск">
                            <input type="submit" id="searchsubmit" value="Поиск" style="display: none!important;" />
                        </div>
                    </form>

                    <a class="header-postreview-btn button button-3" href="<?php echo home_url(); ?>/catalog-all">
                        <span class="icons icon-postreview"></span><span>Написать отзыв</span>
                    </a>
                </div>
            </div>
        </div>
