$(function() {
    $(`button.btn-edit`).on('click', function() {
        showPopupYesNo('', 'Bạn có chắc muốn thay đổi?', 'Ok', 'Cancel', function() {
            $('form#form-edit-table').submit();
        })
    })
})
