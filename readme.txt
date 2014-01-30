=== BoardGamePrices ===
Contributors: keanpedersen
Tags: thumbnail, boardgameprices, price, prices, boardgame, board, game, shortcode
Requires at least: 3.0
Tested up to: 3.8.1
Stable tag: 1.0.1

Short code for embedding the best price for board games from BoardGamePrices

== Description ==

This plugins adds a short code [boardgameprice id=xxxx] for embedding the
best price for purchasing a specific board game. The information is taken
from http://boardgameprices.co.uk

You get the product ID from the URL of the product you would like to show
the price for. For instance
http://boardgameprices.co.uk/item/show/7595/caverna-the-cave-farmers
Here the ID is 7595.

A lot of options are available for adjusting the price:

[boardgameprice id=7595 currency=EUR]: Shows the price in a different
currency. Default is EUR, but you can choose among EUR, GBP, SEK, DKK and
USD.

[boardgameprice id=7595 destination=DK]: Calculates the best price for delivery
to the specified country. Options are: DK, SE, DE and GB. Default is GB.

[boardgameprice id=7595 stock=Y]: Only consider prices where the product is
in stock.

These can be combined, for instance:
[boardgameprice id=7595 currency=DKK destination=DK stock=Y]


== Installation ==

1. Upload `boardgameprices` directory to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Insert shortcode [boardgameprices id=xxx] inside your content.


== Upgrade Notice ==

= 1.0.0 =
First release

= 1.0.1 =
Now uses object cache for API requests


== Changelog ==

= 1.0.0 =
* First release

= 1.0.1 =
* Now uses object cache for API requests

