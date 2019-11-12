<?php
require_once 'include.php';

$smarty = new Smarty;

if (!CUtente::isLogged()) {
//  $smarty->assign('info', false);
  $smarty->display('index.tpl');
} 
else {
  $smarty->assign('userlogged', $_SESSION['username']);
//  $smarty->assign('info', false);
  $smarty->display('index.tpl');
}