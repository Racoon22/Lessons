<h1>Задание 1</h1>
<?php
     $name='Александр';//Имя
     $age=25; // Возраст
    echo "Меня зовут  $name <br> ";
    echo "Мне $age  лет ";
    unset($name);
    unset($age);
 ?>
<h1>Задание 2</h1>
<?php
    define('MY_TOWN', 'Новосибирск', TRUE);
       
     
    echo 'Город '.MY_TOWN ;
        
/* if (define('MY_TOWN', 'Новосибирск')==TRUE) {
         echo '<br> Констатнта объявлена';
 } else {echo '<br> Констатнта не объявлена';
     }
       
  */  define('MY_TOWN', 'Новосибирск52', TRUE);//И netBeans и хром просто игнорируют эту запись
    
 
 ?>

<h1>Задание 3 </h1>
<?php

$book=array ('tittle'=>'Cила против насилия', 'autor'=>'Девид Хокинг', pages=> '48');

echo "<br> Недавно я прочитал книгу $book[tittle], написанную автором $book[autor], я осилил все $book[pages] страниц, мне она очень понравилась!";
 
 end($book);
?>
<h1>Задание 4</h1>
<?php

$book1= array ('Cила против насилия ', 'Девид Хокинг ', '48 ');
$book2= array ('Лидер без титула ', 'Робин Шарма ', '260 ');
$books= array($book1,$book2);
        
echo '<br> Недавно я прочитал книги '.($books[0][0].'и '.$books[1][0]).' написанные соответственно авторами '.($books[0][1].' и '.$books[1][1]).' , я осилил в сумме '.($books[0][2]+$books[1][2]).' страниц, не ожидал от себя подобного!';
?>