<style>
    #wgames-notice-support-view{
        margin-top: 10px;
        padding: 10px 10px 10px 10px;
        border-color: rgba(0, 0, 0, 0.22);
        border-width: 1px;
        border-style: solid;
        border-radius: 2px;
        margin-left: 10px;
    }
    .wgames-support-click-common {
        display: inline;
        position: relative;
    }





</style>
<script>
    jQuery(document).ready(function(){
        jQuery( '#wgames-notice-support-close' ).click( function (event) {
            jQuery("#wgames-notice-support-view").hide();

            var data = {
                action:'wgames_set_support_time'
            };

            jQuery.post(ajax_object.ajax_url, data, function(respond) {

            });
            return false;
        } );

        jQuery( '#wgames-notice-support-click' ).click( function (event) {

                if(document.getElementById('wgames_author_linking'))        document.getElementById('wgames_author_linking').checked = true;

                var data = {
                    action:'wgames_set_support_link'
                };

                jQuery.post(ajax_object.ajax_url, data, function(respond) {
                    jQuery("#wgames_support_title_1").hide();
                    jQuery("#wgames_support_title_2").show();
                    jQuery("#wgames_support_title_3").hide();
                });

        } );

    });

</script>

<div class="updated" id="wgames-notice-save-view" style="display: none; margin-left: 10px;">
<p>Save Settings Successfully.</p>
</div>

<div class="updated" id="wgames-notice-support-view" style="<?php

    if(wgames_Main::$settings['wgames_author_linking'] == '0'){

        //if((time() - wgames_Main::$settings['wgames_initial_dt']) >= 24 * 60 * 60){
        if((time() - wgames_Main::$settings['wgames_initial_dt']) >= 1){

        }
        else{
            echo 'display: none;';
        }
    }
    else {
        echo 'display: none;';
    }

?>">

    <div class="wgames-support-click-title wgames-support-click-common" id="wgames_support_title_1">Thank you for installing
        <a href="<?php  $url = admin_url();
        echo $url . 'options-general.php?page=critic-plugin-menu';?>">Critic Games</a>,  if you enjoy our plugin <a href="#" id="wgames-notice-support-click">please activate author credits that are underneath each game.</a>

    </div>
    <div class="wgames-support-click-title wgames-support-click-common" id="wgames_support_title_2" style="display: none;">Thank you for supporting our plugin.</div>
    <div style="float: right;" id="wgames_support_title_3">
        <small><a href="#" id="wgames-notice-support-close">X</a> </small>
    </div>

</div>