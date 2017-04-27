<?php

include 'config.php';
switch ($_GET['action']) {
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

        echo json_encode($result);

        break;

    default:
        break;
}
//function lastAds() {
//    $all = $db->select('select * from ads order by id');
//    if (empty($all)) {
//    $result['warning'] = "Объявлений больше нет"; 
//    return $result['warning'];
//    
//}
//}
?>


