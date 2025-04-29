<?php
include(UNIVERSHTHEMEDIR.'/admin/scripts.php');
include(UNIVERSHTHEMEDIR.'/admin/universh-settings.php');
include(UNIVERSHTHEMEDIR.'/admin/onepage-universh-settings.php');
include(UNIVERSHTHEMEDIR.'/admin/demo-import.php');

function universh_login_logo() { 
	$logo = (function_exists('ot_get_option'))? ot_get_option('admin_logo', UNIVERSHTHEMEURI.'images/logo.png') : UNIVERSHTHEMEURI.'images/logo.png';
	wp_enqueue_style('universh-custom-admin-style', UNIVERSHTHEMEURI . 'admin/assets/css/custom_admin_style.css');
    	
	$custom_css = "body.login div#login h1 a {
            background-image: url(".esc_url($logo).");
            background-position: bottom center;
			background-size: auto auto;
			margin: 0 auto 15px;
			width: auto;
        }";
	wp_add_inline_style( 'universh-custom-admin-style', $custom_css );
}
add_action( 'login_enqueue_scripts', 'universh_login_logo' );


function universh_options_filter($var){
	if( function_exists( 'ot_get_option' ) ):
    $var = (is_array($var) && ($var['type'] == 'background') || ($var['type'] == 'upload') || ($var['type'] == 'measurement') || ($var['type'] == 'typography') || ($var['type'] == 'colorpicker') || ($var['type'] == 'colorpicker-opacity'));

     return $var;
	 endif;
}

function universh_custom_css_from_theme_options(){
	if( function_exists( 'ot_get_option' ) ):
	$custom_css = '';
    $settings = universh_theme_options();
    $options = array_filter($settings, "universh_options_filter");
    foreach ($options as $option) :
        if(isset($option['action'])){
            if( $option['type'] == 'background' ){
                $background = ot_get_option( $option['id'] );
                $background = (empty($background)) ? $option['std'] : $background;
                if( !empty($background) ){
                    foreach ($option['action'] as $value) {
                        if($value['selector'] != ''){
                            $custom_css .= $value['selector']. '{ ';
                            foreach( $background as $key => $value ){
                                if($key == 'background-image') $custom_css .= ($value != '')? $key. ': url('.esc_url($value).'); ' : '';
                                else $custom_css .= ($value != '')? $key. ': '.$value.'; ' : '';
                            }
                            $custom_css .= '}';
                        }
                    }
				}
			}
			elseif( $option['type'] == 'upload' ){
                $upload = ot_get_option( $option['id'] );
                $upload = ($upload == '') ? $option['std'] : $upload;
                if( $upload != '' ){
                    foreach ($option['action'] as $value) {
						if($value['property'] == 'cursor'){
							$custom_css .= ($value['selector'] != '')? $value['selector']. '{ '.$value['property'].': url('.esc_url($upload).'), auto; } ' : '';
						} else{
						$custom_css .= ($value['selector'] != '')? $value['selector']. '{ '.$value['property'].': url('.esc_url($upload).'); } ' : '';
						}
                    }
				}
			}
			
            elseif( $option['type'] == 'typography' ){
                $typography = ot_get_option( $option['id'], array() );        
                $typography = empty($typography) ? $option['std'] : $typography;
                if(!empty($typography)) {
                    foreach ($option['action'] as $value) {  
                        if($value['selector'] != ''){
                            $custom_css .= $value['selector']. '{ ';
                            foreach ($typography as $key => $value) {
                                if( $key == 'font-color' ) $custom_css .= 'color: '.$value.'; ';
                                else $custom_css .= ( $value != '' )? $key. ': '.$value.'; ' : '';
                            }
                            $custom_css .= ' }';
                        }
                    }
         
				}
			}
            elseif( $option[ 'type' ] == 'colorpicker' ){   
                $colorpicker = ot_get_option( $option['id'] );  

                $colorpicker = ($colorpicker == '') ? $option['std'] : $colorpicker;

                $rgb = universh_hex2rgb($colorpicker);

                if( $colorpicker != '' ){
                    foreach ($option['action'] as $value) {
                        $colorpicker = isset($value['opacity'])? 'rgba('.$rgb.', '.$value['opacity'].')' : $colorpicker;
                        $custom_css .= ($value['selector'] != '')?$value['selector']. '{ '.$value['property'].': '.$colorpicker .'; } ' : '';
                    }
				}
			}
				elseif( $option[ 'type' ] == 'colorpicker-opacity' ){  
                $colorpicker_opacity = ot_get_option( $option['id'] );  

                $colorpicker_opacity = ($colorpicker_opacity == '') ? $option['std'] : $colorpicker_opacity;

                if( $colorpicker_opacity != '' ){
                    foreach ($option['action'] as $value) {
                        $custom_css .= ($value['selector'] != '')? $value['selector']. '{ '.$value['property'].': '.$colorpicker_opacity .'; } ' : '';
                    }
				}
		    }
            elseif( $option[ 'type' ] == 'measurement' ){ 
                $measurement =  ot_get_option( $option['id'], array() ); 
                $measurement = empty($measurement) ? $option['std'] : $measurement; 
                if( !empty( $measurement ) ) {
                    foreach ($option['action'] as $value) {  
                        if($value['selector'] != ''){
                            $custom_css .= $value['selector']. '{ ';
                            $custom_css .= $value['property'].': '.intval($measurement[0]).$measurement[1] .';';
                            $custom_css .= ' }';
                        }
                    }
				}
			}
        }//if(isset($option['action'])):
    endforeach;
	return $custom_css;
	
	endif;
}


function universh_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   $rgb_color = implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb_color;
}