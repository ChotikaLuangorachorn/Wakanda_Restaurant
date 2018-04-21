
console.log(categories);
if (categories.length!=0){
	for (index in categories) {
		var category_id = '#card-category'+categories[index].id;
		$(category_id).hide();
	    console.log(category_id);
	}
	$('#card-category1').show();
}

var example2 = new Vue({
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
console.log(dining_table);
document.getElementById("menu1").href=dining_table.id;
document.getElementById("menu2").href=dining_table.id+'/ordering';
document.getElementById("menu3").href=dining_table.id+'/ordered';