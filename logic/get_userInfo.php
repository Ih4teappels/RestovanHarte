<?php

	$user = $response->getGraphObject();

    $requestPicture = $fb->get('/me/picture?redirect=false&height=100'); //getting user picture
    $requestProfile = $fb->get('/me'); // getting basic info

	$picture = $requestPicture->getGraphUser();
    $profile = $requestProfile->getGraphUser();
    $user = $response->getGraphUser();

?>