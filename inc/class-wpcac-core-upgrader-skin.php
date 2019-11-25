<?php
class WPRP_Core_Upgrader_Skin extends WP_Upgrader_Skin {

    var $feedback;
    var $error;

    function error( $error ) {
        $this->error = $error;
    }

    function before() { }

    function after() { }

    function header() { }

    function footer() { }

}
