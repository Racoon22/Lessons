<?php /* Smarty version 2.6.30, created on 2017-04-03 15:08:39
         compiled from index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 
 <?php $this->assign('time', '555'); ?>
Привет, <?php echo $this->_tpl_vars['name']; ?>
 ,как дела
<br>
Текущее время: <?php echo $this->_tpl_vars['time']; ?>
;
<br>
Server name: <?php echo $_SERVER['SERVER_NAME']; ?>
;
<br>
Get: <?php echo $_GET['id']; ?>

<br>
Name: <?php echo $this->_tpl_vars['names']['first']; ?>
, <?php echo $this->_tpl_vars['names'][1]; ?>
;

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>