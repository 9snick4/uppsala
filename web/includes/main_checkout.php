<?php
	session_start();	
?>
<div id="checkout_container"class="container">
	<div class="row">
		<div class="col-md-3 order-md-2 mb-4">
	      	<h4 class="d-flex justify-content-between align-items-center mb-3">
		        <span class="text-muted">Your cart</span>
		        <span id="total_items" class="badge badge-secondary badge-pill">3</span>
	      	</h4>
	      	<ul class="list-group mb-3">
		        <?php
		        	$totals=0;
		        	for ($i=0; $i < ($_SESSION['nItems']) ; $i++) { 
		        		$img = $_SESSION['img'.$i];
		        		$name=$_SESSION['name'.$i];
		        		$price=( $_SESSION['quantity'.$i]<=1 ) ? 
		        				$_SESSION['price'.$i]."$" : 
		        				intval($_SESSION['price'.$i]*$_SESSION['quantity'.$i])."$</br>".
		        				"<small>(".$_SESSION['price'.$i]."$ x".$_SESSION['quantity'.$i].")</small>";
		        		echo '<li class="list-group-item d-flex justify-content-between lh-condensed">';
		        		echo '	<div>';
		        		echo '		<img src="'.$img.'" class="checkout_img">';
		        		echo '		<h6 class="my-0">'.$name.'</h6>';
		        		echo '	</div>';
		        		echo '	<span class="text-muted checkout_pricing">'.$price.'</span>';
		        		echo '</li>';
		        		$totals+= 1*$_SESSION['quantity'.$i];
		        	}
		        ?>

		        <li class="list-group-item d-flex justify-content-between">
		          	<span>Total (USD)</span>
		          	<strong><?php echo $_SESSION['total']."$"; ?></strong>
		        </li>
	      	</ul>

	        <div class="input-group">
	          <div class="input-group-append centered">
	            <a href="cart.php" type="submit" class="btn btn-secondary ">Back to cart</a>
	          </div>
	        </div>

		</div>
		<div class="col-md-9 order-md-1">
	       <h4 class="mb-3">Shipping address</h4>
	       	<form action="payment.php" method="POST" class="needs-validation was-validated" novalidate="">
		        
		        <div class="row">

		          	<div class="col-md-6 mb-3">
		            	<label for="firstName">First name</label>
	            		<input type="text" class="form-control" id="firstName" name="first_name" placeholder="" value="" required="">
			            <div class="invalid-feedback">
			             	Valid first name is required.
			            </div>
	         		</div>

		          	<div class="col-md-6 mb-3">
			            <label for="lastName">Last name</label>
			            <input type="text" class="form-control" id="lastName" name="last_name" placeholder="" value="" required="">
			            <div class="invalid-feedback">
			              Valid last name is required.
			            </div>
		          	</div>
		        </div>

		        <div class="mb-3">
		          	<label for="username">Email</label>
		          	<div class="input-group">
		            	<div class="input-group-prepend">
		              		<span class="input-group-text">@</span>
		            	</div>
		            	<input type="email" class="form-control" id="username" name="email" placeholder="Email" required="">
		            	<div class="invalid-feedback" style="width: 100%;">
		             		Your Email is required.
		            	</div>
		          	</div>
		        </div>

		        <div class="row">
		          	<div class="col-md-5 mb-3">
		            	<label for="country">Country</label>
		            	<select class="custom-select d-block w-100 countries" id="country" name="country" required="">
		            	</select>
		            	<div class="invalid-feedback">
		              		Please select a valid country.
		            	</div>
		          	</div>

		          	<div class="col-md-4 mb-3">
		            	<label for="state">State</label>
		            	<div class="option" id="state" name="state" required="">
			            	
			            	<select class="Africa custom-select w-100">
			            	</select>

			            	<select class="America custom-select w-100">
			            	</select>

			            	<select class="Asia custom-select w-100">
			            	</select>

			            	<select class="Europe custom-select w-100">
			            	</select>

		            	</div>
			            <div class="invalid-feedback">
			              	Please provide a valid state.
			            </div>
		          	</div>
		          	<div class="col-md-3 mb-3">
			            <label for="zip">Zip</label>
			            <input type="text" class="form-control" id="zip" name="zip_code" placeholder="23876" required="">
			            <div class="invalid-feedback">
			              	Zip code required.
			            </div>
		          	</div>
		        </div>

		        <div class="mb-3">
		          	<label for="address">Address</label>
		          	<input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required="">
		          	<div class="invalid-feedback">
		            	Please enter your shipping address.
		          	</div>
		        </div>

		        <div class="mb-3">
		          	<label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
		          	<input type="text" class="form-control" id="address2" name="addr_2" placeholder="Apartment or suite">
		        </div>

		        <hr class="mb-4">
		        <div class="custom-control custom-checkbox">
		          	<input type="checkbox" class="custom-control-input" id="same-address">
		          	<label class="custom-control-label" for="same-address">Shipping address is not the same as my billing address</label>
		        </div>

				<div id="billing_address" class="mb-3">
				  	<hr class="mb-4">
				  	<label for="billing_addr">Billing Address <span class="text-muted">(Optional)</span></label>
				  	<input type="text" class="form-control" id="billing_addr" name="billing_addr" placeholder="Billing address">
				</div>

		        <hr class="mb-4">
		        <div class="centered">By clicking to continue we will be sending you an email to the provided email address</div>
		        <input class="btn btn-secondary btn-lg btn-block" type="submit" value="Pay Now">
	      		
	      	</form>
        </div>
	</div>
