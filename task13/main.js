var name= 'Александр';
var age= 25;
//document.write("Меня зовут"+name);
//document.write("Мне"+age+"лет");
console.log("Меня зовут",name);
console.log("Мне", age, "лет");

var MY_TOWN = "Новосибирск";
console.log("Город", MY_TOWN);

var book = {};
book['tittle'] = 'Cила против насилия';
book['autor'] = 'Девид Хокинг';
book['pages'] = '48';

console.log("Недавно я прочитал книгу", book['tittle'], "написанную автором", book['autor'], "я осилил все", book['pages'], "страниц, мне она очень понравилась!");

var book1 = new Array();

book1[0] = "Cила против насилия";
book1[1] = "Девид Хокинг";
book1[2] = 48;

console.log(book1);

var book2 = new Array();

book2[0] = 'Лидер без титула';
book2[1] = 'Робин Шарма';
book2[2] = 260;
console.log(book2);

var books = new Array();
books[0] = book1;
books[1] = book2;



console.log("Недавно я прочитал книги ", books[0][0],"и ", books[1][0]," написанные соответственно авторами ",(books[0][1]," и ",books[1][1]),", я осилил в сумме ",(books[0][2]+books[1][2])," страниц, не ожидал от себя подобного!");



