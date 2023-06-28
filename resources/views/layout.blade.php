<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="">
<title>{{__('CAR RENTAL - The leader in car rental at Casablanca Mohammed V International Airport')}} </title>

<link href='https://fonts.googleapis.com/css?family=Poppins:300,400,500,600' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="{{Vite::asset('resources/css/style.css')}}">
<link rel="icon" type="image/png" href="{{ Vite::asset('resources/img/favicon.png') }}" sizes="300,200" />
<link href="{{Vite::asset('resources/plugins/czm-chat-support.css')}}" rel="stylesheet">
@yield("some_css")
<style>
      .rq-main-footer .secondary-footer-logo{
        margin:0px!important;
        padding-bottom: 1rem;
        text-align: center;
        width:100%!important;
      }
      .rq-main-footer .secondary-footer-logo img{
        width:170px;
        
      }

      .rq-contact-us-map, .rq-registration-content-single{
        margin-bottom:25px;
      }
    </style>
<style>
  .inner-page-banner{
      height: 60vh;
  }
</style>
	<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-X94QXBEB37"></script>
<script >
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-X94QXBEB37');
</script>
</head>
<body>
    
    @yield("body")


<footer class="rq-footer">
<div class="rq-main-footer">
<div class="container">
<div class="secondary-footer-logo">
<img src="{{Vite::asset('resources/img/logo-palaciocar.png')}}" alt="">
</div>
<ul class="rq-footer-social">
<li><a href="https://www.facebook.com/"target="_blank" ><i class="fa fa-facebook"></i> Facebook</a></li>
<li><a href="https://instagram.com/" target="_blank" ><i class="fa fa-instagram"></i> Instagram</a></li>
<li><a href="#" target="_blank" ><i class="fa fa-whatsapp"></i> Whatsapp</a></li>

</ul>
</div>
</div> 
<div class="rq-copyright-section">
<div class="container">
<p class="secondary-copyright">© 2023 CAR RENTAL. All Rights Reseverd</p>
</div>
</div> 
</footer>
<script type="text/javascript" src="{{ Vite::asset('resources/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{ Vite::asset('resources/js/moment.min.js')}}"></script>
<script type="text/javascript" src="{{ Vite::asset('resources/js/scripts.js')}}"></script>
<script src="{{ Vite::asset('resources/plugins/czm-chat-support.min.js')}}"></script>
<script src="{{ Vite::asset('resources/plugins/moment-timezone-with-data.min.js')}}"></script>

<script>
			$('#example').czmChatSupport({

				/* Button Settings */
				button: {
					position: "right", /* left, right or false. "position:false" does not pin to the left or right */
					style: 1, /* Button style. Number between 1 and 7 */
					src: '<i class="fa fa-whatsapp"></i>', /* Image, Icon or SVG */
					backgroundColor: "#10c379", /* Html color code */
					effect: 1, /* Button effect. Number between 1 and 7 */
					notificationNumber: "1", /* Custom text or false. To remove, (notificationNumber:false) */
					speechBubble: "Réservez une voiture avec les meilleurs tarifs.", /* To remove, (speechBubble:false) */
					pulseEffect: false, /* To remove, (pulseEffect:false) */
					text: { /* For Button style larger than 1 */
						title: "Need help? Chat with us", /* Writing is required */
						description: "Customer Support", /* To remove, (description:false) */
						online: "I'm Online", /* To remove, (online:false) */
						offline: "I will be back soon" /* To remove, (offline:false) */
					}
				},

				/* Popup Settings */
				popup: {
					automaticOpen: false, /* true or false (Open popup automatically when the page is loaded) */
					outsideClickClosePopup: true, /* true or false (Clicking anywhere on the page will close the popup) */
					effect: 1, /* Popup opening effect. Number between 1 and 15 */
					header: {
						backgroundColor: "#10c379", /* Html color code */
					},

					/* Representative Settings */
					persons: [

					/* Copy for more representatives [::Start Copy::] */
					{
						avatar: {
							src: '<img src="" alt="">', /* Image, Icon or SVG */
							backgroundColor: "#ffffff", /* Html color code */
							onlineCircle: true /* Avatar online circle. To remove, (onlineCircle:false) */
						},
						text: {
							title: "Travaillons ensemble ⚡", /* Writing is required */
							description: "Support commercial", /* To remove, (description:false) */
							
							/* Used on one account only */
							message: "Réservez une voiture avec les meilleurs tarifs.", /* Shows message bubble. To remove, (message:false) */
							textbox: "Trouver une location de voiture pas cher au Maroc.", /* Allows the visitor to write the message they want. This feature is currently only available on Whatsapp. To remove, (textbox:false) */
							button: false /* Except for Whatsapp, you only need to use the button. For example: (button:"Start Chat") To remove, (button:false) */
						},
						link: {
			desktop: "https://web.whatsapp.com/send?phone=&text=Bonjour", /* Writing is required */
			mobile: "https://wa.me//?text=Bonjour" /* If it is hidden desktop link will be valid. To remove, (mobile:false) */
						},
						onlineDay: {
							/* Change the day you are offline like this. (sunday:false) */
							sunday: "00:00-23:59",
							monday: "00:00-23:59",
							tuesday: "00:00-23:59",
							wednesday: "00:00-23:59",
							thursday: "00:00-23:59",
							friday: "00:00-23:59",
							saturday: "00:00-23:59"
						}
					},
					/* [::End Copy::] */

					]
				},

				/* Other Settings */
				sound: true, /* true (default sound), false or custom sound. Custom sound example, (sound:'assets/sound/notification.mp3') */
				changeBrowserTitle: "Nouveau Message!", /* Custom text or false. To remove, (changeBrowserTitle:false) */
				cookie: false, /* It does not show the speech bubble, notification number, pulse effect and automatic open popup again for the specified time. For example, do not show for 1 hour, (cookie:1) or to remove, (cookie:false) */
			});
		</script>

<script>
      $(function(){
				function stripTrailingSlash(str) {
					if(str.substr(-1) == '/') {
						return str.substr(0, str.length - 1);
					}
					return str;
				}

				var url = window.location.pathname;  
				var activePage = stripTrailingSlash(url);
				$('.navbar-nav .dropdown').each(function(){  
					var currentPage = stripTrailingSlash($(this).find("a").attr('href'));
					if (activePage == currentPage)
						$(this).addClass('active');
					
				});
			});
    </script>
<script>
      $.ajaxSetup({
				headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
    </script>
@yield("script_js")
</body>
</html>