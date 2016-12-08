(function() {

	var hash = document.location.hash;
	console.log(hash);
	var matches = hash.match(/^#eet-check:([0-9a-z+\/]+=*)/i);
	console.log(matches);
	if(matches){
		var json = window.atob(matches[1]);
		var data = JSON.parse(json);
		if(data) {
			document.location.hash = '';
			fill(data);
		}
	}

	// Fill all items
	function fill(data) {
		if(data.dic) {
			fillPrice(document.querySelector('#frm\\:dic'), data.dic);
		}

		if(data.date) {
			var datumFields = [
				document.querySelector('#frm\\:datTrzba'),
				document.querySelector('#frm\\:casTrzba'),
			];
			fillDate(datumFields, data.date);
		}

		if(data.price) {
			fillPrice(document.querySelector('#frm\\:celkTrzba'), data.price);
		}

		if(data.fik) {
			var fikFields = [
				document.querySelector('#frm\\:fik_0'),
				document.querySelector('#frm\\:fik_1'),
				document.querySelector('#frm\\:fik_2'),
				document.querySelector('#frm\\:fik_3'),
				document.querySelector('#frm\\:fik_4'),
				document.querySelector('#frm\\:fik_5'),
			];
			fillFik(fikFields, data.fik);
		}

		if(data.bkp) {
			var bkpFields = [
				document.querySelector('#frm\\:bkp_0'),
				document.querySelector('#frm\\:bkp_1'),
				document.querySelector('#frm\\:bkp_2'),
				document.querySelector('#frm\\:bkp_3'),
				document.querySelector('#frm\\:bkp_4'),
			];
			fillBkp(bkpFields, data.bkp);
		}
	}

	function fillDic(dicField, dic) {
		fillField(priceField, price);
	}

	function fillDate(datumFields, dateString) {
		var date = parseDate(dateString);
		fillField(datumFields[0], date.getDate() + "." + (date.getMonth()+1) + "." + date.getFullYear());
		fillField(datumFields[1], date.getHours() + ":" + twoZero(date.getMinutes()) + ":" + twoZero(date.getSeconds()));
	}

	function fillPrice(priceField, price) {
		fillField(priceField, price);
	}

	function fillFik(fikFields, fik) {
		var matches = fik.match(/^([0-9a-z]{8})-?([0-9a-z]{4})-?([0-9a-z]{4})-?([0-9a-z]{4})-?([0-9a-z]{12})-?([0-9a-z]{2})$/i);
		if(matches) {
			fillField(fikFields[0], matches[1]);
			fillField(fikFields[1], matches[2]);
			fillField(fikFields[2], matches[3]);
			fillField(fikFields[3], matches[4]);
			fillField(fikFields[4], matches[5]);
			fillField(fikFields[5], matches[6]);
		}
	}

	function fillBkp(bkpFields, bkp) {
		var matches = bkp.match(/^([0-9a-z]{8})-?([0-9a-z]{8})-?([0-9a-z]{8})-?([0-9a-z]{8})-?([0-9a-z]{8})$/i);
		fillField(bkpFields[0], matches[1]);
		fillField(bkpFields[1], matches[2]);
		fillField(bkpFields[2], matches[3]);
		fillField(bkpFields[3], matches[4]);
		fillField(bkpFields[4], matches[5]);
	}

	function fillField(field, value) {
		field.focus(); // reach original form validation
		field.value = value;
	}

	function parseDate(dateString) {
		return new Date(dateString);
	}

	function twoZero(value) {
		return (value < 10 ? '0' : '') + value;
	}

})();


