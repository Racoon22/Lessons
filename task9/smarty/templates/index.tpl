
{include file='header.tpl'}

 {$id}<br>
 
 <form action="index.php" method="POST">
     <input type="hidden" name="id" value="{$smarty.get.id}">
{html_radios name="private" options=$private_radios selected=$ad.private separator=""}
<p><label><b id="your-name">Ваше имя</b></label>
                <input type="text" maxlength="40" class="form-input-text" value="{$ad.seller_name}" name="seller_name" id="fld_seller_name"</input></p>  
<p><labe>Электронная почта</label>
                <input type="text"  value="{$ad.email}" name="email" id="fld_email"></p>
<p><label>Номер телефона</label>
                 <input type="text" value="{$ad.phone}" name="phone" id="fld_phone"></p>
<p><label>Выбирете город</label>

   {html_options name="sity_id" options=$sity_options selected=$ad.sity_id}
</select>
<br>
<p><label>Выбирете категорию</label>

   {html_options name="category_id" options=$category_options selected=$ad.category_id}

<p><label>Название объявления</label> 
        <input type="text" maxlength="50" class="form-input-text-long" value="{$ad.title}" name="title" id="fld_title"></p>
    <p><label for="fld_description" class="form-label" id="js-description-label">Описание объявления</label> 
        <textarea maxlength="6000" name="description" id="fld_description" class="form-input-textarea">{$ad.description}</textarea></p> 

    <p><label id="price_lbl" for="fld_price" class="form-label">Цена</label> 
    <input type="text" maxlength="9" class="form-input-text-short" value="{$ad.price}" name="price" id="fld_price">&nbsp;<span>руб.</span></p>
{html_checkboxes name="allow_mails" options=$allow_mails_names selected=$ad.allow_mails separator="<br />"}   


<p><input type="submit" value="{$add_ads_id}" id="form_submit" name="add_ads" class="vas-submit-input"></p></form>

{if (isset($ads)) && (!empty($ads))}
 {include file='ads_output.tpl'}
{/if}
{include file='footer.tpl'}


