var Filter = function() {

	var idGen = 0;

	var ids = {
		'h2': 0,
		'h3': 0
	};

	// initialize
	addClickHandlers('h2');
	addClickHandlers('h3');
	addCheckboxClickHandlers();
	processStoredSettings();
	updateCheckboxCounts();
	setupHelpButtons();

	function addClickHandlers(type)
	{
		var headers = document.querySelectorAll(type + '.filter');

		for (var i = 0; i < headers.length; i++) {

			var element = headers[i];

			element.onclick = getClickHandler(type);

			// give the element an id
			element.id = type + '_' + ++idGen;

			var body = nextElementSibling(element);
			addClass(body, 'hidden');
		}
	}

	function addCheckboxClickHandlers()
	{
		var inputs = document.querySelectorAll('.filterbar input');

		for (var i = 0; i < inputs.length; i++) {
			var element = inputs[i];

			element.onclick = checkboxClickHandler;
		}
	}

	function getClickHandler(type)
	{
		function clickHandler(event)
		{
			var body = nextElementSibling(this);
			var lastHeader = getActiveHeader(type);

			if (lastHeader == null) {

				// first click: show
				removeClass(body, 'hidden');

			} else if (lastHeader == this) {

				// toggle body visibility
				if (hasClass(body, 'hidden')) {
					removeClass(body, 'hidden');
				} else {
					addClass(body, 'hidden');
				}

			} else {

				var lastBody = nextElementSibling(lastHeader);

				// hide previous header
				if (!hasClass(lastBody, 'hidden')) {
					addClass(lastBody, 'hidden');
				}

				// show this header
				removeClass(body, 'hidden');

			}

			ids[type] = this.id;

			if (hasClass(body, 'hidden')) {
				sessionStorage.removeItem(type + 'Id');
			} else {
				sessionStorage.setItem(type + 'Id', ids[type]);
			}
		}

		return clickHandler;
	}

	function processStoredSettings()
	{
		processStoredSettingsByType('h2');
		processStoredSettingsByType('h3');
	}

	function processStoredSettingsByType(type)
	{
		var header = null;

		ids[type] = sessionStorage.getItem(type + 'Id');

		if (!ids[type]) {

			header = document.querySelector(type + '.filter');
			ids[type] = header ? header.id : null;

		} else {

			header = getActiveHeader(type);
		}

		// show this header
		var body = nextElementSibling(header);

		removeClass(body, 'hidden');
	}

	function updateCheckboxCounts()
	{
		var h2s = document.getElementsByTagName('h2');

		for (var k = 0; k < h2s.length; k++) {

			var h2 = h2s[k];
			var h2Count = 0;
			var h3s = nextElementSibling(h2).getElementsByTagName('h3');

			for (var i = 0; i < h3s.length; i++) {

				var h3 = h3s[i];

				if (hasClass(h3, 'filter')) {

					var inputs = nextElementSibling(h3).getElementsByTagName('input');
					var h3Count = 0;

					for (var j = 0; j < inputs.length; j++) {
						if (inputs[j].checked) {
							h3Count++;
							h2Count++;
						}
					}

					h3.getElementsByTagName('span')[0].innerHTML = (h3Count ? ' (' + h3Count + ')' : '');
				}
			}

			h2.getElementsByTagName('span')[0].innerHTML = (h2Count ? ' (' + h2Count + ')' : '');
		}
	}

	function getActiveHeader(type)
	{
		return ids[type] ? document.getElementById(ids[type]) : null;
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

	function setupHelpButtons()
	{
		var helpButtons = document.getElementsByClassName('help');

		for (var i = 0; i < helpButtons.length; i++) {
			var helpButton = helpButtons[i];
			helpButton.onclick = function(event){
				var helpPopup = this.nextSibling;

				// show dialog
				helpPopup.style.display = 'block';
				helpPopup.style.top = event.clientY + 'px';
				helpPopup.style.left = event.clientX + 'px';

				//helpPopup.style.top = (this.offsetTop + 10) + 'px';
				//helpPopup.style.left = (this.offsetLeft + 10) + 'px';

				function hideDialog()
				{
					helpPopup.style.display = 'none';

					document.removeEventListener('mousedown', hideDialog);
				}

				// make the popup go away on any mouse action
				document.addEventListener('mousedown', hideDialog);
			}
		}
	}

}();
