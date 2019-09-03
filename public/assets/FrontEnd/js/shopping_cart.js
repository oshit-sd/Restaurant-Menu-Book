var cart, update, alertMsg;

jQuery(document).ready(function ($) {

    "use strict";
    //Click function in html page==========

    /*
     * add to cart=============
     */
    $('.add-to-cart').click(function (e) {
        let menuID = $(this).attr('menuID');
        let rowID = $(this).attr('rowID');
        let portion = $(this).attr('portion');
        let cateId = $("#categoryId").val();

        if (portion == "cartList") {
            let qty = $(".itemQty2_" + menuID).val();
            $(".itemQty2_" + menuID).val(parseInt(qty) + 1);
        }
        else if (portion == "Home") {
            let qty = $(".QtyInput_" + menuID).val();
            $(".QtyInput_" + menuID).val(parseInt(qty) + 1);
        }

        cart.add(menuID, cateId, portion);
    });

    /*
     * remove to cart=============
     */
    $('.remove-to-cart').click(function (e) {
        let rowID = $(this).attr('rowID');
        let portion = $(this).attr('portion');

        if (portion == "cartList") {
            var qty = $(".itemQty_" + rowID).val();
            if (parseInt(qty) > 0) {
                $(".itemQty_" + rowID).val(parseInt(qty) - 1);
                var ddataType = "HTML";
            }

        } else if (portion == "Home") {
            var qty = $(".cartQty_" + rowID).val();
            if (parseInt(qty) > 0) {
                $(".cartQty_" + rowID).val(parseInt(qty) - 1);
                var ddataType = "JSON";
            }
        }

        cart.remove(qty, rowID, portion, ddataType);
    });


    /*
     * single item qty page=============
     */
    $('.qty-page').click(function (e) {
        let rowID = $(this).attr('rowID');
        cart.qtyPage(rowID);
    });


    /*
     * remove single qty=============
     */
    $('.remove-qty').click(function (e) {
        let rowID = $(this).attr('rowID');
        let qty = $(this).attr('qty');
        let totalQty = $(this).attr('totalQty');
        alertMsg.error('Are you sure want to delete ?', rowID, qty, totalQty);
    });

    /*
         * enhancement page in cart list=============
         */
    $('.enhancement-page').click(function (e) {
        let rowID = $(this).attr('rowID');
        enhance.show(rowID);
    });


    /*
     * confirm order=============
     */
    $('.confirm-order').click(function (e) {
        cart.confirm_order();
    });

    /*
     * Shopping Cart Added=========
     * Shopping Cart Added=========
     */
    cart = {
        // added in cart
        add: function (menuID, cateId, portion = null) {
            $.ajax({
                type: "get",
                url: "/addToCart/" + menuID + "/" + cateId,
                dataType: "HTML",
                success: function (data) {
                    update.qty_subtotal(JSON.parse(data), null, portion);
                    if (data.error) {
                        errorMessage(data.error);
                    }
                }
            });
        },

        // remove to cart
        remove: function (qty, rid, portion, ddataType) {
            if (parseInt(qty) > 0) {
                $.ajax({
                    type: "get",
                    url: "/removeToCart/" + rid,
                    data: { portion: portion, qty: qty },
                    dataType: ddataType,
                    success: function (data) {
                        update.qty_subtotal(data, rid, portion);
                    }
                });
            }
        },

        // single item qty page
        qtyPage: function (rid) {
            $.ajax({
                type: "get",
                url: "/singleItemQtyPage/" + rid,
                dataType: "html",
                success: function (data) {
                    $(".carList").html(data);
                }
            });
        },

        //remove single qty
        removeSingleQty: function (rowID, qty, totalQty) {
            $.ajax({
                type: "get",
                url: "/removeSingleQty/" + rowID,
                data: { qty: qty, totalQty: totalQty },
                dataType: "JSON",
                success: function (data) {
                    setTimeout(function () {
                        location.reload();
                    }, 500);
                }
            });
        },

        // Confirm Order
        confirm_order: function () {
            $.ajax({
                type: "get",
                url: "/confirm/order",
                dataType: "JSON",
                success: function (data) {
                    if (data.success) {
                        successMessage(data.success);
                    }
                    if (data.error) {
                        errorMessage(data.error);
                    }
                }
            });
        }

    };


    /*
     * update=============
     * update=============
     */
    update = {
        qty_subtotal: function (data, rid = null, portion) {
            if (portion == "cartList") {
                $(".carList").html(data);

                let totalQty = $("#cartlistTotalQty").val()
                let subTotal = $("#cartlistSubtotal").val()
                if (totalQty == undefined && subTotal == undefined) {
                    totalQty = 0; subTotal = 0;
                    location.reload();
                }

                $(".cartQty").html(totalQty);
                $(".subTotal").html(subTotal);

            } else if (portion == "Home") {
                $(".cartQty").html(data.totalQty);
                $(".subTotal").html("$" + data.subTotal);
            }
        },
    };


    /*
     * alert=============
     * alert=============
     */
    alertMsg = {
        error: function (msg, rowID, qty, totalQty) {
            swal({
                text: msg,
                icon: "warning",
                buttons: true,
                dangerMode: true
            }).then(willDelete => {
                if (willDelete) {
                    cart.removeSingleQty(rowID, qty, totalQty);
                }
            });
            $(".swal-overlay").css("background-color", "rgba(202, 68, 88, 0.41)");
            $(".swal-footer").css("background-color", "rgb(245, 248, 250)");
            $(".swal-button").css("padding", "7px 20px");
            $(".swal-footer").css("border-top", "1px solid #E9EEF1");
            $(".swal-footer").css("overflow", "hidden");
            $(".swal-footer").css("margin-top", "10px");
            $(".swal-text").css("color", "red");
        }
    };

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

});