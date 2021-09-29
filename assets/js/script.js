$(function(){

	console.log('hic et nunc')


	let speechLeft = $("section").data("left").split(",")
	let speechRight = $("section").data("right").split(",")

	// console.log(speechLeft, speechRight)

	let align = "speech-left"

	let i = 0

	$('section>*').each(function(){

			let text = $(this).text()

			console.log("• none")

			speechLeft.forEach(element => {
				let regex =  new RegExp(`^(?:${element}[  ]*:)`,'g')
				if(text.search(regex) == 0){
					align = "speech-left"
					console.log("left true")
				}
			})

			speechRight.forEach(element => {
				let regex =  new RegExp(`^(?:${element}[  ]*:)`,'g')
				if(text.search(regex) == 0){
					align = "speech-right"
					console.log("right true")
				}
			})

			$(this).addClass(align)

			$(this).html( "<mark>" + $(this).html() + "</mark>" )

		i ++
	})

})