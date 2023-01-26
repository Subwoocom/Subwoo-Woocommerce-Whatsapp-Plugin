<?php
function check_for_updates() {
    // Get the current version of the plugin
    $current_version = get_plugin_data(__FILE__)['Version'];
    // Get the latest version of the plugin from Github
    $url = 'https://api.github.com/repos/Subwoocom/Subwoo-Woocommerce-Whatsapp-Plugin/releases/latest';
    $response = wp_remote_get( $url );
    $latest_version = json_decode( $response['body'] )->tag_name;
if ( version_compare( $current_version, $latest_version, '<' ) ) {
// plugin güncel değil
// güncelleme işlemleri burada yapılabilir
// Örnek olarak:
echo 'Güncelleme mevcut. Lütfen güncelleyin.';
} else {
// plugin güncel
echo 'Plugin güncel';
}
}
add_action( 'admin_init', 'subwoo_check_for_updates' );
