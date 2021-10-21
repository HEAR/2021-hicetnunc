$(function(){

	console.log('hic et nunc')



	let speechLeft = $("section").data("left").split(",")
	let speechRight = $("section").data("right").split(",")

	// console.log(speechLeft, speechRight)

	let align = "speech-left"
	let couleur = "#FFF"
	let initiale = ""

	let i = 0

	$('section:not(.listing)>*').each(function(){

			let text = $(this).text()

			// console.log("• none")

			speechLeft.forEach(element => {

				initiale = element.split("#")[0]

				let regex =  new RegExp(`^(?:${initiale}[  ]*:)`,'g')
				if(text.search(regex) == 0){
					align = "speech-left"
					

					initiale = element.split("#")[0]
					couleur = "#" + element.split("#")[1]

					console.log("left true", initiale, couleur)
				}
			})

			speechRight.forEach(element => {

				initiale = element.split("#")[0]

				let regex =  new RegExp(`^(?:${initiale}[  ]*:)`,'g')
				if(text.search(regex) == 0){
					align = "speech-right"

					initiale = element.split("#")[0]
					couleur = "#" + element.split("#")[1]

					console.log("right true", initiale, couleur)
				}
			})

			$(this).addClass(align)

			$(this).html( "<mark style='background-color:"+couleur+"'>" + $(this).html() + "</mark>" )

		i ++
	})

})