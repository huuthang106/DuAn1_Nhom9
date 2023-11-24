<style>
	.list button.highlight,
	.list button.selected {
		color: #fbd600;
		background-color: transparent;
		border: none;
		cursor: pointer;
	}

	.star {
		background-color: #0000;
		border: none;
	}
</style>

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
					<h1>Chi tiết sản phẩm</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php?act=home">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
						<a href="index.php?act=category">Sản Phẩm<span class="lnr lnr-arrow-right"></span></a>
						<a href="">Chi tiết sản phẩm</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Single Product Area =================-->
	<?php
	if (isset($_GET["product_id"])) {
		# code...

		$product = new products();
		$product_id = $_GET['product_id'];
		foreach ($product->get_product_id_site($product_id) as $key) {
			# code...
			extract($key);
			echo '<div class="product_image_area">
			<div class="container">
				<div class="row s_product_inner">
					<div class="col-lg-6">
						
						
								<img class="img-fluid" src="./content/img/product/' . $picture . '" alt="">
							
							
						
					</div>
					<div class="col-lg-5 offset-lg-1">
						<div class="s_product_text">
							<h3>' . $name . '</h3>
							<h2>' . $price . '</h2>
							<ul class="list">
								<li><a class="active" href="#">Loại: Giày</a></li>
								
							</ul>
							<p>' . $content . '</p>
							';
		}
	}

	?>
	<div class="product_count">
		<label for="qty">Số lượng:</label>
		<input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
		<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
		<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
	</div>
	<div class="card_area d-flex align-items-center">
		<a class="primary-btn" href="#">Thêm vào giỏ hàng</a>
		<a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
		<a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>


	<!--================End Single Product Area =================-->

	<!--================Product Description Area =================-->
	<section class="product_description_area">
		<div class="container">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<!-- <li class="nav-item">
					<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
				</li> -->
				<!-- <li class="nav-item">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
					 aria-selected="false">Specification</a>
				</li> -->
				<li class="nav-item">
					<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Bình luận</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Đánh giá</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<!-- <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
					<p>Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of all shapes
						and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in
						Reading at the age of 15, where she went to secretarial school and then into an insurance office. After moving to
						London and then Hampton, she eventually married her next door neighbour from Reading, John Cook. He was an
						officer in the Merchant Navy and after he left the sea in 1956, they bought a pub for a year before John took a
						job in Southern Rhodesia with a motor company. Beryl bought their young son a box of watercolours, and when
						showing him how to use it, she decided that she herself quite enjoyed painting. John subsequently bought her a
						child’s painting set for her birthday and it was with this that she produced her first significant work, a
						half-length portrait of a dark-skinned lady with a vacant expression and large drooping breasts. It was aptly
						named ‘Hangover’ by Beryl’s husband and</p>
					<p>It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing
						more and more recipe books and Internet websites that are dedicated to the act of cooking for one. Divorce and
						the death of spouses or grown children leaving for college are all reasons that someone accustomed to cooking for
						more than one would suddenly need to learn how to adjust all the cooking practices utilized before into a
						streamlined plan of cooking that is more efficient for one person creating less</p>
				</div> -->
				<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<!-- <div class="table-responsive">
						<table class="table">
							<tbody>
								<tr>
									<td>
										<h5>Width</h5>
									</td>
									<td>
										<h5>128mm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Height</h5>
									</td>
									<td>
										<h5>508mm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Depth</h5>
									</td>
									<td>
										<h5>85mm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Weight</h5>
									</td>
									<td>
										<h5>52gm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Quality checking</h5>
									</td>
									<td>
										<h5>yes</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Freshness Duration</h5>
									</td>
									<td>
										<h5>03days</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>When packeting</h5>
									</td>
									<td>
										<h5>Without touch of hand</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Each Box contains</h5>
									</td>
									<td>
										<h5>60pcs</h5>
									</td>
								</tr>
							</tbody>
						</table>
					</div> -->
				</div>
				<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
					<div class="row">
						<div class="col-lg-6">
							<div class="comment_list">

								<?php
								$list_comment = new comments();
								$comments = $list_comment->get_comment_product_id($_GET['product_id']);

								if ($comments != false && is_array($comments)) {
									foreach ($comments as $key) {
										extract($key);
										$button_dell = 'index.php?act=single-product&product_id=' . $_GET['product_id'] . '&comment_id=' . $comment_id . '';

										echo '
										  <div class="review_item">
											  <div class="media">
												  <div class="d-flex">
													  <img src="./content/img/product/' . $avarta . '" alt="">
												  </div>
												  <div class="media-body">
													  <h4 comment-id=' . $comment_id . ' user-id=' . $user_id . '>' . $fullname . '</h4>
													  <h5>' . $day . '</h5>
													  ';
										if ($_SESSION['user_id']['user_id'] == $user_id) {
											echo '
															
															<a href= "' . $button_dell . '"class="dell_btn" >X</a>
															';
										}
										echo '
													<button  class="reply_btn"  onclick="prepareReplyForm(this)">Reply</button>
													</div>	
												</div>
												<p>' . $text . '</p>
											</div>
											
										';

										$list_reply_comment = new reply_comment();
										$reply_comment = $list_reply_comment->get_reply_comment_id($comment_id);

										if ($reply_comment != false && is_array($reply_comment)) {
											foreach ($reply_comment as $rl_cmnt) {
												extract($rl_cmnt);
												$dell_reply = 'index.php?act=single-product&product_id=' . $_GET['product_id'] . '&reply_id=' . $reply_id . '';
												echo '
													<div class="review_item reply">
														<div class="media">
															<div class="d-flex">
																<img src="./content/img/product/' . $avarta . '" alt="">
															</div>
															<div class="media-body">
																<h4 reply-id=' . $reply_id . ' user-id=' . $user_id . '>' . $fullname . '</h4>
																<h5>' . $day . '</h5>
															
													';
												if ($_SESSION['user_id']['user_id'] == $user_id) {
													echo '
														
														<a href= "' . $dell_reply . '"class="dell_btn">X</a>
														';
												}

												echo '
												<button  data-comment-type="comment_two" class="reply_btn"  onclick="prepareReplyForm_two(this)">Reply</button>
												</div>
											</div>
											<p>' . $content . '</p>
										</div>
												';
											}
										}
									}
								} else {
									echo 'Chưa có bình luận nào';
								}
								if (isset($_GET['comment_id'])) {

									$dell_comment = new comments();
									$dell_comment->dell_comment($_GET['comment_id'], $_GET['product_id']);
								} elseif (isset($_GET['reply_id'])) {
									$dell_reply = new reply_comment();
									$dell_reply->dell_reply($_GET['reply_id'], $_GET['product_id']);
								}

								?>



								<!-- <div class="review_item">
									<div class="media">
										<div class="d-flex">
											<img src="./content/img/product/review-3.png" alt="">
										</div>
										<div class="media-body">
											<h4>Blake Ruiz</h4>
											<h5>Ngày 12 tháng 2 năm 2018 lúc 05:56 chiều</h5>
											<a class="reply_btn" href="#">Reply</a>
										</div>
									</div>
									<p>Điều quan trọng là phải tự chăm sóc nỗi đau,
										sau đó là sự trưởng thành của bệnh nhân,
										nhưng đồng thời cũng sẽ có rất nhiều công việc và nỗi đau. Để đi đến từng chi tiết nhỏ nhất,
										không ai nên thực hiện bất kỳ loại công việc nào ngoại trừ việc thu được lợi ích nào đó từ nó.</p>
								</div> -->
							</div>
						</div>
						<?php
						if (isset($_SESSION['user_id']['user_id'])) {
							$fullname_user = new users();
							foreach ($fullname_user->get_user_id($_SESSION['user_id']['user_id']) as $key) {
								extract($key);
								echo '
										<div class="col-lg-6">
											<div class="review_box">
												<h4>Đăng bình luận</h4>
												
												<form class="row contact_form" action="index.php?act=single-product&product_id=' . $_GET['product_id'] . '" method="post" id="contactForm" novalidate="novalidate">
													<div class="col-md-12">
														<input type="hidden" name="comment_id" id="comment_id">
														<input type="hidden" name="user-id" id="user-id">
														<input type="hidden" name="status" id="status">
														<div class="form-group">
															<input type="text" class="form-control" id="name" name="name" placeholder="Tên đầy đủ của bạn" value="' . $fullname . '">
														</div>
													</div>
													
													<div class="col-md-12">
														<div class="form-group">
															<textarea class="form-control" name="message" id="message" rows="1" placeholder="Nội dung"></textarea>
														</div>
													</div>
													<div class="col-md-12 text-right">
													<input type="hidden" id="current_date" name="current_date">

														<button type="submit" value="submit" class="btn primary-btn" name="submit">Gửi ngay</button>
													</div>
												</form>
											</div>
										</div>
									';
							}
						} else {
							echo '
								<div class="col-lg-6">
									<div class="review_box">
										<h4>Đăng bình luận</h4>
										
										<div class="col-md-12 text-right">
														<a type="submit" value="submit" href="index.php?act=login" class="btn primary-btn">Đăng nhập</a>
													</div>
									</div>
								</div>
								';
						}
						if (isset($_POST['submit'])) {
							$product_id = $_GET['product_id'];
							$user_id = $_SESSION['user_id']['user_id'];
							$message = $_POST['message'];
							$status = $_POST['status'];
							$comment_id = $_POST['comment_id'];
							$product_id = $_GET['product_id'];
							// Lấy ngày hiện tại
							date_default_timezone_set('Asia/Ho_Chi_Minh');
							$day = date('Y-m-d H:i:s');
							if (isset($_GET['product_id']) && is_numeric($_GET['product_id'])) {


								if ($status == 3) {
									$reply_comment = new reply_comment();
									$insert = $reply_comment->insert_reply($comment_id, $message, $day, $user_id, $product_id);
								} else {
									$comment = new comments();
									$insert = $comment->insert_comment($product_id, $user_id, $message, $day);
								}
							} else {
								// Xử lý khi không có product_id hợp lệ
								echo "Product ID không hợp lệ!";
							}
						}
						?>

					</div>
				</div>
				<div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
					<div class="row">
						<div class="col-lg-6">
							<div class="row total_rate">
								<div class="col-6">
									<div class="box_total">
										<h5>Đánh giá</h5>
										<h4>4.0</h4>
										<h6>(03 đánh giá)</h6>
									</div>
								</div>
								<div class="col-6">
									<div class="rating_list">
										<h3>Dựa trên 3 đánh giá</h3>
										<ul class="list">
											<li><a href="#">5 Sao <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
											<li><a href="#">4 Sao <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
											<li><a href="#">3 Sao <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
											<li><a href="#">2 Sao <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
											<li><a href="#">1 Sao <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="review_list">
								<?php
								$select_evaluates = new Evaluates();
								$product_id = $_GET['product_id'];
								foreach ($select_evaluates->get_five_evaluates($product_id) as $key) {
									extract($key);
									echo '
										<div class="review_item">
										<div class="media">
											<div class="d-flex">
												<img src="./content/img/product/' . $avarta . '" alt="">
											</div>						
										';
									echo '
										<div class="media-body">
										<h4>' . $fullname . '</h4>
										';
									if ($star == 1) {
										echo '<i class="fa fa-star"></i>';
									} elseif ($star == 2) {
										echo '<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											';
									} elseif ($star == 3) {
										echo '<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											';
									} elseif ($star == 4) {
										echo '<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											';
									} elseif ($star == 5) {
										echo '<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											';
									}
									echo '</div>
										</div>
										<p>' . $content . '</p>
										</div>
										';
								}
								?>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="review_box">
								<h4>Đánh giá</h4>
								<p>Số sao của bạn:</p>

								<ul class="list">
									<li><button class="star" data-value="1" onclick="handleClick(this)"><i class="fa fa-star"></i></button></li>
									<li><button class="star" data-value="2" onclick="handleClick(this)"><i class="fa fa-star"></i></button></li>
									<li><button class="star" data-value="3" onclick="handleClick(this)"><i class="fa fa-star"></i></button></li>
									<li><button class="star" data-value="4" onclick="handleClick(this)"><i class="fa fa-star"></i></button></li>
									<li><button class="star" data-value="5" onclick="handleClick(this)"><i class="fa fa-star"></i></button></li>
								</ul>

								<p>Nổi bật</p>
								<?php
								if (isset($_SESSION['user_id']['user_id'])) {
									$fullname_user = new users();
									foreach ($fullname_user->get_user_id($_SESSION['user_id']['user_id']) as $key) {
										extract($key);
										echo '
								<form class="row contact_form" action="index.php?act=single-product&product_id=' . $_GET['product_id'] . '" method="post" id="contactForm" novalidate="novalidate">';

								?>
										<input type="hidden" name="star" id="starInput" value="">
										<div class="col-md-12">
											<div class="form-group">
												<textarea class="form-control" name="content" id="message" rows="1" placeholder="Đánh giá" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Đánh giá'"></textarea></textarea>
											</div>
										</div>
										<div class="col-md-12 text-right">
											<button type="submit" value="submit" name="submit_evaluates" class="primary-btn">Gửi ngay</button>
										</div>
										</form>

								<?php
									}
								} else {
									echo '
								<div class="col-lg-6">
									<div class="review_box">
										<h4>Đánh giá</h4>
										
										<div class="col-md-12 text-right">
														<a type="submit" value="submit" href="index.php?act=login" class="btn primary-btn">Đăng nhập</a>
													</div>
									</div>
								</div>
								';
								}
								if (isset($_POST['submit_evaluates'])) {
									if (empty($_SESSION['user_id']['user_id']) || empty($_POST['star'])) {
										echo '<div class="col-md-12 form-group">
								<div class="error-message">
									<i class="fa-solid fa-circle-exclamation"></i> bạn chưa nhập nội dung đánh  giá !
								</div><br>
							</div>';
									} else {
										$star = $_POST['star'];
										$content = $_POST['content'];
										$user_id = $_SESSION['user_id']['user_id'];
										$product_id = $_GET['product_id'];
										$evaluates = new Evaluates();
										$insert = $evaluates->insert_evaluates($product_id, $user_id, $star, $content);
									}
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Product Description Area =================-->

	<!-- Start related-product Area -->
	<section class="related-product-area section_gap_bottom">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>Sản phẩm liên quan</h1>
						<p>Có thể bạn sẽ quan tâm </p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-9">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img src="./content/img/r1.jpg" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<div class="single-related-product d-flex">
								<a href="#"><img src="./content/img/r2.jpg" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="single-related-product d-flex">
								<a href="#"><img src="./content/img/r11.jpg" alt=""></a>
								<div class="desc">
									<a href="#" class="title">Black lace Heels</a>
									<div class="price">
										<h6>$189.00</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="ctg-right">
						<a href="#" target="_blank">
							<img class="img-fluid d-block mx-auto" src="img/category/c5.jpg" alt="">
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End related-product Area -->

	<!-- start footer Area -->
	<?php
	include("./include/footer.php");
	?>
	<!-- End footer Area -->



</body>