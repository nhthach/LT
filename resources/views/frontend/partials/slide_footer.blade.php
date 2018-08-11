

<div class="slide">
		<div class="container">
			<div class="fle-xsel">
			<ul id="flexiselDemo3">
				<li>
					<a href="#">
						<div class="banner-1">
							<img src="http://localhost/LicenseCar/public/img/page/c-7.jpg" class="img-responsive" alt="Jarrod McDermott">
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="banner-1">
							<img src="http://localhost/LicenseCar/public/img/page/c-7.jpg" class="img-responsive" alt="Jarrod McDermott">
						</div>
					</a>
				</li>			
				<li>
					<a href="#">
						<div class="banner-1">
							<img src="http://localhost/LicenseCar/public/img/page/c-7.jpg" class="img-responsive" alt="Jarrod McDermott">
						</div>
					</a>
				</li>		
				<li>
					<a href="#">
						<div class="banner-1">
							<img src="http://localhost/LicenseCar/public/img/page/c-7.jpg" class="img-responsive" alt="Jarrod McDermott">
						</div>
					</a>
				</li>	
				<li>
					<a href="#">
						<div class="banner-1">
							<img src="http://localhost/LicenseCar/public/img/page/c-7.jpg" class="img-responsive" alt="Jarrod McDermott">
						</div>
					</a>
				</li>	
				<li>
					<a href="#">
						<div class="banner-1">
							<img src="http://localhost/LicenseCar/public/img/page/c-7.jpg" class="img-responsive" alt="Jarrod McDermott">
						</div>
					</a>
				</li>				
			</ul>
							
			 <script type="text/javascript">
				$(window).load(function() {

					$.ajax({
						  url: "test.html",
						  context: document.body
						}).done(function() {
						  $( this ).addClass( "done" );
					});
					
					$("#flexiselDemo3").flexisel({
						visibleItems: 10,
						animationSpeed: 1000,
						autoPlay: true,
						autoPlaySpeed: 3000,    		
						pauseOnHover: true,
						enableResponsiveBreakpoints: true,
						responsiveBreakpoints: { 
							portrait: { 
								changePoint:480,
								visibleItems: 5
							}, 
							landscape: { 
								changePoint:640,
								visibleItems: 5
							},
							tablet: { 
								changePoint:768,
								visibleItems: 5
							}
						}
					});
					
				});
				</script>
				
								
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>