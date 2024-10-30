=== Plugin Name ===
Contributors: Toivo Lainevool
Donate link:
Tags: buzz, feed
Requires at least: unsure
Tested up to: 2.9.0
Stable tag: trunk

Shows your Google Buzz posts on your blog.

== Description ==

This plugin will show a users Google Buzz posts on a WordPress blog.

The posts will be displayed in descending time order. Each item has:
* A link to the post - the text of the link will be a configurable number of characters from the begining og the post
* The date and time of the post

The number of posts shown is configurable.

This plugin should be currently be considered an alpha release.

== Installation ==


1. Upload the buzz-feed directory and all files within it to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Go to the Setting menu and click on the "Buzz Feed Options" link.
1. Enter your GMail/Buzz username in the space provided.
1. Place `<?php if( class_exists(BuzzFeed)) BuzzFeed::showBuzzes(); ?>` in your templates where you want your posts to appear.

== Frequently Asked Questions ==


== Screenshots ==

== Changelog ==

= 0.0.1 =
* Initial Release


== Upgrade Notice ==

