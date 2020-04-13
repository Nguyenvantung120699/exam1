@extends('layout')



@section('content')
<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Feedback</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.html">Feedback</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="img/login.jpg" alt="">
						<div class="hover">
							<h4>New to our website?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Student Feedback</h3>
						<form class="row login_form" action="#" method="post" id="contactForm" >
                        @csrf
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
							</div>
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
							</div>
                            <div class="col-md-12 form-group">
								<input type="text" class="form-control" id="telephone" name="telephone" placeholder="Telephone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Telephone'">
							</div>
                            <div class="col-md-12 form-group">
								<input type="text" class="form-control" id="status" name="status" placeholder="Feedback" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Feedback'">
							</div>
							<div class="col-md-12 form-group">
								<button id="submit_btn" class="primary-btn">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

    <script type="text/javascript">
        $("#submit_btn").bind("click",function () {
           $.ajax({
               url: "{{url("postfeedback")}}",
               method: "POST",
               data: {
                   _token: $("input[name=_token]").val(),
                   name: $("input[name=name]").val(),
                   email: $("input[name=email]").val(),
                   telephone: $("input[name=telephone]").val(),
                   status: $("input[name=status]").val(),
               },
               success: function (res) {
                   if(res.status){
                        location.reload();
                   }else{
                       alert(res.message);
                   }
               }
           });
        });
    </script>

@endsection