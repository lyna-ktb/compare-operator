<?php
session_start();
require_once 'db_connect.php';
include 'autoload.php';


if (isset($_POST['pseudo'])){

    $adminManager = new AdminManager($bdd);
    $admin = new Admin(['pseudo'=>$_POST['pseudo'], 'pass'=>$_POST['pass']]);
    $adminManager->get($admin);
    $_SESSION['id']= $admin->getId();
    $_SESSION['pseudo']=$admin->getPseudo();
    $_SESSION['admin'] = true;

/*    var_dump($_POST);*/
    header('Location: ../admin/admin.php');

}