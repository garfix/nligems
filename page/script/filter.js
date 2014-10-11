var Filter = function() {

	var h2Id = 0;

	// initialize
	addH2ClickHandlers();
	addCheckboxClickHandlers();
	processStoredSettings();
	updateCheckboxCounts();

	function addH2ClickHandlers()
	{
		var h2s = document.querySelectorAll('h2.filter');

		for (var i = 0; i < h2s.length; i++) {

			var element = h2s[i];

			element.onclick = h2ClickHandler;

			// give the element an id
			element.id = 'h2_' + ++h2Id;

			var body = nextElementSibling(element);
			addClass(body, 'hidden');
		}
	}

	function getFilterElements()
	{

	}

	function addCheckboxClickHandlers()
	{
		var inputs = document.getElementsByTagName('input');

		for (var i = 0; i < inputs.length; i++) {
			var element = inputs[i];

			element.onclick = checkboxClickHandler;
		}
	}

	function h2ClickHandler(event)
	{
		var body = nextElementSibling(this);
		var lastH2 = getActiveH2();

		if (lastH2 == null) {

			// first click: show
			removeClass(body, 'hidden');

		} else if (lastH2 == this) {

			// toggle h2 visibility
			if (hasClass(body, 'hidden')) {
				removeClass(body, 'hidden');
			} else {
				addClass(body, 'hidden');
			}

		} else {

			var lastBody = nextElementSibling(lastH2);

			// hide previous h2
			if (!hasClass(lastBody, 'hidden')) {
				addClass(lastBody, 'hidden');
			}

			// show this h2
			removeClass(body, 'hidden');

		}

		h2Id = this.id;

		if (!hasClass(lastH2, 'hidden')) {
			sessionStorage.setItem('h2Id', h2Id);
		}
	}

	function processStoredSettings()
	{
		var h2 = null;

		h2Id = sessionStorage.getItem('h2Id');

		if (!h2Id) {

			h2 = document.querySelector('h2.filter');
			h2Id = h2 ? h2.id : null;

		} else {

			h2 = getActiveH2();
		}

		// show this h2
		var body = nextElementSibling(h2);

		removeClass(body, 'hidden');
	}

	function updateCheckboxCounts()
	{
		var h2s = document.getElementsByTagName('h2');

		for (var i = 0; i < h2s.length; i++) {
			var element = h2s[i];

			if (hasClass(element, 'filter')) {
				var inputs = nextElementSibling(element).getElementsByTagName('input');
				var count = 0;

				for (var j = 0; j < inputs.length; j++) {
					if (inputs[j].checked) {
						count++;
					}
				}

				var text = '';
				if (count > 0) {
					text = ' (' + count + ')';
				}

				element.getElementsByTagName('span')[0].innerHTML = text;
			}
		}
	}

	function getActiveH2()
	{
		return h2Id ? document.getElementById(h2Id) : null;
	}

	function checkboxClickHandler()
	{
		this.form.submit();
	}

	function nextElementSibling( el ) {
		do { el = el.nextSibling } while ( el && el.nodeType !== 1 );
		return el;
	}

	function hasClass(element, cls) {
		return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
	}

	function removeClass(element, className)
	{
		element.className = element.className.replace( new RegExp('(?:^|\\s)' + className + '(?!\\S)') ,'');
	}

	function addClass(element, className)
	{
		element.className = element.className + ' ' + className;
	}

}();
