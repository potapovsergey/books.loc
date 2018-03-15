$('.books-view').on('click',function (e) {
    $(this).each(function () {
        e.preventDefault();
        var id = $(this).data('id');
        document.location.href = '/main/books?id=' + id;
    });
});