<html>
<head>
  <meta charset="UTF-8">
  <title>Homepage</title>
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.1/masonry.pkgd.js"></script>

</head>
<style>
  .logo {
    text-align: center;
    margin: 25px 0;
  }
  .nav {
    height: 50px;
  }
  .nav > li > a {
    color: #000;
  }
  .container-fluid {
    border-top: 1px solid #eee;
  }
  .grid{
    margin-top: 30px;
  } 
</style>
<script>
$(document).ready(function() {
  $('.grid').masonry({
    // options
    itemSelector: '.grid-item',
    columnWidth: 150
  });
});
</script>
<body>
  <div class="container">
    <div class="logo"><a href="/"><img src="/assets/logo.gif"></a></div>
    
    <ul class="nav nav-pills nav-justified">
      <li role="presentation"><a href="/">HOME</a></li>
      <li role="presentation"><a href="/products">WOMEN</a></li>
      <li role="presentation"><a href="/products">PRODUCTS</a></li>
      <li role="presentation"><a href="/products">SALE</a></li>
      <li role="presentation"><a href="/products">NEW ARRIVALS</a></li>
      <li role="presentation"><a href="/products">BEST SELLERS</a></li>
      <li role="presentation"><a href="/main/logoff">LOG OFF</a></li>
    </ul> 
    <div class="container-fluid">
      <div class="grid">
        <div class="grid-item"><a href="/products/category/1"><img src="/assets/jewlery.jpg" width="277" height="440"></a></div>
        <div class="grid-item"><a href="/products/category/4"><img src="/assets/bag.jpg" width="277" height="244"></a></div>
        <div class="grid-item"><a href="/products/category/5"><img src="/assets/brown_shoes_main.jpg" width="200" height="260"></a></div>
        <div class="grid-item"><a href="/products/category/2"><img src="/assets/perfume.jpg" width="120" height="360"></a></div>
        <div class="grid-item"><a href="/products/category/1"><img src="/assets/athletic shoes.jpg" width="178" height="244"></a></div>
        <div class="grid-item"><a href="/products/category/3"><img src="/assets/summer.jpg" width="277" height="440"></a></div>
        <div class="grid-item"><a href="/products/category/3"><img src="/assets/dress.jpg" width="260" height="360"></a></div>
        <div class="grid-item"><a href="/products/category/1"><img src="/assets/accessories_neckpiece_1.jpg" width="277" height="440"></a></div>
                <div class="grid-item"><a href="/products/category/1"><img src="/assets/watch.jpg" width="220" height="360"></a></div>
        <div class="grid-item"><a href="/products/category/1"><img src="/assets/watches.jpg" width="178" height="360"></a></div>

      </div>
    </div> 
  </div> 
</body>
</html>