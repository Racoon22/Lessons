<?php

include 'config.php';
include 'Classes.php';
include 'smartyconfig.php';

switch ($_GET['action']) {
    case "insert":
        unset($_POST['add_ads']);
        $vars = new Ads($_POST);
        $vars = get_object_vars($vars);
        if (empty($_POST['id'])) {
            $id = $db->query("INSERT INTO ads (?#) VALUES (?a)", array_keys($vars), array_values($vars));
        } else {
            $db->query('UPDATE ?_ads SET ?a WHERE id=?', $vars, $_POST['id']);
            $id = $_POST['id'];
        }
        if ($id) {
            $ad = $db->selectRow('select * from ads WHERE id=?d', $id);
            $ad = new Ads($ad);
            $smarty->assign('row_ad', $ad);
            $result['tovar'] = $smarty->fetch('ads_row_html.html');
            $result['status'] = 'success';
            $result['message'] = "Ad  " . $_POST['title'] . " successfully added";
        } else {
            $result['status'] = 'error';
            $result['message'] = "Error text";
        }
        break;
    case "delete":
        if ($db->query("DELETE FROM ads where id=?d", $_GET['id'])) {
            $result['status'] = 'success';
            $result['message'] = "Товар " . $_GET['name'] . " удален успешно";
            $all = $db->select('select * from ads order by id');
            if (empty($all)) {
                $result['warning'] = "Объявлений больше нет";
            }
        } else {
            $result['status'] = 'error';
            $result['message'] = "Error text";
        }



        break;
    case "show":
        $ad = $db->selectRow('select * from ads WHERE id=?d', $_GET['id']);
        $ad = new Ads($ad);
        $result = get_object_vars($ad);
        break;
}
echo json_encode($result);

?>


