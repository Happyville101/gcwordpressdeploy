=== Plugin Name ===
Contributors: luke7263
Donate link: http://cysteme.fr/donate
Description: WordPress file manager for admin user 
Tags: file,manager,finder,drag,drop,ftp,edit,list,thumbnail,view
Requires at least: 4.0
Tested up to: 4.7.2
Stable tag: 4.7.2
License: 3-clauses BSD license, read below

== Description ==

IMPORTANT : a security hole has been found in all versions prior to 2.0. It is very important for your web site security to updrade to 2.0 at least. We are sorry for the troubles, but that plugin is free, and free means we cannot pay our programmers to give it a high priority maintenance level. That's why WordPress team has decided to block it from download these past 3 months, and we totally agree with this decision. Our team has finally solved that security hole and the plugin is now fully functional since 2.0

What about CYSTEME Finder ?

A feature-rich WordPress site management is not accessible to everyone, and developers always need other additional tools to manage files manually. And to do so they always use in addition a tool such FileZilla, WinSCP or another to upload, create or modify PHP or other files on their own installation.

The CYSTEME Finder plugin is a powerful file explorer, user-friendly file management in the administration interface. You install the extension as usual, and then in the Settings menu will appear CYSTEME Finder. Simply click it to access and manage all the files on your WordPress site. This is limited to admin users. Once installed, you'll never need additionnal FTP software to upload/edit/download any files from your WordPress site. Simply explore your existing directories, and drag/drop files from your computer.

* View lists or icons, with thumbnail display and sorting
* Drag and drop internal to move files with the mouse
* Drag and drop external to copy a file from your Windows desktop to anywhere!
* Copy, paste, delete, rename, duplicate files
* Editing text files, php ...

CYSTEME Finder is multilingual, automatically switched to WordPress installation language.

Thanks to the great team Studio 42 that first develop elfinder, which CYSTEME Finder is totally based on.

A pro version is available for only 5€, order at http://cysteme.fr/cysteme_finder

That pro version will add cloud capabilities to your WordPress website, you'll be able to have your own cloud files online within your WordPress site, offerring a really powerful files management to your WP users, customers, partners ..

* file space for users. Each user has its own file space to manage his files
* virtual file space via shortcode. Each post or page can have its own file space
* multiple share spaces via shortcode, handling read or read-write access to specified users, public shares, for example [cysteme_finder share="Share Name|sharedir|john=rw,luke=rw,default=r"]
* file and icon views have been completely remade, icons are bigger, file list more readable (bigger too), all functions improved
* admin users will have access to all users file space
* automatic notifications via log file and/or email


If you have ideas for improvements, please let us know instead of tinkering in your corner. While nothing prohibits you, the fact of change yourself this extension would force you to see your changes in future updates of the plugin.
If you like CYSTEME Finder, please contact us if you wish any specific add-on. 

This plugin has been based upon our online file manager, demo at http://finder.cysteme.fr. That very useful tool can be integrated in any other web software, authentication and shares can be completely customised according to existing software.

== Installation ==

As usual, just upload the zip file from admin panel/plugins.
Or unzip it manually into wp-content/plugins.
Refresh your browser and enjoy CYSTEME Finder under Settings menu.

== Frequently Asked Questions ==

Uploading a folder (and its subfolder) is not as easy as uploading one or many files.
You can upload many files in one shot, but not a folder.
To upload a folder, first zip it, then drag'drop it in CYSTEME Finder, then extract the zip file, that works fine..;)

== Upgrade notice == 

Uploading a folder (and its subfolder) by dragging/dropping it is currently not possible with current technologies and cannot be done as doing it for a single files. You can upload many files in one shot, but not a folder.
To upload a folder, first zip it, then drag'drop it in CYSTEME Finder, then extract the zip file, that works fine..;)
If your WordPress installation is not standard, pleaser update php/connector.php file because the wp_load.php file HAS to be found.
CSS themes has been written to fit the best to a standard WordPress installation, respecting colors and styles. CYSTEME Finder should be integrated very well to you WordPress admin settings.

== Screenshots ==

1. That screenshot shows the CYSTEME Finder interface integrated into WordPress settings menu in list mode.
2. That screenshot shows the CYSTEME Finder interface in thumbnails mode.
3. Right click on icon or list item to manage it, or use icons in toolbar.
4. That one shows the CYSTEME Finder interface integrated into WordPress settings menu in list mode - PRO VERSION at http://cysteme.fr/cysteme_finder -
5. That one shows the CYSTEME Finder interface in thumbnails mode - PRO VERSION at http://cysteme.fr/cysteme_finder -
6. That one show the CYSTEME Finder interface in list mode for a WordPress user using shortcode [cysteme_finder] in a post - PRO VERSION at http://cysteme.fr/cysteme_finder -
7. That one show the CYSTEME Finder interface in thumbnails mode for a WordPress user using shortcode [cysteme_finder] in a post - PRO VERSION at http://cysteme.fr/cysteme_finder -

== Change Log ==

= 2.2

* Minor CSS improvements and WP 4.7.2 compability check 

= 2.1

* Minor CSS improvements and first launch sometimes unsuccessful corrected

= 2.0

* Security fix and cleanup - Completely rewritten according to WordPress security rules, thanks to Mika from WP team for his good advices

= 1.7

* Security fix - Dynamic creation of .htaccess on top plugin directory that prevents CSRF - exits if cannot be created

= 1.6

* Security fix - wp_load.php included in connector.php to check user login and ABSPATH

= 1.5

* Security fix - accepted requests to connector.php can only come from that hosts

= 1.4

* Security fix - now use of PHP session rather than REQUEST vars

= 1.3

* Fixed details

= 1.2 =

* Fixed files and folders deletion

= 1.1 =

* Added screenshot and readme update

= 1.0 =

* First release

== License ==

Based on elFinder 3-clauses BSD license.

Copyright (c) 2015, CYSTEME,
Copyright (c) 2009-2012, Studio 42
All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are met:
    * Redistributions of source code must retain the above copyrights
      notices, this list of conditions and the following disclaimer.
    * Redistributions in binary form must reproduce the above copyright
      notice, this list of conditions and the following disclaimer in the
      documentation and/or other materials provided with the distribution.
    * Neither the name of the Studio 42 Ltd. nor the
      names of its contributors may be used to endorse or promote products
      derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL "STUDIO 42" BE LIABLE FOR ANY DIRECT, INDIRECT,
INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR
PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF
LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE
OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF
ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
