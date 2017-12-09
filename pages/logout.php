<?php

	if ($_SESSION['userloggedin'] == 1) {
		$_SESSION['userloggedin'] = 0;
		session_destroy();
		header("Location: ../index.php?id=home");
		exit();
	}
	else {
		header("Location: ../index.php?id=home");
	}
?>