<?php
add_theme_support( 'post-thumbnails' ); 


function display_rating($rating) {
	echo '<div class="star-rating">';
	 for ($i = 1; $i <= 5; $i++) {
		if ($i <= $rating) { echo '<div class="star star-full" aria-hidden="true"></div>';} else { echo '<div class="star star-empty" aria-hidden="true"></div>'; }
	}
	echo "</div>";
}

/* Подсчет количества посещений страниц
---------------------------------------------------------- */
add_action('get_header', 'kama_postviews');
function kama_postviews() {

/* ------------ Настройки -------------- */
$meta_key       = 'views';  // Ключ мета поля, куда будет записываться количество просмотров.
$who_count      = 0;            // Чьи посещения считать? 0 - Всех. 1 - Только гостей. 2 - Только зарегистрированных пользователей.
$exclude_bots   = 0;            // Исключить ботов, роботов, пауков и прочую нечесть :)? 0 - нет, пусть тоже считаются. 1 - да, исключить из подсчета.

global $user_ID, $post;
	if(is_singular()) {
		$id = (int)$post->ID;
		static $post_views = false;
		if($post_views) return true; // чтобы 1 раз за поток
		$post_views = (int)get_post_meta($id,$meta_key, true);
		$should_count = false;
		switch( (int)$who_count ) {
			case 0: $should_count = true;
				break;
			case 1:
				if( (int)$user_ID == 0 )
					$should_count = true;
				break;
			case 2:
				if( (int)$user_ID > 0 )
					$should_count = true;
				break;
		}
		if( (int)$exclude_bots==1 && $should_count ){
			$useragent = $_SERVER['HTTP_USER_AGENT'];
			$notbot = "Mozilla|Opera"; //Chrome|Safari|Firefox|Netscape - все равны Mozilla
			$bot = "Bot/|robot|Slurp/|yahoo"; //Яндекс иногда как Mozilla представляется
			if ( !preg_match("/$notbot/i", $useragent) || preg_match("!$bot!i", $useragent) )
				$should_count = false;
		}

		if($should_count)
			if( !update_post_meta($id, $meta_key, ($post_views+1)) ) add_post_meta($id, $meta_key, 1, true);
	}
	return true;
}

function SearchFilter($query) {
	if ($query->is_search) {
		$query->set('post_type', page);
	}
	return $query;
}

function customTags() {
	$tags = get_the_tags( $post->ID );
	$tags_exit = [];
	if (!empty($tags)) {
		foreach ($tags as $key => $tag) {
			$tag_content = explode("=", $tag->name);
			if (!empty($tag_content[0]) and !empty($tag_content[1])){
				if ($tag_content[1]){
					$tags_exit[$key]['name'] = ucfirst($tag_content[0]);
					$tags_exit[$key]['content'] = ucfirst($tag_content[1]);
				} else {
					$tags_exit[$key] = [$tag_content[0]];
				}
			}
		}
	}
	$tags_exit = array_reverse($tags_exit);
	return $tags_exit;
}

function wph_enable_comments_pages($status, $post_type, $comment_type) {
    if ('page' === $post_type) {
        if (in_array($comment_type, array('pingback', 'trackback'))) {
            $status = get_option('default_ping_status');
        } else {
            $status = get_option('default_comment_status');
        }
    }
    return $status;
}
add_filter('get_default_comment_status', 'wph_enable_comments_pages', 10, 3);
//включение комментариев для страниц по умолчанию end
