<?php
ob_start();
session_start();
$title = "Home";
$active = "home";
require_once 'partials/init.php';
?>
    <script src="validation.js"></script>
	<script>
		document.body.onload = function () {
			var selectBox = $("#countrySelect");
			selectBox.on('change', function () {
				if ($(this).val() === 'egypt') {
					$("#state").removeClass('d-none');
				} else {
					$('#state').addClass('d-none');
				}
			});
		}
	</script>
    
    <?php

ob_end_flush();
?>