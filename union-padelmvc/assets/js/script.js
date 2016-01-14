$(document).ready(function () {
	

	var largeur=$(window).width();
	var hauteur=$(window).height();

// Menu responsive

    $('#bt_nav_header_responsive').click(function(){
        $('#nav_header').toggleClass('nav_header_responsive');
    })

// background des pages du service actualité

    var img_last_actu = $('img','aside:first','.service_contenu','.actualite').attr("src");
    $('.service_intro_photo','.actualite').css({'background-image':'url('+img_last_actu+')',});


	$('#light_b_connexion').hide();
	$('#bt_01').hide();
    $('#passe_perdu').hide();

	$('.bt_connexion').click(function(e) {

		e.preventDefault();
		$('#bt_01').hide();
		$('#conteneur').hide();
        $("body").css({'overflow':'hidden'}).prepend('<div id="conteneur"></div>');
        $('#light_b_connexion').fadeIn(1500);
        $('#bt_02').fadeIn();
        $('#connexion').fadeIn();

         $('#conteneur')
            .css({

                'position':'fixed',
                'top':'0',
                'left':'0',
                'z-index':'98',
                'width':'100%',
                'height':'100%',
                "background-color":'rgba(0,0,0,0.75)',

            })

            .click(function(){
            	$('#light_b_connexion').fadeOut(1000);
            	$('#conteneur').fadeOut(1000);
            	$("body").css({'overflow':'scroll'});
            })

            $('#inscription').hide();

            $('#bt_03').click(function(){
                $('#bt_03').hide();
                $('#connexion').hide();
                $('#passe_perdu').fadeIn();
                $('#bt_02').fadeIn();
                $('#bt_01').fadeIn();

            })

            $('#bt_02').click(function(){
            	$('#bt_02').hide();
                $('#bt_03').hide();
                $('#passe_perdu').hide();
            	$('#connexion').hide();
                $('#passe_perdu').hide();
            	$('#inscription').fadeIn();
            	$('#bt_01').fadeIn();
            })

            $('#bt_01').click(function(){
            	$('#bt_01').hide();
                $('#inscription').hide();
                $('#passe_perdu').hide();
            	$('#connexion').fadeIn();
            	$('#bt_02').fadeIn();
                $('#bt_03').fadeIn();
            })
	})	


});