<?php
ini_set('max_execution_time', '6000');

//подгружаем библиотеку
require_once 'simple_html_dom.php';
//создаём новый объект
$html = new simple_html_dom();
//загружаем в него данные

if ($_GET['id']) {
  $from = $_GET['id']; //сейчас не используется
} else {
  $from = 65233; //сейчас не используется
}
$shag = 1;
$publish_all = 1; //Публиковать пост и комментарии? 1 = да, 0 = нет
$comment_required = 1; //Необходимое количество комментариев
$category_id = 5; //Категория в которую нужно засунуть страницу, 0 = определить автоматически





$page_category = 'http://pravogolosa.net/catalog?catid=42&start=30';
$html_cat = file_get_html($page_category);
foreach($html_cat->find('p.sobi2ItemTitle') as $file_block){
  for ($i=0;$i<$shag;$i++){
    $iteration = ($from + $i);
    if ($_GET['url']) {
      $file = $_GET['url'];
      echo $file;
    } else {
      $file = $file_block->first_child()->href;
      echo $file;
    }
    $html = file_get_html($file);
    echo $file."<br>";
    //находим все ссылки на странице и...
    if($html->innertext!='' and count($html->find('div.sobi_card_header_allads_cnt'))) {
     foreach($html->find('div.sobi_card_header_allads_cnt') as $a){
       $reviews_count = $a->innertext;
       echo "Отзывов = ".$reviews_count."<br>";
     }
    }
    if($html->innertext!='' and count($html->find('div.sobi_card_object_title'))) {
     foreach($html->find('div.sobi_card_object_title') as $b){
       $title = $b->first_child()->innertext;
       echo "Title = ".$title."<br>";
     }
    }
    if($html->innertext!='' and count($html->find('div.sobi_card_object_info_item'))) {
      $tags=[];
       foreach($html->find('div.sobi_card_object_info_item') as $key_tag=>$tag){
         $tag_name = $tag->first_child()->innertext;
         $tag_content = $tag->parent()->last_child()->first_child()->innertext;
         array_push($tags, trim(strip_tags($tag_name))."=".trim(strip_tags($tag_content)));
       }
       print_r($tags);
       echo "<br>";
    }
    if($html->innertext!='' and count($html->find('div.sobi_card_path_way_link'))) {
      if($category_id == 0) {
       $category = $html->find('div.sobi_card_path_way_link')[0]->first_child()->innertext;
       $terms = get_terms('category', array(
      'name__like' => $category,
      'hide_empty' => false
      ));
      $cat_id = $terms[0]->term_id;
    } else {
      $cat_id = $category_id;
    }
      echo $terms[0]->name."=".$cat_id."<br>";
    }
    if ((int)$reviews_count >= $comment_required) {
        $post_data = array(
          'post_type'      => 'page',
        	'post_title'    => $title,
        	'post_content'  => ' ',
        	'post_status'   => 'publish',
        	'post_author'   => get_current_user_id(),
        	'post_category' => array($cat_id),
          'tags_input'     => $tags,
          'comment_status' => 'open',
      );
      print_r($post_data);
      // Вставляем данные в БД
      if ($publish_all == 1) {
        $post_id = wp_insert_post( wp_slash($post_data) );
        echo $post_id;
      }
    }
    $reviews_links = [];
    foreach($html->find('div.sobi_card_object_review_title') as $review_key=>$review_link) {
      $link = $review_link->first_child()->first_child()->href;
      array_push($reviews_links, "http://pravogolosa.net/".$link."<br>");
    }
    foreach($reviews_links as $review_link){
      $file_review = $review_link;
      $html_review = file_get_html($file_review);
      foreach($html_review->find('h2') as $key_review_title=>$title){
        $title_content = $title->first_child()->first_child()->innertext;
        echo "commentTitle = ".$title_content."<br>";
      }
      foreach($html_review->find('div.ad_card_autor') as $author_block){
        $author_content = $author_block->last_child()->first_child()->first_child()->first_child()->first_child()->innertext;
        echo "commentAuthor = ".$author_content."<br>";
      }
      foreach($html_review->find('span[style^="margin-top: 10px; display: table;"]') as $comment_block){
        $comment_text = trim(preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $comment_block->innertext));
        echo "commentText = ".$comment_text."<br>";
      }
      foreach($html_review->find('div.ad_card_title') as $rating_block){

      if(!empty($rating_block->first_child()->last_child()->last_child()->children(1)->innertext)) {
        $rating = $rating_block->first_child()->last_child()->last_child()->children(1)->innertext;
      } else {
        $rating = $rating_block->first_child()->last_child()->last_child()->innertext;
      }
        echo "commentRating = ".$rating."<br>";
      }
      $html_review->clear();
      if ((int)$reviews_count >= $comment_required) {
        $data = array(
        	'comment_post_ID'      => $post_id,
        	'comment_author'       => $author_content,
        	'comment_author_email' => 'mail@mail.com',
        	'comment_content'      => $comment_text,
        	'comment_author_IP'    => '127.0.0.1',
        	'comment_agent'        => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.10) Gecko/2009042316 Firefox/3.0.10 (.NET CLR 3.5.30729)',
        	'comment_approved'     => 1,
        );
        if ($publish_all == 1) {
          $comment_id = wp_insert_comment( wp_slash($data) );
          $meta_rating = add_comment_meta( $comment_id, 'rating', round($rating) );
          $meta_title = add_comment_meta( $comment_id, 'title', $title_content );
        }
        echo round($rating);
      }
    }

    //освобождаем ресурсы
    $html->clear();
  }
}
$html_cat->clear();
unset($html);
?>
