<?php
/**
 * Modern Ecommerce: Customizer
 *
 * @subpackage Modern Ecommerce
 * @since 1.0
 */

function modern_ecommerce_customize_register( $wp_customize ) {

	wp_enqueue_style('customizercustom_css', esc_url( get_template_directory_uri() ). '/assets/css/customizer.css');

	// Add custom control.
  	require get_parent_theme_file_path( 'inc/customize/customize_toggle.php' );

	// Register the custom control type.
	$wp_customize->register_control_type( 'Modern_Ecommerce_Toggle_Control' );

 	$wp_customize->add_section('modern_ecommerce_pro', array(
        'title'    => __('UPGRADE ECOMMERCE PREMIUM', 'modern-ecommerce'),
        'priority' => 1,
    ));

    $wp_customize->add_setting('modern_ecommerce_pro', array(
        'default'           => null,
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new Modern_Ecommerce_Pro_Control($wp_customize, 'modern_ecommerce_pro', array(
        'label'    => __('MODERN ECOMMERCE PREMIUM', 'modern-ecommerce'),
        'section'  => 'modern_ecommerce_pro',
        'settings' => 'modern_ecommerce_pro',
        'priority' => 1,
    )));

	// Post Layouts
    $wp_customize->add_section('modern_ecommerce_layout',array(
        'title' => __('Post Layout', 'modern-ecommerce'),
        'description' => __( 'Change the post layout from below options', 'modern-ecommerce' ),
        'priority' => 1
    ) );

	$wp_customize->add_setting( 'modern_ecommerce_post_sidebar', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_ecommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Ecommerce_Toggle_Control( $wp_customize, 'modern_ecommerce_post_sidebar', array(
		'label'       => esc_html__( 'Show Fullwidth', 'modern-ecommerce' ),
		'section'     => 'modern_ecommerce_layout',
		'type'        => 'toggle',
		'settings'    => 'modern_ecommerce_post_sidebar',
	) ) );

	$wp_customize->add_setting( 'modern_ecommerce_single_post_sidebar', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_ecommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Ecommerce_Toggle_Control( $wp_customize, 'modern_ecommerce_single_post_sidebar', array(
		'label'       => esc_html__( 'Show Single Post Fullwidth', 'modern-ecommerce' ),
		'section'     => 'modern_ecommerce_layout',
		'type'        => 'toggle',
		'settings'    => 'modern_ecommerce_single_post_sidebar',
	) ) );

    $wp_customize->add_setting('modern_ecommerce_post_option',array(
		'default' => 'simple_post',
		'sanitize_callback' => 'modern_ecommerce_sanitize_select'
	));
	$wp_customize->add_control('modern_ecommerce_post_option',array(
		'label' => esc_html__('Select Layout','modern-ecommerce'),
		'section' => 'modern_ecommerce_layout',
		'setting' => 'modern_ecommerce_post_option',
		'type' => 'radio',
        'choices' => array(
            'simple_post' => __('Simple Post','modern-ecommerce'),
            'grid_post' => __('Grid Post','modern-ecommerce'),
        ),
	));

    $wp_customize->add_setting('modern_ecommerce_grid_column',array(
		'default' => '3_column',
		'sanitize_callback' => 'modern_ecommerce_sanitize_select'
	));
	$wp_customize->add_control('modern_ecommerce_grid_column',array(
		'label' => esc_html__('Grid Post Per Row','modern-ecommerce'),
		'section' => 'modern_ecommerce_layout',
		'setting' => 'modern_ecommerce_grid_column',
		'type' => 'radio',
        'choices' => array(
            '1_column' => __('1','modern-ecommerce'),
            '2_column' => __('2','modern-ecommerce'),
            '3_column' => __('3','modern-ecommerce'),
            '4_column' => __('4','modern-ecommerce'),
            '5_column' => __('6','modern-ecommerce'),
        ),
	));

	$wp_customize->add_setting( 'modern_ecommerce_date', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_ecommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Ecommerce_Toggle_Control( $wp_customize, 'modern_ecommerce_date', array(
		'label'       => esc_html__( 'Hide Date', 'modern-ecommerce' ),
		'section'     => 'modern_ecommerce_layout',
		'type'        => 'toggle',
		'settings'    => 'modern_ecommerce_date',
	) ) );

	$wp_customize->add_setting( 'modern_ecommerce_admin', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_ecommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Ecommerce_Toggle_Control( $wp_customize, 'modern_ecommerce_admin', array(
		'label'       => esc_html__( 'Hide Author/Admin', 'modern-ecommerce' ),
		'section'     => 'modern_ecommerce_layout',
		'type'        => 'toggle',
		'settings'    => 'modern_ecommerce_admin',
	) ) );

	$wp_customize->add_setting( 'modern_ecommerce_comment', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_ecommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Ecommerce_Toggle_Control( $wp_customize, 'modern_ecommerce_comment', array(
		'label'       => esc_html__( 'Hide Comment', 'modern-ecommerce' ),
		'section'     => 'modern_ecommerce_layout',
		'type'        => 'toggle',
		'settings'    => 'modern_ecommerce_comment',
	) ) );

	// Top Header
    $wp_customize->add_section('modern_ecommerce_top',array(
        'title' => __('Contact info', 'modern-ecommerce'),
        'priority' => 1
    ) );

	$wp_customize->add_setting( 'modern_ecommerce_change_language', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_ecommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Ecommerce_Toggle_Control( $wp_customize, 'modern_ecommerce_change_language', array(
		'label'       => esc_html__( 'Show Language Translator', 'modern-ecommerce' ),
		'section'     => 'modern_ecommerce_top',
		'type'        => 'toggle',
		'settings'    => 'modern_ecommerce_change_language',
	) ) );

	$wp_customize->add_setting( 'modern_ecommerce_change_usd', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_ecommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Ecommerce_Toggle_Control( $wp_customize, 'modern_ecommerce_change_usd', array(
		'label'       => esc_html__( 'Show Currency Switcher', 'modern-ecommerce' ),
		'section'     => 'modern_ecommerce_top',
		'type'        => 'toggle',
		'settings'    => 'modern_ecommerce_change_usd',
	) ) );
    
    $wp_customize->add_setting('modern_ecommerce_top_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('modern_ecommerce_top_text',array(
		'label' => esc_html__('Add Text','modern-ecommerce'),
		'section' => 'modern_ecommerce_top',
		'setting' => 'modern_ecommerce_top_text',
		'type'    => 'text'
	));

    $wp_customize->add_setting('modern_ecommerce_wishlist',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('modern_ecommerce_wishlist',array(
		'label' => esc_html__('Add Text','modern-ecommerce'),
		'section' => 'modern_ecommerce_top',
		'setting' => 'modern_ecommerce_wishlist',
		'type'    => 'text'
	));

    $wp_customize->add_setting('modern_ecommerce_wishlist_url',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	)); 
	$wp_customize->add_control('modern_ecommerce_wishlist_url',array(
		'label' => esc_html__('Add URL','modern-ecommerce'),
		'section' => 'modern_ecommerce_top',
		'setting' => 'modern_ecommerce_wishlist_url',
		'type'    => 'url'
	));

    $wp_customize->add_setting('modern_ecommerce_regiter',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('modern_ecommerce_regiter',array(
		'label' => esc_html__('Add Text','modern-ecommerce'),
		'section' => 'modern_ecommerce_top',
		'setting' => 'modern_ecommerce_regiter',
		'type'    => 'text'
	));

    $wp_customize->add_setting('modern_ecommerce_regiter_url',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	)); 
	$wp_customize->add_control('modern_ecommerce_regiter_url',array(
		'label' => esc_html__('Add URL','modern-ecommerce'),
		'section' => 'modern_ecommerce_top',
		'setting' => 'modern_ecommerce_regiter_url',
		'type'    => 'url'
	));

    //Slider
	$wp_customize->add_section( 'modern_ecommerce_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'modern-ecommerce' ),
    	'description' => __('Slider Image Dimension ( 600px x 700px )','modern-ecommerce'),
		'priority'   => 3,
	) );

	$wp_customize->add_setting('modern_ecommerce_slider_arrows',array(
       'default' => false,
       'sanitize_callback'	=> 'modern_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('modern_ecommerce_slider_arrows',array(
       'type' => 'checkbox',
       'label' => __('Check to show slider','modern-ecommerce'),
       'section' => 'modern_ecommerce_slider_section',
    ));

	$args = array('numberposts' => -1); 
	$post_list = get_posts($args);
	$i = 0;	
	$pst_sls[]= __('Select','modern-ecommerce');
	foreach ($post_list as $key => $p_post) {
		$pst_sls[$p_post->ID]=$p_post->post_title;
	}
	for ( $i = 1; $i <= 4; $i++ ) {
		$wp_customize->add_setting('modern_ecommerce_post_setting'.$i,array(
			'sanitize_callback' => 'modern_ecommerce_sanitize_select',
		));
		$wp_customize->add_control('modern_ecommerce_post_setting'.$i,array(
			'type'    => 'select',
			'choices' => $pst_sls,
			'label' => __('Select post','modern-ecommerce'),
			'section' => 'modern_ecommerce_slider_section',
		));
	}
	wp_reset_postdata();

	// Services Section
	$wp_customize->add_section( 'modern_ecommerce_service_box_section' , array(
    	'title'      => __( 'Services Settings', 'modern-ecommerce' ),    	
		'priority'   => 4,
	) );

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
	if($i==0){
	  $default = $category->slug;
	  $i++;
	}
	$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('modern_ecommerce_category_setting',array(
		'default' => 'select',
		'sanitize_callback' => 'modern_ecommerce_sanitize_select',
	));
	$wp_customize->add_control('modern_ecommerce_category_setting',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => esc_html__('Select Category to display Post','modern-ecommerce'),
		'section' => 'modern_ecommerce_service_box_section',
	));

	// Product Box
	$wp_customize->add_section( 'modern_ecommerce_product_box_section' , array(
    	'title'      => __( 'Product Settings', 'modern-ecommerce' ),
    	'description' => __( 'Add New Page >> Add Title >> Add Shortcode "" >> Then Select the page in the below page dropdown.', 'modern-ecommerce' ),
		'priority'   => 5,
	) );

    $wp_customize->add_setting('modern_ecommerce_product_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('modern_ecommerce_product_title',array(
		'label'	=> esc_html__('Section Title','modern-ecommerce'),
		'section'	=> 'modern_ecommerce_product_box_section',
		'type'		=> 'text'
	));

    $wp_customize->add_setting('modern_ecommerce_product_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('modern_ecommerce_product_text',array(
		'label'	=> esc_html__('Section Text','modern-ecommerce'),
		'section'	=> 'modern_ecommerce_product_box_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting( 'modern_ecommerce_product_box_page', array(
		'default'  => '',
		'sanitize_callback' => 'modern_ecommerce_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'modern_ecommerce_product_box_page', array(
		'label'    => esc_html__( 'Select Product Page', 'modern-ecommerce' ),
		'section'  => 'modern_ecommerce_product_box_section',
		'type'     => 'dropdown-pages'
	) );
    
	//Footer
    $wp_customize->add_section( 'modern_ecommerce_footer_copyright', array(
    	'title'      => esc_html__( 'Footer Text', 'modern-ecommerce' ),
    	'priority' => 6
	) );

    $wp_customize->add_setting('modern_ecommerce_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('modern_ecommerce_footer_text',array(
		'label'	=> esc_html__('Copyright Text','modern-ecommerce'),
		'section'	=> 'modern_ecommerce_footer_copyright',
		'type'		=> 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'modern_ecommerce_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'modern_ecommerce_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'modern_ecommerce_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'modern_ecommerce_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'modern-ecommerce' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'modern-ecommerce' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'modern_ecommerce_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'modern_ecommerce_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'modern_ecommerce_customize_register' );

