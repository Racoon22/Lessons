<?php /* Smarty version 2.6.30, created on 2017-04-26 20:14:05
         compiled from ads_row_html.html */ ?>
<tr id="ad<?php echo $this->_tpl_vars['row_ad']->id; ?>
"><td align = center height=50><?php echo $_GET['num']; ?>
</td>
    <td align = center height=50> <a type="button" class="show btn btn-danger"><?php echo $this->_tpl_vars['row_ad']->title; ?>
</a></td>
    <td align = center height=50><?php echo $this->_tpl_vars['row_ad']->price; ?>
</td>
    <td align = center height=50><?php echo $this->_tpl_vars['row_ad']->seller_name; ?>
</td>
    <td align = center height=50><a class="delete btn btn-danger">[x]</a></td>
</tr>