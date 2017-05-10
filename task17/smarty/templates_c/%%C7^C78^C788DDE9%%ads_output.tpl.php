<?php /* Smarty version 2.6.30, created on 2017-04-30 21:00:01
         compiled from ads_output.tpl */ ?>
	 <table class="table" id="ads">
            <thead>
            <td>№</td>
            <td align = center>Название</td>
            <td align = center>Стоимость</td>
            <td align = center>Имя продовца</td>
            <td align = center>Удалить объявление</td>
            </thead>
            <tbody>
<?php $_from = $this->_tpl_vars['ads']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
   <tr id="ad<?php echo $this->_tpl_vars['v']['id']; ?>
"  class="tr"><td class='number_row' align = center height=50><?php echo $this->_tpl_vars['k']+1; ?>
</td>
   <td align = center height=50  class="title"><a  class="show title"><?php echo $this->_tpl_vars['v']['title']; ?>
</a></td>
   <td align = center height=50 class="price"><?php echo $this->_tpl_vars['v']['price']; ?>
</td>
   <td align = center height=50 class="seller_name"><?php echo $this->_tpl_vars['v']['seller_name']; ?>
</td>
   <td align = center height=50><a type="button" class="delete btn btn-danger ">Удалить</a></td></tr>
<?php endforeach; endif; unset($_from); ?>
</tbody></table>

    