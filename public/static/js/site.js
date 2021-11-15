const base = location.protocol+'//'+location.host;
const route = document.getElementsByName('routeName')[0].getAttribute('content');
const http = new XMLHttpRequest();
const csrfToken = document.getElementsByName('csrf-token')[0].getAttribute('content');
var page = 1;
var page_section = "";
var products_list_ids_temp = [];

$(document).ready(function(){
	$('.slick-slider').slick({dots: true, autoplay: true, autoplaySpeed: 2000});
});


document.addEventListener('DOMContentLoaded', function(){
	var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-toogle="tooltip"]'))//genera error en cambiar avatar
	var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
		return new bootstrap.Tooltip(tooltipTriggerEl)
	});

	var slider = new MDSlider;
	var form_avatar_change = document.getElementById('form_avatar_change');
	var btn_avatar_edit = document.getElementById('btn_avatar_edit');
	var avatar_change_overlay = document.getElementById('avatar_change_overlay');
	var input_file_avatar = document.getElementById('input_file_avatar');
	var products_list = document.getElementById('products_list');
	var hospedajes_list = document.getElementById('hospedajes_list');
	var load_more_products = document.getElementById('load_more_products');
	var load_more_hospedajes = document.getElementById('load_more_hospedajes');
	if(btn_avatar_edit){
		btn_avatar_edit.addEventListener('click', function(e){
			e.preventDefault();
			input_file_avatar.click();
		})
	}

	if(load_more_products){
		load_more_products.addEventListener('click', function(e){
			e.preventDefault();
			load_attractives(page_section);
		})
	}

	if(load_more_hospedajes){
		load_more_products.addEventListener('click', function(e){
			e.preventDefault();
			load_hospedajes(page_section);
		})
	}

	if(input_file_avatar){
		input_file_avatar.addEventListener('change', function(){
			var load_img = '<img src="'+base+'/static/imagenes/loader_white.svg">';
				avatar_change_overlay.innerHTML = load_img;
				avatar_change_overlay.style.display = 'flex';
				form_avatar_change.submit();
		})
	}
	slider.show();

	if(route == "home"){
		load_attractives('home');
	}
	if(route == "attractiveh"){
		load_attractives('attractiveh');
	}

	if(route == "attractive_category"){
		load_attractives('attractive_category');
	}

	if(route == "hospedajeh"){
		load_hospedajes('hospedajeh');
	}

	
});

//cargar los atractivos
function load_attractives(section){
	//var url = base +'/md/api/load/attractives/'+section;
	page_section = section;
	var url = base +'/md/api/load/attractives/'+page_section+'?page='+page;
	http.open('GET', url, true);
	http.setRequestHeader('X-CSRF-TOKEN', csrfToken);
	http.send();
	http.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			page = page + 1;
			var data = this.responseText;
			data = JSON.parse(data);

			if(data.data.length == 0){
				load_more_products.style.display = "none";
			}

			data.data.forEach(function(attractive, index){
				var div = "";
				div += "<div class=\"attractive\">";
					div += "<div class=\"image\">";
						div += "<div class=\"overlay\">";
							div += "<div class=\"btns\">";
								div += "<a href=\""+base+"/attractive/"+attractive.id+"/"+attractive.slug+"\"><i class=\"fas fa-eye\"></i></a>";
								
							div += "</div>";
						div += "</div>";
						div += "<img src=\""+base+"/uploads/"+attractive.file_path+"/t_"+attractive.image+"\">";
					div += "</div>";
					div += "<a href=\""+base+"/attractive/"+attractive.id+"/"+attractive.slug+"\" title=\""+attractive.name+"\">";
						div += "<div class=\"title\">"+attractive.name+"</div>";
						div += "<div class=\"options\"></div>";
					div += "</a>"
				div += "</div>";
				products_list.innerHTML += div;
			});

		}else{

		}
	}
}

//cargar los atractivos
function load_hospedajes(section){
	//var url = base +'/md/api/load/attractives/'+section;
	page_section = section;
	var url = base +'/md/api/load/hospedajes/'+page_section+'?page='+page;
	http.open('GET', url, true);
	http.setRequestHeader('X-CSRF-TOKEN', csrfToken);
	http.send();
	http.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			page = page + 1;
			var data = this.responseText;
			data = JSON.parse(data);

			if(data.data.length == 0){
				load_more_products.style.display = "none";
			}

			data.data.forEach(function(hospedaje, index){
				var div = "";
				div += "<div class=\"hospedaje\">";
					div += "<div class=\"image\">";
						div += "<div class=\"overlay\">";
							div += "<div class=\"btns\">";
								div += "<a href=\""+base+"/hospedaje/"+hospedaje.id+"/"+hospedaje.slug+"\"><i class=\"fas fa-eye\"></i></a>";
								
							div += "</div>";
						div += "</div>";
						div += "<img src=\""+base+"/uploads/"+hospedaje.file_path+"/t_"+hospedaje.image+"\">";
					div += "</div>";
					div += "<a href=\""+base+"/hospedaje/"+hospedaje.id+"/"+hospedaje.slug+"\" title=\""+hospedaje.name+"\">";
						div += "<div class=\"title\">"+hospedaje.name+"</div>";
						div += "<div class=\"options\"></div>";
					div += "</a>"
				div += "</div>";
				hospedajes_list.innerHTML += div;
			});

		}else{

		}
	}
}






