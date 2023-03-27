<?php
session_start();
if (isset($_SESSION['user_id'])) {
    $id = intval($_SESSION['user_id'] / 1000);
    if($id == 1)
    {
        header("Location: dashboard/studentD.php");
        exit();
    }
    else{
        header("Location: dashboard/InstrucD.php");
        exit();
    }
} else {
    echo "User ID not found";
}
?>
