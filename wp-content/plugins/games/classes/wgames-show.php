<?php

if ( ! class_exists( 'wgames_Show' ) ) {

    /**
     * generate SEO info;
     */
    class wgames_Show extends wgames_Module {
        /**
         * Constructor
         */
        protected function __construct() {

            $this->register_hook_callbacks();
        }

        /**
         * Register callbacks for actions and filters
         */
        public function register_hook_callbacks() {

            add_action('wp_footer', __CLASS__. '::fake_wp_footer' );

            return;
        }

        /**
         * hook wp_footer
         */
        public function fake_wp_footer() {
        }
    } // end wgames_Show
}
