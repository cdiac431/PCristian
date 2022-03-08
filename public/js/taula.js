
//checkbox
$(document).ready(function () {
    $('.table tbody tr').click(function () {
        let closestCB = $(this).find('.table-checkbox')

        if (closestCB.prop('checked')) {
            closestCB.prop('checked', false)
            $(this).css({
                'background-color': ''
            });
        } else {
            closestCB.prop('checked', true)
            console.log('bieejj')
            $(this).css({
                'background-color': '#ffa251'
            });
        }

    });


//checar totes les checkbox
    let toggle = false
    $('#selectAll').click(function () {
        if(toggle){
            $('.table tr .table-checkbox').each(function () {
                $(this).prop('checked', false)
                if (!$(this).closest('tr').is("#table-header")) {
                    $(this).closest('tr').css({
                        'background-color': ''
                    });
                }

            });
            toggle = false
        }
        else {
            if(!toggle){
                $('.table tr .table-checkbox').each(function () {
                    $(this).prop('checked', true)
                    if (!$(this).closest('tr').is("#table-header")) {
                        $(this).closest('tr').css({
                            'background-color': '#ffa251'
                        });
                    }
                })
                toggle = true
            }
        }
    });
});
