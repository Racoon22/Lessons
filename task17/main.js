function clearForm() {
    $("#myForm1").find("input[type=text],textarea").val('');
    $("#sity_id").val('1').prop("checked", true);
    $("#id").val('');
    $("#category_id").val('1').prop("checked", true);
    $('#private :input[value="0"]').prop("checked", true);
    $("#allow_mails").prop("checked", false);
    $("#submit_btn").val("Новое объявление");
}

function numRow() {
    var i = 0;
    $("tr td.number_row").each(function () {
        $(this).html(++i);

    });
}
$(document).ready(function () {

    function showResponse(response) {
        var num_row = $("tr.tr").length + 1;
        var str = "<tr id=ad" + response.id + " class='tr'><td class='number_row' align = center height=50>" + num_row + "</td>    <td align = center height=50><a class='title show'>" + response.title + "</a></td>    <td class='price' align = center height=50>" + response.price + "</td>  <td class='seller_name' align = center height=50>" + response.seller_name + "</td>  <td align = center height=50><a class='delete btn btn-danger'>Удалить</a></td> </tr>";


        if ($('#id').val() == "") {
            $('#ads>tbody').append(str);
        } else {
            $("#ad" + response.id + " > td > a.title").html(response.title);
            $("#ad" + response.id + " > td.price").html(response.price);
            $("#ad" + response.id + " > td.seller_name").html(response.seller_name);
        }
        clearForm();
        numRow();
        if (response.status == 'success') {
            if ($('#container').hasClass("alert-danger")) {
                $('#container').removeClass('alert-danger').addClass('alert-success');
            }
            $('#container_info').html(response.message);
            $('#container').fadeIn('slow');

        } else if (response.status == 'error') {
            $('#container').removeClass('alert-success').addClass('alert-danger');
            $('#container_info').html(response.message);
            $('#container').fadeIn('slow');
        }
    }
    var options = {
        target: '#container_info',
        success: showResponse,
        url: 'ajax.php?action=insert&',
        dataType: 'json',
        clearForm: false,
        resetForm: false,
    };
    $('#myForm1').ajaxForm(options);
    $("#submit_btn").on('click', function () {

    });
});
$(document).on('click', 'a.delete', function () {
    var tr = $(this).closest('tr');
    var id = tr.attr('id');
    var num = parseInt(id.replace(/\D+/g, ""));
    var name = $(this).closest('tr').children('td:nth-child(2)').children('a').html();
    var test = {"id": num, "name": name};
    $.getJSON('ajax.php?action=delete&',
            test,
            function (response) {
                tr.fadeOut('slow', function () {
                    if (response.status == 'success') {
                        $('#container_info').html(response.message);
                        $('#container').fadeIn('slow');
                        if ($('#container_info').html(response.warning).html() == "Объявлений больше нет") {
                            $('#container').removeClass('alert-warning').addClass('alert-danger');
                        }
                    } else if (response.status == 'error') {
                        $('#container').removeClass('alert-success').addClass('alert-danger');
                        $('#container_info').html(response.message);
                        $('#container').fadeIn('slow');
                    }
                    clearForm();

                    $(this).remove();
                    numRow();
                });

            });

});

$(document).on('click', 'a.show', function () {
    var tr = $(this).closest('tr');
    var id = tr.attr('id');
    var num = parseInt(id.replace(/\D+/g, ""));
    var name = $(this).closest('tr').children('td:nth-child(2)').children('a').html();
    var id_name = {"id": num, "name": name};
    $.getJSON('ajax.php?action=show',
            id_name,
            function (response) {
                if (response.status == 'success') {
//                    $('#container').removeClass('alert-warning').addClass('alert-success');
//                    $('#container_info').html(response.message);
//                    $('#container').fadeIn('slow');
//                    if ($('#container_info').html(response.warning).html() == "Объявлений больше нет") {
//                        $('#container').removeClass('alert-warning').addClass('alert-danger');
//                    }
                } else if (response.status == 'error') {
                    $('#container').removeClass('alert-success').addClass('alert-danger');
                    $('#container_info').html(response.message);
                    $('#container').fadeIn('slow');
                }
                $(this).remove();
                    $("#id").val(response.id);
                    if (response.private == "0") {
                        $('#private :input[value="0"]').prop("checked", true);
                    } else {
                        $('#private :input[value="1"]').prop("checked", true);
                    }
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
                    $("#submit_btn").val("Сохранить объявление");
                    if (response.allow_mails == '1') {
                        $("#allow_mails").prop("checked", true);
                    } else {
                        $("#allow_mails").prop("checked", false);
                    }

                });
            });





