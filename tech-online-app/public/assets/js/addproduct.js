
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$(document).ready(function() {
    $(document).on("submit", ".form-submit", function(e) {
        e.preventDefault();
        var edit_id = $(this).attr('data-id');
        var quantity = $('#product-' + edit_id).val();
        var url = $(this).attr('action');
        if (quantity > 0) {
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    _token: CSRF_TOKEN,
                    id: edit_id,
                    quantity: quantity,
                    add: 1
                },
                success: function(response) {
                    setTime('modal-success')
                    $('.header-cart-count').text(response.cartCount)
                }
                ,error: function(response) {
                    if(response.status == 401){
                        window.location.href = document.location.origin + '/login'
                    }
                    else setTime('modal-error')
                }
            });
        } else {
            setTime('modal-error')
        }
    });
})
