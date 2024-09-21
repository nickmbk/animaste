<?php
// allows wp_redirect to be used 
function callback($buffer) {
    // You can modify $buffer here, and then return the updated code
    return $buffer;
}
function buffer_start() { ob_start("callback"); }
function buffer_end() { ob_end_flush(); }
// Add hooks for output buffering
add_action('init', 'buffer_start');
add_action('wp_footer', 'buffer_end');