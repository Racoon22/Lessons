	 <table class="table" id="ads">
            <thead>
            <td>№</td>
            <td align = center>Название</td>
            <td align = center>Стоимость</td>
            <td align = center>Имя продовца</td>
            <td align = center>Удалить объявление</td>
            </thead>
            <tbody>
{foreach from=$ads key=k item=v}
   <tr id="ad{$v.id}"  class="tr"><td class='number_row' align = center height=50>{$k+1}</td>
   <td align = center height=50  class="title"><a  class="show title">{$v.title}</a></td>
   <td align = center height=50 class="price">{$v.price}</td>
   <td align = center height=50 class="seller_name">{$v.seller_name}</td>
   <td align = center height=50><a type="button" class="delete btn btn-danger ">Удалить</a></td></tr>
{/foreach}
</tbody></table>

    
