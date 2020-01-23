<?php
    session_start();
    ob_start();

    $fullname_display=$_SESSION['fullname'];

    //file download to user
    header("Content-type: application/vnd.ms-word");
    header("Content-Disposition: attachment;Filename=response.doc");
    echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
    echo "<br>" ."FULLNAME: " . $fullname_display . "</br>";

    //file upload to sever
    $content = ob_get_contents();
    file_put_contents('/var/www/html/login/uploads/form-response.doc',$content);
?>