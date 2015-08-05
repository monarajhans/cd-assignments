
<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	 <link rel="stylesheet" href="http://design-seeds.com/palettes/12/ColorFramed.png">
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	 <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	 <style>
	 #right
	 {
	 	margin-left: 600px;
	 }
	 .navbar
	 {
	 	background-color: #600000 ;
	 }
	 #add
	 {
	 	margin-left: 820px;
	 }

	 </style>
	 <script>
  	$(document).ready(function() {

  		$(window).load(function() {
      $.get('/dashboard/allproducts', function(res) {
        $('.allproducts').html(res);
      });
      return false;
    });
	
    $(".numbers a").click(function(){ 
     var link = $(this).attr('href');
      $.get(link, function(res) {
        $('.allproducts').html(res);
      });
      return false;
    });
    $("input[type='text']").keyup(function() {
    $name = $(this).val();
      $.get('/dashboard/productname/' + $name, function(name){
        $('.allproducts').html(name);
      });
    });
   
  });	
</script>
	
</head>
<body>
	<div class="container">
	<div class="navbar" >
      <ul class="nav navbar-nav">
        <!--<li><a href="">Dashboard</a></li> -->
        <li><a href="/">Orders</a></li>
        <li style="color:white;margin-top:14px;">Products</li>
        <li><a href="" id="right">Log off</a></li>
      </ul>  
    </div>
    <div id="topbar">
    	<form action="/dashboard/add_product" method="post" >
    	<input  type="text" name="search" placeholder="search" >
    	<input type="submit" value="Add new product" class="btn btn-danger" id="add">
    	</form>

    </div>

	<table class="table table-striped table-bordered" >
		<thead>
			<tr>
				<th class="col-md-2">Picture </th>
				<th class="col-md-1"> ID</th>
				<th class="col-md-2">Name</th>
				<th class="col-md-2"> Inventory count</th>
				<th class="col-md-2">Quantity Sold</th>
				<th class="col-md-1">Action</th>
			</tr>
		</thead>    
		<tbody class="allproducts">

		</tbody>
		
	</table>
		<div class="numbers"><?php echo $pagelinks;?></div> 
	</div>
	</body>
	</html>
