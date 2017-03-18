<?php
$crafter_enable_section = get_theme_mod( 'crafter_pricing_enable', true );
if ( $crafter_enable_section || is_customize_preview() ) :
?>
<div id="pricing-section" class="pricing-section" <?php if( false == $crafter_enable_section ): echo 'style="display: none;"'; endif ?>>
    <h2 class="section-title wow fadeIn"><?php echo esc_html( get_theme_mod( 'crafter_pricing_title', __( 'Pricing', 'crafter' ) ) ); ?></h2>

    <div class="pricing-table-wrap">

            <?php
            $id = get_theme_mod( 'crafter_pricing_page', '' );
            $post = get_post( $id ); 

            if ( is_a( $post, 'WP_Post' ) ) {

                $content = apply_filters( 'the_content', $post->post_content ); 
                echo $content;
                
            }else{
            ?>
                <div class="pricing-table wow fadeInUp">
                    <h3>Basic</h3>

                    <span class="pricing-price">
                        <span class="cd-currency">$</span><span class="cd-value">12</span><span class="cd-duration">mo</span>
                    </span>

                    <ul>
                        <li><em>256MB</em> Memory</li>
                        <li><em>1</em> User</li>
                        <li><em>1</em> Website</li>
                        <li><em>1</em> Domain</li>
                        <li><em>Unlimited</em> Bandwidth</li>
                        <li><em>24/7</em> Support</li>
                    </ul>

                    <a class="btn-ql" href="#">Select</a>
                    <span class="lines"></span>
                </div>

                <div class="pricing-table wow fadeInUp">

                    <h3>Popular</h3>

                    <span class="pricing-price">
                        <span class="cd-currency">$</span><span class="cd-value">25</span><span class="cd-duration">mo</span>
                    </span>

                    <ul>
                        <li><em>512MB</em> Memory</li>
                        <li><em>3</em> User</li>
                        <li><em>5</em> Website</li>
                        <li><em>7</em> Domain</li>
                        <li><em>Unlimited</em> Bandwidth</li>
                        <li><em>24/7</em> Support</li>
                    </ul>

                    <a class="btn-ql" href="#">Select</a>
                    <span class="lines"></span>
                </div>

                <div class="pricing-table wow fadeInUp">

                    <h3>Premier</h3>

                    <span class="pricing-price">
                        <span class="cd-currency">$</span><span class="cd-value">35</span><span class="cd-duration">mo</span>
                    </span>

                    <ul>
                        <li><em>1024MB</em> Memory</li>
                        <li><em>5</em> User</li>
                        <li><em>10</em> Website</li>
                        <li><em>10</em> Domain</li>
                        <li><em>Unlimited</em> Bandwidth</li>
                        <li><em>24/7</em> Support</li>
                    </ul>

                    <a class="btn-ql" href="#">Select</a>
                    <span class="lines"></span>
                </div>
            <?php
            }
            ?>
            
    </div> <!-- .pricing-table-wrap -->

</div><!-- pricing-section -->
<?php endif ?>