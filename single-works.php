<?php get_header(); ?>

<div class="cover_area work_img"></div>

<!-- 画面全体のborder -->
<div class="bg_wrap">
  <div class="container">
    <!-- 背景の縦線 -->
    <div class="bg-line"></div>

    <!-- Works -->
    <section id="works">
      <h2 class="section_title" title="Works">Works</h2>

      <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>

      <article class="bd main">
        <span class="draw draw_active"></span>
        <time datetime="<?php the_time('Y-m-j'); ?>"><?php the_time('Y.m.j'); ?></time>
        <h1><?php the_title(); ?></h1>
        <div class="tags">
          <?php //タグ(ターム)を表示 https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/wp_get_object_termsを参考
              $order = array('orderby' => 'name', 'order' => 'ASC');
              $custom_post_tag_terms = wp_get_object_terms($post->ID, 'skill', $order);
              if(!empty($custom_post_tag_terms)){
                if(!is_wp_error($custom_post_tag_terms)){
                  foreach($custom_post_tag_terms as $term){
                    echo '<a href="'.get_term_link($term->slug, 'skill').'">'.esc_html($term->name).'</a>';
                  }
                }
              }
            ?>
        </div>
        <div class="main_content">
          <?php //"作業時間"のカスタムフィールドに値が入力されている場合のみ表示
            $meta = get_post_meta($post->ID, '作業時間', true);
            if (!empty($meta)) : ?>
          <p class="right">作業時間：約<?php echo $meta; ?>時間</p>
          <?php endif; ?>
          <?php the_content(); ?>
        </div>
      </article>

      <div class="prev_next">
        <?php //新しい投稿があればリンクを表示
          $next_post = get_next_post();
          if (!empty($next_post)): ?>
        <div class="leftcol"><?php next_post_link('%link', '&laquo; 新しい投稿へ'); ?></div>
        <?php endif; ?>
        <?php //古い投稿があればリンクを表示
          $previous_post = get_previous_post();
          if (!empty($previous_post)): ?>
        <div class="rightcol"><?php previous_post_link('%link', '古い投稿へ &raquo;'); ?></div>
        <?php endif; ?>
      </div>

      <?php endwhile; ?>
      <?php else : ?>

      <article class="bd">
        <span class="draw"></span>
        <h1>投稿が見つかりません。</h1>
      </article>

      <?php endif; ?>

      <?php
      $args = array(
        'post_type' => 'works',
        'post_per_page' => 3
        );
      $the_query = new WP_Query($args);
      
      if ($the_query->have_posts()) :
        while ($the_query->have_posts()) : $the_query->the_post(); 
      ?>

      <article class="bd">
        <span class="draw"></span>
        <div class="post_img fade">
          <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
        </div>
        <div class="right fade">
          <time datetime="<?php the_time('Y-m-j'); ?>"><?php the_time('Y.m.j'); ?></time>
          <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
          <div class="tags fade">
            <?php  //タグ(ターム)を表示 https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/wp_get_object_termsを参考
                  $order = array('orderby' => 'name', 'order' => 'ASC');
                  $custom_post_tag_terms = wp_get_object_terms($post->ID, 'skill', $order);
                  if(!empty($custom_post_tag_terms)){
                    if(!is_wp_error( $custom_post_tag_terms )){
                      foreach($custom_post_tag_terms as $term){
                        echo '<a href="'.get_term_link($term->slug, 'skill').'">'.esc_html($term->name).'</a>';
                      }
                    }
                  }
                ?>
          </div>
        </div>
      </article>

      <?php 
        endwhile;
        wp_reset_postdata();
      endif;
      ?>

      <div class="to_list">
        <a class="to_list_btn" href="<?php echo get_post_type_archive_link('works'); ?>">実績一覧へ</a>
      </div>

    </section>
    
    <?php get_footer(); ?>