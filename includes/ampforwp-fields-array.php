<?php 
global $amp_ux_fields;
$analytics_options = array();
$pages = get_pages();
foreach ($pages as $page ) {
	$options[$page->ID] = $page->post_title;
}
$analytics_options = array('ampforwp-ga-switch'=>'Google Analytics','ampforwp-Segment-switch'=>'Segment Analytics','ampforwp-Piwik-switch'=>'Matomo (Piwik) Analytics','ampforwp-Quantcast-switch'=>'Quantcast Measurement','ampforwp-comScore-switch'=>'comScore', 'ampforwp-Effective-switch'=>'Effective Measure','ampforwp-StatCounter-switch'=>'StatCounter','ampforwp-Histats-switch'=>'Histats Analytics','ampforwp-Yandex-switch'=>'Yandex Metrika','ampforwp-Chartbeat-switch'=>'Chartbeat Analytics','ampforwp-Alexa-switch'=>'Alexa Metrics','ampforwp-afs-analytics-switch'=>'AFS Analytics','amp-fb-pixel'=>'Facebook Pixel','amp-clicky-switch'=>'Clicky Analytics');
$analytics_default_option = ampforwp_get_setting('amp-analytics-select-option');
$analytics_default = 'ampforwp-ga-switch';
switch ($analytics_default_option) {
	case '1': 
		$analytics_default = 'ampforwp-ga-switch';
		break;
	case '2': 
		$analytics_default = 'ampforwp-Segment-switch';
		break;
	case '3': 
		$analytics_default = 'ampforwp-Piwik-switch';
		break;
	case '4': 
		$analytics_default = 'ampforwp-Quantcast-switch';
		break;
	case '5': 
		$analytics_default = 'ampforwp-comScore-switch';
		break;
	case '6': 
		$analytics_default = 'ampforwp-Effective-switch';
		break;
	case '7': 
		$analytics_default = 'ampforwp-StatCounter-switch';
		break;
	case '8': 
		$analytics_default = 'ampforwp-Histats-switch';
		break;
	case '9': 
		$analytics_default = 'ampforwp-Yandex-switch';
		break;
	case '10': 
		$analytics_default = 'ampforwp-Chartbeat-switch';
		break;
	case '11': 
		$analytics_default = 'ampforwp-Alexa-switch';
		break;
	case '12': 
		$analytics_default = 'ampforwp-afs-analytics-switch';
		break;
	case '13': 
		$analytics_default = 'amp-fb-pixel';
		break;
	case '14': 
		$analytics_default = 'amp-clicky-switch';
		break;
	default:
		break;
}
 if ( ! function_exists('ampforwp_get_seo_default') ) {
        function ampforwp_get_seo_default() {
            $default = '';
            include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); 
            if ( is_plugin_active('wordpress-seo/wp-seo.php') ) {
                $default = 'yoast';
            }
            elseif ( is_plugin_active('all-in-one-seo-pack/all_in_one_seo_pack.php') ) {
                $default = 'aioseo';
            }
            elseif ( defined( 'RANK_MATH_FILE' ) ) {
                $default = 'rank_math';
            }
            elseif ( function_exists('genesis_theme_support') ) {
                $default = 'genesis';
            }
            elseif ( is_plugin_active('wp-seopress/seopress.php') ) {
                $default = 'seopress';
            }
            elseif ( function_exists( 'the_seo_framework' ) ) {
                $default = 'seo_framework';
            }
            elseif ( class_exists('SQ_Classes_ObjController') ) {
                $default = 'squirrly';
            }elseif ( class_exists('Smartcrawl_Loader')){
                $default = 'smartcrawl';
            }
            return $default;
        }
    }
$structure_data_options =  array(
					                'BlogPosting'   => 'Blog',
					                'NewsArticle'   => 'News',
					                'Recipe'        => 'Recipe',
					                'Product'       => 'Product',
					                'VideoObject'   => 'Video Object',
					                'Article'       => 'Article',
					                'WebPage'       => 'WebPage'
					            );
$seo_options =  array(
		                ''       => 'Choose SEO',
		                'yoast'       => 'Yoast',
	                    'aioseo'     => 'All in One SEO',
	                    'rank_math' => 'Rank Math SEO',
	                    'genesis'    => 'Genesis',
	                    'seopress'    => 'SEOPress',
	                    'bridge'    => 'Bridge Qode SEO',
	                    'seo_framework'    => 'The SEO Framework',
	                    'squirrly'    => 'Squirrly SEO',
	                    'smartcrawl'    => 'SmartCrawl'
		            );

