import 'bootstrap';

const menu = document.querySelector('#menu');
const navbarNav = menu.querySelector('#navbarNav');

window.addEventListener('scroll', (e) => {
	if(window.pageYOffset > 0){
		menu.classList.add('bg-white');
		menu.classList.add('shadow-sm');
		menu.classList.remove('py-md-2');
	}else{
		if(!navbarNav.classList.contains('show')){
			menu.classList.remove('bg-white');
			menu.classList.remove('shadow-sm');
			menu.classList.add('py-md-2');	
		}
	}
});

menu.addEventListener('click', ({ target }) => {
	if(target.classList.contains('navbar-toggler') || target.classList.contains('navbar-toggler-icon')){
		if(menu.classList.contains('bg-white')){
			if(window.pageYOffset == 0){
				menu.classList.remove('bg-white');
				menu.classList.remove('shadow-sm');
			}
		}else{
			menu.classList.add('bg-white');
			menu.classList.add('shadow-sm');
		}
	}
})