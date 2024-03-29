<html >
    <head>
        <meta charset="UTF-8">
        <meta name="description" content=">FRCS Mock-Exam Course | Viva And Clinical With Individual Feedback" />
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="FRCS Mock-Exam Course" />
        <meta property="og:description" content="Viva And Clinical With Individual Feedback" />
        <meta property="og:image" content="<?php echo e(asset('/img/link_preview.png')); ?>"/>
        <meta property="og:url" content="<?php echo e(url('/')); ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <link rel="shortcut icon" href="<?php echo e(asset('/img/favicon-32x32.png')); ?>" type="image/x-icon" />
        <title><?php echo $__env->yieldContent('page_title', env('APP_NAME')); ?></title>
        <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.css"/>
        <!-- <link rel="stylesheet" href="" /> -->
        <style>
            body {
                font-family: Muli;
                /* cursor:unset; */
            }
            .navbar {
                padding-top: 0;
                padding-bottom: 0;
                padding-left: 3.5rem;
                padding-right: 3.5rem;
                -webkit-box-shadow: 4px 0 20px -5px rgb(188 207 223);
                box-shadow: 4px 0 20px -5px rgb(188 207 223);
            }
            
            .navbar{
                transition:500ms ease;
                background: #fffffffa;
            }

            li > .nav-link {
                padding: 20px;
                color: #444242d9;
                display: inline-block;
                text-decoration: none!important;
                font-size: 15.5px;
                margin: 0px 20px;
            }
            li > .nav-link > span:hover, li > .nav-link > span:active,
                .nav-link:active > span {
                border-bottom: 2px solid blue;   
                color: #000;  
            }
            .d-flex-nav {
                width:100%;
            }

            .shopping_cart_btn {
                color: #003e71;
                background: transparent;
                border: 2px solid #003e71;
                width: 90;
                border-radius: 15px;
                font-size: 15px;
            }
            .shopping_cart_btn:hover {
                color: #fff;
                background: #003e71;
                transform: scale(1.09);
            }
            
            .form-control {
                height: 48px;
                font-family: "Muli", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            }


            .nav_bar_logo {
                display: block;
                margin: auto;
                height: 100px;
                width: 300px;
                padding: 0px;
                object-fit: cover;
                padding:5px;
                /*margin-left: -20px;*/
            }
                
            .intro_subtitle_mainsection {
                position: absolute;bottom: 0;
            }
            
            @media  only screen and (max-width: 920px) {
                .navbar {
                    padding-left: 1rem !important;
                    padding-right: 1rem !important;
                    justify-content: normal;
                    /* padding-top: 15px;
                    align-items: unset;   */
                }
                
                .intro_subtitle_mainsection {
                    position: unset;bottom: 0;
                }
                 
                .nab_bar_logo {
                    margin-left: unset;
                }
                
                #navbarSupportedContent {
                    position: absolute;
                    background: #fffffffa;
                    width: 100%;
                    left: 0px;
                    top: 95px;
                    padding: 20px;
                    border-top: 3px solid #3d709b;
                }
                .navbar-nav .nav-link {
                    margin: 0;
                }
                .site-logo {
                    /*margin: auto;*/
                }
            }

            .footer-section {
                padding: 3em 0em;
                width:100%;
                text-align:center;
                background-image: url('<?php echo e(asset('/img/underwater_bubbling.gif')); ?>');
                color:#fff;
            }
		  .course h3 {
		   font-size: 1.15rem;
		   color: #000;
		   }
		   .course .course-price {
		   position: absolute;
		   padding: 10px 15px;
		   background:  #003e71;
		   color: #fff;
		   top: -20px;
		   right: 0;
		   border-top-left-radius: 4px;
		   border-bottom-left-radius: 4px;
		   }
		   .course .meta {
		   font-size: .9rem;
		   display: block;
		   margin-bottom: .9rem;
		   }
		   .course .course-inner-text {
		   position: relative;
		   padding-top: 35px !important;
		   }
		   .course .meta span {
		   margin-right: .5rem;
		   }
		   .course a {
		   color:  #003e71;
		   text-decoration: none;
		   background-color: transparent;
		   }
		   .my_course {
		   box-shadow: 0px 1px 3px 1px #d1cfcfc2;
		   -webkit-box-shadow: 0px 1px 3px 1px #d1cfcfc2;
		   }
		   .scale_course:hover {
		   transform: scale(1.02);
		   }
		   .shopping_btn {
		   width: 100%;
		   background:  #003e71;
		   color: #fff;
		   }
		   .p_course {
		   min-height: 100px;
		   }

			.modal-header {
			background: #003e71;
			color: #fff;
			}
			.validation_error  {
				list-style: none;
				padding: 0;
			}
            .edit_btn {
                font-size: 20px;
                color: #003e71;
                cursor: pointer;
            }
            .border_b_cart {
                border-bottom: 1px solid #ccc;
                padding-bottom: 10px;
                padding-top: 10px;
                color: #353333a8;
            }
            .del_cart_item { 
                margin: 0px 5px;
                font-size: 18px;
                color: #a60303d1;
            }
        </style>
    </head>
    
    <body>
            <link itemprop="thumbnailUrl" href="<?php echo e(asset('/img/link_preview.png')); ?>">
        <span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject">
        <link itemprop="url" href="<?php echo e(asset('/img/link_preview.png')); ?>"></span>
        <nav class="navbar sticky-top navbar-expand-md" style="min-height:60px;"> 
        
            <button class="navbar-toggler" type="button" data-toggle="collapse" 
            data-target="#navbarSupportedContent"  aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span>   
            </button>
            
            <div class="site-logo"><a href="/">
                <img src="<?php echo e(asset('/img/logo.svg')); ?>" class="nav_bar_logo" /></a>
            </div>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto">
                    <li><a   href="/#home-section" class="nav-link active"><span>Home</span></a></li>
                    <li><a href="/#courses-section" class="nav-link"><span>Courses</span></a></li>
                    <li><a href="/#teachers-section" class="nav-link"><span>Teaching Faculty</span></a></li>
                    <li><a href="/#review-section" class="nav-link"><span>Testimonials</span></a></li>
                    <li><a href="/#study_aid_section" class="nav-link"><span>Revision Book</span></a></li>
                    <li><a href="/#contact-section" class="nav-link"><span>Contact</span></a></li>

					<?php if(auth()->guard()->check()): ?>	

				<?php if(Auth::User()->type == 'admin'): ?>
					<li class="nav-item dropdown">
      				  <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" 
						role="button" data-toggle="dropdown" aria-haspopup="true" 
						aria-expanded="false">Admin</a>
					<div class="dropdown-menu" aria-labelledby="adminDropdown">
					  <a class="dropdown-item" href="<?php echo e(route('admin.courses')); ?>">Manage Courses</a>
					  <a class="dropdown-item" href="<?php echo e(route('admin.teachers')); ?>">Manage Faculty</a>
					  <a class="dropdown-item" href="<?php echo e(route('admin.view_payment')); ?>">View Payments</a>
					  <a class="dropdown-item" href="<?php echo e(route('admin.manage_admins')); ?>">Manage Admins</a>
					  <a class="dropdown-item" href="<?php echo e(route('myprofile.update')); ?>">My Settings</a>
					  <div class="dropdown-divider"></div>
					  <a class="dropdown-item" href="javascript:logout()">Logout</a>
					</div>
				  </li>
				<?php endif; ?>

				<?php if(Auth::User()->type == 'user'): ?>
				<li class="nav-item dropdown">
      				  <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" 
						role="button" data-toggle="dropdown" aria-haspopup="true" 
						aria-expanded="false"><?php echo e(Auth::User()->name); ?></a>
					<div class="dropdown-menu" aria-labelledby="adminDropdown">
					  <a class="dropdown-item" href="<?php echo e(route('user.my_courses')); ?>">My Courses</a>
					  <a class="dropdown-item" href="<?php echo e(route('myprofile.update')); ?>">My Settings</a>
					  <div class="dropdown-divider"></div>
					  <a class="dropdown-item" href="javascript:logout()">Logout</a>
					</div>
				  </li>
				<?php endif; ?>
				<?php endif; ?>


			</ul> 
             <!--    <button onclick="renderCart()" data-toggle="modal" data-target="#shopping_cart" class="btn shopping_cart_btn"><i class="fa fa-shopping-cart"></i> Cart</button> -->
            </div>

        </nav>   

            <?php echo $__env->yieldContent('content'); ?>
		<div class="modal fade"  id="modalMessage"  tabindex="-1" role="dialog"
			aria-hidden="true" style="text-align: center;">
			<div class="modal-dialog modal-dialog-centered  mw-75 w-50" role="document"
			 style="display: inline-flex;">
				<div class="modal-content modal-inside bg-purplelobster"
				style="width: 100%;  background-color: <?php echo e(@$color); ?> !important" >
					<div class="modal-header" style="border:0;display:none">&nbsp;</div>
					<div class="modal-body text-center d-flex" style="background: #003e71;color: #fff;
						min-height:150px;align-items: center;justify-content: center;">
						<h5 class="modal-title" id="statusModalLabelMsg"></h5>
					</div>
					<div class="modal-footer" style="border-top:0 none;display:none;">&nbsp;</div>
				</div>
			</div>
		</div>

        <div id="course_res_div"></div>

        <footer class="footer-section">
            <div class="col-md-12">
                <div>
                    <p class="p-0 m-0">
                        Copyright ©2020 All rights reserved | Designed with <i class="fa fa-heart" aria-hidden="true"></i> by <strong><a href="https://www.network-venture.com/" target="_blank" style="color:#fff">Network Venture</a></strong>
                    </p>
                </div>
            </div>
        </footer>

