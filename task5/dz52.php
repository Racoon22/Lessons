<?php


$news = 'Четыре новосибирские компании вошли в сотню лучших работодателей
Выставка университетов США: открой новые горизонты
Оценку «неудовлетворительно» по качеству получает каждая 5-я квартира в новостройке
Студент-изобретатель раскрыл запутанное преступление
Хоккей: «Сибирь» выстояла против «Ак Барса» в пятом матче плей-офф
Здоровое питание: вегетарианская кулинария
День святого Патрика: угощения, пивной теннис и уличные гуляния с огнем
«Красный факел» пустит публику на ночные экскурсии за кулисы и по закоулкам столетнего здания
Звезды телешоу «Голос» Наргиз Закирова и Гела Гуралиа споют в «Маяковском»';
$news = explode("\n", $news);

foreach ($news as $key => $value) {
    
}
//Функция вывода всех переменных
function All_news($param1, $param2, $param3, $param4, $param5, $param6, $param7, $param8) {
    echo 'Новости дня!<br>' . $param1 . '<br>' . $param2 . '<br>' . $param3 . '<br>' . $param4 . '<br>' . $param5 . '<br>' . $param6 . '<br>' . $param7 . '<br>' . $param8 . '<br>';
}

//Фунция вывода Функция вывода конкретной новости(по id) и всех новостей при отсутствии id или если id>$key

if (!isset($_POST["id"])) {
    All_news($news[0], $news[1], $news[2], $news[3], $news[4], $news[5], $news[6],$news[7]);
} elseif ((isset($_POST["id"])) && ($_POST["id"] <= $key)) {
    echo 'Новость дня!<br>' . $news[$_POST["id"]];
} elseif ((isset($_POST["id"])) && ($_POST["id"] > $key)) {
    echo 'Новость не найдена<br><br><br>';
    All_news($news[0], $news[1], $news[2], $news[3], $news[4], $news[5], $news[6], $news[7]);

}

?>
<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <title>NEWS</title>
 </head>
 <body>

     <form action="dz52.php" method="POST">
  <p><b>Выберете новость, о которой вы хотите узнать больше</b></p>
  <p><input type="digital" name="id" value=""></p>
  <p><input type="submit"></p>
 </form>
 </body>
</html>
