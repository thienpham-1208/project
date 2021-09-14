require('./create');
require('./edit');

$(function() {
    $('.pagination a').on('click', function(e) {
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        console.log(page);
        getPosts(page);
    });

    function getPosts(page) {
        axios.get(`?page=${page}`)
            .then(function(response) {
                console.log(response);
                $('body').html(response.data);
            })
    }
    $('.fa-lock').click(function(e) {
        var el = $(this);
        var id = el.parents('span').attr('attr-dish-id');
        axios.post(laroute.route('admin.dish.update.display', { 'id': id }))
            .then(function(response) {
                el.hide();
                el.parents('span').find('.fa-unlock-alt').show();
            })
    })
    $('.fa-unlock-alt').click(function(e) {
        var el = $(this);
        var id = el.parents('span').attr('attr-dish-id');
        axios.post(laroute.route('admin.dish.update.display', { 'id': id }))
            .then(function(response) {
                el.hide();
                el.parents('span').find('.fa-lock').show();
            })
    })
    $('.fa-trash-o').on('click', function(e) {
        e.preventDefault();
        var form = $(this).parents('span').find('form');
        showPopupYesNo('', 'Bạn có chắc chắn muốn xóa?', 'Ok', 'Cancel', function() {
            form.submit();
        })
    });
})
