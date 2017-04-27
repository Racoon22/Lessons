<?php
$project_root = $_SERVER['DOCUMENT_ROOT']; 
$smarty_dir = $project_root.'/task12/smarty/';


require($smarty_dir.'libs/Smarty.class.php');

$smarty = new Smarty;

$smarty->compile_check = true;
$smarty->debugging = false;
$smarty->template_dir = $smarty_dir.'templates';
$smarty->compile_dir = $smarty_dir.'templates_c';
$smarty->cache_dir = $smarty_dir.'cache';
$smarty->config_dir = $smarty_dir.'configs';

$smarty->assign('private_radios', array(
                               0 => 'Частное лицо',
                               1 => 'Компания'));

$smarty->assign('sity_options', array(
                               1 => '--Выбор города--',
                               2 => 'Новосибирск',
                               3 => 'Барабинск',
                               4 => 'Бердск', 
                               5 => 'Искитим'));
$smarty->assign('category_options', array(
                                1 => '--Выбор категории--',
                                2 => 'Транспорт', 
                                3 => 'Недвижимость', 
                                4 => 'Услуги', 
                                5 => 'Личные вещи', 
                                6 => 'Для дома и дачи', 
                                7 => 'Бытовая электроника', 
                                8 => 'Хобби и отдых'));
$smarty->assign('allow_mails_names', array(
	                                1 => 'Я не хочу получать вопросы по объявлению по e-mail')
	                               );


?>