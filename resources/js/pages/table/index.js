require('./edit');

$(function() {
    $('.fa-trash-o').click(function(e) {
        showPopupYesNo('', 'Bạn có chắc muốn xóa?', 'Ok', 'Cancel', function() {
            $(this).parents('span').find('form').submit();
        })
    })
})
