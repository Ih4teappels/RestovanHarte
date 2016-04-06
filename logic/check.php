<?php
$code1 = (empty($_POST['code1'])) ? '' : $_POST['code1'];
$code2 = (empty($_POST['code2'])) ? '' : $_POST['code2'];
$code3 = (empty($_POST['code3'])) ? '' : $_POST['code3'];
$request_code = ("$code1-$code2-$code3");
$user_id = $user['id'];

if($request_code == '--'){
    // echo "vul hier jou code in";
}
else{



if($page == 'check'){
    $result = $mysqli->query("SELECT * FROM codes WHERE code = '".$request_code."'");
    $user_match_count = $result->num_rows;
    
    if ($user_match_count == 1)
 {
        echo 'deze code is correct';
        
        $row = $result->fetch_assoc();
        
        if ($row['used'] == NULL){
            echo ' en nog niet gebruikt <h1>+1</h1>';
            
            $used = $mysqli->query ("UPDATE codes SET used='used' WHERE code = '".$request_code."'");    
            $add_user = $mysqli->query ("UPDATE codes SET facebook_id ='".$user_id."' WHERE code = '".$request_code."'");
            $add_username = $mysqli->query ("UPDATE codes SET facebook_name = '". $user['name'] . "'WHERE code = '".$request_code."'");
        }
        else{
            echo ' maar hij is helaas al een keer gebruikt';
        }
 }
 else{
  echo 'deze code is niet correct, probeer het nog een keer';

 }
}
}



?>