<?php


$PATH = dirname($_SERVER['PHP_SELF']);


function is_session_started(){
    if ( php_sapi_name() !== 'cli' ) {
        if ( version_compare(phpversion(), '5.4.0', '>=') ) {
            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        } else {
            return session_id() === '' ? FALSE : TRUE;
        }
    }
    return FALSE;
}


function session_disconnect(){
    @session_destroy();
}




if (isset($_POST['mot_de_passe']) AND $_POST['mot_de_passe'] ==  "kangourou"){
    if (is_session_started() === FALSE) {
        session_start();
        header('Location: '.$PATH.'/admin/index.php');
        exit;
    }
}
else{
    session_disconnect();
    header('Location: '.$PATH.'/index.php');
}



?>
    
