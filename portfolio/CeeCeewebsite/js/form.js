
(function() {

	var inputs = document.createElement('input');


	var supports = {};

	supports.autofocus   = 'autofocus' in inputs;
	supports.required    = 'required' in inputs;
	supports.placeholder = 'placeholder' in inputs;

	if(!supports.autofocus) {

	}


	if(!supports.required) {

	}

	if(!supports.placeholder) {

	}

	var send = document.getElementById('contact-submit');
	if(send) {
		send.onclick = function () {
			this.innerHTML = '...Sending';
		}
	}

})();
