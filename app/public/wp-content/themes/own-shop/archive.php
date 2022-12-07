<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package own-shop
 */

get_header();
own_shop_get_breadcrumbs_content();

?>

<div id="primary" class="<?php echo esc_attr(get_theme_mod('own_shop_header_menu_style','style1')); ?> <?php echo esc_attr(OWN_SHOP_CONTAINER_CLASS) ?>  content-area">
	<main id="main" class="site-main" role="main">
		<div class="content-inner">
			<div id="blog-section">
				<div class="row">
					<div class="archive heading">
			            <h1 class="main-title"><?php the_archive_title(); ?></h1>
			        </div>
				</div>
		        <div class="row">
		        	<?php
		        		if('right'===esc_html(get_theme_mod('own_shop_blog_sidebar_layout','right'))) :
							if ( is_active_sidebar('sidebar-1')) :
			        			?>
			        				<div class="col-md-9">
										<?php
											if(have_posts() ) :
												while(have_posts() ) :
													the_post();
													/*
													 * Include the Post-Format-specific template for the content.
													 * If you want to override this in a child theme, then include a file
													 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
													 */
													get_template_part( 'template-parts/post/content-archive', get_post_format());
												endwhile;
												?>
						                			<nav class="pagination">
						                    			<?php the_posts_pagination(); ?>
						                			</nav>
												<?php	
											endif;
										?>
						            </div>
						            <div class="col-md-3">
						                <?php get_sidebar('sidebar-1'); ?>
						            </div>
			        			<?php
			        		else:
			        			?>
			        				<div class="col-md-12">
										<?php
											if(have_posts() ) :
												while(have_posts() ) :
													the_post();
													/*
													 * Include the Post-Format-specific template for the content.
													 * If you want to override this in a child theme, then include a file
													 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
													 */
													get_template_part( 'template-parts/post/content-archive', get_post_format());
												endwhile;
												?>
						                			<nav class="pagination">
						                    			<?php the_posts_pagination(); ?>
						                			</nav>
												<?php	
											endif;
										?>
						            </div>
			        			<?php
			        		endif;
		        		elseif('left'===esc_html(get_theme_mod('own_shop_blog_sidebar_layout','right'))) :
		        			if ( is_active_sidebar('sidebar-1')) :
			        			?>
			        				<div class="col-md-3">
						                <?php get_sidebar('sidebar-1'); ?>
						            </div>
						            <div class="col-md-9">
										<?php
											if(have_posts() ) :
												while(have_posts() ) :
													the_post();
													/*
													 * Include the Post-Format-specific template for the content.
													 * If you want to override this in a child theme, then include a file
													 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
													 */
													get_template_part( 'template-parts/post/content-archive', get_post_format());
												endwhile;
												?>
						                			<nav class="pagination">
						                    			<?php the_posts_pagination(); ?>
						                			</nav>
												<?php	
											endif;
										?>
						            </div>
						    	<?php
						    else:
						    	?>
						    		<div class="col-md-12">
										<?php
											if(have_posts() ) :
												while(have_posts() ) :
													the_post();
													/*
													 * Include the Post-Format-specific template for the content.
													 * If you want to override this in a child theme, then include a file
													 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
													 */
													get_template_part( 'template-parts/post/content-archive', get_post_format());
												endwhile;
												?>
						                			<nav class="pagination">
						                    			<?php the_posts_pagination(); ?>
						                			</nav>
												<?php	
											endif;
										?>
						            </div>
						    	<?php
						    endif;
		        		else :
		        			?>
								<div class="col-md-12">
									<?php
										if(have_posts() ) :
											while(have_posts() ) :
												the_post();
												/*
												 * Include the Post-Format-specific template for the content.
												 * If you want to override this in a child theme, then include a file
												 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
												 */
												get_template_part( 'template-parts/post/content-archive', get_post_format());
											endwhile;
											?>
					                			<nav class="pagination">
					                    			<?php the_posts_pagination(); ?>
					                			</nav>
											<?php	
										endif;
									?>
					            </div>
							<?php
		        		endif;
		        	?>			            
		        </div>
			</div>
		</div>
	</main>
</div>

<?php

get_footer();