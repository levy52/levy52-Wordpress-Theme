const navbarToggler = document.getElementById('navbar-toggler')
const closeButton = document.getElementById('closebtn')
function showNavigation() {
	document.getElementById('navbarSupportedContent').classList.add('show-nav')
}

navbarToggler.addEventListener('click', showNavigation)
closeButton.addEventListener('click', () => document.getElementById('navbarSupportedContent').classList.remove('show-nav'))
