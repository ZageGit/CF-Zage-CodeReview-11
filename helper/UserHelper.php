<?php
function isLoggedIn(){
    if (!isset($_SESSION['user_id'])){
        return false;
    } else {
        return true;
    }
}

function isAdmin(){
    if (!isset($_SESSION['admin'])){
        return false;
    } else {
        return true;
    }
}

function isSadmin(){
    if (!isset($_SESSION['s_admin'])){
        return false;
    } else {
        return true;
    }
}
?>