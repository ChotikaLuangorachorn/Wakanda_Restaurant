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
            $('#modal-text').text($('#cooking'+id).text()+ 'ใช่หรือไม่ ?');
            document.getElementById('confirm-modal').style.display="block";
            $('#save').click(function(e){
                $('#cooked' + id).removeAttr('hidden');
                $('#cooking' + id).hide();
                document.getElementById("confirm-modal").style.display="none";
                $.ajax({
                    method: "post",
                    url: "/chef/orders/",
                    data:{
                        _token: csrf_token,
                        id:id
                    }
                });
            })
            
        },
        changeStatusToCooked: function(id,menu_id){
            $('table#order-table tr#'+ id).remove();
        }
    }
})