<!-- Modal -->
<div id="shopping_cart" class="modal fade" role="dialog">
  <div class="modal-dialog  modal-dialog-centered" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Shopping Cart</h4>
        <button type="button" class="text-white close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
    <div id="cart_product_details">
    </div>
    <div class="row text-black border_b_cart" style="border:none;">
            <div class="col-md-8">
                <strong>Total</strong>
            </div>
            <div class="col-md-4 text-right">
                <strong id="cart_total_amount"></strong>
                <span  class="text-red del_cart_item close" style="margin: 0px 5px;color:#fff">&times;</span>
            </div>
        </div>
        <form method="post" action="<?php echo e(route('payment.checkout')); ?>">
            <input type="hidden" name="productsInCart" id="productsInCart_input">
            <input type="submit" name="submit" id="checkout_submit" style="display:none;" />
            <?php echo csrf_field(); ?>
        </form>
       <div class="modal-footer" style="border: none;padding: 10px 0px;">
            <button type="button" onclick="cartCheckOut()" class="btn shopping_cart_btn" data-dismiss="modal">Checkout</button>
      </div>
      </div>
    </div>
  </div>
</div>
    </body>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
     integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.js"></script>
    <div id="payment"></div>
    <script> 
        AOS.init();
		$.ajaxSetup({
   			 headers: {
            	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
			}
 		});

		function handleValdationError(data, class_name = '') {
			var response = JSON.parse(data.responseText);
			var errorString = `<ul class="validation_error ${class_name}">`;
			$.each( response.errors, function( key, value) {
				errorString += '<li>' + value + '</li>';
			});
			errorString += '</ul>';
			if (response.success == false)
				return errorString;
			else
				return "Some error occured";
		}
		function logout() {
			$.post("<?php echo e(route('usermanagement.logout')); ?>").done( () => window.location = '/');
		}
		
		function messageModal(msg)
		{
			$('#modalMessage').modal('show');
			$('#statusModalLabelMsg').html(msg);
			setTimeout(function(){
				$('#modalMessage').modal('hide');
				$('#statusModalLabelMsg').html('');
			}, 3500);
		}

        function courseDetails (course_id) {
            $.post("<?php echo e(route('admin.courses.viewCourseDetail')); ?>", {
                course_id : course_id
             }).done( (res) => {
                $("#course_res_div").html(res);
                if ($('.modal.in, .modal.show').length < 1) {
                    $('.modal-backdrop').remove();
                    $("#product_detail_modal").modal('show')
                }
            });
        }
