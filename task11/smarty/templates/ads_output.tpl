	<table width="100%" cellspacing="0" cellpadding="4" border="1">
            <thead>
            <td align = center>№</td>
            <td align = center>Название</td>
            <td align = center>Стоимость</td>
            <td align = center>Имя продовца</td>
            <td align = center>Удалить объявление</td>
            </thead>
{foreach from=$ads key=k item=v}
   <tr><td align = center height=50>{$k}</td>
   <td align = center height=50><a href="?action=show&id={$v.id}">{$v.title}</a></td>
   <td align = center height=50>{$v.price}</td>
   <td align = center height=50>{$v.seller_name}</td>
   <td align = center height=50><a href="?action=delete&id={$v.id}">Удалить</a></td></tr>
{/foreach}
</table>
