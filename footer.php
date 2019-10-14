<footer class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="footer">
	<div class="container">
		<div class="col-md-8 col-sm-8 col-xs-12">
			
			<h5>&copy; 2018 Pantallas Profesionales by Mobillers - Todos los derechos reservados</h5>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-12">
        <li><img src="img/logo-01.png" class="img-responsive" /></li>			
		</div>
	</div>
</footer>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/parallax.js"></script>

    <script src="js/jquery.validate.js"></script>

    
    <script src="aos.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script type="text/javascript">
       AOS.init({
        offset: 200,
        duration: 600,
        easing: 'ease-in-sine',
        delay: 100,
        // disable: window.innerWidth < 1000
       });
    </script>

<script>
    $(document).ready( function(){


	//var stickyNavTop = $('#highlight').offset().top;
	var stickyNavTop = 120;
	 
	var stickyNav = function(){
	var scrollTop = $(window).scrollTop();
	      
	if (scrollTop > stickyNavTop) { 
	    $('.navbar').addClass('sticky');
		$('.white').show();
		$('.black').hide();
	} else {
	    $('.navbar').removeClass('sticky'); 
		$('.white').hide();
		$('.black').show();
	}
	};
	 
	stickyNav();
	 
	$(window).scroll(function() {
	  stickyNav();
	});




    	$('#msjform').slideUp("slow");

    	$('#boxrecaptcha').hide();

    	$.validator.methods.equal = function(value, element, param) {
			return value == param;
		};

		//$("#emailsform")

		var validator = $("#emailsform").bind("invalid-form.validate", function() {
			//$("#summary").html("Your form contains " + validator.numberOfInvalids() + " errors, see details below.");
			//console.log("algo aqui");
		}).validate({
			rules: {
				nomape: "required",
          		tel: "required",
          		email: "required email",
          		math: {
					equal: <?php echo $resultado; ?>
				}
			},
			messages: {
        		email: "Email incorrecto",
        		tel: "Por favor, complete este campo.",
        		nomape: "Por favor, complete este campo.",
        		math: "Por favor, complete el resultado de la cuenta."
        	},
        	success: function(){
        		console.log("success");
        	},
        	submitHandler: function(form) {
        		
        		ga('send', 'event','Formulario', 'enviar');
        		
        		$.ajax({
	                url: form.action,
	                type: form.method,
	                data: $(form).serialize(),
	                success: function(response) {
	                    $('#msjform').html(response).slideDown("slow");
	                    $('#nomape,#tel,#email,#consulta').val("");
	                }            
            	});

        	}
		});

/*
    	$("#emailsform").validate({
    		onfocusout: function(element) {
            	this.element(element);
        	},
        	rules: {
              	nomape: "required",
              	tel: "required",
              	email: "required email",
        	},
        		messages: {
        		email: "Email incorrecto",
        		tel: "Por favor, complete este campo.",
        		nomape: "Por favor, complete este campo."
      	},
      	submitHandler: function(form) {

      		$('#boxrecaptcha').show();
      		//onSubmit();

            
            $.ajax({
                url: form.action,
                type: form.method,
                data: $(form).serialize(),
                success: function(response) {
                    //$('#answers').html(response);
                    //alert(response);
                    $('#msjform').html(response).slideDown("slow");
                    $('#nomape,#tel,#email,#consulta').val("");
                    
                }            
            });
            
        }
      });

*/

/*    
    	$('.nav.navbar-nav').click(function(e){
		    console.log(e);
		    //$("html, body").animate({ scrollTop: 0 }, 600);
		    return false;
		});
*/

$('.nav.navbar-nav li a,.link,.navbar-brand').on('click', function(event) {

    var target = $( $(this).attr('href') );

    if( target.length ) {
        event.preventDefault();
        $('html, body').animate({
            scrollTop: target.offset().top - 70
        }, 500);
    }

});

    });
</script>

<section class="col-md-12 nopadding">

    <span id="cargando"></span>

<script type="text/javascript">
var map;
var myLatlng;
var marker;
    $(function() {
            $('#cargando').hide();
            $('#zonas').hide();

/* ############ */

function initialize() {

var styles = [
    {
      stylers: [
        { saturation: -150 }
      ]
    },{
      featureType: "road.arterial",
      elementType: "geometry",
      stylers: [
        { lightness: 100 },
        { visibility: "simplified" }
      ]
    },{
      featureType: "road.arterial",
      elementType: "labels",
      stylers: [
        { visibility: "off" }
      ]
    }
  ];

  // Create a new StyledMapType object, passing it the array of styles,
  // as well as the name to be displayed on the map type control.
  var styledMap = new google.maps.StyledMapType(styles,
    {name: "Styled Map"});

  var mapOptions = {
    zoom: 16,
    center: new google.maps.LatLng(-34.5718467,-58.4318717),
    scrollwheel: false,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    mapTypeControl: false,
    disableDefaultUI : false,
    mapTypeControlOptions: {
      position   : google.maps.ControlPosition.TOP_RIGHT,
      mapTypeIds : [google.maps.MapTypeId.ROADMAP, 'map_style'],
      style      : google.maps.MapTypeControlStyle.HORIZONTAL_BAR
    },
    panControl: true,
    panControlOptions: {
        position: google.maps.ControlPosition.TOP_RIGHT
    },
    zoomControl: true,
    zoomControlOptions: {
        style: google.maps.ZoomControlStyle.LARGE,
        position: google.maps.ControlPosition.TOP_RIGHT
    },
    scaleControl: false,
    scaleControlOptions: {
        position: google.maps.ControlPosition.TOP_RIGHT
    }

  };
  map = new google.maps.Map(document.getElementById('gmapa'),
      mapOptions);
myLatlng = new google.maps.LatLng(-34.5718467,-58.4318717);
marker = new google.maps.Marker({
  position: myLatlng,
  map: map,
  title:"Mobillers"
});

marker.setIcon('img/marker.png');

map.mapTypes.set('map_style', styledMap);
map.setMapTypeId('map_style');


}
google.maps.event.addDomListener(window, 'load', initialize);

        });
    </script>
</section>

</body>
</html>