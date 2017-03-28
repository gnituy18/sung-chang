<form method="post" action="/authenticate">
	<div>
		<input type="text" name="password">
	</div>
	<div>
		<input type="submit">
	</div>
	{{ csrf_field() }}
</form>
