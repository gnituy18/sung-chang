<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<style media="screen">
		.wrapper {
			clear: both;
			text-align: center;
			height: 100vh;
			}

		.wrapper:before {
			content: "";
			height: 100%;
			display: inline-block;
			vertical-align: middle;
		}

		.center {
		vertical-align: middle;
		display: inline-block;
		}
	</style>
	<body>
		<div class="wrapper">
			<div class="center">
				<form class="form-inline" method="post" action="/authenticate">
					<div class="form-group">
						<input class="form-control" type="password" placeholder="Password" name="password">
					</div>
					<div class="form-group">
						<input class="form-control" type="submit">
					</div>
					{{ csrf_field() }}
				</form>
			</div>
		</div>

	</body>
</html>
