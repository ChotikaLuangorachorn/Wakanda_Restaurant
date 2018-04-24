
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
					  		order:{

					  		}
					  
					  },
					  methods: {
					    decrease: function (menu_id) {
					    	if (this.$data.order["m" + menu_id] >=1){
					    		this.$data.order["m" + menu_id]--;
					    		document.getElementById("number-menu"+menu_id).value = this.$data.order["m" + menu_id];
					    	}
					    },
					    increase: function (menu_id) {
					    	console.log(this.$data.order["m"+menu_id]);
					    	console.log("increase");
					    	
					    	this.$data.empty += "s";
					    	this.$data.amt++;
					    	this.$data.order["m" + menu_id]++;
							document.getElementById("number-menu"+menu_id).value = this.$data.order["m" + menu_id];
							console.log(this.$data.order);
					    }
					  },
					  mounted(){
					  	console.log(this.$data.order);
					  	console.log("mouted", menus);
					  	for (var i =0 ; i<menus.length; i++) {
					  		this.$data.order["m" + menus[i].id] = 0;
					  	}
					  	console.log(this.$data.order);
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