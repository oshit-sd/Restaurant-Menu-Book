var enhance;

jQuery(document).ready(function ($) {

    "use strict";
    //Click function in html page==========

    /*
     * individual qty page=============
     */
    $('.individual-qty-page').click(function (e) {
        let rowID = $(this).attr('rowID');
        let qty = $(this).attr('qty');
        enhance.qtyPage(rowID, qty);
    });


    /*
     * confirm button=============
     */
    $('.confirm').click(function (e) {
        enhance.add();
    });



    /*
     * Enhancement=========
     * Enhancement=========
     */
    enhance = {
        // individual qty page show
        qtyPage: function (rowID, qty) {
            $.ajax({
                type: 'get',
                url: '/itemEnhancement/' + rowID + '/' + qty,
                dataType: "html",
                success: function (data) {
                    if (data) {
                        $('#Show').html(data);
                    } else {
                        alert("Sorry!! something went wrong")
                    }
                }
            });
        },

        // added in cart
        add: function () {
            $.ajax({
                type: 'post',
                url: '/submitEnhance',
                data: $('#EnhanceForm').serialize(),
                dataType: "html",
                success: function (data) {
                    if (data) {
                        $('#Show').html(data);
                        var tab_id = $('.activeTab').val();

                        $('ul.tabs li').removeClass('current');
                        $('.tab-content').removeClass('current');

                        $("." + tab_id).addClass('current');
                    } else {
                        alert("Sorry!! something went wrong")
                    }
                }
            });
        },


        // enhacement page show in cartlist
        show: function (rid) {
            $.ajax({
                type: "get",
                url: "/itemEnhancement/" + rid + "/1",
                dataType: "HTML",
                success: function (data) {
                    $(".carList").html(data);
                }
            });
        },
    }


    // tabs=================
    $('ul.tabs li').click(function () {
        var tab_id = $(this).attr('data-tab');

        $('.activeTab').val(tab_id);

        $('ul.tabs li').removeClass('current');
        $('.tab-content').removeClass('current');

        $(this).addClass('current');
        $("." + tab_id).addClass('current');
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

});
