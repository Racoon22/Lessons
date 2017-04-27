




$(document).ready(function () {

    function showResponse(response) {
        if ($('#id').val() == "") {
            $('#ads>tbody').append(response.tovar);
            console.log(response);

        } else {
            var id_ads = $('#id').attr('value');
            $("#ad" + id_ads).replaceWith(response.tovar);
            console.log(response);
            console.log(id_ads);
        }


        if (response.status == 'success') {
            $('#container').removeClass('alert-warning').addClass('alert-success');
            $('#container_info').html(response.message);
            $('#container').fadeIn('slow');
            if ($('#container_info').html(response.warning).html() == "Объявлений больше нет") {
                $('#container').removeClass('alert-warning').addClass('alert-danger');
            }
        } else if (response.status == 'error') {
            $('#container').removeClass('alert-warning').addClass('alert-danger');
            $('#container_info').html(response.message);
            $('#container').fadeIn('slow');
        }
        $("#myForm1").find("input[type=text],textarea").val('');
        $("#sity_id").val('1').prop("checked", true);
        $("#category_id").val('1').prop("checked", true);
        $("#private").val('0').prop("checked", true);
        $("#allow_mails").prop("checked", false);
        $(this).remove();


    }
    ;



    var id_row = $('tbody tr:last-child td').html();
    var num_row = parseInt(id_row.replace(/\D+/g, "")) + 1;
    console.log(num_row);
    var options = {
        target: '#container_info', // target element(s) to be updated with server response 
//        beforeSubmit:  showRequest,  // pre-submit callback 
        success: showResponse, // post-submit callback 

        // other available options: 
        url: 'example.php?num=' + num_row + '&action=insert&', // override for form's 'action' attribute 
        //type:      type        // 'get' or 'post', override for form's 'method' attribute 
        dataType: 'json', // 'xml', 'script', or 'json' (expected server response type) 
        clearForm: false, // clear all form fields after successful submit 
        resetForm: false, // reset the form after successful submit 

        // $.ajax options can be used here too, for example: 
        //timeout:   3000 
    };

    // bind form using 'ajaxForm' 
    $('#myForm1').ajaxForm(options);

    $(document).on('click', 'a.delete', function () {
        var tr = $(this).closest('tr');
        var id = tr.attr('id');
        var num = parseInt(id.replace(/\D+/g, ""));
        var name = $(this).closest('tr').children('td:nth-child(2)').children('a').html();

        var test = {"id": num, "name": name};
        $.getJSON('example.php?action=delete&',
                test,
                function (response) {
                    tr.fadeOut('slow', function () {
                        if (response.status == 'success') {
                            $('#container').removeClass('alert-warning').addClass('alert-success');
                            $('#container_info').html(response.message);
                            $('#container').fadeIn('slow');
                            if ($('#container_info').html(response.warning).html() == "Объявлений больше нет") {
                                $('#container').removeClass('alert-warning').addClass('alert-danger');
                            }
                        } else if (response.status == 'error') {
                            $('#container').removeClass('alert-warning').addClass('alert-danger');
                            $('#container_info').html(response.message);
                            $('#container').fadeIn('slow');
                        }
                        $("#myForm1").find("input[type=text],textarea").val('');
                        $("#sity_id").val('1').prop("checked", true);
                        $("#category_id").val('1').prop("checked", true);
                        $("#private").val('0').prop("checked", true);
                        $("#allow_mails").prop("checked", false);
                        $(this).remove();


                    });
                });
    });


    $(document).on('click', 'a.show', function () {
        var tr = $(this).closest('tr');
        var id = tr.attr('id');
        var num = parseInt(id.replace(/\D+/g, ""));
        var name = $(this).closest('tr').children('td:nth-child(2)').children('a').html();

        var test = {"id": num, "name": name};
        $.getJSON('example.php?action=show',
                test,
                function (response) {
                    if (response.status == 'success') {
                        $('#container').removeClass('alert-warning').addClass('alert-success');
                        $('#container_info').html(response.message);
                        $('#container').fadeIn('slow');
                        if ($('#container_info').html(response.warning).html() == "Объявлений больше нет") {
                            $('#container').removeClass('alert-warning').addClass('alert-danger');
                        }
                    } else if (response.status == 'error') {
                        $('#container').removeClass('alert-warning').addClass('alert-danger');
                        $('#container_info').html(response.message);
                        $('#container').fadeIn('slow');
                    }
                    $(this).remove();

                    $("#id").val(response.id);
                    $("#private").val(response.private).prop("checked", true);
                    $("#seller_name").val(response.seller_name);
                    $("#email").val(response.email);
                    $("#phone").val(response.phone);
                    $("#sity_id").val(response.sity_id).prop("checked", true);
                    $("#sity_id").val(response.sity_id).prop("checked", true);
                    $("#category_id").val(response.category_id).prop("checked", true);
                    $("#title").val(response.title);
                    $("#price").val(response.price);
                    $("#description").val(response.description);
                    if (response.allow_mails == '1') {
                        $("#allow_mails").prop("checked", true);
                    } else {
                        $("#allow_mails").prop("checked", false);
                    }


//                    Очистка формы
//                    $("#myForm1").find("input[type=text],textarea").val('');
//                    $("#sity_id").val('1').prop("checked", true);
//                    $("#category_id").val('1').prop("checked", true);
//                    $("#private").val('0').prop("checked", true);
//                    $("#allow_mails").prop("checked", false);



                });
    });
});


