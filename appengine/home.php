<?php

require_once(__DIR__.'/class/Extension.php');

use \Eet\Extension;

?>
<!DOCTYPE html>
<html>
	<head>
		<base target="_top">
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="./static/loader.css">
		<link rel="chrome-webstore-item" href="https://chrome.google.com/webstore/detail/oclaelbdlbdkemcdhilhhdegbgdlplbi">
		<style>
			body {
				background-color: #eee;
				background-repeat: no-repeat;
				font-family: 'Roboto Condensed', Arial, Helvetica, sans-serif;
				color: #333;
				margin: 10px;
			}
			body, .h1, h1  {
				font-weight: 400;
			}
			.h2, .h3, .h4, .h5, .h6, h2, h3, h4, h5, h6, th {
				font-weight: 700;
			}
			#page {
				max-width: 500px;
				margin: 10px auto 5px;
				border: 1px solid #888;
				background-color: white;
				border-radius: 5px;
				padding: 15px 15px 0;
				box-shadow: 0 0 15px -5px black;
			}
			.logo {
				text-align: center;
			}
			h1 {
				margin-top: 0;
				text-align: center;
			}
			.ask {
				text-align: center;
			}
			.note {
				display: block;
				color: gray;
			}
			.footer {
				font-size: small;
				text-align: center;
				max-width: 500px;
				margin: 0 auto 30px;
				color: gray;
			}
			p {
				padding-top: 0.8em;
			}
			.form-control, .btn {
				transition: background-color 0.3s, opacity 0.3s, background-position 0.3s;
			}
			.alert {
				margin-top: 20px;
				margin-bottom: 0;
			}
			.info-box .table>tbody>tr:first-child>th, .info-box .table>tbody>tr:first-child>td {
				border-top: none;
			}
			.info-box .table {
				margin-bottom: 0;
			}
			.hidden-on-start, .template-child {
				display: none;
			}
		</style>
		<script>
			$(window).load(function(){
				init();
			});

			function init() {
				endProcess();
				var button = $('#run-installation');
				button.on('click', install);
			}

			function install() {
				startProcess();
				chrome.webstore.install("https://chrome.google.com/webstore/detail/oclaelbdlbdkemcdhilhhdegbgdlplbi", afterInstalationProcess, afterInstalationProcess);
			}

			function startProcess() {
				$("#loader-block").show();
			}

			function endProcess() {
				$("#loader-block").hide();
			}

			function afterInstalationProcess() {
				window.setTimeout( function(){
					document.location.reload();
				}, 1000);
			}
		</script>
	</head>
	<body>
		<div id="page" class="container">
			<div class="panel panel-default">
				<div class="panel-body">

			<h1>EET Check</h1>
			<div class="row">
				<?php if(Extension::isInstalled()): ?>
				<p class="text-center">Aplikace je správně nainstalována
				<?php else: ?>
				<p class="text-center">Pro spuštění aplikace je nezbytné do prohlížeče nainstalovat rozšíření EET Check
				<div class="col text-center"><button id="run-installation" class="btn btn-primary disableable"><i class="glyphicon glyphicon-cog"></i> Nainstalovat EET Check</button></div>
			<?php endif ?>
			</div>
			<div id="error" class="alert alert-danger hidden-on-start" role="alert"></div>
			</div></div>
			<div id="content">
				<div id="loader-block">
					<div class="loader" id="loader"></div>
				</div>
			</div>
		</div>
		<div class="footer">
			Pokud aplikace nefunguje správně, kontaktujte mě prosím:
			<a href="mailto:pan@jakubboucek.cz?subject=EET+Check+doesn't+work&amp;body=This+tool:+https://eet-check.appspot.com">
					pan@jakubboucek.cz</a>
		</div>
	</body>
</html>