<?php
/*
Plugin Name: CYSTEME Finder, the admin files explorer
Plugin URI: http://cysteme.fr
Description: File manager for admin users. Use it to manage all your WordPress site files, no more need to external FTP to upload/delete/edit PHP or any other files
Author: CYSTEME
Author URI: http://cysteme.fr
Tags: gestion,fichier,fichiers,file,files,manager,finder,cysteme,explorer,explorateur,luc,christiany,cloud,partage,partages,share,shares
Version: 2.2
*/

// Plugin name
define(CYSTEME_FINDER, 'cysteme-finder');

/*
* Ajoute des liens dans le menu des plugins
*/
function cysteme_finder_plugin_action_links($links, $file)
{
    static $this_plugin;

    if (!$this_plugin)
    $this_plugin = plugin_basename(__FILE__);
    if ($file == $this_plugin) {
        $links[] = '<a href="options-general.php?page=' . CYSTEME_FINDER . '">' . __('Réglages', CYSTEME_FINDER) . '</a>';
        $links[] = '<a href="http://cysteme.fr">cysteme.fr</a>';
    }
    return $links;
}

/*
* Init du plugin
*/
function cysteme_finder_plugin_init()
{
    $pluginurl = plugins_url() . '/' . CYSTEME_FINDER;
    list($lang) = explode('_', get_locale());

	session_start();
	
	$_SESSION['finder']['wphome'] = get_home_path();
    $_SESSION['finder']['wpurl'] = get_bloginfo("wpurl");
    
    register_setting('cysteme_title_options', CYSTEME_FINDER, 'cysteme_finder_validate');

    wp_enqueue_style('jqueryui-1-8-18', $pluginurl . '/css/jqueryui-1-8-18.css');
    wp_enqueue_style('finder', $pluginurl . '/css/finder.css');
    wp_enqueue_style('theme', $pluginurl . '/css/theme.css');

    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-ui-core');
    wp_enqueue_script('jquery-ui-selectable');
    wp_enqueue_script('jquery-ui-draggable');
    wp_enqueue_script('jquery-ui-droppable');
    wp_enqueue_script('jquery-ui-slider');
    wp_enqueue_script('jquery-ui-button');
    wp_enqueue_script('finder', $pluginurl . '/js/finder.js', array('jquery','jquery-ui-core','jquery-ui-selectable','jquery-ui-draggable','jquery-ui-droppable','jquery-ui-slider','jquery-ui-button'));
    wp_enqueue_script('finder-lang', $pluginurl . '/js/i18n/elfinder.' . $lang . '.js', array('finder'));
}

/*
* Ajout de la page des options dans les réglages
*/
function cysteme_finder_plugin_add_settings()
{
	if (current_user_can('administrator'))      
	    add_options_page(__('CYSTEME Finder', CYSTEME_FINDER), __('CYSTEME Finder', CYSTEME_FINDER), 'manage_options', CYSTEME_FINDER, 'cysteme_finder_manage_options');
}

/*
* Valide les options
*
*/
function cysteme_finder_validate($options)
{
    return;
}

/*
* Page des options
*/
function cysteme_finder_manage_options()
{
    $pluginurl = plugins_url() . '/' . CYSTEME_FINDER;
    list($lang) = explode('_', get_locale());

    $nonce = wp_create_nonce('cysteme-finder_nonce');
    $url = $_SERVER['PHP_SELF'] . "?page=" . CYSTEME_FINDER . "&cysteme-finder-nonce=" . $nonce;
	   
?>
    <div class="wrap">
        <div class="cystemefinder icon32">
            <br />
        </div>
        <h3>
            <?php get_locale();_e('<a target="_blank" href="http://cysteme.fr">CYSTEME</a>, Web Sites & Solutions - <a target="_blank" href="http://cyjs.fr">CYJS Javascript Multilingual Framework</a> - CRM & Messaging <a target="_blank" href="http://cloudoffice.fr">CloudOffice</a> - Cloud software <a target="_blank" href="http://cloudfiles.fr">CloudFiles</a>, <a target="_blank" href="http://finder.cysteme.fr">Finder</a>', 'cysteme_title') ?>
        </h3>
        <h4>
            <?php get_locale();_e('<a target="_blank" href="http://cysteme.fr/cysteme_finder/">The PRO version offers cloud space for users and protected shares in an improved interface for a cigarette pack price ! Create cloud spaces for your users, shared spaces with customers, with custom read/write access, in a single page or post with a simple shortcode</a>', 'cysteme_title') ?>
        </h4>
        <div id="elfinder">
        </div>
        <script type="text/javascript" charset="utf-8">
            jQuery().ready(function()
                {
                    jQuery('#elfinder').elfinder(
                        {
                            resizable: true,
                            url: '<?= $url ?>',
                            lang: '<?= $lang ?>',
                            height: document.body.scrollHeight
                        }).elfinder('instance');
                }
            );
        </script>
    </div>
<?php
}

/*
 * Finder connector
 */
function cysteme_finder_connector($r)
{
	session_start();
	
    $wphome = $_SESSION['finder']['wphome'];
    $wpurl = $_SESSION['finder']['wpurl'];

    include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'php/elFinderConnector.class.php';
    include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'php/elFinder.class.php';
    include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'php/elFinderVolumeDriver.class.php';
    include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'php/elFinderVolumeLocalFileSystem.class.php';

    $opts['debug'] = false;
    $opts['roots'][] =
    (
        array(
            'driver'    => 'LocalFileSystem',
            'path'      => $wphome,
            'URL'       => $wpurl,
            'alias'     => "Home",
            'quarantine'=> '.tmp'
        )
    );
    $connector = new elFinderConnector(new elFinder($opts));
    $connector->run();
}
	
add_action('admin_init', 'cysteme_finder_plugin_init');
add_action('admin_menu', 'cysteme_finder_plugin_add_settings');

// wp_verify_nonce() is not automatically loaded
require_once(ABSPATH . 'wp-includes/pluggable.php');

if (!empty($_GET['cysteme-finder-nonce']) && wp_verify_nonce($_GET['cysteme-finder-nonce'], 'cysteme-finder_nonce'))
	cysteme_finder_connector();
?>
