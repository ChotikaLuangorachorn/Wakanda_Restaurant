
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
					  el: '#number',
					  methods: {
					    decrease: function (menu_id) {
					    	if (document.getElementById("number-order").value >=1){
					    	document.getElementById("number-order").value= parseInt(document.getElementById("number-order").value)-1;}
					    },
					    increase: function (menu_id) {
					      $('#menu'+menu_id).val+=1;
					      	document.getElementById("number-order").value = parseInt(document.getElementById("number-order").value)+1;
					    }
					  }
					})