"use strict";

// Class definition

var KTKanbanBoardDemo = function () {
    
    // Private functions

    // Basic demo
    var demo1 = function () {
        // default
        $('#kt_blockui_1_1').click(function() {
            KTApp.block('#kt_blockui_1_content', {});

            setTimeout(function() {
                KTApp.unblock('#kt_blockui_1_content');
            }, 2000);
        });

        $('#kt_blockui_1_2').click(function() {
            KTApp.block('#kt_blockui_1_content', {
                overlayColor: '#000000',
                state: 'primary'
            });  

            setTimeout(function() {
                KTApp.unblock('#kt_blockui_1_content');
            }, 2000);
        });

        $('#kt_blockui_1_3').click(function() {
            KTApp.block('#kt_blockui_1_content', {
                overlayColor: '#000000',
                type: 'v2',
                state: 'success',
                size: 'lg'
            });

            setTimeout(function() {
                KTApp.unblock('#kt_blockui_1_content');
            }, 2000);
        });

        $('#kt_blockui_1_4').click(function() {
            KTApp.block('#kt_blockui_1_content', {
                overlayColor: '#000000',
                type: 'v2',
                state: 'success',
                message: 'Please wait...'
            });

            setTimeout(function() {
                KTApp.unblock('#kt_blockui_1_content');
            }, 2000);
        });

        $('#kt_blockui_1_5').click(function() {
            KTApp.block('#kt_blockui_1_content', {
                overlayColor: '#000000',
                type: 'v2',
                state: 'primary',
                message: 'Processing...'
            });

            setTimeout(function() {
                KTApp.unblock('#kt_blockui_1_content');
            }, 2000);
        });
    }

    return {
        // public functions
        init: function() {
            demo1();
        }
    };
}();

jQuery(document).ready(function() {    
    KTKanbanBoardDemo.init();
});