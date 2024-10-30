<?php
/*
 Plugin Name: Buzz Feed
 Plugin URI: http://www.admoolah.com/blog/index.php/buzz-feed
 Description: Displays your latest Google Buzz posts
 Version: 0.0.1
 Author: Toivo Lainevool
 Author URI: http://www.admoolah.com/blog
 */

class BuzzFeed {
    public static function showBuzzes() {
        include_once(ABSPATH . WPINC . '/feed.php');

        //configurable items
        $buzz_user_name = get_option('buzz-feed-username');
        $title_limit = get_option('buzz-feed-title-limit');
        $description_limit = get_option('buzz-feed-description-limit');
        $item_limit = get_option('buzz-feed-item-limit');
        $date_format = get_option('buzz-feed-date-format');

        $rss = fetch_feed("http://buzz.googleapis.com/feeds/$buzz_user_name/public/posted");
        if ( is_wp_error($rss) ) {
            echo $rss->get_error_message();
        }
        $maxitems = $rss->get_item_quantity($item_limit);
        $rss_items = $rss->get_items(0, $maxitems);
        ?>

<ul class="buzz-feed">
<?php if ($maxitems == 0) echo '<li>No items.</li>';
else
// Loop through each feed item and display each item as a hyperlink.
foreach ( $rss_items as $item ) : ?>
<li class="buzz-feed-item">
    <?php $title = substr($item->get_description(), 0, $title_limit );
    echo '<a class="buzz-feed-link" href="' . $item->get_permalink() . '" ';
    echo "title='$title'>";
    $description = substr($title, 0, $description_limit);
    echo $description . '&#0133;</a>';
    echo '<div class="buzz-feed-date">'.$item->get_date($date_format) . '</div>'; ?>
</li>
<?php endforeach; ?>
</ul>
<?php
    }//showBuzzes



} //class

// ADMIN PANEL - under Manage menu
add_action('admin_menu', 'buzz_feed_show_menu');

function buzz_feed_show_menu() {
	if (function_exists('add_management_page')) {
		add_management_page('Buzz Feed Options', 'Buzz Feed Options', 8, __FILE__, 'buzz_feed_page');
	}
}

function buzz_feed_page() {
	include(dirname(__FILE__).'/buzz-feed-manage.php');
}

?>

