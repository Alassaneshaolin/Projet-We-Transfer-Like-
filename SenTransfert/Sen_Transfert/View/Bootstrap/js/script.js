var content = document.querySelector('#hamburger-content');
var sidebarBody = document.querySelector('#hamburger-sidebar-body');
var button = $('#hamburger-button');
var overlay = $('#hamburger-overlay');
var activatedClass = 'hamburger-activated';


sidebarBody.innerHTML = content.innerHTML;

$(button).bind('click', function(e) {
    e.preventDefault();
	this.parentNode.classList.add(activatedClass);
});

$(button).bind('keydown', function(e) {
	if (this.parentNode.classList.contains(activatedClass))
	{
		if (e.repeat === false && e.which === 27)
			this.parentNode.classList.remove(activatedClass);
	}
});

$(overlay).bind('click', function(e) {
	e.preventDefault();
	this.parentNode.classList.remove(activatedClass);
});