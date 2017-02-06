<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl" xml:lang="pl">
    <head>
        <title>Konwerter Temperatur</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <script src="script.js"></script>
    </head>
    <body>
		<div class="outer">
		<div class="inner">
		<div class="main">
			<form action="index.php" method="get">
				<div>
					<label for="temperature">Temperatura: </label>
					<input type="text" name="temperature" id="temperature" value="<?php echo $value; ?>"></input>
				</div>
				<div>
					<div class="scale">
						<div>Skala: </div>
						<?php
							$scale = $sourceScaleText;
							$name = 'from';
							include 'view/ScaleSelection.php';
						?>
					</div>
					<div class="scale">
						<div>Skala docelowa: </div>
						<?php
							$scale = $destinationScaleText;
							$name = 'to';
							include 'view/ScaleSelection.php';
						?>
					</div>
				</div>
				<div class="submit">
					<input type="submit" value="Przelicz">
				</div>
			</form>
			<?php
				if ($errors !== '') {
			?>
			<div class="errors">
				<?php echo $errors; ?>
			</div>
			<?php
				}
			?>
			<?php
				if ($resultAvailable === true) {
			?>
			<div class="wynik">
				<?php echo $sourceTemperature; ?>
				&nbsp;to&nbsp;
				<?php echo $destinationTemperature; ?>
			</div>
			<?php
				}
			?>
		</div>
		</div>
		</div>
    </body>
</html>
