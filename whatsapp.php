<?php
/**
 * Plugin Name:       Subwoo Woocommerce Whatsapp Entegrasyonu
 * Plugin URI:        https://subwoo.com
 * Description:       Subwoo sizlere müşterilerinize ulaşabileceğiniz whatsapp hizmeti sunar.
 * Version:           1.0
 * Requires at least: 5.6
 * Requires PHP:      5.6
 * Author:            Subwoo
 * Author URI:        https://subwoo.com/
 * License:           GPLv3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Update URI:        https://github.com/Subwoocom/Subwoo-Woocommerce-Whatsapp-Plugin
 */
defined('ABSPATH') or die('Wrong way dude');

function KRGTKP_add_metabox(){
    global $woocommerce, $order, $post;
    add_meta_box(
        "whatsapp",
        "Whatsapp Mesaj",
        "whatsapp_send_message",
        "shop_order",
        "side",
        "high"
    );
}
add_action("add_meta_boxes","KRGTKP_add_metabox");

function whatsapp_send_message($order){
    $order = $order->ID;
    $order =  wc_get_order($order); // Order id

    $address = $order->get_address('billing');
    $phone = $address['phone'];

    $firsr_char = $phone[0];

    if($firsr_char == '9'){
        $phone = $phone;
    }
    else{$phone =  '9'.$phone;}
    ?>
    Mesaj Gönderilecek Numara Gönderim Ardersinden Çekilmektedir.
    <a target="_blank" href="https://wa.me/<?php echo $phone ?>" class="button" style="background-color: green;color: white; margin-top: 10px"> Mesaj Gönder</a>
    <?php
}


function display_banner_notice(){
    $banner_img_url = plugin_dir_url( __FILE__ ) . 'subwoo-ads.jpg';
    echo '<div class="notice notice-info is-dismissible" id="banner-notice">';
 	echo '<a href="https://subwoo.com" target="_blank">';
    echo '<img src="'.$banner_img_url.'" alt="subwoo banner">';
	echo '</a>';
    echo '</div>';
    echo '<style>
        #banner-notice {
            background-color: #377dff;
            
            text-align: center;
	    height:100px;
        }
        #banner-notice img {
            width: 100%;
	    height:auto;
            
        }
    </style>';
}
add_action( 'admin_notices', 'display_banner_notice' );




