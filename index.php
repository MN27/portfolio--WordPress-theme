<?php get_header(); ?>

<div class="cover_area home_img">
	<div class="name">
	<p>Makoto<br>Nakamura</p>
	</div>
</div>

<!-- 画面全体のborder -->
<div class="bg_wrap">
	<div class="container">
	<!-- 背景の縦線 -->
	<div class="bg-line"></div>

	<!-- About -->
	<section id="about">
		<h2 class="section_title" title="About">About</h2>
		<div class="about_wrap">
		<div class="logo"><img src="<?php echo esc_html( get_template_directory_uri() ); ?>/assets/images/logo.svg" alt=""></div>
		<div class="about_content bd">
			<span class="draw"></span>
			<p class="name fade">中村 允</p>
			<p class="introduce fade">1988年、埼玉生まれ。カメラが趣味で、散歩をしながら街の風景を撮影したり、友達の家族写真を撮影したりしています。</p>
			<p class="introduce fade">
			デザインからコーディングまでのWebサイト制作, CMS（WordPress）構築, Webアプリ制作が可能です。デザインに重点をおきながらも、バックエンドの基礎知識も持つ、フロントエンドエンジニアを目指しています。
			</p>
		</div>
		</div>
	</section>
	<!-- /About -->

	<!-- Skills -->
	<section id="skills">
		<h2 class="section_title" title="Skills">Skills</h2>
		<div class="skill_wrap">
		<div class="skill_line"></div>
		<div class="skill_content bd des">
			<span class="draw"></span>
			<h3>Design</h3>
			<p class="fade">Webデザイン, レスポンシブデザイン, グラフィックデザイン, Photoshop, Illustrator, XD</p>
		</div>
		</div>
		<div class="skill_wrap">
		<div class="skill_line"></div>
		<div class="skill_content bd f_e">
			<span class="draw"></span>
			<h3>Front-end</h3>
			<p class="fade">HTML5, CSS3, Sass(SCSS), レスポンシブコーディング, gulp, webpack, jQuery, JavaScript</p>
		</div>
		</div>
		<div class="skill_wrap">
		<div class="skill_line"></div>
		<div class="skill_content bd b_e">
			<span class="draw"></span>
			<h3>Back-end</h3>
			<p class="fade">PHP, Ruby, SQL, WordPress, Ruby on Rails</p>
		</div>
		</div>
	</section>
	<!-- /Skills -->

	<!-- Works -->
	<section id="works">
		<h2 class="section_title" title="Works">Works</h2>

		<?php
		$args      = array(
			'post_type'     => 'works',
			'post_per_page' => 3,
		);
		$the_query = new WP_Query( $args );

		if ( $the_query->have_posts() ) :
			while ( $the_query->have_posts() ) :
				$the_query->the_post();
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

				<?php
			endwhile;
			wp_reset_postdata();
endif;
		?>

		<div class="to_list">
		<a class="to_list_btn" href="<?php echo esc_html( get_post_type_archive_link( 'works' ) ); ?>">実績一覧へ</a>
		</div>
	</section>
	<!-- /Works -->

	<!-- contact -->
	<section id="contact">
		<h2 class="section_title" title="Contact">Contact</h2>
		<div class="contact_form bd">
		<span class="draw"></span>
		<?php echo do_shortcode( '[contact-form-7 id="62" title="コンタクトフォーム１"]' ); ?>
		</div>
	</section>
	<!-- /contact -->

<?php get_footer(); ?>
