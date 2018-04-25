
console.log(categories);
if (categories.length!=0){
	for (index in categories) {
		var category_id = '#card-category'+categories[index].id;
		$(category_id).hide();
	    console.log(category_id);
	}
	$('#card-category1').show();
}

var selectCategory = new Vue({
					  el: '#btn-category',
					  methods: {
					    showMenu: function (id) {
					      $('#card-category'+id).show();
					      for (index in categories) {
					      	if(categories[index].id!=id){
					      		$('#card-category'+categories[index].id).hide();
					      	}
					      }
					    }
					  }
					})

var selectNumber = new Vue({
						el: '#menu-list',
						data: {
							order:{}
						},
						methods: {
					    	decrease: function (menu_id) {
						    	if (this.$data.order[menu_id] >=1){
						    		this.$data.order[menu_id]--;
						    		document.getElementById("number-menu"+menu_id).value = this.$data.order[menu_id];
						    		console.log(this.$data.order);
						    	}
					    	},
						    increase: function (menu_id) {
						    	console.log(this.$data.order[menu_id]);
						    	console.log("increase");
						    	if(!(menu_id in this.$data.order))
						    		this.$data.order[menu_id] = 1;
						    	else
						    		this.$data.order[menu_id]++;
								document.getElementById("number-menu"+menu_id).value = this.$data.order[menu_id];
								console.log(this.$data.order);
						    }
					 	},
					  	mounted(){

					  	}
					})



//btn-go-to-top

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
        document.getElementById("btn-go-to-top").style.display = "block";
        document.getElementById("btn-basket").style.display = "block";
    } else {
        document.getElementById("btn-go-to-top").style.display = "none";
        document.getElementById("btn-basket").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
$('#btn-go-to-top').click(function(e){
	document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
});


//modal basket
$('.fa-shopping-basket').click(function(e){
	document.getElementById('modal-basket').style.display='block';
	$('#form-purchase').hide();
	showOrderingTable();
	$("#order").val(JSON.stringify(selectNumber.order));
});

function showOrderingTable(){
	tbody = $("#tbody-ordering");
	console.log(menus);
	tbody.empty();
	var total_price = 0.0;
	Object.keys(selectNumber.order).forEach(function(menu_id) {
		if (selectNumber.order[menu_id] != 0){

			tr = tbody.append("<tr id='list'></tr>").children().last();
			tr.append("<td scope='row'>" + menus[menu_id].name + "</td>");
			tr.append("<td scope='row' style='text-align:right;'>" + selectNumber.order[menu_id] + "</td>");
			tr.append("<td scope='row' style='text-align:right;'>" + menus[menu_id].price * selectNumber.order[menu_id] + "</td>");
			total_price+= menus[menu_id].price * selectNumber.order[menu_id];
		}
	});
	$('#total_price').text(total_price);
	if (total_price == 0 ){
		$('#btn-purchase').hide();
	}else{
		$('#btn-purchase').show();
	}
};
$('#btn-purchase').click(function(e){
	$('#form-purchase').show();
});
// $("#btn-purchase").click(function(e){
// 	console.log("purchase");
// 	$.ajax({
// 		method: "post",
// 		data: {
// 			m1:1,
// 			m2:2
// 		},
// 		url: "/order"
// 	})
// })