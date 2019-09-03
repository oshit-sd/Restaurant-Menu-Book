
$(document).ready(function() {

    $('.fancybox').fancybox({

    padding: 0,

        openEffect : 'elastic',

        openSpeed  : 150,

        closeEffect : 'elastic',

        closeSpeed  : 150,

        maxWidth    : "60%",

        autoSize    : true,

        autoScale   : true,

        fitToView   : true,

        helpers : {

            title : {

                type : 'inside'

            },

            overlay : {

                css : {

                    'background' : 'rgba(0,0,0,0.3)'

                }

            }

        }       

    });

    $('.fancyboxview').fancybox({

    padding: 0,

        openEffect : 'elastic',

        openSpeed  : 150,

        closeEffect : 'elastic',

        closeSpeed  : 150,

        maxWidth    : "95%",

        autoSize    : true,

        autoScale   : true,

        fitToView   : true,

        helpers : {

            title : {

                type : 'inside'

            },

            overlay : {

                css : {

                    'background' : 'rgba(0,0,0,0.3)'

                }

            }

        }       

    });

});    
