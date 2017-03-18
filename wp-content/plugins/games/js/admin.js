// show message

function showMessage(message)
{
   jQuery("#wgames_dialog").show();
}
// Save settings for Global.
function wgames_click_credit_link()
{



       var state = jQuery('#wgames_author_linking').attr('checked') ? '1' : '0';
        var dataLink = {
            action  : 'wgames_set_support_link',
            state   : state
        };

        jQuery.post(ajax_object.ajax_url, dataLink, function(respond) {
            if(jQuery('#wgames_author_linking').attr('checked')){
                jQuery("#wgames_support_title_1").hide();
                jQuery("#wgames_support_title_2").show();
                jQuery("#wgames_support_title_3").hide();
            }
            else {
                jQuery('#wgames-notice-support-view').show();
                jQuery("#wgames_support_title_1").show();
                jQuery("#wgames_support_title_2").hide();
                jQuery("#wgames_support_title_3").hide();
            }
        });

}
