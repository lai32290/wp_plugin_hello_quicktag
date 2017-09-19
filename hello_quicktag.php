<?php
/*
Plugin Name: Hello Quicktag
Author: LXuancheng
License: GPL2
Version: 0.0.1
Text Domain: hello_quicktag
Description: This is a test plugin to generating quicktag
 */

class HelloQuicktag {
    private static $instance;

    public static function getInstance() {
        if(self::$instance === null) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function __construct() {
        add_action('admin_print_footer_scripts', [$this, 'hello_quicktag']);
    }

    public function hello_quicktag() {
        if(wp_script_is('quicktags')):
?>
<script>
    function getSel() {
        var txtarea = document.getElementById("content");
        var start = txtarea.selectionStart;
        var finish = txtarea.selectionEnd;
        return txtarea.value.substring(start, finish);
    }

    function get_t() {
        var selected_text = getSel();
        QTags.insertContent('[hello]' + selected_text + '[/hello]');
    }

    QTags.addButton('btn_hello_quicktag', 'Hello Quicktag', get_t)
</script>
<?php
        endif;
    }
}

HelloQuicktag::getInstance();
