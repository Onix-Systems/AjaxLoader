$(function () {
    $(document).ajaxStart(function () {
        $("#ajaxSpinnerImage").show();
        $(".spinner-backdrop").show();
    }).ajaxStop(function () {
        $("#ajaxSpinnerImage").hide();
        $(".spinner-backdrop").hide();
    });
});