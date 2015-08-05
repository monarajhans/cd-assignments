<!DOCTYPE html>
<html>
<head>
	<title>Orders</title>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	 <link rel="stylesheet" href="http://design-seeds.com/palettes/12/ColorFramed.png">
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	 <style>
	 #right
	 {
	 	margin-left: 600px;
	 }
	 .navbar
	 {
	 	background-color: #600000 ;
	 }
	 </style>
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  	<script>
  	$(document).ready(function() {

  		$(window).load(function() { //This loads the partial allusers when the document is loaded
      $.get('/dashboard/allusers/', function(res) {
        $('.allusers').html(res);
      });
      return false;
    });
	
    $(".numbers a").click(function(){ //pagination
     var link = $(this).attr('href');
      $.get(link, function(res) {
        $('.allusers').html(res);
      });
      return false;
    });
    $("input[type='text']").keyup(function() { //this will append the partial containing information about the user that has been searched.
    $name = $(this).val();
      $.get('/dashboard/username/' + $name, function(name){
        $('.allusers').html(name);
      });
    });
   
    var list_select_id = 'list-select'; //this will append the partial containing information about status when the option is chnanged.
    $('#list-select').change(function(){
    $selectvalue = $(this).val();
    $.get('/dashboard/get_by_order/'+$selectvalue,function(order){
    		$('.allusers').html(order);


    	});
	});

	$(document).on("change",'.status-change' ,function(){ // this will change the status of the product
		$(this).submit();

		});
   	});
  	</script>
</head>
<body>
	<div class="container">
	<div class="navbar" >
      <ul class="nav navbar-nav">
        <li style="color:white;margin-top:14px;">Orders</li>
        <li><a href="/dashboard/products">Products</a></li>
        <li><a href="" id="right">Log off</a></li>
      </ul>  
    </div>
    <div id="topbar">
    	<form action="" method="post" class="form-group col-lg-2">
    	<input class="form-control " type="text" name="search" placeholder="search">
    	<select class="form-control" name="list-select" id="list-select" >
    		<option value="">Please select..</option>
  			<option value="order-in-process">order in process</option>
  			<option value="shipped">shipped</option>
		</select>
	</form>
    </div>

	<table class="table table-striped table-bordered" >
		<thead>
			<tr>
				<th class="col-md-1">Order ID</th>
				<th class="col-md-2">Name</th>
				<th class="col-md-2"> Date</th>
				<th class="col-md-2">Biiling Address</th>
				<th class="col-md-1">Total</th>
				<th class="col-md-1">Status</th>
				<th class="col-md-2">Status Change </th>
			</tr>
		</thead>    
		<tbody class="allusers"> <!-- This is where the partial will get appended -->

		</tbody>
	</table>
		<div class="numbers"><?php echo $pagelinks;?></div>
	</div>
	</body>
	</html>
	