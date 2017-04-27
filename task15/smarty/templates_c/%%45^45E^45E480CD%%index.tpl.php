<?php /* Smarty version 2.6.30, created on 2017-04-24 09:21:30
         compiled from index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_radios', 'index.tpl', 8, false),array('function', 'html_options', 'index.tpl', 19, false),array('function', 'html_checkboxes', 'index.tpl', 33, false),array('modifier', 'default', 'index.tpl', 8, false),)), $this); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<br>

<form id="myform" action="index.php" method="POST" >
    <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['show_ads']->id; ?>
">
    <div class="form-group"> <?php echo smarty_function_html_radios(array('id' => 'private','name' => 'private','options' => $this->_tpl_vars['private_radios'],'selected' => ((is_array($_tmp=@$this->_tpl_vars['show_ads']->private)) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)),'separator' => ""), $this);?>
</div>
    
    <p><label><b id="your-name">Ваше имя</b> 
           <input type="text" maxlength="40" class="form-input-text" value="<?php echo $this->_tpl_vars['show_ads']->seller_name; ?>
" name="seller_name" id="fld_seller_name"</input></label></p> 

    <p><label>Электронная почта
            <input type="text"  value="<?php echo $this->_tpl_vars['show_ads']->email; ?>
" name="email" id="fld_email"></label></p>
    <p><label>Номер телефона
            <input type="text" value="<?php echo $this->_tpl_vars['show_ads']->phone; ?>
" name="phone" id="fld_phone"></label></p>
    <p><label>Выбирете город
    
            <?php echo smarty_function_html_options(array('id' => 'sity_id','name' => 'sity_id','options' => $this->_tpl_vars['sity_options'],'selected' => $this->_tpl_vars['show_ads']->sity_id), $this);?>

            </select>
        </label>
        <br>
    <p><label>Выбирете категорию
            <?php echo smarty_function_html_options(array('id' => 'category_id','name' => 'category_id','options' => $this->_tpl_vars['category_options'],'selected' => $this->_tpl_vars['show_ads']->category_id), $this);?>

        </label>
    <p><label>Название объявления
            <input type="text" maxlength="50" class="form-input-text-long" value="<?php echo $this->_tpl_vars['show_ads']->title; ?>
" name="title" id="fld_title"></label></p>
    <p><label for="fld_description" class="form-label" id="js-description-label">Описание объявления 
            <textarea maxlength="6000" name="description" id="fld_description" class="form-input-textarea"><?php echo $this->_tpl_vars['show_ads']->description; ?>
</textarea></label></p> 

    <p><label id="price_lbl" for="fld_price" class="form-label">Цена
            <input type="text" maxlength="9" class="form-input-text-short" value="<?php echo $this->_tpl_vars['show_ads']->price; ?>
" name="price" id="fld_price">&nbsp;<span>руб.</span></label></p>
            <?php echo smarty_function_html_checkboxes(array('id' => 'allow_mails','name' => 'allow_mails','options' => $this->_tpl_vars['allow_mails_names'],'selected' => $this->_tpl_vars['show_ads']->allow_mails,'separator' => "<br />"), $this);?>
   


    <p><input type="submit"  class="btn btn-primary" value="<?php if (( $_GET['id'] == 'show ' )): ?>Сохранить объявление<?php else: ?>
              Новое объявление<?php endif; ?>" id="form_submit" name="add_ads" class="vas-submit-input"></p></form>

<?php if (( isset ( $this->_tpl_vars['ads'] ) ) && ( ! empty ( $this->_tpl_vars['ads'] ) )): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'ads_output.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

