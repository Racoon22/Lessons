	<table class="table table-hover" width="100%" cellspacing="0" cellpadding="4" border="1">
            <thead>
            <td align = center>№</td>
            <td align = center>Название</td>
            <td align = center>Стоимость</td>
            <td align = center>Имя продовца</td>
            <td align = center>Удалить объявление</td>
            </thead>
{foreach from=$ads key=k item=v}
   <tr><td align = center height=50>{$k+1}</td>
   <td align = center height=50><a href="?action=show&id={$v->getId()}">{$v->getTitle()}</a></td>
   <td align = center height=50>{$v->getPrice()}</td>
   <td align = center height=50>{$v->getSellerName()}</td>
   <td align = center height=50><a href="?action=delete&id={$v->getId()}">Удалить</a></td></tr>
{/foreach}
</table>
