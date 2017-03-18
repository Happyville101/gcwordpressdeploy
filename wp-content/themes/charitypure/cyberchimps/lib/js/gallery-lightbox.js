/**
 * Title: gallery-lightbox
 *
 * Description: Provides the lightbox for the gallery images
 *
 * Please do not edit this file. This file is part of the CyberChimps Framework and all modifications
 * should be made in a child theme.
 *
 * @category CyberChimps Framework
 * @package  Framework
 * @since    1.0
 * @author   CyberChimps
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v3.0 (or later)
 * @link     http://www.cyberchimps.com/
 */

jQuery(document).ready(function () {

	jQuery('.gallery-icon a').each(function () {

		var source = jQuery(this).children().attr('src');
		var startIndex = source.lastIndexOf('-');
		var endIndex = source.lastIndexOf('.');
		var removeValue = source.substring(startIndex, endIndex);
		var newSource = source.replace(removeValue, '');

		jQuery(this).attr('rel', 'cyberchimps-lightbox');
		jQuery(this).attr('href', newSource);

	});

});