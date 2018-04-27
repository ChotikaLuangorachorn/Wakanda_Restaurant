// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("btn-go-to-top").style.display = "block";
    } else {
        document.getElementById("btn-go-to-top").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
$('#btn-go-to-top').click(function(e) {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0; 
});


var order = new Vue({
    el: '#show-order',
    methods:{
        changeStatusToCooking: function(id,menu_id){
            console.log(menus[menu_id].name);
            console.log(csrf_token);
            $('#modal-title').text(menus[menu_id].name);
            $('#modal-text').text($('#status'+id).text()+ 'ใช่หรือไม่ ?');
            document.getElementById('confirm-modal').style.display="block";
            $('#save').off('click');
            $('#save').on('click', function(e){
                // $('#cooked' + id).removeAttr('hidden');
                // $('#cooking' + id).hide();
                document.getElementById("confirm-modal").style.display="none";
                $.ajax({
                    method: "put",
                    url: "/chef/orders/"+id,
                    data:{
                        _token: csrf_token
                    },
                    success: function (order) {
                        console.log(order)
                        if (order.status === 'cooking') {
                            $('#status'+id).html('ทำเสร็จแล้ว');
                            $('#status'+id).attr('class', 'btn btn-success');
                            console.log('cooking')
                        } else if (order.status === 'wait') {
                            $('#status'+id).html('กำลังทำ');
                            $('#status'+id).attr('class', 'btn btn-outline-secondary');
                            console.log('wait')
                        } else if (order.status === 'cooked') {
                            $('table#order-table tr#'+ id).remove();
                            console.log('cooked')
                        } 
                    }
                });
            })
            
        },
        changeStatusToCooked: function(id,menu_id){
            $('table#order-table tr#'+ id).remove();
        }
    }
})