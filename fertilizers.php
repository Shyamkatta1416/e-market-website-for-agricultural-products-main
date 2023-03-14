

<!DOCTYPE html>
<html
>

<head>
    
    <title>Fertilizers</title>
	
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="buy.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="buy.css" />


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
   

	<style> 
	*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: 'Poppins', sans-serif;
}

  
  .container{
	display: flex;
	align-items: right;
	justify-content: center
  }

  img {
	max-width: 500%
  }

  .image {
	flex-basis: 90%
  }

  .product_details {
	font-size: 20px;
	padding-left: 90px;
	padding-right:60px;
	padding-bottom: 80px;
	padding-top: 80px;
	border: 3px solid green;
 }
    </style>
</head>


<body>

<header class="header">

<a href="#" class="logo"> <i class="fas fa-shopping-basket"></i> Agri-E </a>



<div class="icons">
	<div class="fas fa-bars" id="menu-btn"></div>
	<div class="fas fa-search" id="search-btn"></div>
	<div class="fas fa-shopping-cart" id="cart-btn"></div>
	<div class="fas fa-user" id="login-btn"></div>
</div>

<form action="" class="search-form">
	<input type="search" id="search-box" placeholder="search here...">
	<label for="search-box" class="fas fa-search"></label>
</form>

<div class="shopping-cart">
	<div class="box">
		<i class="fas fa-trash"></i>
		<img src="images/Ammonium Nitrate.jpg" alt="">
		<div class="content">
			<h3>Ammonium Nitrate</h3>
			<span class="price">₹900/-</span>
			<span class="quantity">qty : 1</span>
		</div>
	</div>
	<div class="box">
		<i class="fas fa-trash"></i>
		<img src="images/Urea.jpg" alt="">
		<div class="content">
			<h3>Urea</h3>
			<span class="price">₹950/-</span>
			<span class="quantity">qty : 1</span>
		</div>
	</div>
	<div class="box">
		<i class="fas fa-trash"></i>
		<img src="images/ammonium sulphate.jpg" alt="">
		<div class="content">
			<h3>Ammonia Sulphate</h3>
			<span class="price">₹1,000/-</span>
			<span class="quantity">qty : 1</span>
		</div>
	</div>
	<div class="total"> total :₹ /- </div>
	<a href="#" class="btn">checkout</a>
</div>

<form action="" class="login-form">
	<h3>login now</h3>
	<input type="email" placeholder="your email" class="box">
	<input type="password" placeholder="your password" class="box">
	<p>forget your password <a href="#">click here</a></p>
	<p>don't have an account <a href="#">create now</a></p>
	<input type="submit" value="login now" class="btn">
</form>

</header>


    <div id="display-image">
		<?php
		$avg = 0;
		$db = mysqli_connect("localhost", "root", "", "agri-e");
		$query = "SELECT * FROM fertilizers_vw";
		$result = mysqli_query($db, $query);
		$query2="SELECT AVG(price) as average FROM user;";
		$tot =mysqli_query($db, $query2);
		$row = mysqli_fetch_assoc($tot);
		$average= $row['average'];

		//to get gov limit content value
		//$query3= "SELECT * from fertilizers";
		//$result2= mysqli_query($db,$query3);
		
		
		 
		
		while ($data = mysqli_fetch_assoc($result)) {
			//$gov_limit=mysqli_fetch_assoc($result2);
		?>   
		    <div class = "container" >
				<div class ="image"> 
					<img src="./image/<?php echo $data['filename']; ?>" width="500" height="600">
		        </div>
			
		       <div class ="product_details"> 
				
			    <p> <h3><?php echo $data['name']; ?> </h3><br><br>
				price: Rs.<?php echo $data['price']; ?><br><br>
				the average price for these products is : <?php echo $average; ?><br><br>
			    
				the content in w/v =<?php echo $data['content'];?><br><br>
				the government limit (minimum): <?php echo $data['gov_content'];?> </p> <br>
				<button>Buy!</button>
				
		      </div>
				

			</div>
			
			
			
		<?php
		}
		?>
		
	</div>
</body>
</html>