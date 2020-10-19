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

			<?php if ( have_posts() ) : ?>
				<?php
				while ( have_posts() ) :
					the_post();
					?>

			<article class="bd">
				<span class="draw"></span>
				<div class="post_img fade">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail' ); ?></a>
				</div>
				<div class="right fade">
					<time datetime="<?php the_time( 'Y-m-j' ); ?>"><?php the_time( 'Y.m.j' ); ?></time>
					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<div class="tags fade">
						<?php
						/**
						 * タグ(ターム)を表示 https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/wp_get_object_termsを参考
						 */
						$my_order              = array(
							'orderby' => 'name',
							'order'   => 'ASC',
						);
						$custom_post_tag_terms = wp_get_object_terms( $post->ID, 'skill', $my_order );
						if ( ! empty( $custom_post_tag_terms ) ) {
							if ( ! is_wp_error( $custom_post_tag_terms ) ) {
								foreach ( $custom_post_tag_terms as $my_term ) {
									$term_link = get_term_link( $my_term->slug, 'skill' );
									echo '<a href="' . esc_html( $term_link ) . '">' . esc_html( $my_term->name ) . '</a>';
								}
							}
						}
						?>
					</div>
				</div>
			</article>

			<?php endwhile; ?>

				<?php wp_pagenavi(); ?>

			<?php else : ?>

			<article class="bd">
				<span class="draw"></span>
				<h1>投稿が見つかりません。</h1>
			</article>

			<?php endif; ?>

		</section>

		<?php get_footer(); ?>
