	 <table class="table">
            <thead>
            <td  >№</td>
            <td align = center>Название</td>
            <td align = center>Стоимость</td>
            <td align = center>Имя продовца</td>
            <td align = center>Удалить объявление</td>
            </thead>
{foreach from=$ads key=k item=v}
   <tr id="ad{$v.id}"><td align = center height=50>{$k+1}</td>
   <td align = center height=50><a href="?action=show&id={$v.id}">{$v.title}</a></td>
   <td align = center height=50>{$v.price}</td>
   <td align = center height=50>{$v.seller_name}</td>
   <td align = center height=50><a class="btn-danger">[X]</a></td></tr>
{/foreach}
</table>

<!-- class="btn-warning"-->
