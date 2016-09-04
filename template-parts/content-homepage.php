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
	<header class="entry-header">
		<?php
		
			
                ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
                
                    echo '<div class="homepage-main">';
                    echo '<div class="homepage-main-wrapper">';
                        
                        //Prints main content
                        echo '<div class="main-illustration-content">';
                            echo '<div class="content-flex-left">';
                            the_title( '<h1 class="entry-title">', '</h1>' );
                            $mainText = get_field('main_text');
                            echo '</div>';
                            $mainCtaText = get_field('main_cta_text');
                            $mainCtaUrl = get_field('main_cta_url');
                            if( !empty($mainText) && !empty($mainCtaText) ) {
                                echo $mainText;
                                echo '<a href="'. $mainCtaUrl .'" class="main-cta">' . $mainCtaText . '</a>';
                            }
                        echo '</div>';
                        //Prints main illustration
                        echo '<div class="main-illustration">';
                            $illustration = get_field('main_illustration');
                            if( !empty($illustration) ) {
                                echo '<img src="' . $illustration['url'] . '" alt="'. $illustration['alt']. '" />';
                            }
                        echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    
                    //Prints subsections
                    echo '<div class="homepage-categories">';
                    echo '<div class="homepage-categories-wrapper">';
                        $categoriesTitle = get_field('categories_title');
                        echo '<h2 class="homepage-categories">'. $categoriesTitle .'</h2>';
                        echo '<div class="categories-wrapper">';
                            // check if the repeater field has rows of data
                            if( have_rows('category_content') ):

                                    // loop through the rows of data
                                while ( have_rows('category_content') ) : the_row();
                                    echo '<div class="category">';
                                    // display a sub field value
                                   $categoryTitle = get_sub_field('title');
                                    echo '<h3 class="category-title">' . $categoryTitle . '</h3>';
                                    $image = get_sub_field('image');
                                    echo '<img src="'. $image['url'] .'" alt="'. $image['alt'] .'" />';
                                    $categoryUrl = get_sub_field('url');
                                    $categoryCta = get_sub_field('cta_text');
                                    echo '<a href="'. $categoryUrl .'" class="category-cta">' . $categoryCta . '</a>';
                                    echo '</div>';

                                endwhile;

                            else :

                                // no rows found

                            endif;
                        
                        echo '</div>';
                    
                    echo '</div>';
                    echo '</div>';
                
                    //Prints the about us section
                    
                    echo '<div class="homepage-about">';
                    echo '<div class="homepage-about-wrapper">';
                        $aboutTitle = get_field('about_title');
                        echo '<h2>'. $aboutTitle .'</h2>';
                        $aboutText = get_field('about_text');
                        //echo '<p class="about-text">'. $aboutText .'</p>';
                        echo $aboutText;
                        echo '<div class="about-wrapper">';
                            // check if the repeater field has rows of data
                            if( have_rows('author') ):

                                    // loop through the rows of data
                                while ( have_rows('author') ) : the_row();
                                    echo '<div class="author">';
                                    // display a sub field value
                                        echo '<div class="author-image">';
                                            $avatar = get_sub_field('avatar');
                                            echo '<img src="'. $avatar['url'] .'" alt="'. $avatar['alt'] .'" />';
                                        echo '</div>';
                                        echo '<div class="author-info">';
                                            $authorName = get_sub_field('name');
                                            echo '<h3 class="category-title">' . $authorName . '</h3>';
                                            $authorBio = get_sub_field('bio');
                                            echo $authorBio;
                                        echo '</div>';
                                    echo '</div>';

                                endwhile;

                            else :

                                // no rows found

                            endif;
                        
                        echo '</div>';
                    
                    
                    echo '</div>';
                    echo '</div>';
                ?>            
            
                <!-- Begin MailChimp Signup Form -->
                <div id="mc_embed_signup">
                <div class="mc-wrapper">
                
                <div id="mc_embed_signup_scroll">
                        <?php 
                        $ebookTitle = get_field('ebook_title');
                        echo '<h2>'. $ebookTitle .'</h2>'; 
                        ?>
                
                <form class="mc-form" action="//mejorcamara.us13.list-manage.com/subscribe/post?u=42b601eee75ff858d107584eb&amp;id=cec8baa389" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                    <?php 
                        $ebookCover= get_field('ebook_cover');
                        echo '<img class="ebook-cover" src="' . $ebookCover['url'] . '" alt="'. $ebookCover['alt']. '" />';
                    ?>
                    <div class="ebook-registration-left">        
                <?php $ebookNote = get_field('ebook_text');
                        echo $ebookNote; 
                        ?>
                <div class="mc-form-inputs">
                    <div class="mc-field-group nombre-email">
                        
                        <input placeholder="Nombre *" type="text" value="" name="FNAME" class="required nombre" id="mce-FNAME">
                        <input placeholder="Email *" type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                        
                    </div>

                    <div class="mc-field-group">
                        <input class="tipo-camara" placeholder="¿Qué tipo de cámara te interesa?" type="text" value="" name="TYPE" class="" id="mce-TYPE">
                    </div>
                </div>
                        <div id="mce-responses" class="clear">
                                <div class="response" id="mce-error-response" style="display:none"></div>
                                <div class="response" id="mce-success-response" style="display:none"></div>
                        </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_42b601eee75ff858d107584eb_cec8baa389" tabindex="-1" value=""></div>
                    <input type="hidden" name="LOCATION" id="location" value="homepage">
                    <div class="clear"><input class="ebook-submit" type="submit" value="Registrarse" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                    <p class="campos-requeridos">* Campos requeridos</p>
                </div>    
                    </div>
                </form>
                </div>
                </div>

<!--End mc_embed_signup-->
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php mejorcamara_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
