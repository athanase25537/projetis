<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
		<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" /> -->
        <link href="../src/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="../src/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="../src/assets/css/all.min.css">
        <link href="../src/assets/css/style.css" rel="stylesheet" />

		<title><?= $title ?></title>
	</head>
	<body class="d-flex justify-content-center">
	<nav class="navbar navbar-light fixed-top bg-transparent">
		<div class="container-fluid">
			<a class="navbar-brand text-white">Contruction Services</a>
			<div class="links d-flex justify-content-end w-50">
				<a href="#" class="text-white m-3">About</a>
				<?php if(!empty($_SESSION)): ?>
					<a class="text-white m-3" href="../src/controllers/logout.php">Deconnecter</a>
				<?php else: ?>
					<a href="index.php" class="text-white m-3">Retour</a>
				<?php endif ?>
			</div>
		</div>
	</nav>
		<div class="container m-3">
        <?= $content ?>
		</div>
    </body>
</html>