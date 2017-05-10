
{include file='header.tpl'}

<div id="container" style="display: none" class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="btn-warning my_button" onclick="$('#container').hide();
            return false;" ><span aria-hidden="true">&times;</span></button>
    <dvi id="container_info"></dvi>
</div>
<div class="col-sm-10">
     <h2>Форма объявления</h2>
<form id="myForm1" action="index.php" method="POST" class="form-horizontal">
   
    <input id="id" type="hidden" name="id" value="{$show_ads->id}">
<div class="form-group">
    <div style="margin-left: 220">
    <div  id = "private" > {html_radios class="radio-inline" id ="private"   name="private" options=$private_radios selected=$show_ads->private|default:0 separator=""}</div>
     </div>
    </div>

    <div class="form-group">
        <label for="seller_name" class="col-sm-2 control-label"><b>Ваше имя</b></label> 
        <div class="col-sm-3">
            <input  id ="seller_name" type="text" maxlength="40" class="form-control" value="{$show_ads->seller_name}" name="seller_name" </input>
        </div>
    </div>

    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Электронная почта</label>
        <div class="col-sm-3">
            <input   class="form-control" id ="email" type="text"  value="{$show_ads->email}" name="email">
        </div>
    </div>
    <div class="form-group">
        <label for="phone" class="col-sm-2 control-label">Номер телефона</label>
        <div class="col-sm-3">
            <input  class="form-control" id ="phone" type="text" value="{$show_ads->phone}" name="phone"></div>
    </div>

    <div class="form-group">
        <label for="sity_id" class="col-sm-2 control-label">Выбирете город</label>
        <div class="col-sm-3">
            {html_options class="form-control" id ="sity_id" name="sity_id" options=$sity_options selected=$show_ads->sity_id}
        </div>
    </div>

    <div class="form-group">
        <label for="category_id" class="col-sm-2 control-label">Выбирете категорию</label>
        <div class="col-sm-3">
            {html_options class="form-control" id ="category_id" name="category_id" options=$category_options selected=$show_ads->category_id}
        </div>
    </div>
    <div class="form-group">
        <label for="title" class="col-sm-2 control-label">Название объявления</label>
        <div class="col-sm-3">
            <input id ="title" type="text" maxlength="50" class="form-control" value="{$show_ads->title}" name="title">
        </div>
    </div>


    <div class="form-group">
        <label for="description" class="col-sm-2 control-label" >Описание объявления</label>
        <div class="col-sm-3">
            <textarea id="description" maxlength="6000" name="description" class="form-control">{$show_ads->description}</textarea>
        </div>
    </div>

    <div class="form-group">
        <label id="price_lbl" for="price" class="col-sm-2 control-label">Цена</label>
        <div class="col-sm-3">
            <input type="text" maxlength="9" class="form-control" value="{$show_ads->price}" name="price" id="price">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
                <label>
                    {html_checkboxes  class="checkbox" id="allow_mails" name="allow_mails" options=$allow_mails_names selected=$show_ads->allow_mails separator="<br />"} 
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



{include file='ads_output.tpl'}

{include file='footer.tpl'}


