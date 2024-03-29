<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package azandmag
 */

get_header();
?>

<div class="azandBlogPageIntroContainer swiper mySwiperSlider">
	<div class="changeClassToSwiperWraper swiper-wrapper">
		<a href="#" class="blogPageIntroCard swiper-slide">
			<img src="<?php bloginfo('template_directory') ?>/img/2.jpeg" alt="">
			<h2>لورم ایپسوم متن ساختگی با تولید سادگی</h2>
		</a>
		<a href="#" class="blogPageIntroCard swiper-slide">
			<img src="<?php bloginfo('template_directory') ?>/img/2.jpeg" alt="">
			<h2>لورم ایپسوم متن ساختگی با تولید سادگی</h2>
		</a>
		<a href="#" class="blogPageIntroCard swiper-slide">
			<img src="<?php bloginfo('template_directory') ?>/img/2.jpeg" alt="">
			<h2>لورم ایپسوم متن ساختگی با تولید سادگی</h2>
		</a>
	</div>
	<div class="swiper-scrollbar"></div>
</div>
<div class="azandBlogFeaturedContentContainer sectionPadding mainView">
	<div class="generalHeading ">
		<h2>مطالب برگزیده</h2>
	</div>
	<div class="azandBlogFeaturedContent">
		<div class="swiper mySwiper azandBlogContainer">
			<div class="swiper-wrapper">
				<?php
				$args = array(
					'post_type'=>'post',
					'posts_per_page' => 6,
					'post_status' => 'publish',
					'order'=>'DESC',
				);
				$the_query = new WP_Query( $args );
					// The Loop
					while ( $the_query->have_posts() ) : $the_query->the_post();
						echo '<div class="latestPostsItems swiper-slide mainBoxShadow">';
						echo '<a href="'.get_permalink().'"><img class="latestPostsThumb" src="'.get_the_post_thumbnail_url().'"></a>';
						echo '<div class="latestPostsItemsFooter">';
						echo'<a href="'.get_permalink().'" class="titleCardBlogSwiper"><h3>'.get_the_title().'</h3></a>';
						echo '<div class="latestPostsItemsFooterIcons">';
						echo '<div class="homePageBlogCardCmCount">';
						echo '<span><svg width="12" height="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" stroke="#7d7d87" stroke-width="1.7" fill="#9696a0"><path d="M8 .5c2.078 0 3.968.73 5.335 1.926C14.667 3.592 15.5 5.202 15.5 7c0 1.736-.812 3.267-2 4.389v3.853l-4.403-1.887c-.196.121-.481.142-.787.145H8c-2.078 0-3.968-.73-5.335-1.926C1.333 10.408.5 8.798.5 7s.833-3.408 2.165-4.574C4.032 1.23 5.922.5 8 .5z" fill="none" fill-rule="evenodd" fill-opacity="0"></path></svg></span>';
						echo '<span>'. $post->comment_count .'</span>';
						echo '</div>';
						echo '<div class="homePageBlogCardTimeCount">';
						echo '<span><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 16 16" version="1.1" fill="#7d7d87"><path d="M 15 2 L 13 2 L 13 0 L 10 0 L 10 2 L 6 2 L 6 0 L 3 0 L 3 2 L 1 2 C 0.449219 2 0 2.449219 0 3 L 0 15 C 0 15.550781 0.449219 16 1 16 L 15 16 C 15.550781 16 16 15.550781 16 15 L 16 3 C 16 2.449219 15.550781 2 15 2 Z M 14 14 L 2 14 L 2 5 L 14 5 Z M 14 14 "></path></svg></span>';
						echo '<span>'. get_the_date('j F') .'</span>';
						echo '</div>';
						echo '<a href="'.get_permalink().'" class="homePageBlogCardReadMore"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16" fill="#9696a0"><g fill-rule="evenodd"><g><path d="M8 6c1.105 0 2 .895 2 2s-.895 2-2 2-2-.895-2-2 .895-2 2-2zM2 6c1.105 0 2 .895 2 2s-.895 2-2 2-2-.895-2-2 .895-2 2-2zm12 0c1.105 0 2 .895 2 2s-.895 2-2 2-2-.895-2-2 .895-2 2-2z" transform="translate(-1356.000000, -1286.000000) translate(1356.000000, 1286.000000)"></path></g></g></svg></a>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
					endwhile;
					// Reset Post Data
					wp_reset_postdata();
				?>
			</div>
		</div>
		<div class="swiper-button-next">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16" fill="#9696a0"><path d="m11.707 7.293-5-5a1 1 0 1 0-1.414 1.414L9.586 8l-4.293 4.293a1 1 0 1 0 1.414 1.414l5-5a1 1 0 0 0 0-1.414z"/></svg>
		</div>
		<div class="swiper-button-prev">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16" fill="#9696a0"><path d="m4.293 8.707 5 5a1 1 0 1 0 1.414-1.414L6.414 8l4.293-4.293a1 1 0 1 0-1.414-1.414l-5 5a1 1 0 0 0 0 1.414z"/></svg>
		</div>
	</div>
