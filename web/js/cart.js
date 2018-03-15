/**
 * Created by user on 14.05.2017.
 */
jQuery('document').ready(function () {
    function showCart(cart) {
        $('#cart .modal-body').html(cart);
        $('#cart').modal();
    }

    $('.clear-cart').on('click',function () {
        $(this).each(function () {
            $.ajax({
                url: '/cart/clear',
                type: "POST",
                success: function(res){
                    if (!res) alert('Error');
                    showCart(res);
                },
                error: function () {
                    alert('Error');
                }
            });
        });
    });

    $('.delete-item').on('click',function (e) {
        $(this).each(function () {
            e.preventDefault();
            alert("!!");
            var id  = $(this).data('id');
            $.ajax({
                url: '/cart/delete',
                data: {id: id},
                type: "POST",
                success: function(res){
                    if (!res) alert('Error');
                    showCart(res);
                },
                error: function () {
                    alert('Error');
                }
            });
        });
    });

    $('.show-cart').on('click',function (e) {
        $(this).each(function () {
            e.preventDefault();
            $.ajax({
                url: '/cart/show',
                type: "POST",
                success: function(res){
                    if (!res) alert('Error');
                    showCart(res);
                },
                error: function () {
                    alert('Error');
                }
            });
        });
    });

    $('.cart_add').on('click',function (e) {
        $(this).each(function () {
            e.preventDefault();
            var id  = $(this).data('id');
            $.ajax({
                url: '/cart/add',
                data: {id: id},
                type: "POST",
                success: function(res){
                    if (!res) alert('Error');
                    showCart(res);
                },
                error: function () {
                    alert('Error');
                }
            });
        });
    });
});