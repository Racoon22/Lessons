
{include file='header.tpl'}

<div id="container" style="display: none" class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="btn btn-warning btn-sm" onclick="$('#container').hide();return false;" style="float: right"><span aria-hidden="true">&times;</span></button>
    <dvi id="container_info"></dvi>
</div>

<form id="myForm1" action="index.php" method="POST" >
    <input id="id" type="hidden" name="id" value="{$show_ads->id}">
    <div class="form-group"> {html_radios id ="private"   name="private" options=$private_radios selected=$show_ads->private|default:0 separator=""}</div>

    <p><label><b id="your-name">Ваше имя</b> 
            <input id ="seller_name" type="text" maxlength="40" class="form-input-text" value="{$show_ads->seller_name}" name="seller_name" </input></label></p> 

    <p><label>Электронная почта
            <input  id ="email" type="text"  value="{$show_ads->email}" name="email"></label></p>
    <p><label>Номер телефона
            <input id ="phone" type="text" value="{$show_ads->phone}" name="phone"></label></p>
    <p><label>Выбирете город

            {html_options  id ="sity_id" name="sity_id" options=$sity_options selected=$show_ads->sity_id}
            </select>
        </label>
        <br>
    <p><label>Выбирете категорию
            {html_options id ="category_id" name="category_id" options=$category_options selected=$show_ads->category_id}
        </label>
    <p><label>Название объявления
            <input id ="title" type="text" maxlength="50" class="form-input-text-long" value="{$show_ads->title}" name="title"></label></p>
    <p><label for="fld_description" class="form-label" >Описание объявления 
            <textarea id="description" maxlength="6000" name="description" class="form-input-textarea">{$show_ads->description}</textarea></label></p> 

    <p><label id="price_lbl" for="fld_price" class="form-label">Цена
            <input type="text" maxlength="9" class="form-input-text-short" value="{$show_ads->price}" name="price" id="price">&nbsp;<span>руб.</span></label></p>
          {html_checkboxes id="allow_mails" name="allow_mails" options=$allow_mails_names selected=$show_ads->allow_mails separator="<br />"}  

    <p><input type="submit"  class="btn btn-primary" value="{if ($smarty.get.id == 'show ')}Сохранить объявление{else}
                Новое объявление{/if}" id="form_submit" name="add_ads" class="vas-submit-input"></p></form>


{if (isset($ads)) && (!empty($ads))}
    {include file='ads_output.tpl'}
{/if}
{include file='footer.tpl'}