</div>
<div class="gridSectionBlogParent">
	<div class="gridSectionBlog mainView">
		<div class="recentPostsHomeListRight">
		<div class="homeGridOne">
			<div class="generalHeading">
				<h2>پربازدید ترین مطالب</h2>
			</div>
			<?php
				$recent_posts_args = array(
					'posts_per_page' => 3,
					'orderby' => 'date',
					'order' => 'DESC',
				);
				$recent_posts_query = new WP_Query($recent_posts_args);
				if ($recent_posts_query->have_posts()) {
					echo '<div class="recentPostsHomeList">';
					// Loop through the recent posts
					while ($recent_posts_query->have_posts()) {
						$recent_posts_query->the_post();
						?>
						<a href="<?php the_permalink(); ?>" class="recent-post">
							<?php if (has_post_thumbnail()) : ?>
								<?php the_post_thumbnail('full'); ?>
							<?php endif; ?>
							<div class="detailBoxsParent">
								<h3><?php the_title(); ?></h3>
								<div class="detailBoxsFooter">
									<div class="timeCountSinglePost">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="12" height="12" fill="#fff"><path d="M8 0c4.4 0 8 3.6 8 8s-3.6 8-8 8-8-3.6-8-8 3.6-8 8-8zm0 2C4.7 2 2 4.7 2 8s2.7 6 6 6 6-2.7 6-6-2.7-6-6-6zm1 2v3h3v2H7V4h2z"/></svg>
										<span>مطالعه '<?php echo do_shortcode('[reading_time]') ?></span>
									</div>
									<div class="homePageBlogCardTimeCount">
										<span><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 16 16" version="1.1" fill="#fff"><path d="M 15 2 L 13 2 L 13 0 L 10 0 L 10 2 L 6 2 L 6 0 L 3 0 L 3 2 L 1 2 C 0.449219 2 0 2.449219 0 3 L 0 15 C 0 15.550781 0.449219 16 1 16 L 15 16 C 15.550781 16 16 15.550781 16 15 L 16 3 C 16 2.449219 15.550781 2 15 2 Z M 14 14 L 2 14 L 2 5 L 14 5 Z M 14 14 "></path></svg></span>
										<span><?php echo get_the_date('j F') ?></span>
									</div>
								</div>
							</div>
						</a>
						<?php
					}
					echo '</div>';
				}
				wp_reset_postdata();
			?>
		</div>
		<div class="homeHotTags">
			<div class="generalHeading">
				<h2>برچسب های داغ روز</h2>
			</div>
			<div class="blogItemsTags mainBoxBorder">
				<?php
					$tags = get_terms( array(
						'taxonomy' => 'post_tag',
						'hide_empty' => true,
					) );

					foreach ($tags as $tag) {
						echo '<div class="itemsTagParent">';
						echo '<a class="blogTagItem generalButton noArrowButton" href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';
						echo '</div>';
					}
				?>
			</div>
		</div>
		<div class="homeGridTwo">
			<div class="generalHeading">
				<h2>پربازدید ترین مطالب</h2>
			</div>
			<?php
				$recent_posts_args = array(
					'posts_per_page' => 3,
					'meta_key' => 'views',
					'orderby' => 'meta_value_num',
					'post_status' => 'publish',
					'order'=>'DESC',
				);
				$recent_posts_query = new WP_Query($recent_posts_args);
				if ($recent_posts_query->have_posts()) {
					echo '<div class="recentPostsHomeList">';
					// Loop through the recent posts
					while ($recent_posts_query->have_posts()) {
						$recent_posts_query->the_post();
						?>
						<a href="<?php the_permalink(); ?>" class="recent-post">
							<?php if (has_post_thumbnail()) : ?>
								<?php the_post_thumbnail('full'); ?>
							<?php endif; ?>
							<div class="detailBoxsParent">
								<h3><?php the_title(); ?></h3>
								<div class="detailBoxsFooter">
									<div class="timeCountSinglePost">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="12" height="12" fill="#fff"><path d="M8 0c4.4 0 8 3.6 8 8s-3.6 8-8 8-8-3.6-8-8 3.6-8 8-8zm0 2C4.7 2 2 4.7 2 8s2.7 6 6 6 6-2.7 6-6-2.7-6-6-6zm1 2v3h3v2H7V4h2z"/></svg>
										<span>مطالعه '<?php echo do_shortcode('[reading_time]') ?></span>
									</div>
									<div class="homePageBlogCardTimeCount">
										<span><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 16 16" version="1.1" fill="#fff"><path d="M 15 2 L 13 2 L 13 0 L 10 0 L 10 2 L 6 2 L 6 0 L 3 0 L 3 2 L 1 2 C 0.449219 2 0 2.449219 0 3 L 0 15 C 0 15.550781 0.449219 16 1 16 L 15 16 C 15.550781 16 16 15.550781 16 15 L 16 3 C 16 2.449219 15.550781 2 15 2 Z M 14 14 L 2 14 L 2 5 L 14 5 Z M 14 14 "></path></svg></span>
										<span><?php echo get_the_date('j F') ?></span>
									</div>
								</div>
							</div>
						</a>
						<?php
					}
					echo '</div>';
				}
				wp_reset_postdata();
			?>
		</div>
		<div class="blogItemsCategoryParent">
			<div class="generalHeading">
				<h2>دسته بندی ها</h2>
			</div>
			<div class="blogItemsCategory mainBoxBorder">
			<?php
				$categories = get_terms( array(
					'taxonomy' => 'category',
					'hide_empty' => true,
					'exclude' => array('1')
				) );

				foreach ($categories as $category) {
					// Get the category count
					$category_count = $category->count;

					echo '<a class="itemsCatParent" href="' . get_category_link($category->term_id) . '">';
					echo '<span class="blogCatItem" >' . $category->name . '</span>';
					// Display the category count
					echo '<span class="categoryCount">' . $category_count . ' مطلب</span>';
					echo '</a>';
				}
			?>
			</div>
		</div>
		</div>
		<div class="recentPostsHomeListLeft">
		<div class="generalHeading">
			<h2>آخرین مطالب</h2>
		</div>
		<?php
			echo '<div class="innerRecentPostsHomeListLeft">';
				$latestargs = array(
					'post_type'=>'post',
					'posts_per_page' => -1,
					'order' => 'DESC',
				);
				$the_query = new WP_Query( $latestargs );
					// The Loop
					while ( $the_query->have_posts() ) : $the_query->the_post();
						echo '<div class="latestPostsItems bottomBorder">';
						echo '<a href="'.get_permalink().'"><img class="latestPostsThumb" src="'.get_the_post_thumbnail_url().'"></a>';
						echo '<div class="latestPostsItemsFooter">';
						echo'<a href="'.get_permalink().'"><h3>'.get_the_title().'</h3></a>';
						echo the_excerpt();
						echo '<div class="latestPostsItemsFooterIcons">';
						echo '<div class="homePageBlogCardCmCount">';
						echo '<span><svg width="12" height="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" stroke="#7d7d87" stroke-width="1.7" fill="#9696a0"><path d="M8 .5c2.078 0 3.968.73 5.335 1.926C14.667 3.592 15.5 5.202 15.5 7c0 1.736-.812 3.267-2 4.389v3.853l-4.403-1.887c-.196.121-.481.142-.787.145H8c-2.078 0-3.968-.73-5.335-1.926C1.333 10.408.5 8.798.5 7s.833-3.408 2.165-4.574C4.032 1.23 5.922.5 8 .5z" fill="none" fill-rule="evenodd" fill-opacity="0"></path></svg></span>';
						echo '<span>'. $post->comment_count .'</span>';
						echo '</div>';
						echo '<div class="homePageBlogCardTimeCount">';
						echo '<span><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 16 16" version="1.1" fill="#7d7d87"><path d="M 15 2 L 13 2 L 13 0 L 10 0 L 10 2 L 6 2 L 6 0 L 3 0 L 3 2 L 1 2 C 0.449219 2 0 2.449219 0 3 L 0 15 C 0 15.550781 0.449219 16 1 16 L 15 16 C 15.550781 16 16 15.550781 16 15 L 16 3 C 16 2.449219 15.550781 2 15 2 Z M 14 14 L 2 14 L 2 5 L 14 5 Z M 14 14 "></path></svg></span>';
						echo '<span>'. get_the_date('j F') .'</span>';
						echo '</div>';
						echo '<a href="'.get_permalink().'" class="homePageBlogCardReadMore"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16" fill="#9696a0"><g fill-rule="evenodd"><g><path d="M8 6c1.105 0 2 .895 2 2s-.895 2-2 2-2-.895-2-2 .895-2 2-2zM2 6c1.105 0 2 .895 2 2s-.895 2-2 2-2-.895-2-2 .895-2 2-2zm12 0c1.105 0 2 .895 2 2s-.895 2-2 2-2-.895-2-2 .895-2 2-2z" transform="translate(-1356.000000, -1286.000000) translate(1356.000000, 1286.000000)"></path></g></g></svg></a>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
					endwhile;
					// Reset Post Data
					wp_reset_postdata();
					echo '</div>';
				?>
			
		</div>
	</div>