$amp_ux_common = array(
						'field_type'=>'footer', 
						'field_data'=>array(
											array(
												'desc'=>"Send Feedback",
												'icon'=>'ux-send-feedback-icon'
											),array(
												'desc'=>"Help",
												'icon'=>'ux-help-icon'
											),array(
												'desc'=>"Review",
												'icon'=>'ux-review-icon'
											),
										)
					);
$amp_website_type = ampforwp_get_setting('ampforwp-sd-type-posts');
$amp_ux_fields = array(
					array('field_type'=>'main_section_start', 'field_data'=>array('id'=>'amp-ux-main-section','class'=>'amp-ux-main-section')),
					// Website type 
					array('field_type'=>'section_start',
						'field_data'=>array('id'=>'ampforwp-ux-website-type-section','class'=>'section-1 amp-ux-website-type-section')
					),
					array('field_type'=>'select',
						'field_data'=>array('title'=>'What\'s your Website Type','class'=>'ampforwp-ux-select','id'=>'ampforwp-ux-select','options'=>$structure_data_options,'default'=>$amp_website_type)
					),
					$amp_ux_common,
					array('field_type'=>'section_end','field_data'=>array()),

					// AMP Need Section
				    array('field_type'=>'section_start',
				    	'field_data'=>array('id'=>'ampforwp-ux-need-type-section',
						'class'=>'section-2 amp-ux-need-section')
				    ),
					array('field_type'=>'checkbox',
						'field_data'=>array('title'=>'Homepage','class'=>'amp-ux-homepage','id'=>'amp-ux-homepage','default'=>ampforwp_get_setting('ampforwp-homepage-on-off-support'))
					),
					array('field_type'=>'checkbox',
						'field_data'=>array('title'=>'FrontPage','class'=>'amp-ux-frontpage','id'=>'amp-ux-frontpage','required'=>array('amp-ux-homepage','=','1'),'default'=>ampforwp_get_setting('amp-frontpage-select-option'))
					),
					array('field_type'=>'select',
						'field_data'=>array('title'=>'Select FrontPage','class'=>'amp-ux-frontpage-select child_opt child_opt_arrow','id'=>'amp-ux-frontpage-select', 'options'=>$options, 'required'=>array('amp-ux-frontpage','=','1'),'default'=>ampforwp_get_setting('amp-frontpage-select-option-pages')
						)
					),
					array('field_type'=>'checkbox',
						'field_data'=>array('title'=>'Posts','class'=>'amp-ux-posts','id'=>'amp-ux-posts','default'=>ampforwp_get_setting('amp-on-off-for-all-posts'))
					),
					array('field_type'=>'checkbox',
						'field_data'=>array('title'=>'Pages','class'=>'amp-ux-pages','id'=>'amp-ux-pages','default'=>ampforwp_get_setting('amp-on-off-for-all-pages'))
					),
					array('field_type'=>'checkbox',
						'field_data'=>array('title'=>'Archives','class'=>'amp-ux-archives','id'=>'amp-ux-archives','default'=>ampforwp_get_setting('ampforwp-archive-support'))
					),
					$amp_ux_common ,
					array('field_type'=>'section_end','field_data'=>array()),

					// Design Section
					array('field_type'=>'section_start',
						'field_data'=>array('id'=>'ampforwp-ux-design-section','class'=>'section-1 ampforwp-ux-design-section')
					),
					array('field_type'=>'media',
						'field_data'=>array('title'=>'Logo','class'=>'amp-ux-opt-media-container','id'=>'amp-ux-opt-media', 'default'=>array('id'=>ampforwp_get_setting('opt-media','id'),'url'=>ampforwp_get_setting('opt-media','url'),'width'=>ampforwp_get_setting('opt-media','width'),'height'=>ampforwp_get_setting('opt-media','height')))
					),
					array('field_type'=>'color',
						'field_data'=>array('title'=>'Global Color Scheme','class'=>'amp-ux-color-scheme','id'=>'amp-ux-color-scheme','default'=>ampforwp_get_setting('swift-color-scheme','color'))
					),
					$amp_ux_common ,
					array('field_type'=>'section_end', 'field_data'=>array()),

					//Analytics
					array('field_type'=>'section_start',
						'field_data'=>array('id'=>'ampforwp-ux-analytics-section','class'=>'section-1 ampforwp-ux-analytics-section')
					),
					array('field_type'=>'select',
					'field_data'=>array('title'=>'Setup Analytics Tracking','class'=>'ampforwp-ux-analytics-select child_opt child_opt_arrow','id'=>'ampforwp-ux-analytics-select', 'options'=>$analytics_options,'default'=>$analytics_default,'data-href'=>ampforwp_get_setting('amp-analytics-select-option'),'data-href-id'=>'amp-ux-analytics-hidden')
					),
					array('field_type'=>'text', 'field_data'=>array('title'=>'Your Tracking ID','id'=>'amp-ux-ga','class'=>'amp-ux-ga google-analytics analytics-text','required'=>array('ampforwp-ux-analytics-select','=','ampforwp-ga-switch'), 'data-href'=>'ampforwp-ga-switch','data-text'=>'ga-feild','default'=>ampforwp_get_setting('ga-feild'))
					),
					array('field_type'=>'text', 'field_data'=>array('title'=>'Facebook Pixel ID','id'=>'amp-ux-fp','class'=>'amp-ux-fp analytics-text','required'=>array('ampforwp-ux-analytics-select','=','amp-fb-pixel'),'data-href'=>'amp-fb-pixel','data-text'=>'amp-fb-pixel-id','default'=>ampforwp_get_setting('amp-fb-pixel-id'))
					),
					array('field_type'=>'text', 'field_data'=>array('title'=>'SEGMENT WRITE KEY','id'=>'amp-ux-sw','class'=>'amp-ux-sw analytics-text','required'=>array('ampforwp-ux-analytics-select','=','ampforwp-Segment-switch'),'data-href'=>'ampforwp-Segment-switch','data-text'=>'sa-feild','default'=>ampforwp_get_setting('sa-feild'))
					),
					array('field_type'=>'text', 'field_data'=>array('title'=>'Your Matomo (Piwik) Analytics Tracking ID','id'=>'amp-ux-mp','class'=>'amp-ux-mp analytics-text','required'=>array('ampforwp-ux-analytics-select','=','ampforwp-Piwik-switch'),'data-href'=>'ampforwp-Piwik-switch','data-text'=>'pa-feild','default'=>ampforwp_get_setting('pa-feild'))
					),
					array('field_type'=>'text', 'field_data'=>array('title'=>'Your Quantcast Measurement Tracking ID','id'=>'amp-ux-qm','class'=>'amp-ux-qm analytics-text','required'=>array('ampforwp-ux-analytics-select','=','ampforwp-Quantcast-switch'),'data-text'=>'amp-quantcast-analytics-code','default'=>ampforwp_get_setting('amp-quantcast-analytics-code'))
					),
					array('field_type'=>'text', 'field_data'=>array('title'=>'C1','id'=>'amp-ux-cs-1','class'=>'amp-ux-cs analytics-text','required'=>array('ampforwp-ux-analytics-select','=','ampforwp-comScore-switch'),'data-href'=>'ampforwp-comScore-switch','data-text'=>'amp-comscore-analytics-code-c1','default'=>ampforwp_get_setting('amp-comscore-analytics-code-c1'))
					),
					array('field_type'=>'text', 'field_data'=>array('title'=>'C2','id'=>'amp-ux-cs-2','class'=>'amp-ux-cs analytics-text','required'=>array('ampforwp-ux-analytics-select','=','ampforwp-comScore-switch'),'data-href'=>'ampforwp-comScore-switch','data-text'=>'amp-comscore-analytics-code-c2','default'=>ampforwp_get_setting('amp-comscore-analytics-code-c2'))
					),
					array('field_type'=>'text', 'field_data'=>array('title'=>'Your Effective Measure Tracking ID','id'=>'amp-ux-em','class'=>'amp-ux-em analytics-text','required'=>array('ampforwp-ux-analytics-select','=','ampforwp-Effective-switch'),'data-href'=>'ampforwp-Effective-switch','data-text'=>'eam-feild','default'=>ampforwp_get_setting('eam-feild'))
					),
					array('field_type'=>'text', 'field_data'=>array('title'=>'Your StatCounter Tracking ID','id'=>'amp-ux-sc','class'=>'amp-ux-sc analytics-text','required'=>array('ampforwp-ux-analytics-select','=','ampforwp-StatCounter-switch'),'data-href'=>'ampforwp-StatCounter-switch','data-text'=>'sc-feild','default'=>ampforwp_get_setting('sc-feild'))
					),
					array('field_type'=>'text', 'field_data'=>array('title'=>'Your Histats Analytics Tracking ID','id'=>'amp-ux-ha','class'=>'amp-ux-ha analytics-text','required'=>array('ampforwp-ux-analytics-select','=','ampforwp-Histats-switch'),'data-href'=>'ampforwp-Histats-switch','data-text'=>'histats-field','default'=>ampforwp_get_setting('histats-field'))
					),
					array('field_type'=>'text', 'field_data'=>array('title'=>'Yandex Metrika Analytics ID','id'=>'amp-ux-ym','class'=>'amp-ux-ym analytics-text','required'=>array('ampforwp-ux-analytics-select','=','ampforwp-Yandex-switch'),'data-href'=>'ampforwp-Yandex-switch','data-text'=>'amp-Yandex-Metrika-analytics-code','default'=>ampforwp_get_setting('amp-Yandex-Metrika-analytics-code'))
					),
					array('field_type'=>'text', 'field_data'=>array('title'=>'Your Tracking ID','id'=>'amp-ux-ca','class'=>'amp-ux-ca analytics-text','required'=>array('ampforwp-ux-analytics-select','=','ampforwp-Chartbeat-switch'),'data-href'=>'ampforwp-Chartbeat-switch','data-text'=>'amp-Chartbeat-analytics-code','default'=>ampforwp_get_setting('amp-Chartbeat-analytics-code'))
					),
					array('field_type'=>'text', 'field_data'=>array('title'=>'Alexa Metrics Account','id'=>'amp-ux-am-1','class'=>'amp-ux-am analytics-text','required'=>array('ampforwp-ux-analytics-select','=','ampforwp-Alexa-switch'),'data-href'=>'ampforwp-Alexa-switch','data-text'=>'ampforwp-alexa-account','default'=>ampforwp_get_setting('amp-Chartbeat-analytics-code'))
					),
					array('field_type'=>'text', 'field_data'=>array('title'=>'Alexa Metrics Domain','id'=>'amp-ux-am-2','class'=>'amp-ux-am analytics-text','required'=>array('ampforwp-ux-analytics-select','=','ampforwp-Alexa-switch'),'data-href'=>'ampforwp-Alexa-switch','data-text'=>'ampforwp-alexa-domain','default'=>ampforwp_get_setting('ampforwp-alexa-domain'))
					),
					array('field_type'=>'text', 'field_data'=>array('title'=>'Website ID','id'=>'amp-ux-afs','class'=>'amp-ux-afs analytics-text','required'=>array('ampforwp-ux-analytics-select','=','ampforwp-afs-analytics-switch'),'data-href'=>'ampforwp-afs-analytics-switch','data-text'=>'ampforwp-afs-siteid','default'=>ampforwp_get_setting('ampforwp-afs-siteid'))
					),
					array('field_type'=>'text', 'field_data'=>array('title'=>'Clicky Site ID','id'=>'amp-ux-cl','class'=>'amp-ux-cl analytics-text','required'=>array('ampforwp-ux-analytics-select','=','amp-clicky-switch'),'data-href'=>'amp-clicky-switch','data-text'=>'clicky-site-id','default'=>ampforwp_get_setting('clicky-site-id'))
					),
					array('field_type'=>'notification', 'field_data'=>array('title'=>'More Analytics Settings','type'=>'warning','desc'=>sprintf( 'Please click <a href="javascript:void(0);" id="ampforwp-goto-analytics">%s</a> settings.',esc_html__('here for advance analytics','accelerated-mobile-pages' )))
					),
					$amp_ux_common,
					array('field_type'=>'section_end', 'field_data'=>array()),

					// Privacy Settings
					array('field_type'=>'section_start',
						'field_data'=>array('id'=>'ampforwp-ux-privacy-section','class'=>'section-1 ampforwp-ux-privacy-section')
					),
					array('field_type'=>'switch','field_data'=>array('title'=>'Cookie Notice Bar','id'=>'amp-ux-notice-switch','class'=>'amp-ux-notice-switch amp-ux-switch-on-off','data-id'=>'amp-ux-notice-switch','desc'=>'Cookie Bar allows you to discreetly inform visitors that your website uses cookies.','default'=>ampforwp_get_setting('amp-enable-notifications'))
					),
					array('field_type'=>'switch','field_data'=>array('title'=>'GDPR','id'=>'amp-ux-gdpr-switch','class'=>'amp-ux-gdpr-switch amp-ux-switch-on-off','data-id'=>'amp-ux-gdpr-switch','desc'=>'Comply with European privacy regulations(GDPR). Recommended for EU Citizens.','default'=>ampforwp_get_setting('amp-gdpr-compliance-switch'))
					),
					$amp_ux_common,
					array('field_type'=>'section_end', 'field_data'=>array()),

					 // 3rd Party
					 array('field_type'=>'section_start',
					 	'field_data'=>array('id'=>'ampforwp-ux-thirdparty-section','class'=>'section-1 ampforwp-ux-thirdparty-section')
					 ),
					 array('field_type'=>'select',
						'field_data'=>array('title'=>'SEO','class'=>'ampforwp-ux-select','id'=>'ampforwp-ux-seo-select','options'=>$seo_options,'default'=>ampforwp_get_seo_default())
					 ),
				);
