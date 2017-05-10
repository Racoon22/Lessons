<?php /* Smarty version 2.6.30, created on 2017-05-10 14:27:47
         compiled from index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_radios', 'index.tpl', 16, false),array('function', 'html_options', 'index.tpl', 42, false),array('function', 'html_checkboxes', 'index.tpl', 77, false),array('modifier', 'default', 'index.tpl', 16, false),)), $this); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="container" style="display: none" class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="btn-warning my_button" onclick="$('#container').hide();
            return false;" ><span aria-hidden="true">&times;</span></button>
    <dvi id="container_info"></dvi>
</div>
<div class="col-sm-10">
     <h2>Форма объявления</h2>
<form id="myForm1" action="index.php" method="POST" class="form-horizontal">
   
    <input id="id" type="hidden" name="id" value="<?php echo $this->_tpl_vars['show_ads']->id; ?>
">
<div class="form-group">
    <div style="margin-left: 220">
    <div  id = "private" > <?php echo smarty_function_html_radios(array('class' => "radio-inline",'id' => 'private','name' => 'private','options' => $this->_tpl_vars['private_radios'],'selected' => ((is_array($_tmp=@$this->_tpl_vars['show_ads']->private)) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)),'separator' => ""), $this);?>
</div>
     </div>
    </div>

    <div class="form-group">
        <label for="seller_name" class="col-sm-2 control-label"><b>Ваше имя</b></label> 
        <div class="col-sm-3">
            <input  id ="seller_name" type="text" maxlength="40" class="form-control" value="<?php echo $this->_tpl_vars['show_ads']->seller_name; ?>
" name="seller_name" </input>
        </div>
    </div>

    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Электронная почта</label>
        <div class="col-sm-3">
            <input   class="form-control" id ="email" type="text"  value="<?php echo $this->_tpl_vars['show_ads']->email; ?>
" name="email">
        </div>
    </div>
    <div class="form-group">
        <label for="phone" class="col-sm-2 control-label">Номер телефона</label>
        <div class="col-sm-3">
            <input  class="form-control" id ="phone" type="text" value="<?php echo $this->_tpl_vars['show_ads']->phone; ?>
" name="phone"></div>
    </div>

    <div class="form-group">
        <label for="sity_id" class="col-sm-2 control-label">Выбирете город</label>
        <div class="col-sm-3">
            <?php echo smarty_function_html_options(array('class' => "form-control",'id' => 'sity_id','name' => 'sity_id','options' => $this->_tpl_vars['sity_options'],'selected' => $this->_tpl_vars['show_ads']->sity_id), $this);?>

        </div>
    </div>

    <div class="form-group">
        <label for="category_id" class="col-sm-2 control-label">Выбирете категорию</label>
        <div class="col-sm-3">
            <?php echo smarty_function_html_options(array('class' => "form-control",'id' => 'category_id','name' => 'category_id','options' => $this->_tpl_vars['category_options'],'selected' => $this->_tpl_vars['show_ads']->category_id), $this);?>

        </div>
    </div>
    <div class="form-group">
        <label for="title" class="col-sm-2 control-label">Название объявления</label>
        <div class="col-sm-3">
            <input id ="title" type="text" maxlength="50" class="form-control" value="<?php echo $this->_tpl_vars['show_ads']->title; ?>
" name="title">
        </div>
    </div>


    <div class="form-group">
        <label for="description" class="col-sm-2 control-label" >Описание объявления</label>
        <div class="col-sm-3">
            <textarea id="description" maxlength="6000" name="description" class="form-control"><?php echo $this->_tpl_vars['show_ads']->description; ?>
</textarea>
        </div>
    </div>

    <div class="form-group">
        <label id="price_lbl" for="price" class="col-sm-2 control-label">Цена</label>
        <div class="col-sm-3">
            <input type="text" maxlength="9" class="form-control" value="<?php echo $this->_tpl_vars['show_ads']->price; ?>
" name="price" id="price">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
                <label>
                    <?php echo smarty_function_html_checkboxes(array('class' => 'checkbox','id' => 'allow_mails','name' => 'allow_mails','options' => $this->_tpl_vars['allow_mails_names'],'selected' => $this->_tpl_vars['show_ads']->allow_mails,'separator' => "<br />"), $this);?>
 
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">

            <input id="submit_btn" type="submit"  class="btn btn-primary" value="Новое объявление" id="form_submit" name="add_ads" class="vas-submit-input">

        </div>
    </div>
</form>
                </div>



<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'ads_output.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

