<?php

include 'connect.php';
include 'Classes.php';
include 'smartyconfig.php';

switch ($_GET['action']) {
    case "insert":
        unset($_POST['add_ads']);

        $ad = new Ads($_POST);
        if (empty($_POST['id'])) {
            $id = $ad->AddAd();
        } else {
            if (isset($ad->id)) {
                $ad->UpAd();
                $id = $ad->id;
            } else {
                $id = null;
            }
        }
        if ($id) {
            $show_ads = AdsStore::instance()->getAllAdsFromDb()->getAllAdsFromDb();
            $show_ad = $show_ads->showSingleAd($id);
            $show_ad = get_object_vars($show_ad);
            $result['id'] = $show_ad['id'];
            $result['title'] = $show_ad['title'];
            $result['seller_name'] = $show_ad['seller_name'];
            $result['price'] = $show_ad['price'];

            $result['status'] = 'success';
            $result['message'] = "Объявление  " . $show_ad['title'] . " успешно добавлено";
        } else {
            $result['status'] = 'error';
            $result['message'] = "Объявление не добалвено попробуйте, еще раз";
        }
        break;
    case "delete":
        if ($db->query("DELETE FROM ads where id=?d", $_GET['id'])) {
            $result['status'] = 'success';
            $result['message'] = "Товар " . $_GET['name'] . " удален успешно";
            $all = $db->select('SELECT COUNT(*) FROM ads;');
            if (empty($all[0]['COUNT(*)'])) {
                $result['warning'] = "Объявлений больше нет";
            }
        } else {
            $result['status'] = 'error';
            $result['message'] = "Объявление не может быть удалено или отсутствует";
        }



        break;
    case "show":
        $ad = AdsStore::instance()->getAllAdsFromDb()->showSingleAd($_GET['id']);

        $result = get_object_vars($ad);
        break;
}
echo json_encode($result);
?>


