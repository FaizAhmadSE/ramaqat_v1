@extends('layouts.main')
@section('offline-course')

<link href="https://unpkg.com/video.js@7.5.4/dist/video-js.css" rel="stylesheet">
   <script src="https://unpkg.com/video.js@7.5.4/dist/video.js"></script>
   <script src="https://unpkg.com/@silvermine/videojs-quality-selector/dist/js/silvermine-videojs-quality-selector.min.js"></script>
   <link href="https://unpkg.com/@silvermine/videojs-quality-selector/dist/css/quality-selector.css" rel="stylesheet">
<style>
	body{
		margin:0px;
	}
	.video-js{
	    width: 100%;
	   }

	div#video_1{
		max-height: 450px;
	}
	video{
		border-width: 0px;
		max-height: inherit;
	}
	.video-js .vjs-big-play-button{
		left: 20px;
	}



	.request_set{
		padding: 15px 100px;
		border-radius: 10px;
		background-color: #570055;
		color: white;
		letter-spacing: 0.5;
		text-decoration: none;
	}
	.request_set:hover{
		color: white;
	}
	.heading_btn_set{
		/*padding: 12px 45px;*/
		min-height: 50px;
		min-width:185px;
		background-color: white;
		border: 1px solid #570055;
		font-size: 18px;
	}
	p.trainername{
		padding: 16px;
		font-size: 1.4rem;
	}



	.card .cl_white{
		color: white;
	}
	.accordian-height{
		overflow-y: unset;
	}

	.checkbox{
		border-bottom: 1px solid #570055;
	}
		.checkbox .checkboxlabel{
			display: inherit;
		}
			.checkboxlabel span{
				display: inline-grid;
				margin-left: auto;
				font-size: 1.1rem;
			}.checkboxlabel span:nth-child(1){
				font-size: 0.8rem;
			}

	.card-block .checkbox:nth-child(1){
		color: #212529!important;
	}
	.card-block{
		color:#6c757d!important;
	}

	.course_herder_font{
		font-size: calc(100% + 1vw + 1vh);
	}
	.para_font{
		font-size: calc(100% + 0.1vw + 0.1vh);
	}



	#video_footer .personbody{
		padding: 5px;
		width: 13%;
		text-align: center;
		border: 1px solid;
	}
		#video_footer .personbody:hover{
			padding: 1px;
			border: 1px solid white;
			background-color: white;
			outline: none;
			margin-top: 0px;
			position: absolute;
			top: 0px;
			width: 14%;
			border-radius: 8px;

			-webkit-box-shadow: 0 8px 6px -6px lightgrey;
	   		-moz-box-shadow: 0 8px 6px -6px lightgrey;
	        box-shadow: 0 8px 6px -6px lightgrey;
		}
			#video_footer #person1:hover{
				left: 0px;
			}
			#video_footer #person2:hover{
				right: -13%;
				left: 13%;
			}
			#video_footer #person3:hover{
				right: -13%;
				left: 26%;
			}
			#video_footer #person4:hover{
				left: 39%;
			}
			#video_footer #person5:hover{
				left: 52%;
			}
			#video_footer #person6:hover{
				left: 65%;
			}
			#video_footer #person7:hover{
				left: 78%;
			}

	#video_footer .personbody h5{
		font-size: 16px;
		margin-bottom: 1%;
		margin-top: 10%;
	}


	#video_footer .personbody p{
		font-size: 11px;
		margin: 0px;
	}
	#video_footer .personbody p:last-child{
		margin-top: 2%;
	}

	#video_footer .personbody img{
		max-width: 50%;
	}
		#video_footer .personbody:hover img{
			padding-top: 2px;
			max-width: 100%;
		}

	.persondetail{
		display: none;
	}
		.personbody:hover .persondetail{
		background-color: white;
		outline: none;
		display: block;

	}

