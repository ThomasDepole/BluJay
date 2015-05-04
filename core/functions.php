<?php

function get_header(){
    global $theme_base;
    $path = $theme_base . '/header.php';
	
	if (file_exists($path)) include $path;
	else echo 'Warnning: Could not find the header file, please save the header file here "'.$path.'"';
}

function get_footer(){
    global $theme_base;
	$path = $theme_base ."/footer.php";
	
	if (file_exists($path)) include $path;
	else echo 'Warnning: Could not find the footer file, please save the footer file here "'.$path.'"';
}

function get_js(){
	global $site_url;
    global $theme_base;
	if ($handle = opendir( $theme_base . '/js')) {
	    while (false !== ($entry = readdir($handle))) {
	    	$ext = substr($entry, -2);
			$pretext = substr($entry, 0, 6);
	        if ($entry != "." && $entry != ".." && $ext == "js" && $pretext != "ignore") {
	            echo '<script src="'.$site_url .'/'.$theme_base.'/js/'.$entry.'"></script>';
	        }
	    }
	    closedir($handle);
	}
}

function get_styles(){
	global $site_url;
    global $theme_base;
	if ($handle = opendir($theme_base . '/css')) {
	    while (false !== ($entry = readdir($handle))) {
	    	$ext = substr($entry, -3);
			$pretext = substr($entry, 0, 6);
	        if ($entry != "." && $entry != ".."&& $ext == "css" && $pretext != "ignore") {
	            echo '<link rel="stylesheet" type="text/css" href="'.$site_url .'/'.$theme_base.'/css/'.$entry.'" />';
	        }
	    }
	    closedir($handle);
	}
}

function site_url($action = "echo"){
	global $site_url;
	if($action == "echo"){
		echo $site_url;
	}
	
	return $site_url;
}

function theme_url($action = "echo"){
	global $theme_url;
	if($action == "echo"){
		echo $theme_url;
	}
	return $theme_url;
}

function site_root($action = ""){
    global $site_root;
    if($action == "echo"){
        echo $site_root;
    }
    return $site_root;
}

    
function alert($message){
    if(!empty($message)){
        echo '<script> alert("'.$message.'")</script>';
    }
}
    
function name($name){
    $input_vars = ' name="'.$name.'" ';
    if(!empty($_POST[$name]))
        $input_vars = $input_vars .  ' value="'.$_POST[$name].'" ';
    
    echo $input_vars;
}

function FormHelpers_Name($type, $name){
	
	if($type == "text"){
		$input_vars = ' name="'.$name.'" ';
	    if(!empty($_POST[$name]))
	        $input_vars = $input_vars .  ' value="'.$_POST[$name].'" ';
	    
	    echo $input_vars;
	}	
}


function get_404(){
    global $theme_base;
    if(file_exists( $theme_base . '/404.php')){
        include $theme_base . '/404.php';
    }else{
        include 'core/404.php';
    }
}

function get_url_variable($urlIndex){
	global $url_vars;
    if(isset($url_vars[$urlIndex])){
        return $url_vars[$urlIndex];
    }else{
        return null;
    }

}	

function alter_theme_url_parameter($key){
    global $theme_base;
    if(isset($_GET[$key]))  $theme_base = $_GET[$key];
}

function redirect($location){
    global $site_url;

    header( 'Location: ' . $site_url . $location );
    die();
}

// Layout Functions
function Title($titleName = null){
    if($titleName == null){
        if(BluJay::$SiteTitle == null)
            echo BluJay::$SiteName;
        else
            echo BluJay::$SiteTitle;
        return;
    }

    BluJay::$SiteTitle = $titleName;
}

function RenderBody(){
    echo BluJay::$SiteBody;
}

function RenderLayout($bodyLocation){
    BluJay::$SiteBodyLocation = $bodyLocation;

    //Used the output buffer to include the contents of the body file, but store the output in a variable to echoed later
    ob_start(); //start buffering
    include BluJay::$SiteBodyLocation; //include the file
    BluJay::$SiteBody = ob_get_contents(); //add the contents of the buffer aka the body into a varible
    ob_end_clean(); //remove anything outputted so the body's html won't render before the layout, but the functions and php $varibles will


    include BluJay::$SiteBase . "/layout.php";
}

?>