<?php
include 'core/Enums/ConfigEnums.php';
include 'core/functions.php';
include 'config.php';
include 'BluJay.php';

BluJay::$SiteName = $site_name;

// Set up Global Variables
if(!isset($theme))
    $theme_base = "site"; //If $theme isn't defined in the config
else if(!isset($theme_base))
    $theme_base = $theme;	     //$theme_base could by dynamical set before

//TODO move all references of $theme_base to this
BluJay::$SiteBase = $theme_base;

if(!isset($site_routing))
    $site_routing = SiteRoutingType::Wordpress;

include_once 'core/kint-master/Kint.class.php';
////////////////////
// $enable
////////////////////

if(isset($enable['ezSQL']) && $enable['ezSQL'] == true){
    // For exSQL $db
    include_once "core/ezSQL/ezSQL_core.php";
    include_once "core/ezSQL/ezSQL.php";

    // Initialise database object and establish a connection
    // at the same time - db_user / db_password / db_name / db_host
    $db = new ezSQL_mysql($db_auth['user'],$db_auth['pass'],$db_auth['database'],$db_auth['host']);
}

if(isset($enable['user_auth']) && $enable['user_auth'] == true){
    //user auth
    include_once 'core/Auth-master/auth.class.php';
    include_once 'core/SimpleImage.php';
    include_once 'core/kint-master/Kint.class.php';
}

if(isset($enable['dev_tools']) && $enable['dev_tools'] == true){
    include_once 'core/DeveloperTools/index.php';
}


//Determine What Type of Routing Method To Use
if($site_routing == SiteRoutingType::Wordpress || $site_routing == SiteRoutingType::Layout){
    $theme_url = $site_url . "/" . $theme_base;
    $site_root = $_SERVER["DOCUMENT_ROOT"];
    define('site_url', $site_url);
    define('site_theme_url', $theme_url);
    include 'core/RouteDirector.php';
    return;
}

if($site_routing == SiteRoutingType::MVC){
    echo("MVC Not Supported Yet");
    return;
}







?>
