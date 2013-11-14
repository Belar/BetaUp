<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<div>			
			<p>Activation code: {{ URL::to('/beta/activate', array($activation_code)) }}</p>
		</div>
	</body>
</html>