<?php
/**

 * The template for displaying product content in the single-product.php template

 *

 * @version     3.0.0

 */



if ( ! defined( 'ABSPATH' ) ) {

    exit;

}



?>



<?php

    /**

     * woocommerce_before_single_product hook.

     *

     * @hooked wc_print_notices - 10

     */

     do_action( 'woocommerce_before_single_product' );



     if ( post_password_required() ) {

        echo get_the_password_form();

        return;

     }



global $porto_layout;



$post_class = join( ' ', get_post_class() );

if ($porto_layout === 'widewidth' || $porto_layout === 'wide-left-sidebar' || $porto_layout === 'wide-right-sidebar') {

    $post_class .= 'm-t-lg m-b-xl';

    if (porto_get_wrapper_type() !=='boxed')

        $post_class .= ' m-r-md m-l-md';

}

?>



<!-- woocommerce_get_product_schema DEPRECATED with NO altertative in 3.0.0 -->

<div itemscope itemtype="<?php //echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" class="<?php echo $post_class ?>">
<?php
/*
$terms = get_the_terms( get_the_ID(), 'product_cat');
foreach ( $terms as $term ) {
    $termID[] = $term->term_id;
}

if ($termID[0] != ''){
    $child_term = get_term( $termID[0], 'product_cat' );
    if ($child_term->parent!=''){
        $parent_term = get_term( $child_term->parent, 'product_cat' );
        if ($parent_term->parent!='') {
            $parent_term2 = get_term( $parent_term->parent, 'product_cat' );
            $taxonomies = array( 
                'taxonomy' => 'product_cat'
            );
            $args = array(
                'hide_empty' => false,
                'parent' => $parent_term2->term_id
            );
            $term_children = get_terms( $taxonomies, $args );
            if (count($term_children)>0){
                echo "<a href='".get_term_link($parent_term2)."'>All </a>";
                foreach ( $term_children as $child ) {
                    echo "&nbsp; &nbsp; <a href='".get_term_link($child)."'>". $child->name ." </a>";
                }
            }
        }
    }
}
*/
?>


    <div class="product-summary-wrap">

        <div class="row">

            <div class="col-lg-4 summary-before">

                <?php

                    /**

                     * woocommerce_before_single_product_summary hook.

                     *

                     * @hooked woocommerce_show_product_sale_flash - 10

                     * @hooked woocommerce_show_product_images - 20

                     */

                    do_action( 'woocommerce_before_single_product_summary' );

                ?>

            </div>



            <div class="col-lg-5 summary entry-summary">

                <?php

                    /**

                     * woocommerce_single_product_summary hook.

                     *

                     * @hooked woocommerce_template_single_title - 5

                     * @hooked woocommerce_template_single_rating - 10

                     * @hooked woocommerce_template_single_price - 10

                     * @hooked woocommerce_template_single_excerpt - 20

                     * @hooked woocommerce_template_single_add_to_cart - 30

                     * @hooked woocommerce_template_single_meta - 40

                     * @hooked woocommerce_template_single_sharing - 50

                     */



                    do_action( 'woocommerce_single_product_summary' );

                ?>
                
            </div>
            <div class="col-lg-3" >
                <div class="side-row" style="border: 1px solid #ddd;padding: 15px;margin-bottom: 30px;">
                    <h3 style="font-size: 15px;font-weight: 700;margin: 15px auto;">Available Payment Gateway</h3>
                    <div>
                        <!-- <img src="http://shopbabyworld.com/wp-content/uploads/2018/04/Untitled-1.png" width="100%"> -->
                        <img src="http://shopbabyworld.com/wp-content/uploads/2018/06/gateway.png" width="100%">
                    </div>
                    <h3 style="font-size: 15px;margin: 15px auto;font-weight: 700;">Available Shipping Method</h3>
                    <p style="margin-bottom: 15px;color: #333;font-size: 15px;">Phnom Penh</p>
                    <ul style="padding-left: 20px;">
                        <li>
                            <div style="color: #333;">
                                <p style="margin-bottom: 15px;font-size: 1em;">Free Delivery (48 hrs)</p>
                            </div>
                        </li>
                        <li>
                            <div style="color: #333;">
                                <p style="margin-bottom: 15px;font-size: 1em;">Express Delivery (4 hrs)</p> 
                            </div>
                        </li>
                    </ul>
                    <p style="margin-bottom: 15px;color: #333;font-size: 15px;">Province Delivery (2-5 days)</p>
                    <ul style="padding-left: 20px;margin-bottom: 0;">
                        <li>
                            <div style="color: #333;">
                                <p style="margin-bottom: 15px;">Local Pickup</p> 
                            </div>
                        </li>
                        <li>
                            <div style="color: #333;">
                                <p style="margin-bottom: 15px;">Delivery to Customer</p> 
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

    </div><!-- .summary -->



    <?php

        /**

         * woocommerce_after_single_product_summary hook.

         *

         * @hooked woocommerce_output_product_data_tabs - 10

         * @hooked woocommerce_upsell_display - 15

         * @hooked woocommerce_output_related_products - 20

         */

        do_action( 'woocommerce_after_single_product_summary' );

    ?>



    <meta itemprop="url" content="<?php the_permalink(); ?>" />



</div><!-- #product-<?php the_ID(); ?> -->



<?php do_action( 'woocommerce_after_single_product' ); ?>