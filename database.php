<?php 
require_once __DIR__.'/config.php';
function createRecord($id_chatfuel){
    $sql = "INSERT INTO `chatfuel` (`id_chatfuel`, `id_user`, `status`) VALUES ('{$id_chatfuel}', '', '0');";
    $conn = mysql_connect(HOST,DB_USER,DB_PASS);
    if ($conn){
        mysql_select_db(DB_NAME,$conn);
        $status = mysql_query($sql,$conn);
        if ($status) return true;
            else return false;
    } else return false;
    mysql_close($conn);
    
}
function updateRecord($id_chatfuel,$id_user){
    $sql = "UPDATE `chatfuel` SET id_user='{$id_user}' ,status=1 WHERE id_chatfuel='{$id_chatfuel}'";
    $conn = mysql_connect(HOST,DB_USER,DB_PASS);
    if ($conn){
        mysql_select_db(DB_NAME,$conn);
        $status = mysql_query($sql,$conn);
        if ($status) return true;
            else return false;
    } else return false;
    mysql_close($conn);
}

function selectRecord($id_chatfuel){
    $sql = "SELECT status FROM `chatfuel` WHERE id_chatfuel={$id_chatfuel}";
    $conn = mysql_connect(HOST,DB_USER,DB_PASS);
    if ($conn){
        mysql_select_db(DB_NAME,$conn);
        $status = mysql_query($sql,$conn);
        if ($status) {
            $isActive = mysql_fetch_assoc($status);
            return $isActive['status'];
        }
    }
    mysql_close($conn);
    
}
    