</div>

<div class="azandBlogFeaturedContentContainer sectionPadding mainView">
	<div class="generalHeading ">
		<h2>پربازدید ترین مطالب</h2>
	</div>
	<div class="azandBlogFeaturedContent">
		<div class="swiper mySwiper azandBlogContainer">
			<div class="swiper-wrapper">
				<?php
				$args = array(
					'post_type'=>'post',
					'posts_per_page' => 6,
					'meta_key' => 'views',
					'orderby' => 'meta_value_num',
					'post_status' => 'publish',
					'order'=>'DESC',
				);
				$the_query = new WP_Query( $args );
					// The Loop
					while ( $the_query->have_posts() ) : $the_query->the_post();
						echo '<div class="latestPostsItems swiper-slide mainBoxShadow">';
						echo '<a href="'.get_permalink().'"><img class="latestPostsThumb" src="'.get_the_post_thumbnail_url().'"></a>';
						echo '<div class="latestPostsItemsFooter">';
						echo'<a href="'.get_permalink().'" class="titleCardBlogSwiper"><h3>'.get_the_title().'</h3></a>';
						echo '<div class="latestPostsItemsFooterIcons">';
						echo '<div class="homePageBlogCardCmCount">';
						echo '<span><svg width="12" height="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" stroke="#7d7d87" stroke-width="1.7" fill="#9696a0"><path d="M8 .5c2.078 0 3.968.73 5.335 1.926C14.667 3.592 15.5 5.202 15.5 7c0 1.736-.812 3.267-2 4.389v3.853l-4.403-1.887c-.196.121-.481.142-.787.145H8c-2.078 0-3.968-.73-5.335-1.926C1.333 10.408.5 8.798.5 7s.833-3.408 2.165-4.574C4.032 1.23 5.922.5 8 .5z" fill="none" fill-rule="evenodd" fill-opacity="0"></path></svg></span>';
						echo '<span>'. $post->comment_count .'</span>';
						echo '</div>';
						echo '<div class="homePageBlogCardTimeCount">';
						echo '<span><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 16 16" version="1.1" fill="#7d7d87"><path d="M 15 2 L 13 2 L 13 0 L 10 0 L 10 2 L 6 2 L 6 0 L 3 0 L 3 2 L 1 2 C 0.449219 2 0 2.449219 0 3 L 0 15 C 0 15.550781 0.449219 16 1 16 L 15 16 C 15.550781 16 16 15.550781 16 15 L 16 3 C 16 2.449219 15.550781 2 15 2 Z M 14 14 L 2 14 L 2 5 L 14 5 Z M 14 14 "></path></svg></span>';
						echo '<span>'. get_the_date('j F') .'</span>';
						echo '</div>';
						echo '<a href="'.get_permalink().'" class="homePageBlogCardReadMore"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16" fill="#9696a0"><g fill-rule="evenodd"><g><path d="M8 6c1.105 0 2 .895 2 2s-.895 2-2 2-2-.895-2-2 .895-2 2-2zM2 6c1.105 0 2 .895 2 2s-.895 2-2 2-2-.895-2-2 .895-2 2-2zm12 0c1.105 0 2 .895 2 2s-.895 2-2 2-2-.895-2-2 .895-2 2-2z" transform="translate(-1356.000000, -1286.000000) translate(1356.000000, 1286.000000)"></path></g></g></svg></a>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
					endwhile;
					// Reset Post Data
					wp_reset_postdata();
				?>
			</div>
		</div>
		<div class="swiper-button-next">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16" fill="#9696a0"><path d="m11.707 7.293-5-5a1 1 0 1 0-1.414 1.414L9.586 8l-4.293 4.293a1 1 0 1 0 1.414 1.414l5-5a1 1 0 0 0 0-1.414z"/></svg>
		</div>
		<div class="swiper-button-prev">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16" fill="#9696a0"><path d="m4.293 8.707 5 5a1 1 0 1 0 1.414-1.414L6.414 8l4.293-4.293a1 1 0 1 0-1.414-1.414l-5 5a1 1 0 0 0 0 1.414z"/></svg>
		</div>
	</div>
</div>		
<?php
// get_sidebar();
get_footer();