</div>

<?php
 session_destroy();
?>

<script>
	window.onload = function(){

		$("#total_items").html(<?php echo json_encode($totals); ?>)

		$(function () {
		   		    
		    var CountSelect = $('.countries'),
		    
		        myCountries = ['Africa', 'America', 'Asia', 'Europe'], // australia does not exist
		        
		        Africa = ['-- not selected --','Egypt', 'South-Africa', 'Ghana', 'Maroco', 'Other'],
		        
		        America = ['-- not selected --','Utha', 'New-York','California','Colorado','Arizona','Texas','Other'],
		        
		        Asia = ['-- not selected --','Japan', 'Philippines', 'Cambodia', 'China', 'India', 'Other'],
		        
		        Europe = ['-- not selected --','Italy', 'Germany', 'Austria', 'Spain', 'England', 'France', 'Other'];
		        
		    // Function Create Option    
		    
		    function CreateOption(valriable, elementToAppend) {
		        
		        var i;
		        
		        for (i = 0; i < valriable.length; i += 1) {
		    
		            $('<option>', {value: valriable[i], text: valriable[i], id: valriable[i]})
		                .appendTo(elementToAppend);
		        }
		    }
		    
		    
		    // Create Option myCountries
		    CreateOption(myCountries, $('.countries'));
		    
		    // Create Option Africa
		    CreateOption(Africa, $('.Africa'));
		    
		    // Create Option Africa
		    CreateOption(America, $('.America'));
		    
		    // Create Option Africa
		    CreateOption(Asia, $('.Asia'));
		    
		    // Create Option Africa
		    CreateOption(Europe, $('.Europe'));
		    
		    // Hide All Select
		    $('.option select').hide();
		    
		    // Show First Selected
		    $('.Africa').show().css('display', 'inline-block');
		    
		    
		    
		    // Show List Option City Whene user Chosse Countries
		    
		    CountSelect.on('change', function () {
		        
		        // get Id option 
		        var myId = $(this).find(':selected').attr('id');
		        console.log($(this).val());
		        // Show Select Has class = Id And Hide Siblings
		        $('.option select').filter('.' + myId).fadeIn(400).siblings('select').hide();
		        
		    });
		    
		});

		$("#same-address").change(function() {
		    if(this.checked) {
		        $('#billing_address').addClass("collapsed");
		        $('#billing_addr').addClass("collapsed");
		    }
		    else{
		    	$('#billing_address').removeClass("collapsed");
		    	$('#billing_addr').removeClass("collapsed");
		    }
});
	}
</script>