<?php
require_once 'actions/db_connect.php';
require_once 'helper/AjaxHelper.class.php';

return "test";


if ($_POST['search'] != "") {
    $AjaxHelper = new AjaxHelper($connect);
    $AjaxHelper->setSearchTerm($_POST['search']);
    $AjaxHelper->getLiveSearchResult();
}

?>