$check_extension = ampforwp_get_setup_info('ampforwp_ux_extension_check');
for($ex=0;$ex<count($check_extension);$ex++){
	$active_ext = $check_extension[$ex];
	if($active_ext=="wpml"){
		$is_active = 0;
		if(function_exists('ampforwp_auto_add_amp_menu_link_insert_wpml') ){
			$is_active = 1;
		}
		$amp_ux_fields[] = array('field_type'=>'switch','field_data'=>array('title'=>"WPML for AMP",'id'=>"amp-ux-ext-wpml",'class'=>'amp-ux-extension-switch amp-ux-switch-on-off','data-id'=>'amp-ux-ext-wpml-switch','desc'=>'','default'=>$is_active)
		);
		$amp_ux_fields[] = array('field_type'=>'notification', 'field_data'=>array('type'=>'warning','desc'=>sprintf( 'This feature requires <a href="https://ampforwp.com/wpml-for-amp/" target="_blank">%s</a> extension. <a href="https://ampforwp.com/wpml-for-amp/" target="_blank">%s</a>',esc_html__('WPML for AMP extension','accelerated-mobile-pages' ),esc_html__('Click here for more info','accelerated-mobile-pages' )),'required'=>array('amp-ux-ext-wpml','=',0),'default'=>$is_active));
	}
	if($active_ext=="ratings"){
		$is_active = 0;
		if(function_exists('the_amp_rating_rating_markup') ){
			$is_active = 1;
		}
		$amp_ux_fields[] = array('field_type'=>'switch','field_data'=>array('title'=>"Ratings for AMP",'id'=>"amp-ux-ext-star-ratings",'class'=>'amp-ux-extension-switch amp-ux-switch-on-off','data-id'=>'amp-ux-ext-star-ratings-switch','desc'=>'','default'=>$is_active)
		);
		$amp_ux_fields[] = array('field_type'=>'notification', 'field_data'=>array('type'=>'warning','desc'=>sprintf( 'This feature requires <a href="https://ampforwp.com/amp-ratings/" target="_blank">%s</a> extension. <a href="https://ampforwp.com/amp-ratings/" target="_blank">%s</a>',esc_html__('Ratings for AMP extension','accelerated-mobile-pages' ),esc_html__('Click here for more info','accelerated-mobile-pages' )),'required'=>array('amp-ux-ext-star-ratings','=',0),'default'=>$is_active));
	}
	if($active_ext=="elementor"){
		$is_active = 0;
		if(function_exists('amp_pagebuilder_compatibility_init') ){
			$is_active = 1;
		}
		$amp_ux_fields[] = array('field_type'=>'switch','field_data'=>array('title'=>"Elementor for AMP",'id'=>"amp-ux-ext-elementor",'class'=>'amp-ux-extension-switch amp-ux-switch-on-off','data-id'=>'amp-ux-ext-elementor-ratings-switch','desc'=>'','default'=>$is_active)
		);
		$amp_ux_fields[] = array('field_type'=>'notification', 'field_data'=>array('type'=>'warning','desc'=>sprintf( 'This feature requires <a href="https://ampforwp.com/amp-pagebuilder-compatibility/" target="_blank">%s</a> extension. <a href="https://ampforwp.com/amp-pagebuilder-compatibility/" target="_blank">%s</a>',esc_html__('Elementor & Divi support for AMP extension','accelerated-mobile-pages' ),esc_html__('Click here for more info','accelerated-mobile-pages' )),'required'=>array('amp-ux-ext-elementor','=',0),'default'=>$is_active));
	}
	if($active_ext=="classipress"){
		$is_active = 0;
		if(function_exists('amp_classi_press_compatibility') ){
			$is_active = 1;
		}
		$amp_ux_fields[] = array('field_type'=>'switch','field_data'=>array('title'=>"Classipress",'id'=>"amp-ux-ext-classipress",'class'=>'amp-ux-extension-switch amp-ux-switch-on-off','data-id'=>'amp-ux-ext-classipress-switch','desc'=>'','default'=>$is_active)
		);
		$amp_ux_fields[] = array('field_type'=>'notification', 'field_data'=>array('type'=>'warning','desc'=>sprintf( 'This feature requires <a href="https://ampforwp.com/classipress-for-amp/" target="_blank">%s</a> extension. <a href="https://ampforwp.com/classipress-for-amp/" target="_blank">%s</a>',esc_html__('Classipress Theme for AMP extension','accelerated-mobile-pages' ),esc_html__('Click here for more info','accelerated-mobile-pages' )),'required'=>array('amp-ux-ext-classipress','=',0),'default'=>$is_active));
	}
	if($active_ext=="eventcalendar"){
		$is_active = 0;
		if(function_exists('tec_amp_compatibility_orgs_venues_support') ){
			$is_active = 1;
		}
		$amp_ux_fields[] = array('field_type'=>'switch','field_data'=>array('title'=>"The Event Calender",'id'=>"amp-ux-ext-eventcalendar",'class'=>'amp-ux-extension-switch amp-ux-switch-on-off','data-id'=>'amp-ux-ext-eventcalendar-switch','desc'=>'','default'=>$is_active)
		);
		$amp_ux_fields[] = array('field_type'=>'notification', 'field_data'=>array('type'=>'warning','desc'=>sprintf( 'This feature requires <a href="https://ampforwp.com/addons/the-event-calender-for-amp/" target="_blank">%s</a> extension. <a href="https://ampforwp.com/addons/the-event-calender-for-amp/" target="_blank">%s</a>',esc_html__('The Event Calender for AMP extension','accelerated-mobile-pages' ),esc_html__('Click here for more info','accelerated-mobile-pages' )),'required'=>array('amp-ux-ext-eventcalendar','=',0),'default'=>$is_active));
	}
	if($active_ext=="gravityform"){
		$is_active = 0;
		if(function_exists('amp_gravity_forms_plugin_init') ){
			$is_active = 1;
		}
		$amp_ux_fields[] = array('field_type'=>'switch','field_data'=>array('title'=>"Gravity Form",'id'=>"amp-ux-ext-gravityform",'class'=>'amp-ux-extension-switch amp-ux-switch-on-off','data-id'=>'amp-ux-ext-gravityform-switch','desc'=>'','default'=>$is_active)
		);
		$amp_ux_fields[] = array('field_type'=>'notification', 'field_data'=>array('type'=>'warning','desc'=>sprintf( 'This feature requires <a href="https://ampforwp.com/gravity-forms/" target="_blank">%s</a> extension. <a href="https://ampforwp.com/gravity-forms/" target="_blank">%s</a>',esc_html__('Gravity Form extension','accelerated-mobile-pages' ),esc_html__('Click here for more info','accelerated-mobile-pages' )),'required'=>array('amp-ux-ext-gravityform','=',0),'default'=>$is_active));
	}
	if($active_ext=="contact_form_7"){
		$is_active = 0;
		if(function_exists('amp_cf7_plugin_init') ){
			$is_active = 1;
		}
		$amp_ux_fields[] = array('field_type'=>'switch','field_data'=>array('title'=>"Contact Form 7",'id'=>"amp-ux-ext-contact-form7",'class'=>'amp-ux-extension-switch amp-ux-switch-on-off','data-id'=>'amp-ux-ext-contact-form7-switch','desc'=>'','default'=>$is_active)
		);
		$amp_ux_fields[] = array('field_type'=>'notification', 'field_data'=>array('type'=>'warning','desc'=>sprintf( 'This feature requires <a href="https://ampforwp.com/contact-form-7/" target="_blank">%s</a> extension. <a href="https://ampforwp.com/contact-form-7/" target="_blank">%s</a>',esc_html__('Contact Form 7 extension','accelerated-mobile-pages' ),esc_html__('Click here for more info','accelerated-mobile-pages' )),'required'=>array('amp-ux-ext-contact-form7','=',0),'default'=>$is_active));
	}
	if($active_ext=="ninja_forms"){
		$is_active = 0;
		if(function_exists('ampforwp_ninja_initiate_plugin') ){
			$is_active = 1;
		}
		$amp_ux_fields[] = array('field_type'=>'switch','field_data'=>array('title'=>"Ninja Form",'id'=>"amp-ux-ext-ninja-form",'class'=>'amp-ux-extension-switch amp-ux-switch-on-off','data-id'=>'amp-ux-ext-ninja-form-switch','desc'=>'','default'=>$is_active)
		);
		$amp_ux_fields[] = array('field_type'=>'notification', 'field_data'=>array('type'=>'warning','desc'=>sprintf( 'This feature requires <a href="https://ampforwp.com/ninja-forms/" target="_blank">%s</a> extension. <a href="https://ampforwp.com/ninja-forms/" target="_blank">%s</a>',esc_html__('Ninja Forms extension','accelerated-mobile-pages' ),esc_html__('Click here for more info','accelerated-mobile-pages' )),'required'=>array('amp-ux-ext-ninja-form','=',0),'default'=>$is_active));
	}
	if($active_ext=="caldera_forms"){
		$is_active = 0;
		if(function_exists('amp_cf_plugin_init') ){
			$is_active = 1;
		}
		$amp_ux_fields[] = array('field_type'=>'switch','field_data'=>array('title'=>"Caldera Forms",'id'=>"amp-ux-ext-caldera-form",'class'=>'amp-ux-extension-switch amp-ux-switch-on-off','data-id'=>'amp-ux-ext-caldera-form-switch','desc'=>'','default'=>$is_active)
		);
		$amp_ux_fields[] = array('field_type'=>'notification', 'field_data'=>array('type'=>'warning','desc'=>sprintf( 'This feature requires <a href="https://ampforwp.com/caldera-forms-for-amp/" target="_blank">%s</a> extension. <a href="https://ampforwp.com/caldera-forms-for-amp/" target="_blank">%s</a>',esc_html__('Caldera Forms for AMP extension','accelerated-mobile-pages' ),esc_html__('Click here for more info','accelerated-mobile-pages' )),'required'=>array('amp-ux-ext-caldera-form','=',0),'default'=>$is_active));
	}
	if($active_ext=="wpforms"){
		$is_active = 0;
		if(function_exists('ampforwp_wpforms_forms_shortcode') ){
			$is_active = 1;
		}
		$amp_ux_fields[] = array('field_type'=>'switch','field_data'=>array('title'=>"WP Forms",'id'=>"amp-ux-ext-wp-form",'class'=>'amp-ux-extension-switch amp-ux-switch-on-off','data-id'=>'amp-ux-ext-wp-form-switch','desc'=>'','default'=>$is_active)
		);
		$amp_ux_fields[] = array('field_type'=>'notification', 'field_data'=>array('type'=>'warning','desc'=>sprintf( 'This feature requires <a href="https://ampforwp.com/wp-forms/" target="_blank">%s</a> extension. <a href="https://ampforwp.com/wp-forms/" target="_blank">%s</a>',esc_html__('WP Forms for AMP extension','accelerated-mobile-pages' ),esc_html__('Click here for more info','accelerated-mobile-pages' )),'required'=>array('amp-ux-ext-wp-form','=',0),'default'=>$is_active));
	}
	if($active_ext=="woocommerce"){
		$is_active = 0;
		if(function_exists('amp_woocommerce_pro_add_woocommerce_support') ){
			$is_active = 1;
		}
		$amp_ux_fields[] = array('field_type'=>'switch','field_data'=>array('title'=>"WooCommerce",'id'=>"amp-ux-ext-woocommerce",'class'=>'amp-ux-extension-switch amp-ux-switch-on-off','data-id'=>'amp-ux-ext-woocommerce-switch','desc'=>'','default'=>$is_active)
		);
		$amp_ux_fields[] = array('field_type'=>'notification', 'field_data'=>array('type'=>'warning','desc'=>sprintf( 'This feature requires <a href="https://ampforwp.com/woocommerce/" target="_blank">%s</a> extension. <a href="https://ampforwp.com/woocommerce/" target="_blank">%s</a>',esc_html__('AMP WooCommerce PRO extension','accelerated-mobile-pages' ),esc_html__('Click here for more info','accelerated-mobile-pages' )),'required'=>array('amp-ux-ext-woocommerce','=',0),'default'=>$is_active));
	}
	if($active_ext=="easy_digital_downloads"){
		$is_active = 0;
		if(function_exists('amp_edd_post_support')){
			$is_active = 1;
		}
		$amp_ux_fields[] = array('field_type'=>'switch','field_data'=>array('title'=>"Easy Digital Downloads",'id'=>"amp-ux-ext-edd",'class'=>'amp-ux-extension-switch amp-ux-switch-on-off','data-id'=>'amp-ux-ext-edd-switch','desc'=>'','default'=>$is_active)
		);
		$amp_ux_fields[] = array('field_type'=>'notification', 'field_data'=>array('type'=>'warning','desc'=>sprintf( 'This feature requires <a href="https://ampforwp.com/edd-for-amp/" target="_blank">%s</a> extension. <a href="https://ampforwp.com/edd-for-amp/" target="_blank">%s</a>',esc_html__('EDD for AMP extension','accelerated-mobile-pages' ),esc_html__('Click here for more info','accelerated-mobile-pages' )),'required'=>array('amp-ux-ext-edd','=',0),'default'=>$is_active));
	}
	if($active_ext=="polylang"){
		$is_active = 0;
		if(function_exists('amp_polylang_plugin_updater')){
			$is_active = 1;
		}
		$amp_ux_fields[] = array('field_type'=>'switch','field_data'=>array('title'=>"Polylan",'id'=>"amp-ux-ext-polylang",'class'=>'amp-ux-extension-switch amp-ux-switch-on-off','data-id'=>'amp-ux-ext-polylang-switch','desc'=>'','default'=>$is_active)
		);
		$amp_ux_fields[] = array('field_type'=>'notification', 'field_data'=>array('type'=>'warning','desc'=>sprintf( 'This feature requires <a href="https://ampforwp.com/polylang-for-amp/" target="_blank">%s</a> extension. <a href="https://ampforwp.com/polylang-for-amp/" target="_blank">%s</a>',esc_html__('Polylang for AMP extension','accelerated-mobile-pages' ),esc_html__('Click here for more info','accelerated-mobile-pages' )),'required'=>array('amp-ux-ext-polylang','=',0),'default'=>$is_active));
	}
	if($active_ext=="bbpress"){
		$is_active = 0;
		if(function_exists('amp_bbpress_plugin_updater')){
			$is_active = 1;
		}
		$amp_ux_fields[] = array('field_type'=>'switch','field_data'=>array('title'=>"bbPress",'id'=>"amp-ux-ext-bbpress",'class'=>'amp-ux-extension-switch amp-ux-switch-on-off','data-id'=>'amp-ux-ext-bbpress-switch','desc'=>'','default'=>$is_active)
		);
		$amp_ux_fields[] = array('field_type'=>'notification', 'field_data'=>array('type'=>'warning','desc'=>sprintf( 'This feature requires <a href="https://ampforwp.com/bbpress/" target="_blank">%s</a> extension. <a href="https://ampforwp.com/bbpress/" target="_blank">%s</a>',esc_html__('bbPress for AMP extension','accelerated-mobile-pages' ),esc_html__('Click here for more info','accelerated-mobile-pages' )),'required'=>array('amp-ux-ext-bbpress','=',0),'default'=>$is_active));
	}
	if($active_ext=="shortcodes"){
		$is_active = 0;
		if(function_exists('amp_su_shortcodes_ulitmate_notices')){
			$is_active = 1;
		}
		$amp_ux_fields[] = array('field_type'=>'switch','field_data'=>array('title'=>"Shortcode",'id'=>"amp-ux-ext-shortcodes",'class'=>'amp-ux-extension-switch amp-ux-switch-on-off','data-id'=>'amp-ux-ext-shortcodes-switch','desc'=>'','default'=>$is_active)
		);
		$amp_ux_fields[] = array('field_type'=>'notification', 'field_data'=>array('type'=>'warning','desc'=>sprintf( 'This feature requires <a href="https://ampforwp.com/shortcodes-ultimate/" target="_blank">%s</a> extension. <a href="https://ampforwp.com/shortcodes-ultimate/" target="_blank">%s</a>',esc_html__('Shortcodes Ultimate for AMP extension','accelerated-mobile-pages' ),esc_html__('Click here for more info','accelerated-mobile-pages' )),'required'=>array('amp-ux-ext-shortcodes','=',0),'default'=>$is_active));
	}
	if($active_ext=="toc"){
		$is_active = 0;
		if(function_exists('toc_amp_initiate')){
			$is_active = 1;
		}
		$amp_ux_fields[] = array('field_type'=>'switch','field_data'=>array('title'=>"Table of content",'id'=>"amp-ux-ext-toc",'class'=>'amp-ux-extension-switch amp-ux-switch-on-off','data-id'=>'amp-ux-ext-toc-switch','desc'=>'','default'=>$is_active)
		);
		$amp_ux_fields[] = array('field_type'=>'notification', 'field_data'=>array('type'=>'warning','desc'=>sprintf( 'This feature requires <a href="https://ampforwp.com/table-of-contents-plus/" target="_blank">%s</a> extension. <a href="https://ampforwp.com/table-of-contents-plus/" target="_blank">%s</a>',esc_html__('Table of Content Plus for AMP extension','accelerated-mobile-pages' ),esc_html__('Click here for more info','accelerated-mobile-pages' )),'required'=>array('amp-ux-ext-toc','=',0),'default'=>$is_active));
	}
	if($active_ext=="liveblog"){
		$is_active = 0;
		if(function_exists('liveblogforamp_plugin_updater')){
			$is_active = 1;
		}
		$amp_ux_fields[] = array('field_type'=>'switch','field_data'=>array('title'=>"LiveBlog",'id'=>"amp-ux-ext-lb",'class'=>'amp-ux-extension-switch amp-ux-switch-on-off','data-id'=>'amp-ux-ext-lb-switch','desc'=>'','default'=>$is_active)
		);
		$amp_ux_fields[] = array('field_type'=>'notification', 'field_data'=>array('type'=>'warning','desc'=>sprintf( 'This feature requires <a href="https://ampforwp.com/addons/liveblog-for-amp/" target="_blank">%s</a> extension. <a href="https://ampforwp.com/addons/liveblog-for-amp/" target="_blank">%s</a>',esc_html__('LiveBlog for AMP extension','accelerated-mobile-pages' ),esc_html__('Click here for more info','accelerated-mobile-pages' )),'required'=>array('amp-ux-ext-lb','=',0),'default'=>$is_active));
	}
}
array_push($amp_ux_fields, $amp_ux_common);
$close_extenstion = array('field_type'=>'section_end', 'field_data'=>array());
$close_field = array('field_type'=>'main_section_end','field_data'=>array());
array_push($amp_ux_fields, $close_extenstion);
array_push($amp_ux_fields, $close_field);
