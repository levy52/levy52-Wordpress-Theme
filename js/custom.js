const navbar = document.getElementById('navbar-toggler')
function showNavigation() {
	document.getElementById('navbarSupportedContent').classList.add('show-nav')
}

navbar.addEventListener('click', showNavigation)
addEventListener('mouseout', () => document.getElementById('navbarSupportedContent').classList.remove('show-nav'))
