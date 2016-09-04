<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mejorcamara
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section class="entry-header">
		
            <div class="intro">
                <?php
                echo '<h1>' .get_field('review_title'). '</h1>';
                echo '';
                echo get_avatar( get_the_author_email(), '90' );
                //echo $author_id=$post->post_author;
                echo '<p class="review-name">' . get_the_author() . '</p>';
                echo '<p class="author-bio">' . get_the_author_meta('description') . '</p>';
                echo '<p class="last-update"> Última actualización ' . the_modified_date () . '</p>';
                ?>
            </div>
            
            <div class="general-info">
                
                <div class="review-intro"><?php (get_field('review_intro') ? the_field('review_intro') : '') ?></div>
                
                <div class="review-video">
                    <?php (get_field('review_video_info') ? the_field('review_video_info') : '') ?>
                    <?php (get_field('review_video') ? the_field('review_video') : '') ?>
                </div>
            
            
                <div class="pros-cons">
                    <h2>Pros y contras de la <?php the_title(); ?> </h2>
                    <ul>
                      <li><a href=".pros">Pros</a></li>
                      <li><a href=".cons">Contras</a></li>
                    </ul>
                    <div class="pros">
                      <?php
                            $pros = get_field('camara_pros');
                            if($pros) {
                                echo '<div class="pros">';
                                echo '<ul>';
                                foreach($pros as $pro) {
                                        echo '<li>' . $pro['pro'] . '</li>';
                                }
                                echo '</ul>';
                                echo '</div>';
                            }
                      ?>
                    </div>
                      <?php
                            $cons = get_field('camara_cons');
                            if($cons) {
                            
                                echo '<div class="cons">';
                                echo '<ul>';
                                foreach($cons as $con) {
                                        echo '<li>' . $con['con'] . '</li>';
                                }
                                echo '</ul>';
                                echo '</div>';
                            }
                      ?>
                </div>
                
                <div class="review-charac-intro"><?php (get_field('review_characteristics') ? the_field('review_characteristics') : '') ?></div>
                
                <div class="situaciones-info">
                    <div class="when-use"><?php (get_field('when_to_use') ? the_field('when_to_use') : '') ?></div>
                    <div class="good-bad">
                    <?php
                            $goods = get_field('good_for');
                            if($goods) {
                            
                                echo '<div class="good-for">';
                                echo '<ul>';
                                foreach($goods as $good) {
                                        echo '<li>' . $good['good_situation'] . '</li>';
                                }
                                echo '</ul>';
                                echo '</div>';
                            }
                      ?>
                      <?php
                            $bads = get_field('bad_for');
                            if($bads) {
                            
                                echo '<div class="bad-for">';
                                echo '<ul>';
                                foreach($bads as $bad) {
                                        echo '<li>' . $bad['bad_situation'] . '</li>';
                                }
                                echo '</ul>';
                                echo '</div>';
                            }
                      ?>
                    </div>
                    <div class="situciones">
                        <?php
                            $situations = get_field('review_situations');
                            if($situations) {
                            
                                
                                foreach($situations as $situation) {
                                    echo '<div class="situation">'. $situation['situation'] . '</div>';
                                }
                                
                            }
                      ?>
                        
                    </div>
                </div>
            
                <div class="prices">
                    <?php (get_field('review_prices_text') ? the_field('review_prices_text') : '') ?>
                    
                    <?php
                            $kits = get_field('review_prices_table');
                            if($kits) {
                                echo
                                '<table>
                                    <thead>
                                        <tr class="kits-prices">
                                            <td>Kit</td>
                                            <td>Comentario</td>
                                            <td>Precio</td>
                                        </tr>
                                    </thead>';
                                
                                foreach($kits as $kit) {
                                        echo '<tr>'; 
                                            echo '<td>'. $kit['review_prices_table_name'] . '</li>';
                                            echo '<td>'. $kit['review_prices_table_comment'] . '</li>';
                                            echo '<td>'. $kit['review_prices_table_price'] . '</li>';
                                        echo '</tr>';
                                }
                                echo '</table>';
                            }
                      ?>
                    
                    
                </div>
                
                <div class="conclusion"><?php (get_field('review_conclusions') ? the_field('review_conclusions') : '') ?></div>
                
                <div>
                    
                    
                </div>
            
            </div>
            
            <div class="faqs">
                <h2>Preguntas frequentes</h2>
                      <?php
                            $faqs = get_field('faq');
                            if($faqs) {
                            
                                
                                foreach($faqs as $faq) {
                                    echo '<div class="faq">';
                                    echo '<h3>'. $faq['faq_question'] . '</h3>';
                                    echo $faq['faq_answer'];
                                    echo '</div>';
                                }
                                
                            }
                      ?>
            </div>
            
            <div class="alternatives">
                <h2>Alternativas a la <?php the_title(); ?></h2>
                
                <?php 

               $posts = get_field('alternatives');

               if( $posts ): ?>
                   <ul>
                   <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
                       <?php setup_postdata($post); ?>
                       <li>
                           <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                           <span>Custom field from $post: <?php the_field('author'); ?></span>
                       </li>
                   <?php endforeach; ?>
                   </ul>
                   <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
               <?php endif; ?>
                    
                    
                    
                    
                    <?php
                            $alternatives = get_field('alternatives');
                            if($alternatives) {
                                
                                foreach($alternatives as $alternative) {
                                    echo '<div class="alternativa">';
                                    echo '<h3>'. $faq['faq_question'] . '</h3>';
                                    echo $faq['faq_answer'];
                                    echo '</div>';
                                }
                                
                            }
                      ?>
                
            </div>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            <div class="additional-info">
                
            </div>
            
            
            <div class="camera-specs">
                
            </div>
	</section><!-- .entry-header -->
        
        <aside class="review-sidebar">
            
            
        </aside>
        
	<div class="entry-content">
		<?php
			

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mejorcamara' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php mejorcamara_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
