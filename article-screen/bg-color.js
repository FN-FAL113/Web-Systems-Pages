const btn = document.querySelector('#bg-button');
const bgtext = document.querySelector('#bgcolortext');
const hex =  ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C',
			'D', 'E', 'F'];
const color = ['red', 'white', 'blue', 'yellow', 'green', 'orange', 'pink', 'beige',
			'coral', 'cyan', 'grey'];

if(localStorage.getItem('bgcolor')){
	setColor(localStorage.getItem('bgcolor'));
}

btn.addEventListener('click', e => {

	if(e.shiftKey){
		let normalColor = color[getRandomColor(color)];
		
		setColor(normalColor);
	} else {
		let hexColor = "#";
		for(let i = 0; i < 6; i++){
			hexColor += hex[getRandomColor(hex)];
		}

		setColor(hexColor);
	}

	btn.blur();
});


function getRandomColor(color){
	return Math.floor(Math.random() * color.length);
}

function setColor(color){
	document.body.style.background = color;
	bgtext.textContent = color;

	localStorage.setItem('bgcolor', color);
}