<?php /* Smarty version 2.6.30, created on 2017-04-17 08:29:50
         compiled from ads_output.tpl */ ?>
	<table class="table table-hover" width="100%" cellspacing="0" cellpadding="4" border="1">
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
   <tr><td align = center height=50><?php echo $this->_tpl_vars['k']+1; ?>
</td>
   <td align = center height=50><a href="?action=show&id=<?php echo $this->_tpl_vars['v']->getId(); ?>
"><?php echo $this->_tpl_vars['v']->getTitle(); ?>
</a></td>
   <td align = center height=50><?php echo $this->_tpl_vars['v']->getPrice(); ?>
</td>
   <td align = center height=50><?php echo $this->_tpl_vars['v']->getSellerName(); ?>
</td>
   <td align = center height=50><a href="?action=delete&id=<?php echo $this->_tpl_vars['v']->getId(); ?>
">Удалить</a></td></tr>
<?php endforeach; endif; unset($_from); ?>
</table>