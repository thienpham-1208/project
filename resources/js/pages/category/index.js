$(function() {
    $('.link-delete-category').on('click', function(e) {
        e.preventDefault();
        var form = $(this).closest('td').find('form');
        showPopupYesNo('', "Bạn có chắc muốn xóa?", "Xóa", "Không", function(e) {
            form.submit();
        })
    });
})
