<?php
session_start();
// if( $_SESSION['username'] && $_SESSION['password'] ) {
include_once("header.php");
?>

<div class="dashboard">

	<div class="menu">
		
			<ul>
			<li><a href="?content=item1">Order</a></li>
			<?php
		if (isset($_SESSION['username']) && isset($_SESSION['password']) && !empty($_SESSION['username']) && !empty($_SESSION['password'])) {
			?>
			<li><a href="?content=item2">Food</a></li>
			<li><a href="?content=item3">Employee</a></li>
			<?php } ?>
			<li><a href="?content=item4">View Bill</a></li>
			<li><a href="?content=item5">Reports</a></li>
			
		</ul>
	</div>
<div class="content">
	<ul>
	<button class="menu-icon"><i class="fa-solid fa-bars"></i></button>
	<li class="logout"><a href="?content=item6">Logout</a></li>
	</ul>
	<?php 
	 if( isset( $_GET['content'] ) ){

		 include('content.php');
	 } else {
	 ?>
	 <div class="main-page">
	<h1>Welcome to our Resturant</h1>
	<p>The first restaurant proprietor is believed to have been one A. Boulanger, a soup vendor, who opened his business in Paris in 1765. The sign above his door advertised restoratives, or restaurants, referring to the soups and broths available within. The institution took its name from that sign, and restaurant now denotes a public eating place in English, French, Dutch, Danish, Norwegian, Romanian, and many other languages, with some variations. For example, in Spanish and Portuguese the word becomes restaurante, in Italian it is ristorante, in Swedish restaurang, in Russian restoran, and in Polish restauracia.</p>
	</div>
	<?php } ?>
</div>
</div>





<?php
include_once("footer.php");
	//  }
	//  else {
	//     header("Location: http://localhost/resturant");
	//  }
?>

<script>
    const menuIcon = document.querySelector('.menu-icon');
    const menuList = document.querySelector('.menu');

    menuIcon.addEventListener('click', () => {
		menuList.classList.toggle('show');
    });


</script>
