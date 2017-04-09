<?php
$project_root = $_SERVER['DOCUMENT_ROOT']; 
$smarty_dir = $project_root.'/xaver.loc/smarty/';

// put full path to Smarty.class.php
require($smarty_dir.'libs/Smarty.class.php');



$smarty->compile_check = true;
$smarty->debugging = true;
$smarty->template_dir = $smarty_dir.'templates';
$smarty->compile_dir = $smarty_dir.'templates_c';
$smarty->cache_dir = $smarty_dir.'cache';
$smarty->config_dir = $smarty_dir.'configs';

$massive = array('first'=>'Mary', 'Joh', 'Ted');

$smarty->assign('name', 'Ned');
$smarty->assign('title', 'Наш сайт');
$smarty->assign('names', $massive);
$smarty->display('index.tpl');
?>