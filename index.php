<?php

#index.php

require_once __DIR__ . '/vendor/autoload.php';

require 'config/config.php';

require 'config/database.php';

include 'views/head.php';

$page = isset($_GET['page'])? $_GET['page'] : '';

session_start();

$fb = new Facebook\Facebook([
    'app_id' => '196100077434686',
    'app_secret' => '5692c23a58c2f3272d93dcd25919d6d3',
    'default_graph_version' => 'v2.5',
    'default_access_token' => isset($_SESSION['facebook_access_token']) ? $_SESSION['facebook_access_token'] : '196100077434686'

]);

try {
    $response = $fb->get('/me?fields=id,name,bio,birthday,picture,context,cover,currency,devices,education,email,favorite_athletes,favorite_teams,first_name,gender,age_range,hometown,inspirational_people,install_type,installed,interested_in,is_shared_login,is_verified,languages,last_name,link,locale,location,meeting_for,middle_name,name_format,payment_pricepoints,political,public_key,quotes,relationship_status,religion,security_settings,shared_login_upgrade_required_by,significant_other,sports,test_group,third_party_id,timezone,updated_time,verified,video_upload_limits,viewer_can_send_gift,website,work&debug=all');

    include 'views/header.php';

    include 'logic/get_userInfo.php';
    include 'logic/check.php';
    
    switch ($page) {
        case 'profile':
            //getting user specific info
            include 'views/user_info.php';
            include 'logic/get_points.php';
            include 'views/show_points.php';
            break;
        
        default:
            //form for inputting a code
            include 'views/code_form.php';
            break;
    }






    exit;
} catch (Facebook\Exceptions\FacebookResponseException $e){
    //echo 'Graph returned an error: ' . $e->getMessage();
} catch (Facebook\Exceptions\FacebookSDKException $e){
    //echo 'Facebook SDK returned an error: ' . $e->getMessage();
}

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'user_likes'];
//online
// $loginUrl = $helper->getLoginUrl('https://17786.hosts.ma-cloud.nl/RestovanHarte/logic/login-callback.php', $permissions);
//local
$loginUrl = $helper->getLoginUrl('https://localhost/RestovanHarte/logic/login-callback.php', $permissions);

echo '<a href="'. $loginUrl . '">Log in with Facebook!</a>';

echo "<img src='".$picture['url']."'/>";

?>