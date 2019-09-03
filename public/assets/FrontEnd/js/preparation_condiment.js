var preparation, condiments, checked;

jQuery(document).ready(function ($) {

    "use strict";
    //Click function in html page==========

    /*
     * add-to-cart-with-preparation=============
     */
    $('.add-to-cart-with-preparation').click(function (e) {
        if (checked.checkbox("Preparation")) {
            preparation.add();
        }
    });

    /*
     * Condiments page=============
     */
    $('.preparation-next').click(function (e) {
        if (checked.checkbox("Preparation")) {
            condiments.show();
        }
    });


    /*
     * add-to-cart-with-condiments=============
     */
    $('.add-to-cart-with-condiments').click(function (e) {
        if (checked.checkbox("Condiments")) {
            condiments.add();
        }
    });



    /*
     * Preparation=========
     * Preparation=========
     */
    preparation = {
        // Added in cart
        add: function () {
            $.ajax({
                type: 'POST',
                url: '/addToCartWithPreparation',
                data: $('#preparation-form').serialize(),
                dataType: "JSON",
                success: function (data) {
                    location.reload();
                }
            });
        }
    }



    /*
     * Condiments=========
     * Condiments=========
     */
    condiments = {
        // condiments page show======
        show: function () {
            $.ajax({
                type: 'POST',
                url: '/preparationNext',
                data: $('#preparation-form').serialize(),
                dataType: "HTML",
                success: function (data) {
                    $('.carList').html(data);
                }
            });
        },

        // Added in cart
        add: function () {
            $.ajax({
                type: 'POST',
                url: '/addToCartWithCondiments',
                data: $('#condiments-form').serialize(),
                dataType: "JSON",
                success: function (data) {
                    location.reload();
                }
            });
        }
    }




    /*
     * Checked=========
     * Checked=========
     */
    checked = {
        checkbox: function (portion) {
            var checkCheckbox = $('input:checkbox:checked').length;
            if (checkCheckbox > 0) {
                return true;
            } else {
                validationMessage("Please select minimum 1 " + portion);
                return false;
            }
        }
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

});
