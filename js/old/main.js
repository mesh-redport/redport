
//despliegue de las opciones "indica el grado de gravedad"
$('.toggle_button_big').on('click',function(){
	$('.form_content').slideToggle('slow');
});

//añadir o quitar personas a la pregunta "¿están bien?"
//$('#toggle_small_4').on('click',function(){

	//var clone = $('#name_list').clone();
	//$('.lista_form_1').after(clone);
	//$('#lista_form_1').appendChild('#name_list');
//});

$(document).ready(function(){

$('#btn_display').click(function(e){
	e.preventDefault();
	$('#display_content').slideToggle('slow');
});

});

$(document).ready(main);

var contador = 1 ;

function main(){

	$('.menu-button').click(function(e){
		e.preventDefault();

		//$('.menu_nav').toggle();
		if(contador==1){

			$('.menu_nav').animate({
				right: '0'
			})

			contador = 0;

		} else { 

			contador = 1;

			$('.menu_nav').animate({
				right: '-100%'
			})
		}
	})
}