@media screen and (max-width: 768px) and (min-width: 320px){

	ul.ulDBlock-top li{
		width:max-content;
	}
}
</style>

  <!--Header End Here  -->
  <div class="plum-bg pt-3 pb-3">
    <div class="container-fluid">
    	<div class="row">

		    <div class="col-sm-12 col-md-6">
		        <h3 class="complete_course_classes_heading course_herder_font">{{$lesson->title}}</h3>
		    </div>
		    <div class="col-sm-12 col-md-6 d-flex">
		        <ul class="ulDBlock-top compelet_course_nav2 d-flex">
		          <li>
		            <div class="font18 white-text"><a href="#" style="color: white"> <i class="fa fa-share-alt mr-1" aria-hidden="true"></i> Share</a></div>
		          </li>
		          <li>
		            <div class="col font16 white-text">
		            	<button type="button" class=" btn btn-primary">Favourit <i class="fa fa-star mr-1" aria-hidden="true"></i></button>
		            </div>
		          </li>
		          <li>
					<div class="col font16 white-text">
						<button type="button" class="btn btn-primary">Enroll for 25KWD</button>
					</div>
		          </li>
		        </ul>
		    </div>

	</div>
    </div>
  </div>
  <!-- add video iframe -->


 	<div class="row">
	    <div class="col-sm-8 p-0" style="background-color: #570055;">
		     <video id="video_1" class="video-js" controls preload="auto" data-setup='{}'>
      <source src="{{url('course/' . $course->name . '/'.$lesson->video_path)}}" type="video/webm" label="720P" >
   </video>
			    	<div class="row">
				      	<div class="col-sm-12 col-md-4 col-md-4 text-center " style="color: white;">
				      		<div class="row">
				      			<div class="col-sm-4">
				      			@if($trainer->image!="")
				      			<img src="{{asset('assets/user/'.$trainer->image)}}" class="img-circle ml-sm-0 ml-md-4" alt="img1">
				      			@else
						    	<img src="{{asset('assets/frontend/img/completecourse/teacher_activ.png')}}" class="img-circle ml-sm-0 ml-md-4" alt="img1">
						    	@endif
						    	</div>

								<div class="col-sm-8">
						    		<p class="trainername mb-0">{{$trainer->name}}</p>
						    	</div>
						    </div>
				    	</div>
					    <div class="col-sm-12 col-md-8 pt-2" id="video_footer">
					    	<div class="row m-0">
						    	<div class="personbody" id="person1">
						      		<img src="{{asset('assets/frontend/img/completecourse/parson-1.png')}}" class="img-circle" alt="img2">
						      		<h5 class="persondetail">Name</h5>
						      		<p class="persondetail">Description</p>
						      		<p class="persondetail">
						      			<span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
						      		</p>
						      	</div>
						      	<div class="personbody" id="person2">
						      		<img src="{{asset('assets/frontend/img/completecourse/parson-3.png')}}" class="img-circle" alt="img3">
						      		<h5 class="persondetail">Name</h5>
						      		<p class="persondetail">Description</p>
						      		<p class="persondetail">
						      			<span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
						      		</p>
						      	</div>
						      	<div class="personbody" id="person3">
						      		<img src="{{asset('assets/frontend/img/completecourse/parson-4.png')}}" class="img-circle" alt="img4">
						      		<h5 class="persondetail">Name</h5>
						      		<p class="persondetail">Description</p>
						      		<p class="persondetail">
						      			<span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
						      		</p>
						      	</div>
						      	<div class="personbody" id="person4">
						      		<img src="{{asset('assets/frontend/img/completecourse/parson-5.png')}}" class="img-circle" alt="img5">
						      		<h5 class="persondetail">Name</h5>
						      		<p class="persondetail">Description</p>
						      		<p class="persondetail">
						      			<span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
						      		</p>
						      	</div>
						      	<div class="personbody" id="person5">
						      		<img src="{{asset('assets/frontend/img/completecourse/parson-5.png')}}" class="img-circle" alt="img6">
						      		<h5 class="persondetail">Name</h5>
						      		<p class="persondetail">Description</p>
						      		<p class="persondetail">
						      			<span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
						      		</p>
						      	</div>
						      	<div class="personbody" id="person6">
						      		<img src="{{asset('assets/frontend/img/completecourse/parson-5.png')}}" class="img-circle" alt="img7">
						      		<h5 class="persondetail">Name</h5>
						      		<p class="persondetail">Description</p>
						      		<p class="persondetail">
						      			<span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
						      		</p>
						      	</div>
						      	<div class="personbody" id="person7">
						      		<img src="{{asset('assets/frontend/img/completecourse/parson-5.png')}}" class="img-circle" alt="img8">
						      		<h5 class="persondetail">Name</h5>
						      		<p class="persondetail">Description</p>
						      		<p class="persondetail">
						      			<span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
						      		</p>
						      	</div>
						    </div>
						</div>
					</div>

		</div>
	    <div class="col-sm-4 mt-0 p-0">
			    <div class="course_content d-flow-root">
			       <p class="pull-left">Course content</p>
			       <p class="close_icon pull-right">×</p>
			    </div>
			    <div class="accordian-height">
          			<div id="accordion" role="tablist" aria-multiselectable="true">

            <!-- Accordion Item 1 -->
			            <div class="card">
			              <div class="card-header" role="tab" id="accordionHeadingOne">
			                <div class="mb-0 row">
			                  <div class="col-12 no-padding accordion-head">
			                    <a data-toggle="collapse" data-parent="#accordion" href="#accordionBodyOne" aria-expanded="false" aria-controls="accordionBodyOne"
			                      class="collapsed ">

			                      <i class="fa fa-angle-down" aria-hidden="true"></i>
			                      <h6>Section 1: Course Name And Detail</h6>
			                      <div class="cl_white">1/4/25</div>

			                    </a>
			                  </div>
			                </div>
			              </div>

			              <div id="accordionBodyOne" class="collapse" role="tabpanel" aria-labelledby="accordionHeadingOne" aria-expanded="false" data-parent="accordion">
			                <div class="card-block col-12 p-0">
			                  	<div class="checkbox col">
								  <label class="checkboxlabel">
								  	<input type="checkbox" value=""><span> Lesson<span>123</span></span></label>
								</div>
								<div class="checkbox col">
								  <label class="checkboxlabel">
								  	<input type="checkbox" value=""><span> Lesson 2<span>123</span></span></label>
								</div>
			                </div>

			              </div>
			            </div>

          	<!-- card close -->

          	 <!-- Accordion Item 2 -->
			            <div class="card">
			              <div class="card-header" role="tab" id="accordionHeading2">
			                <div class="mb-0 row">
			                  <div class="col-12 no-padding accordion-head">
			                    <a data-toggle="collapse" data-parent="#accordion" href="#accordionBody2" aria-expanded="false" aria-controls="accordionBody2"
			                      class="collapsed ">

			                      <i class="fa fa-angle-down" aria-hidden="true"></i>
			                      <h6>Section 2: Course Name And Detail</h6>
			                      <div class="cl_white">1/4/25</div>

			                    </a>
			                  </div>
			                </div>
			              </div>

			              <div id="accordionBody2" class="collapse" role="tabpanel" aria-labelledby="accordionHeading2" aria-expanded="false" data-parent="accordion">
			                <div class="card-block col-12 p-0">
			                  	<div class="checkbox col">
								  <label class="checkboxlabel">
								  	<input type="checkbox" value=""><span> Lesson 1<span>123</span></span></label>
								</div>
								<div class="checkbox col">
								  <label class="checkboxlabel">
								  	<input type="checkbox" value=""><span> Lesson 2<span>123</span></span></label>
								</div>
			                </div>

			              </div>
			            </div>

          	<!-- card close -->
          	 <!-- Accordion Item 3 -->
			            <div class="card">
			              <div class="card-header" role="tab" id="accordionHeading3">
			                <div class="mb-0 row">
			                  <div class="col-12 no-padding accordion-head">
			                    <a data-toggle="collapse" data-parent="#accordion" href="#accordionBody3" aria-expanded="false" aria-controls="accordionBody3"
			                      class="collapsed ">

			                      <i class="fa fa-angle-down" aria-hidden="true"></i>
			                      <h6>Section 1: Course Name And Detail</h6>
			                      <div class="cl_white">1/4/25</div>

			                    </a>
			                  </div>
			                </div>
			              </div>

			              <div id="accordionBody3" class="collapse" role="tabpanel" aria-labelledby="accordionHeading3" aria-expanded="false" data-parent="accordion">
			                <div class="card-block col-12 p-0">
			                  	<div class="checkbox col">
								  <label class="checkboxlabel">
								  	<input type="checkbox" value=""><span> Lesson 1<span>123</span></span></label>
								</div>
								<div class="checkbox col">
								  <label class="checkboxlabel">
								  	<input type="checkbox" value=""><span> Lesson 2<span>123</span></span></label>
								</div>
			                </div>

			              </div>
			            </div>

          	<!-- card close -->
          	 <!-- Accordion Item 4 -->
			            <div class="card">
			              <div class="card-header" role="tab" id="accordionHeading4">
			                <div class="mb-0 row">
			                  <div class="col-12 no-padding accordion-head">
			                    <a data-toggle="collapse" data-parent="#accordion" href="#accordionBody4" aria-expanded="false" aria-controls="accordionBody4"
			                      class="collapsed ">
			                      <i class="fa fa-angle-down" aria-hidden="true"></i>
			                      <h6>Section 1: Course Name And Detail</h6>
			                      <div class="cl_white">1/4/25</div>

			                    </a>
			                  </div>
			                </div>
			              </div>

				            <div id="accordionBody4" class="collapse" role="tabpanel" aria-labelledby="accordionHeading4" aria-expanded="false" data-parent="accordion">
				                <div class="card-block col-12 p-0">
				                  	<div class="checkbox col">
									  <label class="checkboxlabel">
									  	<input type="checkbox" value=""><span> Lesson<span>123</span></span></label>
									</div>
									<div class="checkbox col">
									  <label class="checkboxlabel">
									  	<input type="checkbox" value=""><span> Lesson 2<span>123</span></span></label>
									</div>
				                </div>

				            </div>
			            </div>

          	<!-- card close -->



       			</div>
	    	</div>
		</div>
    </div>

  <!--  add page content  -->
  <div class="content_page mar-100">
    <div class="flex-center mb-1 mt-1 request_certificate_div">
      <a class="Socialb plum-text request_set" href="#">Request Certificate</a>
    </div>
    <div class="content">
      <p>Course Overview</p>
      <p class="flex-center mb-1 mt-1">{{$course->description}}</p>

    </div>
  </div>

  <!--Description-->
  <div class="plum-bg">
    <div class="col-12 col-sm-10 offset-md-1" style="padding: 40px 15px;line-height: 1;">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <!-- <div class="mb-1 white-text">Sign up to receive our weekly newsletter</div> -->
          <div class="white-text pull-right para_font">Sign up to receive our weekly newsletter</div><br><br>
          <div class="white-text pull-right para_font">Stay uploaded on all new online and offline training courses</div>
        </div>
        <div class="col-sm-12 col-md-6">
          <div class="Subscription">
            <input class="SubInput z-depth-1" type="text" placeholder="Enter your email"><span class="SubBtn"><a
                href="#">Subscribe</a></span>
          </div>
        </div>
      </div>
    </div>
  </div>


 <script>
 	videojs("video_1", {}, function() {
         var player = this;

         player.controlBar.addChild('QualitySelector');
      });



 </script>
@endsection
