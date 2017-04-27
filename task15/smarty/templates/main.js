$(document).ready(function () {
    $('a.btn-danger').on('click', function () {
        var tr = $(this).closest('tr');
        var id = $(this).closest('tr').attr('id');
        var num = parseInt(id.replace(/\D+/g, ""));
        var form = $('#myform').attr('id');

        tr.hide('slow', function () {
            $(this).remove();

        });
        $('#container').load('example.php?action=delete&id=' + num, function () {
            $("#myform").find("input[type=text],textarea").val('');
            $("#sity_id").val('1').prop("checked", true);
            $("#category_id").val('1').prop("checked", true);
            $("#private").val('0').prop("checked", true);
            $("#allow_mails").prop("checked", false);
        });

    });
});


