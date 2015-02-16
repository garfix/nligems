var Filter = function() {

	var idGen = 0;

	var ids = {
		'h2': 0,
		'h3': 0
	};

	var activePopup = null;

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

				var helpPopup = nextElementSibling(this);

				if (activePopup) {
					if (activePopup == helpPopup) {
						hidePopup();
					} else {
						hidePopup();
						showPopup(event, helpPopup);
					}
				} else {
					showPopup(event, helpPopup);
				}

				// prevent the document-level handler
				stopPropagation(event);
			}
		}

		function showPopup(event, popup)
		{
			var windowHeight = getWindowHeight();
			var clickTop = event.clientY;
			var popupHeight = popup.offsetHeight;

			// calculate top position of popup
			// make sure it doesn't cross the lower window border
			var popupTop = Math.min(
				clickTop,
				windowHeight - popupHeight - 5
			);

			// show dialog
			popup.style.top = popupTop + 'px';
			popup.style.left = (event.clientX + 15) + 'px';
			popup.style.visibility = 'visible';

			activePopup = popup;
		}

		function hidePopup() {

			if (activePopup) {
				activePopup.style.visibility = 'hidden';
				activePopup = null;
			}
		}

		document.addEventListener('click', hidePopup);
	}

	/**
	 * @see http://www.w3schools.com/js/js_window.asp
	 * @returns {Number|number}
	 */
	function getWindowHeight()
	{
		return window.innerHeight
		|| document.documentElement.clientHeight
		|| document.body.clientHeight;
	}

	/**
	 * @see http://stackoverflow.com/questions/5963669/whats-the-difference-between-event-stoppropagation-and-event-preventdefault
	 */
	function stopPropagation(event)
	{
		if (event.stopPropagation) {
			event.stopPropagation();
		} else {
			event.cancelBubble = true;
		}
	}

}();
