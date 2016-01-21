<?php 

/**
 * Kaseyainfo, report controller class
 *
 * @package munkireport
 * @author Mikael Lofgren
 **/
class kaseyainfo_controller extends Module_controller
{
    function __construct()
    {
        $this->module_path = dirname(__FILE__);
    }

    /**
     * Default method
     *
     * @author Mikael Lofgren
     **/
    function index()
    {
        echo "You've loaded the kaseyainfo report module!";
    }

} // END class kaseyainfo_controller