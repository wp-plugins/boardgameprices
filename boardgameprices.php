<?php
/**
 * @package boardgameprices
 * @version 1.0.0
 */
/*
Plugin Name: BoardGamePrices
Plugin URI: http://boardgameprices.co.uk/api/plugin
Description: Short code for embedding the best price for board games
Author: Kean Pedersen
Version: 1.0.0
Author URI: http://boardgameprices.co.uk
*/

//http://braetspilspriser.dk/api/price?id=667&destination=DK&delivery=PACKAGE&currency=DKK&sitename=mysite&stock=Y

define("BOARDGAMEPRICES_API_BASEURL", "http://boardgameprices.co.uk/api/price");

function boardgameprice_shortcode($atts) {
	
    $html = "";
	
    $param = shortcode_atts(array(
        'id' => null,
        'currency' => 'EUR',
        'destination' => 'GB',
        'delivery' => 'PACKAGE',
        'stock' => 'N'), $atts
    );

    if (!$param['id']) {
        return "ID is required";
    }
	
    $args = array(
        'id' => $param['id'],
        'currency' => $param['currency'],
        'destination' => $param['destination'],
        'delivery' => $param['delivery'],
        'stock' => $param['stock'],
        'sitename' => home_url(),
    );

    $url = BOARDGAMEPRICES_API_BASEURL . '?' . http_build_query($args);
    $response = wp_remote_get($url);
    $body = wp_remote_retrieve_body($response);
    if (!$body) {
        return "Error getting price";
    }

    $data = json_decode($body);
    if ($data->bestprice && $data->bestprice->price) {
        $html .= '<a href="' . $data->url . '" target="_blank">';
        $html .= $data->currency;
        $html .= "&nbsp;";
        $html .= $data->bestprice->price;
        $html .= '</a>';
    } else {
        return 'unknown price';
    }

    return $html;
	
}

add_shortcode( 'boardgameprice' , 'boardgameprice_shortcode' );
