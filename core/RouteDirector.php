<?php
echo $_SERVER['QUERY_STRING'];
$request = explode("/", $_SERVER['QUERY_STRING']);
substr($_SERVER['QUERY_STRING'], 1);

if(empty($request[1]))
    //if url has no trailing strings
    $base_url = $theme_base . '/index.php';
elseif(file_exists( $theme_base . '/' . $request[1] . '.php' ))
    //if file exist in site_theme/ 
    $base_url = $theme_base . '/' . $request[1] . '.php';
else{
    // this searches through the folder to find a matching file
    for($i = 1; $i < count($request);){
        $directory = $theme_base;

        $i++;
        for($count=1; $count <  $i; ++$count){
            $directory = $directory . "/" . $request[$count];
        }

        if(isset($request[$i]) && file_exists($directory . '/' . $request[$i] .  '.php' )){
            $base_url = $directory . '/' . $request[$i] .  '.php';
            break;
        }

        if(file_exists($directory . '/index.php' )){
            $base_url = $directory . '/index.php';
            break;
        }
    }
	//if(!$base_url) $base_url = 'site_theme/index.php';
}

$url_vars = "";
for($i = 0; $i < count($request); ++$i) {
	$url_vars[$i] = $request[$i];
}


if(file_exists($base_url))
    if($site_routing == SiteRoutingType::Layout)
        RenderLayout($base_url);
    else
        include $base_url;

else get_404();

?>