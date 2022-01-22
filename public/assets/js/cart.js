"use strict";
const AJAX_URL = '/ajax/cart';
const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 6000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })

function addToCart(productId) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': CSRF_TOKEN
        },
        url: `${AJAX_URL}/add/${productId}`,
        data: {
            productId: productId
        },
        type: "POST",
        success: function(response) {
            if(response.status) {
                updateCart(response.cart, response.cartSubTotal);
                toastFire('success', 'Ürün sepetinize başarıyla eklendi!')
            } else {
                toastFire('error', 'Ürün sepete eklenemedi, lütfen tekrar deneyiniz!')
            }
        },
        error: function(error) {
            toastFire('error', 'Ürün sepete eklenemedi, lütfen tekrar deneyiniz!')
        }
    });
}

function removeFromCart(rowId) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': CSRF_TOKEN
        },
        url: `${AJAX_URL}/remove/${rowId}`,
        data: {
            rowId: rowId
        },
        type: "POST",
        success: function(response) {
            if(response.status) {
                updateCart(response.cart, response.cartSubTotal);
                toastFire('warning', 'Ürün sepetten başarıyla çıkarıldı!')

            } else {
                toastFire('error', 'Ürün sepetten çıkarılamadı, lütfen tekrar deneyiniz!')
            }
        },
        error: function(error) {
            toastFire('error', 'Ürün sepetten çıkarılamadı, lütfen tekrar deneyiniz!')
        }
    });
}

function updateCart(cart, subTotal) {
    var cartProducts = '';

    $.each(cart, function(key, val) {
        cartProducts += "<li>\n" +
                "<div class=\"media\">\n" +
                "    <div class=\"media-left\">\n" +
                "        <img src=\"/storage/" + val.options.image + "\" alt=\"img\">\n" +
                "    </div>\n" +
                "    <div class=\"media-body\">\n" +
                "        <a class=\"title\" href=\"#\">" + val.name + "</a>\n" +
                "        <p>Adet: " + val.qty + "</p>\n" +
                "        <span class=\"price\">₺" + val.price * val.qty + "</span>\n" +
                "    </div>\n" +
                "</div>\n" +
                "<a class=\"remove-product\" onclick=\"removeFromCart('" + val.rowId + "'); return false\" href=\"#\"><span class=\"ti-close\"></span></a>\n" +
                "</li>"
    })

    $("#cart-products").empty()
    $("#cart-sub-total").empty()

    $("#cart-sub-total").append(subTotal)

    if(Object.keys(cart).length) {
        $("#cart-products").append(cartProducts)
    } else {
        $("#cart-products").append('<li> Sepetinizde henüz ürün bulunamadı. </li>')
    }
}

function toastFire(icon, title, html = null) {
    return Toast.fire({
        title: title,
        html: html,
        icon: icon,
        timer: 1000,
        timerProgressBar: true,
        confirmButtonText: 'OK'
    })
}
