<body>

	<?php
	include("./include/nav.php");
	?>
	<!-- End Header Area -->

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Liên hệ với chúng tôi</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php?act=home">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
						<a href="index.php?act=contact">Liên hệ</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Contact Area =================-->
	<section class="contact_area section_gap_bottom">
		<div class="container">
			<br>
			<br>			
			<div  class="ggmap">
				<iframe
					src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.420430970235!2d105.75565247481016!3d9.98208677334313!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a08906415c355f%3A0x416815a99ebd841e!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1701257413546!5m2!1svi!2s"
					width="1200" height="450" style="border:0;" allowfullscreen="" loading="lazy"
					referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
			<br>
			<br>
			<div class="row">
				<div class="col-lg-6">
					<div class="contact_info">
						<div class="info_item">
							<i class="lnr lnr-home"></i>
							<h6>Cao đăng FPT Polytechnic Cần Thơ</h6>
							<p>Đường số 22, Tòa nhà FPT - Cần Thơ</p>
						</div>
						<div class="info_item">
							<i class="lnr lnr-phone-handset"></i>
							<h6><a href="#">190012345</a></h6>
							<p>Thứ 2: 8h00 - 5h30</p>
							<p>Thứ 7: 8h00 - 12h00</p>
						</div>
						<div class="info_item">
							<i class="lnr lnr-envelope"></i>
							<h6><a href="#">Duan1nhom9t@gmail.com</a></h6>
							<p>Gửi cho chúng tôi những vấn đề của bạn bất cứ lúc nào</p>
						</div>
					</div>
				</div>



				<div class="col-lg-6">
					<form class="row contact_form" action="site/send.php" method="post" id="contactForm"
						novalidate="novalidate">
						<div class="col-md-12">
							<div class="form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên"
									onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'">
							</div>
							<div class="form-group">
								<input type="email" class="form-control" id="email" name="email"
									placeholder="Nhập Email" onfocus="this.placeholder = ''"
									onblur="this.placeholder = 'Enter email address'">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="subject" name="subject"
									placeholder="Nhập Chủ đề" onfocus="this.placeholder = ''"
									onblur="this.placeholder = 'Enter Subject'">
							</div>

						</div>
						<div class="col-md-6">

						</div>
						<div class="col-md-12 text-right">
							<button type="submit" value="submit" name="send" class="primary-btn">Gửi</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!--================Contact Area =================-->

	<!-- start footer Area -->
	<?php
	include("./include/footer.php");
	?>
	<!-- End footer Area -->

	<!--================Contact Success and Error message Area =================-->
	<div id="success" class="modal modal-message fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i class="fa fa-close"></i>
					</button>
					<h2>Thank you</h2>
					<p>Your message is successfully sent...</p>
				</div>
			</div>
		</div>
	</div>

	<!-- Modals error -->

	<div id="error" class="modal modal-message fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i class="fa fa-close"></i>
					</button>
					<h2>Sorry !</h2>
					<p> Something went wrong </p>
				</div>
			</div>
		</div>
	</div>
	<!--================End Contact Success and Error message Area =================-->



</body>