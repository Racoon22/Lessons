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
$news = array_combine(range(1, count($news )), $news ); // Что бы первая новость выводилась при вводе 1, а не ноль;
echo '<title>POST</title> <h1 align="center">Новости</h1>';
 if (!isset($_POST['id'])){
        $id = false;
    }
    else {
         $id = (int) $_POST['id'];
    }
//Функция вывода всех переменных
function All_news($news){
    foreach ($news as $key => $value) {
        echo $key.'-'.$value.'<br>';
    }
}

function choosen_news($id){
    global $news;    
    echo "<h2 align='center'>".$id.'-'.$news[$id]."</h2>";
    }
    
  if (!isset($news[$id])){
      All_news($news);
  } else {
      choosen_news($id);
  }
  ?>  <html>

      <head>
        <meta charset="utf-8">
        <title>NEWS</title>
    </head>
    <body>

        <form action="dz52.php" method="POST">
            <p><b>Выберете новость, о которой вы хотите узнать больше, либо введите 0 для перехода в главное меню   </b></p>
            <p><input type="text" name="id" value=""></p>
            <p><input type="submit"></p>
        </form>
    </body>
</html>