//
        function teacherDetails (teacher_id) {
            $.post("<?php echo e(route('admin.courses.viewTeacherDetail')); ?>", {
                teacher_id : teacher_id
             }).done( (res) => {
                $("#course_res_div").html (res);
                if ($('.modal.in, .modal.show').length < 1) {
                    $('.modal-backdrop').remove();
                    $("#person_detail").modal('show')
                }
            });
        }


        const addToCart = (productId, productName, productPrice) => {
            if (localStorage.getItem('cart') == null) {
                localStorage.setItem('cart', JSON.stringify([]));
            }

            const productsInCart  =  JSON.parse(localStorage.getItem('cart'));
            const isAlreadyInCart = $.grep(productsInCart, el => {return el.id == productId}).length; 
           
            if (!isAlreadyInCart) {    
                
                const newProduct = {
                  id: Number(productId),
                  productName: productName,
                  productPrice: productPrice
                }

                productsInCart.push(newProduct);
            }

            localStorage.setItem('cart', JSON.stringify(productsInCart));
            messageModal("Product added to cart");
        }

        const renderCart = function() {
            const productsInCart  =  JSON.parse(localStorage.getItem('cart'));
            console.log(productsInCart);
            var html = '';
            var amount = 0;
            productsInCart.map( (product, index) => {
                html += `
                <div class="row text-black border_b_cart">
                    <div class="col-md-8">
                        <span>${index + 1}. ${product.productName}</span>
                    </div>
                    <div class="col-md-4 text-right">
                        <span>${product.productPrice} <?php echo e(env('CURRENCY_CODE')); ?> </span>
                        <span onclick="deleteCartProduct(${product.id})" 
                            class="text-red del_cart_item close" style="margin: 0px 5px;">×</span>
                    </div>
                </div> `;
                amount += parseFloat(product.productPrice);
            });

            $("#cart_product_details").html(html);
            $("#cart_total_amount").html(`${amount} <?php echo e(env('CURRENCY_CODE')); ?> `);
        }

        const deleteCartProduct = function (productId) {
             let productsInCart  =  JSON.parse(localStorage.getItem('cart'));
             productsInCart = productsInCart.filter((product) => product.id != productId );
             localStorage.setItem('cart', JSON.stringify(productsInCart));    
             renderCart();
        }

        const cartCheckOut = function () {
            <?php if(auth()->guard()->check()): ?>
             let productsInCart  =  localStorage.getItem('cart');
             $("#productsInCart_input").val(productsInCart);
             $("#checkout_submit").click();
            <?php endif; ?>
            <?php if(auth()->guard()->guest()): ?>
                messageModal("Please login first to checkout.");
            <?php endif; ?>
        }

        $('.nav-link').on('click', function(){
            $('.navbar-collapse').collapse('hide');
        });
    </script>

    <?php echo $__env->yieldContent('js'); ?>
</html>
<?php /**PATH /home/frcsnvvy/laravel_deployment/project_700a/resources/views/layout/layout.blade.php ENDPATH**/ ?>