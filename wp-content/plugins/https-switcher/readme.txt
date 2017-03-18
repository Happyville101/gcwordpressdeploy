=== Https Switcher  ===
Contributors: janiko
Tags: https, http, mixed content
Requires at least: 3.0.1
Tested up to: 4.6.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Force http/https for resources, depending on the scheme you use.

== Description ==

This very simple plugin aims at avoiding mixed content when using https for wordpress sites.

= Principle =

When you are using HTTPS for browsing, all content resources will point to https. All 'http' references will be changed to 'https'.

On the contrary, if you want HTTP browsing, all references will be changed to 'http', which can be useful if you are behind a proxy that filters https.

== Installation ==

Installation complexity is minimal :

1. Upload `https-switch.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

That's all, folks.


== Changelog ==

= 0.1 =
* Initial version.

= 0.2 =
* Some filters added

= 0.3 =
* Remove unwanted spaces
