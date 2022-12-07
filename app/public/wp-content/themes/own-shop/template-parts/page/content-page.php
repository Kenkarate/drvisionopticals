<?php
/**
 * Template part for displaying cart page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package own-shop
 */

?>

<?php
	if(true===get_theme_mod( 'own_shop_enable_page_sidebar',false)) :
		if ( is_active_sidebar('page-sidebar')) :
			if('right'===esc_html(get_theme_mod('own_shop_page_sidebar_layout','right')) && !is_front_page()) :
				?>	
					<div id="page-wrapper" class="col-md-9">
						<div class="content-page">
							<div class="page-content-area">
								<div class="entry-content">
									<?php
										the_content();
										wp_link_pages( array(
											'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'own-shop' ),
											'after'  => '</div>',
										) );
									?>
								</div><!-- .entry-content -->
								<footer class="entry-footer">
									<?php
										edit_post_link(
											sprintf(
												/* translators: %s: Name of current post */
												esc_html__( 'Edit %s', 'own-shop' ),
												the_title( '<span class="screen-reader-text">"', '"</span>', false )
											),
											'<span class="edit-link">',
											'</span>'
										);
									?>
								</footer><!-- .entry-footer -->
							</div>
						</div>
					</div>
					<div id="sidebar-wrapper" class="col-md-3">
		            	<?php get_sidebar('page-sidebar'); ?>
		            </div>	
				<?php
			elseif('left'===esc_html(get_theme_mod('own_shop_page_sidebar_layout','right')) && !is_front_page()) :
				?>	
					<div id="sidebar-wrapper" class="col-md-3">
		            	<?php get_sidebar('page-sidebar'); ?>
		            </div>
					<div id="page-wrapper" class="col-md-9">
						<div class="content-page">
							<div class="page-content-area">
								<div class="entry-content">
									<?php
										the_content();
										wp_link_pages( array(
											'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'own-shop' ),
											'after'  => '</div>',
										) );
									?>
								</div><!-- .entry-content -->
								<footer class="entry-footer">
									<?php
										edit_post_link(
											sprintf(
												/* translators: %s: Name of current post */
												esc_html__( 'Edit %s', 'own-shop' ),
												the_title( '<span class="screen-reader-text">"', '"</span>', false )
											),
											'<span class="edit-link">',
											'</span>'
										);
									?>
								</footer><!-- .entry-footer -->
							</div>
						</div>
					</div>	
				<?php
			else :
				?>
					<div id="page-wrapper" class="col-md-12">
						<div class="content-page">
							<div class="page-content-area">
								<div class="entry-content">
									<?php
										the_content();
										wp_link_pages( array(
											'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'own-shop' ),
											'after'  => '</div>',
										) );
									?>
								</div><!-- .entry-content -->
								<footer class="entry-footer">
									<?php
										edit_post_link(
											sprintf(
												/* translators: %s: Name of current post */
												esc_html__( 'Edit %s', 'own-shop' ),
												the_title( '<span class="screen-reader-text">"', '"</span>', false )
											),
											'<span class="edit-link">',
											'</span>'
										);
									?>
								</footer><!-- .entry-footer -->
							</div>
						</div>
					</div>
				<?php
			endif;
		else:
			?>
				<div id="page-wrapper" class="col-md-12">
					<div class="content-page">
						<div class="page-content-area">
							<div class="entry-content">
								<?php
									the_content();
									wp_link_pages( array(
										'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'own-shop' ),
										'after'  => '</div>',
									) );
								?>
							</div><!-- .entry-content -->
							<footer class="entry-footer">
								<?php
									edit_post_link(
										sprintf(
											/* translators: %s: Name of current post */
											esc_html__( 'Edit %s', 'own-shop' ),
											the_title( '<span class="screen-reader-text">"', '"</span>', false )
										),
										'<span class="edit-link">',
										'</span>'
									);
								?>
							</footer><!-- .entry-footer -->
						</div>
					</div>
				</div>
			<?php
		endif;
	else :
		?>
			<div id="page-wrapper" class="col-md-12">
				<div class="content-page">
					<div class="page-content-area">
						<div class="entry-content">
							<?php
								the_content();
								wp_link_pages( array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'own-shop' ),
									'after'  => '</div>',
								) );
							?>
						</div><!-- .entry-content -->
						<footer class="entry-footer">
							<?php
								edit_post_link(
									sprintf(
										/* translators: %s: Name of current post */
										esc_html__( 'Edit %s', 'own-shop' ),
										the_title( '<span class="screen-reader-text">"', '"</span>', false )
									),
									'<span class="edit-link">',
									'</span>'
								);
							?>
						</footer><!-- .entry-footer -->
					</div>
				</div>
			</div>
		<?php
	endif;
?>