$(function(){

	console.log('hic et nunc')


	let queryString = window.location.search;
	let urlParams = new URLSearchParams(queryString)
	let printDate = urlParams.get('date')
	$("#qrcodecontainer").hide()
	if(printDate !== null){
		console.log("printDate",printDate)

		$("#qrcodecontainer").fadeIn()

		var qrcode = new QRCode("qrcode");

	
		qrcode.makeCode(printDate);

	}

	$("#qrcodecontainer").click(function(event){
		$("#qrcodecontainer").fadeToggle()
	})



	

	// https://github.com/aamirafridi/jQuery.Marquee
	// https://codepen.io/aamirafridi/pen/ayBmF
	$mq = $('.marquee')
	function showRandomMarquee() {
		$.ajax({
			method: 'GET',
			url: $("#marqeeURL").attr('href'),
			cache: false,
		}).done(function(data) {
			$mq
				.marquee('destroy')
				.html(data)
				.marquee({duration: 5000})
				.bind('finished', showRandomMarquee)
		})
	}
	showRandomMarquee()

	let randY = Math.random() * 60 + 20
	let randR = Math.random() * 20 - 10

	$('#marqueemanchette').css({
		top: `${randY}vh`,
		// transform: `rotate(${randR}deg)`
	})


	// MENU POSITION -> ALICE

	let menuItems = document.querySelectorAll(".menu");
	let gap = 3;
	let menuCountOdd = menuItems.length%2 == 0 ? menuItems.length : menuItems.length+1;
	let heightPerMenu = (63 - ((menuCountOdd-1)  * gap)) / menuCountOdd;
	let currentTop = heightPerMenu;
	let decalValue = getRandomInt(27, 39)


	menuItems.forEach((item, i) => {
		if (!item.classList.contains("active")) {
			let decalage = currentTop > decalValue ? decalValue : 0;
			let top = getRandomInt(currentTop+decalage, currentTop + heightPerMenu + decalage);
			item.style.top = top + "vh";
			currentTop = currentTop + heightPerMenu + gap;
			let left = getRandomInt(3,57);
			item.style.left = left + "vw";

			// console.log(currentTop, heightPerMenu, currentTop + heightPerMenu, decalage)
		}
	});

	function getRandomInt(min, max) {
		min = Math.ceil(min);
		max = Math.floor(max);
		return Math.floor(Math.random() * (max - min)) + min;
	}

	// END MENU POSITION
	// 
	
	let colors = [
		"var(--green)",
		"var(--pink)",
		"var(--blue)",
		"var(--violet)",
		// "var(--yellow)",
		"var(--old-pink)",
	]
	


	$(".menu").each(function(){
		// console.log($(this).text())
		if( $(this).find("a").text() == "Impression" ){
			// console.log("OK")
			$(this).find("a").css("background-color", "#FF0")
		}
	})

	$("h2, section:not(.listing) li").each(function(){
		$(this).html( "<mark>" + $(this).html() + "</mark>" )
	})


	let speechLeft = $("section").data("left").split(",")
	let speechRight = $("section").data("right").split(",")

	// console.log(speechLeft, speechRight)

	let align = "speech-left"
	let color = colors[ Math.floor( Math.random() * colors.length ) ]
	let initiale = ""

	let i = 0

	$('section:not(.listing)>*:not(#footnotes)').each(function(){

			let text = $(this).text()

			// console.log("• none")

			speechLeft.forEach(element => {

				initiale = element.split("#")[0]

				let regex =  new RegExp(`^(?:${initiale}[  ]*:)`,'g')
				if(text.search(regex) == 0){
					align = "speech-left"
					

					initiale = element.split("#")[0]
					color = "#" + element.split("#")[1]

					// console.log("left true", initiale, couleur)
				}
			})

			speechRight.forEach(element => {

				initiale = element.split("#")[0]

				let regex =  new RegExp(`^(?:${initiale}[  ]*:)`,'g')
				if(text.search(regex) == 0){
					align = "speech-right"

					initiale = element.split("#")[0]
					color = "#" + element.split("#")[1]

					// console.log("right true", initiale, couleur)
				}
			})

			$(this).addClass(align)

			$(this).html( "<mark style='background-color:"+color+"'>" + $(this).html() + "</mark>" )

		i ++
	})


	// let colors = [
	// 	"var(--green)",
	// 	"var(--pink)",
	// 	"var(--blue)",
	// 	"var(--violet)",
	// 	// "var(--yellow)",
	// 	"var(--old-pink)",
	// ]

	$("section>nav>ul>li>a").each(function(){

		let color = colors[ Math.floor( Math.random() * colors.length ) ]

		// console.log($(this).text(), color)

		$(this).css('background-color', color)
	})


	let angle = 0
	// Background rotation
	function rotateBG(){
		angle = (angle+0.5)%360
		$("body").css("background-image", `linear-gradient(${angle}deg, rgb(244, 238, 216) 0, rgb(255, 255, 0) 100vmax)`)
		setTimeout(rotateBG, 40)
	}

	setTimeout(rotateBG, 40)
	
	

})


