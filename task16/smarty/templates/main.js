$(document).ready(function () {
    $('a.btn-danger').on('click', function () {
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
                        $(this).remove();
                        $("#myform").find("input[type=text],textarea").val('');
                        $("#sity_id").val('1').prop("checked", true);
                        $("#category_id").val('1').prop("checked", true);
                        $("#private").val('0').prop("checked", true);
                        $("#allow_mails").prop("checked", false);

                    });
                });

    });
});


