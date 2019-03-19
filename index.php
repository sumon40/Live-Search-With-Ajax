<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Ajax Live Search</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	</head>
 <body>
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-8 mx-auto">
				<div class="card">
					<div class="card-header text-center bg-primary text-light text-uppercase">Ajax Live Data Search</div>
					<div class="card-body">
						<div class="form-group">
							<input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
						</div>
					</div>
				</div>
				<div id="result"></div>
			</div>
		</div>
	</div>

	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

	<script>
		$(function(){
			load_data();

			function load_data(query){
				$.ajax({
					url:"backend.php",
					method:"POST",
					data:{query:query},
					success:function(data){
						$('#result').html(data);
					}
				});
			}

			$('#search_text').keyup(function(){
				var search = $(this).val();
				if(search != ''){
					load_data(search);
				} else {
					load_data();
				}
			});
		});
	</script>
</body>
</html>