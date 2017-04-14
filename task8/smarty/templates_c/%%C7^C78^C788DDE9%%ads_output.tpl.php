<?php /* Smarty version 2.6.30, created on 2017-04-11 14:38:34
         compiled from ads_output.tpl */ ?>
	<table width="100%" cellspacing="0" cellpadding="4" border="1">
            <thead>
            <td align = center>№</td>
            <td align = center>Название</td>
            <td align = center>Стоимость</td>
            <td align = center>Имя продовца</td>
            <td align = center>Удалить объявление</td>
            </thead>
<?php $_from = $this->_tpl_vars['ads']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
   <tr><td align = center height=50><?php echo $this->_tpl_vars['k']; ?>
</td>
   <td align = center height=50><a href="?action=show&id=<?php echo $this->_tpl_vars['k']; ?>
"><?php echo $this->_tpl_vars['v']['title']; ?>
</a></td>
   <td align = center height=50><?php echo $this->_tpl_vars['v']['price']; ?>
</td>
   <td align = center height=50><?php echo $this->_tpl_vars['v']['seller_name']; ?>
</td>
   <td align = center height=50><a href="?action=delete&id=<?php echo $this->_tpl_vars['k']; ?>
">Удалить</a></td></tr>
<?php endforeach; endif; unset($_from); ?>
</table>