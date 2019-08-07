        </div>
        <!--close content class tag-->
        <footer id="contact" class="footer" role="contentinfo">

            <div class="footer-top">
                <div class="container">
                    <!-- newsletter form -->
                    <div class="newsletter-form">
                        <h2 class="newsletter-form__headline"><?php the_field('newsletter_headline', 'option'); ?></h2>
                        <?php echo do_shortcode('[contact-form-7 id="8" title="Newsletter"]'); ?>
                    </div>

                    <!-- contact form -->
                    <div class="contact-form">
                        <h2 class="contact-form__headline"><?php the_field('contact_form_headline', 'option'); ?></h2>
                        <p class="contact-form__info"><?php the_field('contact_form_info', 'option'); ?></p>
                        <?php echo do_shortcode('[contact-form-7 id="192" title="Footer contact form"]'); ?>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="container footer-bottom__container">
                    <p class="social-preview__text">Connect with <?php echo get_bloginfo(); ?></p>

                    <nav class="social-nav">
                        <ul class="social-list">
                            <li class="social-item"><a href="skype:<?php the_field('link_to_skype', 'option'); ?>?chat" class="social-link" href=""><i class="fab fa-skype"></i></a></li>
                            <li class="social-item"><a href="<?php the_field('link_to_facebook', 'option'); ?>" class="social-link" href=""><i class="fab fa-facebook-square"></i></a></li>
                            <li class="social-item"><a href="<?php the_field('link_to_linkedin', 'option'); ?>" class="social-link" href=""><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </footer>

    </div>
    <!--close wrapper class tag-->
<?php wp_footer(); ?>

</body>
</html>
