<?php
//the code inputs for the form
$code1 = (empty($_POST['code1'])) ? '' : $_POST['code1'];
$code2 = (empty($_POST['code2'])) ? '' : $_POST['code2'];
$code3 = (empty($_POST['code3'])) ? '' : $_POST['code3'];
$request_code = ("$code1-$code2-$code3");
$user_id = $user['id'];

//get the amount of codes the user has
$codes = $mysqli->query("SELECT code FROM codes WHERE facebook_id = '$user_id'");
$user_count = $codes->num_rows;
$points = $user_count;

//empty array used for the modal venster
$modalContent = [];
$modalContentLength = count($modalContent);

// echo '<div id="myModal" class="modal"><span class="close">X</span><div class="modal-content">';

if($request_code == '--'){
    // echo "vul hier jou code in";
}
else{

    
    echo '<div id="codeResult">';
    if($page == 'check') {
        $result = $mysqli->query("SELECT * FROM codes WHERE code = '".$request_code."'");
        $user_match_count = $result->num_rows;
        // var_dump($result);
        if ($user_match_count == 1) {  
            // echo '<h3>deze code is correct, </h3>';
            
            $row = $result->fetch_assoc();

            if ($row['used'] == NULL) {
                echo '<h3>Deze code is correct, je hebt nu ' . $points . ' punten!</h3>';
                
                $used = $mysqli->query ("UPDATE codes SET used='used' WHERE code = '".$request_code."'");    
                $add_user = $mysqli->query ("UPDATE codes SET facebook_id ='".$user_id."' WHERE code = '".$request_code."'");
                $add_username = $mysqli->query ("UPDATE codes SET facebook_name = '". $user['name'] . "'WHERE code = '".$request_code."'");
            }
            else {
                echo ' <h3>Deze code is al een keer gebruikt</h3>';
            }
        }
        else {
            echo '<h3>Deze code is niet correct, probeer het nog een keer.</h3>';

        }
    }
    echo '</div>';
}

// echo '</div></div>';

?>