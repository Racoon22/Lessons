
{include file='header.tpl'}

<br>

<form action="index.php" method="POST">
    <input type="hidden" name="id" value="{$smarty.get.id}">
    {html_radios name="private" options=$private_radios selected=$show_ads->private separator=""}
    <p><label><b id="your-name">Ваше имя</b>
            <input type="text" maxlength="40" class="form-input-text" value="{$show_ads->seller_name}" name="seller_name" id="fld_seller_name"</input></label></p> 

    <p><label>Электронная почта
            <input type="text"  value="{$show_ads->email}" name="email" id="fld_email"></label></p>
    <p><label>Номер телефона
            <input type="text" value="{$show_ads->phone}" name="phone" id="fld_phone"></label></p>
    <p><label>Выбирете город

            {html_options name="sity_id" options=$sity_options selected=$show_ads->sity_id}
            </select>
        </label>
        <br>
    <p><label>Выбирете категорию
            {html_options name="category_id" options=$category_options selected=$show_ads->category_id}
        </label>
    <p><label>Название объявления
            <input type="text" maxlength="50" class="form-input-text-long" value="{$show_ads->title}" name="title" id="fld_title"></label></p>
    <p><label for="fld_description" class="form-label" id="js-description-label">Описание объявления 
            <textarea maxlength="6000" name="description" id="fld_description" class="form-input-textarea">{$show_ads->description}</textarea></label></p> 

    <p><label id="price_lbl" for="fld_price" class="form-label">Цена
            <input type="text" maxlength="9" class="form-input-text-short" value="{$show_ads->price}" name="price" id="fld_price">&nbsp;<span>руб.</span></label></p>
            {html_checkboxes name="allow_mails" options=$allow_mails_names selected=$show_ads->allow_mails separator="<br />"}   


    <p><input type="submit"  class="btn btn-primary" value="{if isset($smarty.get.id)}Сохранить объявление{else}
              Новое объявление{/if}" id="form_submit" name="add_ads" class="vas-submit-input"></p></form>

{if (isset($ads)) && (!empty($ads))}
    {include file='ads_output.tpl'}
{/if}
{include file='footer.tpl'}


