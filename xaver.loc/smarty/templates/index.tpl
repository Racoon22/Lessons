{*индексный шаблом*}
{include file='header.tpl'}
 
 {assign var=time value='555'}
Привет, {$name} ,как дела
<br>
Текущее время: {$time};
<br>
Server name: {$smarty.server.SERVER_NAME};
<br>
Get: {$smarty.get.id}
<br>
Name: {$names.first}, {$names[1]};

{include file='footer.tpl'}