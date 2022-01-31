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

function addToCart(productId, type = 0, companySlug = null) {
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
                if(type == 1) {
                    window.location.href = '/' + companySlug + '/payment/checkout';
                }
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

function updateCartQuantity(rowId, type, qty) {
    console.log(type)

    switch(type)
    {
        case 'plus':
            qty = parseInt(qty) + 1
        break
        case 'minus':
            qty = qty < 1 ? 0 : qty - 1
        break
    }

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': CSRF_TOKEN
        },
        url: `${AJAX_URL}/update/${rowId}/${qty}`,
        data: {
            rowId: rowId
        },
        type: "POST",
        success: function(response) {
            if(response.status) {
                updateCart(response.cart, response.cartSubTotal);
                toastFire('success', 'Ürün adedi başarıyla güncellendi!')

            } else {
                toastFire('error', 'Ürün adedi güncellenemedi, lütfen tekrar deneyiniz!')
            }
        },
        error: function(error) {
            toastFire('error', 'Ürün adedi güncellenemedi, lütfen tekrar deneyiniz!')
        }
    });
}

function updateCart(cart, subTotal) {
    var cartProducts = '';
    var cartModalProducts = '';

    $.each(cart, function(key, val) {
        cartProducts += "<li>\n" +
                "<div class=\"media\">\n" +
                "    <div class=\"media-left\">\n" +
                "        <img src=\"/storage/" + val.options.image + "\" style='width: 90px' alt=\"img\">\n" +
                "    </div>\n" +
                "    <div class=\"media-body\">\n" +
                "        <a class=\"title\" href=\"#\">" + val.name + "</a>\n" +
                "        <p>Adet: " + val.qty + "</p>\n" +
                "        <span class=\"price\">₺" + val.price * val.qty + "</span>\n" +
                "    </div>\n" +
                "</div>\n" +
                "<a class=\"remove-product\" onclick=\"removeFromCart('" + val.rowId + "'); return false\" href=\"#\"><span class=\"ti-close\"></span></a>\n" +
                "</li>"


        cartModalProducts += "" +
                "<tr>" +
                "    <td>" +
                "        <div class=\"media single-cart-product\">" +
                "            <div class=\"media-left\">" +
                "                <img src=\"/storage/" + val.options.image + "\" style='width: 90px' alt=\"img\">" +
                "            </div>" +
                "            <div class=\"media-body\">" +
                "                <span>" + val.name + "</span>" +
                "            </div>" +
                "        </div>" +
                "    </td>" +
                "    <td class=\"cart-product-price text-center\">₺" + val.price + "</td>" +
                "    <td class=\"text-center\">" +
                "        <div class=\"quantity-wrap\">" +
                "            <div class=\"quantity\">" +
                "                <input type=\"number\" step=\"1\" min=\"0\" max=\"100\" value=" + val.qty + " title=\"Qty\" class=\"input-text qty text\">" +
                "                <a class=\"inc qty-button\" onclick=\"updateCartQuantity('" + val.rowId + "', 'plus', '" + val.qty + "'); return false\">+</a>" +
                "                <a class=\"dec qty-button\" onclick=\"updateCartQuantity('" + val.rowId + "', 'minus', '" + val.qty + "'); return false\">-</a>" +
                "            </div>" +
                "        </div>" +
                "    </td>" +
                "    <td class=\"cart-product-price text-center\">₺" + val.price * val.qty + "</td>" +
                "    <td class=\"text-center\">" +
                "        <div class=\"cart-close\">" +
                "            <span class=\"ti-close\" onclick=\"removeFromCart('" + val.rowId + "'); return false\"></span>" +
                "        </div>" +
                "    </td>" +
                "</tr>"
    })

    $("#cart-products, #cart-products-m,#cart-modal-products,#cart-sub-total,#cart-sub-total-m,#cart-modal-sub-total").empty()
    $("#cart-sub-total,#cart-sub-total-m,#cart-modal-sub-total").append(subTotal).hide().show('slow');

    if(Object.keys(cart).length) {
        $("#cart-products, #cart-products-m").append(cartProducts).hide().show('slow');
        $("#cart-modal-products").append(cartModalProducts).hide().show('slow');
    } else {
        $("#cart-products, #cart-products-m").append('<li>Sepetinizde henüz ürün bulunamadı.</li>').hide().show('slow');
        $("#cart-modal-products").append('<tr><td>Sepetinizde henüz ürün bulunamadı.</td></tr>').hide().show('slow');
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
