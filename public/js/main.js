;(function() {
	let sticky = false
	let currentPosition = 0
	const imageCounter=5
	const email = "bachb-1997@hotmail.com"


	$("#contact-form").on ("submit",function(ev){
		ev.preventDefault()
		sendForm($(this))
		return false
	})
	$("#description").removeClass("hidden")
	$("#sticky-navigation").removeClass("hidden")
	$("#sticky-navigation").slideUp(0)
	checkScroll()
	isOpen()

//Cambiar la clase del nav de moviles
	$('#menu-opener').click(cambiarClase);
 
		function cambiarClase(){
		    // cambiar la clase CSS aquí
		    $('#responsive-nav ul').toggleClass('active')
		    $("#menu-opener").toggleClass("glyphicon-menu-hamburger")
		}
		$(".menu-link").click(cambiarClase);

	setInterval(()=>{
		if(currentPosition<imageCounter){
			currentPosition++
		}else{
			currentPosition=0
		}
		
		$("#gallery .inner").css({
			left: "-"+currentPosition*100+"%"
		})

	},4000)

	$(window).scroll(checkScroll)
	function checkScroll() {
		const inBottom = isInBottom()
		if(inBottom && !sticky){
			//Mostrar la navegacion sticky
			sticky = true
			stickNavigation()
		}
		if (!inBottom && sticky) {
			//Ocultar la navegacion sticky
			sticky = false
			unStickNavigation()
		}
	}
	function isOpen() {
		// Reloj 24
		let date = new Date()
		// Toma el tiempo de la maquina
		const current_hour = date.getHours()

		if (current_hour < 6 || current_hour >17) {
			$("#is-open .text").html("Cerrado Ahora <br> Abierto de 8.00am a 6:00pm")
		} else {}

	}
	function stickNavigation() {
		$("#sticky-navigation").addClass("fixed").removeClass("absolute")
		$("#navigation").slideUp("fast")
		$("#sticky-navigation").slideDown("fast")
	}
	function unStickNavigation() {
		$("#sticky-navigation").removeClass("fixed").addClass("absolute")
		$("#navigation").slideDown("fast")
		$("#sticky-navigation").slideUp("fast")
	}
	// Enviar formulario  mediante formspree.io usando ajax
	function sendForm($form) {
		$.ajax({
		    url: $form.attr("action"), 
		    method: "POST",
		    data:$form.formObject(),
		    dataType: "json",
		    success: function(){
		    	document.getElementById('contact-form').reset();
		    	swal(
					  'Mensaje Enviado!',
					  'Te contactaremos lo más pronto',
					  'success'
					)
		    }
		})
	}


	function isInBottom(){
		const $description = $("#mensaje")
		const descriptionHeight = $description.height()
		return $(window).scrollTop() > $(window).height() - (descriptionHeight * 3)
	}
})()