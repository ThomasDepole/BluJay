<?php

// ------------------------
// MySQL Configuration :
// ------------------------

include_once "../config.php";

$db['host'] = $db_auth['host'];
$db['user'] = $db_auth['user'];
$db['pass'] = $db_auth['pass'];
$db['name'] = $db_auth['database'];

// ------------------------
// Auth Configuration :
// ------------------------

$auth_conf['site_name'] = $site_name; // Name of website to appear in emails
$auth_conf['email_from'] = "no-reply@temp.com"; // Email FROM address for Auth emails (Activation, password reset...)
$auth_conf['max_attempts'] = 5; // INT : Max number of attempts for login before user is locked out
$auth_conf['base_url'] = $site_url . "/includes/Auth-master/"; // URL to Auth Class installation root WITH trailing slash
$auth_conf['session_duration'] = "+1 month"; // Amount of time session lasts for. Only modify if you know what you are doing ! Default = +1 month
$auth_conf['security_duration'] = "+30 minutes"; // Amount of time to lock a user out of Auth Class afetr defined number of attempts.

$auth_conf['salt_1'] = "us_$dUDN4N-53"; // Salt #1 for password encryption
$auth_conf['salt_2'] = "Yu23ds09*d?"; // Salt #1 for password encryption

$loc = "en"; // Language of Auth Class output : en / fr

?>


