<?php
#login-callback.php

require_once __DIR__ . '/vendor/autoload.php';

session_start();

$fb = new Facebook\Facebook([
    'app_id' => '196100077434686',
    'app_secret' => '5692c23a58c2f3272d93dcd25919d6d3',
    'default_graph_version' => 'v2.5',
    'default_access_token' => isset($_SESSION['facebook_access_token']) ? $_SESSION['facebook_access_token'] : '196100077434686'

]);

$helper = $fb->getRedirectLoginHelper();

try{
    $accessToken = $helper->getAccessToken();
} catch (Facebook\Exceptions\FacebookResponseException $e){
    //echo 'Graph returned an error: ' . $e->getMessage();
} catch (Facebook\Exceptions\FacebookSDKException $e){
    //echo 'Facebook SDK returned an error: ' . $e->getMessage();
}

if (isset($accessToken)){
    //Logged in!
    $_SESSION['facebook_access_token'] = (string) $accessToken;
} elseif ($helper->getError()){
    //The user denied the request
}

header('Location: index.php');

?>

?>