function modern_ecommerce_customize_partial_blogname() {
	bloginfo( 'name' );
}
function modern_ecommerce_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
function modern_ecommerce_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}
function modern_ecommerce_is_view_with_layout_option() {
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

define('MODERN_ECOMMERCE_PRO_LINK',__('https://www.ovationthemes.com/wordpress/ecommerce-wordpress-theme/','modern-ecommerce'));

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('Modern_Ecommerce_Pro_Control')):
    class Modern_Ecommerce_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
	        <div class="col-md-2 col-sm-6 upsell-btn">
                <a href="<?php echo esc_url( MODERN_ECOMMERCE_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE ECOMMERCE PREMIUM','modern-ecommerce');?> </a>
	        </div>
            <div class="col-md-4 col-sm-6">
                <img class="modern_ecommerce_img_responsive " src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png">
            </div>
	        <div class="col-md-3 col-sm-6">
	            <h3 style="margin-top:10px; margin-left: 20px; text-decoration:underline; color:#333;"><?php esc_html_e('Modern Ecommerce PREMIUM - Features', 'modern-ecommerce'); ?></h3>
                <ul style="padding-top:10px">
                    <li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'modern-ecommerce');?> </li>
                    <li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'modern-ecommerce');?> </li>
                    <li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'modern-ecommerce');?> </li>
                    <li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'modern-ecommerce');?> </li>
                    <li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'modern-ecommerce');?> </li>
                    <li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'modern-ecommerce');?> </li>
                    <li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'modern-ecommerce');?> </li>
                    <li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'modern-ecommerce');?> </li>
                    <li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'modern-ecommerce');?> </li>
                    <li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'modern-ecommerce');?> </li>
                    <li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'modern-ecommerce');?> </li>
                    <li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'modern-ecommerce');?> </li>
                    <li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'modern-ecommerce');?> </li>
                    <li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'modern-ecommerce');?> </li>
                    <li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'modern-ecommerce');?> </li>
                    <li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'modern-ecommerce');?> </li>
                    <li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'modern-ecommerce');?> </li>
                    <li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'modern-ecommerce');?> </li>
                    <li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'modern-ecommerce');?> </li>
                   	<li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'modern-ecommerce');?> </li>
                   	<li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'modern-ecommerce');?> </li>
                   	<li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'modern-ecommerce');?> </li>
                   	<li class="upsell-modern_ecommerce"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'modern-ecommerce');?> </li>
                </ul>
        	</div>
		    <div class="col-md-2 col-sm-6 upsell-btn upsell-btn-bottom">
	            <a href="<?php echo esc_url( MODERN_ECOMMERCE_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE ECOMMERCE PREMIUM','modern-ecommerce');?> </a>
		    </div>
        </label>
    <?php } }
endif;