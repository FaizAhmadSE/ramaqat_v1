@extends('layouts.main')

@section('online-course')

    <link href="https://unpkg.com/video.js@7.5.4/dist/video-js.css" rel="stylesheet">
    <script src="https://unpkg.com/video.js@7.5.4/dist/video.js"></script>
    <script
        src="https://unpkg.com/@silvermine/videojs-quality-selector/dist/js/silvermine-videojs-quality-selector.min.js"></script>
    <link href="https://unpkg.com/@silvermine/videojs-quality-selector/dist/css/quality-selector.css" rel="stylesheet">
    <script src="{{url('assets/starrr.js')}}"></script>
    <link rel="stylesheet" href="{{url('assets/sweetalerts/sweetalert.css')}}">
    <script src="{{url('assets/sweetalerts/sweetalert.js')}}"></script>




    <style>
        .main {
            margin-top: -40px;
        }

        .video-js {
            width: 100%;
        }

        .rating-stars input {
            display: none;
            margin: 0 auto;
            text-align: center;
            padding: .375rem .75rem;
            font-size: .9375rem;
            line-height: 1.6;
            color: #3d4e67;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #e0e8f3;
            border-radius: 3px;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .rating-stars .rating-stars-container .rating-star.sm {
            display: inline-block;
            font-size: 19px !important;
            color: #83829c;
            cursor: pointer;
            padding: 1px;
        }

        .rating-stars .rating-stars-container .rating-star.is--active, .rating-stars .rating-stars-container .rating-star.is--hover {
            color: #f1c40f;
        }

        .star-plugin-main {
            width: 100%;
            float: left;
            text-align: left;
        }

        .star-plugin-main .fa {
            color: #f7941d;
        }

        .star-plugin-main .fa-star {
            color: #f7941d;
        }
        #basicSlider .MS-controls .MS-left{
            top: 10px !important;
            background: transparent;
            border:0;
        }
        #basicSlider .MS-controls .MS-right{
            top: 10px !important;
            background: transparent;
            border:0;
        }

    </style>
    <!-- couser-detail main section -->
    <div class="main">
        <div class="plum-bg mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-4 course-name">
                        <h3><b>{{$data->name}}</b></h3>
                        <p>{!!$data->description!!}</p>
                        <ul class="rating">
                            <li><img src="{{asset('assets/frontend/img/star-fill.png')}}"></li>
                            <li><img src="{{asset('assets/frontend/img/star-fill.png')}}"></li>
                            <li><img src="{{asset('assets/frontend/img/star-fill.png')}}"></li>
                            <li><img src="{{asset('assets/frontend/img/star-fill.png')}}"></li>
                            <li><img src="{{asset('assets/frontend/img/star.png')}}"></li>
                            <li>4.8</li>
                            <li>(1234,567)</li>
                        </ul>
                        <h6 class="mt-3">Trainer : {{$data->users['name']}}</h6>
                        <h6>Language : English/Arabic</h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-4 feature-box">
                    <div class="feature">
                        <h5><b>What you'll learn</b></h5>
                        <ul class="feature-list">
                            <li><img src="{{asset('assets/frontend/img/tick.png')}}"></li>
                            <li>
                                {!!$data->description!!}
                            </li>
                        </ul>
                    </div>
                    <div class="mob-position">
                        <div class="course-cart z-depth-1-half">
                            <a data-toggle="modal" data-target="#basicExampleModal">
                                <div class="course-img">
                                    <img src="{{asset('assets/frontend/img/course-1.png')}}" alt="Name">
                                    <img class="course-play" src="{{asset('assets/frontend/img/play-course.png')}}"
                                         alt="play">
                                </div>
                            </a>
                            <div class="text-center mt-3">
                                <ul class="course-price">
                                    <li><h3><b>${{$data->price}}</b></h3></li>
                                    <li><strike>$30.99</strike></li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <a href="#">
                                        <button class="w-90 btn plum-btn">Add to cart</button>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <a href="#">
                                        <button class="btn white-btn w-90">Buy now</button>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">

                                    @auth
                                        @php
                                            $check = \App\Favorite::where(['user_id'=>Auth::id(),'course_id'=>$data->id])->first();
                                        @endphp
                                        @if($check)
                                                <button class="btn white-btn w-90">Added To Favorites</button>
                                        @else
                                            <a href="{{route('fvt',['course_id'=>$data->id])}}">
                                                <button class="btn white-btn w-90">Add To Favorites</button>
                                            </a>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                            <div class="height-2 mt-2"></div>
                            <div class="mt-3">
                                <h4><b>This course includes</b></h4>
                                <div>  {{$data->duration}}</div>
                                <div>  {{$data->lessons->count()}} articles</div>
                                <div> Full lifetime access</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="height-2"></div>

        <div class="container">
            <div class="row">
                <div class="col-12 course-description">
                    <h2><b>Description</b></h2>
                    <p>{!!$data->description!!}</p>
                    {{--                    <div class="Description-text">--}}
                    {{--                        You'll learn how to read and write complex queries to a database using one of the most in demand skills - PostgreSQL. These skills are also applicable to any other major SQL database, such as MySQL, Microsoft SQL Server, Amazon Redshift, Oracle, and much more.--}}
                    {{--                        Learning SQL is one of the fastest ways to improve your career prospects as it is one of the most in demand tech skills! In this course you'll learn quickly and receive challenges and tests along the way to improve your understanding!--}}
                    {{--                    </div>--}}
                </div>
            </div>
        </div>

        <div class="height-2"></div>

        <div class="container">
            <div class="row p-3">
                <div class="col-12 col-sm-8">
                    <div class="row">
                        <div class="col-6">
                            <h6><b>Course content</b></h6>
                        </div>
                        <div class="col-2">
                            <h6><b>Extend all</b></h6>
                        </div>
                        <div class="col-2">
                            <h6><b>{{$data->lessons->count()}} Lectures</b></h6>
                        </div>
                        <div class="col-2">
                            <h6><b>{{$data->duration}}</b></h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-4"></div>
            </div>
            <div class="row pb-2">
                <div class="col-12 col-sm-8">
                    <!-- Accordian -->
                    <div class="height">
                        <div id="accordion" role="tablist" aria-multiselectable="true">

                            <!-- Accordion Item 1 -->
                            <div class="card">
                                <div class="card-header" role="tab" id="accordionHeadingOne">
                                    <div class="mb-0 row">
                                        <div class="col-12 no-padding accordion-head">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#accordionBodyOne"
                                               aria-expanded="false" aria-controls="accordionBodyOne"
                                               class="collapsed ">
                                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                                                <h6>Course Introduction</h6>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div id="accordionBodyOne" class="collapse" role="tabpanel"
                                     aria-labelledby="accordionHeadingOne" aria-expanded="false"
                                     data-parent="accordion">
                                    <div class="card-block col-12 p-0">
                                        <ul class="course-accordian">
                                            <li>
                                                <img src="{{asset('assets/frontend/img/course-dropdown-play.png')}}"
                                                     alt="Play">
                                            </li>
                                            <li>
                                                <div class="course-heading plum-text"> Welcome Message</div>
                                            </li>
                                        </ul>
                                        <ul class="course-accordian">
                                            <li>
                                                <img src="{{asset('assets/frontend/img/course-dropdown-play.png')}}"
                                                     alt="Play">
                                            </li>
                                            <li>
                                                <div class="course-heading plum-text"> Welcome Message</div>
                                            </li>
                                        </ul>
                                        <ul class="course-accordian">
                                            <li>
                                                <img src="{{asset('assets/frontend/img/course-dropdown-play.png')}}"
                                                     alt="Play">
                                            </li>
                                            <li>
                                                <div class="course-heading plum-text"> Welcome Message</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Accordion Item 2 -->
                            @foreach($data->lessons as $lesson)
                                <div class="card">
                                    <div class="card-header" role="tab" id="accordionHeadingTwo">
                                        <div class="mb-0 row">
                                            <div class="col-12 no-padding accordion-head">
                                                <a data-toggle="collapse" data-parent="#accordion"
                                                   href="#accordionBodyTwo" aria-expanded="false"
                                                   aria-controls="accordionBodyTwo"
                                                   class="collapsed ">
                                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{url('show_lesson/'.$lesson->id)}}">
                                                    <h6>{{$lesson->title}}</h6>
                                                </a>

                                            </div>
                                        </div>
                                    </div>

                                    <div id="accordionBodyTwo" class="collapse" role="tabpanel"
                                         aria-labelledby="accordionHeadingTwo" aria-expanded="false"
                                         data-parent="accordion">
                                        <div class="card-block col-12">
                                            <p>{!!$lesson->description!!}</p>
                                            {{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin laoreet ante at nisi tempus, maximus bibendum--}}
                                            {{--                                            odio consequat. Proin eleifend elit nec facilisis luctus. Donec ut ornare tellus. Proin posuere et leo--}}
                                            {{--                                            vel congue. Nunc ipsum eros, vestibulum non mi et, porttitor tristique nulla. Pellentesque habitant morbi--}}
                                            {{--                                            tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum a turpis eu quam bibendum--}}
                                            {{--                                            interdum a quis erat. Fusce porta odio sed nulla ultrices, gravida viverra nunc imperdiet.</p>--}}
                                        </div>
                                    </div>
                                </div>
                        @endforeach

                        <!-- Accordion Item 3 -->
                        {{--                            <div class="card">--}}
                        {{--                                <div class="card-header" role="tab" id="accordionHeadingThree">--}}
                        {{--                                    <div class="mb-0 row">--}}
                        {{--                                        <div class="col-12 no-padding accordion-head">--}}
                        {{--                                            <a data-toggle="collapse" data-parent="#accordion" href="#accordionBodyThree" aria-expanded="false" aria-controls="accordionBodyThree"--}}
                        {{--                                               class="collapsed ">--}}
                        {{--                                                <i class="fa fa-angle-down" aria-hidden="true"></i>--}}
                        {{--                                                <h6>Section 1: Course Name And Detail</h6>--}}
                        {{--                                            </a>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}

                        {{--                                <div id="accordionBodyThree" class="collapse" role="tabpanel" aria-labelledby="accordionHeadingThree" aria-expanded="false" data-parent="accordion">--}}
                        {{--                                    <div class="card-block col-12">--}}
                        {{--                                        <p>Accordion Item 3 - Body</p>--}}
                        {{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin laoreet ante at nisi tempus, maximus bibendum--}}
                        {{--                                            odio consequat. Proin eleifend elit nec facilisis luctus. Donec ut ornare tellus. Proin posuere et leo--}}
                        {{--                                            vel congue. Nunc ipsum eros, vestibulum non mi et, porttitor tristique nulla. Pellentesque habitant morbi--}}
                        {{--                                            tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum a turpis eu quam bibendum--}}
                        {{--                                            interdum a quis erat. Fusce porta odio sed nulla ultrices, gravida viverra nunc imperdiet.</p>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}

                        {{--                            <!-- Accordion Item 3 -->--}}
                        {{--                            <div class="card">--}}
                        {{--                                <div class="card-header" role="tab" id="accordionHeadingThree">--}}
                        {{--                                    <div class="mb-0 row">--}}
                        {{--                                        <div class="col-12 no-padding accordion-head">--}}
                        {{--                                            <a data-toggle="collapse" data-parent="#accordion" href="#accordionBodyThree" aria-expanded="false" aria-controls="accordionBodyThree"--}}
                        {{--                                               class="collapsed ">--}}
                        {{--                                                <i class="fa fa-angle-down" aria-hidden="true"></i>--}}
                        {{--                                                <h6>Section 1: Course Name And Detail</h6>--}}

                        {{--                                            </a>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}

                        {{--                                <div id="accordionBodyThree" class="collapse" role="tabpanel" aria-labelledby="accordionHeadingThree" aria-expanded="false" data-parent="accordion">--}}
                        {{--                                    <div class="card-block col-12">--}}
                        {{--                                        <p>Accordion Item 3 - Body</p>--}}
                        {{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin laoreet ante at nisi tempus, maximus bibendum--}}
                        {{--                                            odio consequat. Proin eleifend elit nec facilisis luctus. Donec ut ornare tellus. Proin posuere et leo--}}
                        {{--                                            vel congue. Nunc ipsum eros, vestibulum non mi et, porttitor tristique nulla. Pellentesque habitant morbi--}}
                        {{--                                            tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum a turpis eu quam bibendum--}}
                        {{--                                            interdum a quis erat. Fusce porta odio sed nulla ultrices, gravida viverra nunc imperdiet.</p>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}

                        {{--                            <!-- Accordion Item 3 -->--}}
                        {{--                            <div class="card">--}}
                        {{--                                <div class="card-header" role="tab" id="accordionHeadingThree">--}}
                        {{--                                    <div class="mb-0 row">--}}
                        {{--                                        <div class="col-12 no-padding accordion-head">--}}
                        {{--                                            <a data-toggle="collapse" data-parent="#accordion" href="#accordionBodyThree" aria-expanded="false" aria-controls="accordionBodyThree"--}}
                        {{--                                               class="collapsed ">--}}
                        {{--                                                <i class="fa fa-angle-down" aria-hidden="true"></i>--}}
                        {{--                                                <h6>Section 1: Course Name And Detail</h6>--}}
                        {{--                                            </a>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}

                        {{--                                <div id="accordionBodyThree" class="collapse" role="tabpanel" aria-labelledby="accordionHeadingThree" aria-expanded="false" data-parent="accordion">--}}
                        {{--                                    <div class="card-block col-12">--}}
                        {{--                                        <p>Accordion Item 3 - Body</p>--}}
                        {{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin laoreet ante at nisi tempus, maximus bibendum--}}
                        {{--                                            odio consequat. Proin eleifend elit nec facilisis luctus. Donec ut ornare tellus. Proin posuere et leo--}}
                        {{--                                            vel congue. Nunc ipsum eros, vestibulum non mi et, porttitor tristique nulla. Pellentesque habitant morbi--}}
                        {{--                                            tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum a turpis eu quam bibendum--}}
                        {{--                                            interdum a quis erat. Fusce porta odio sed nulla ultrices, gravida viverra nunc imperdiet.</p>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}

                        {{--                            <!-- Accordion Item 3 -->--}}
                        {{--                            <div class="card">--}}
                        {{--                                <div class="card-header" role="tab" id="accordionHeadingThree">--}}
                        {{--                                    <div class="mb-0 row">--}}
                        {{--                                        <div class="col-12 no-padding accordion-head">--}}
                        {{--                                            <a data-toggle="collapse" data-parent="#accordion" href="#accordionBodyThree" aria-expanded="false" aria-controls="accordionBodyThree"--}}
                        {{--                                               class="collapsed ">--}}
                        {{--                                                <i class="fa fa-angle-down" aria-hidden="true"></i>--}}
                        {{--                                                <h6>Section 1: Course Name And Detail</h6>--}}
                        {{--                                            </a>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}

                        {{--                                <div id="accordionBodyThree" class="collapse" role="tabpanel" aria-labelledby="accordionHeadingThree" aria-expanded="false" data-parent="accordion">--}}
                        {{--                                    <div class="card-block col-12">--}}
                        {{--                                        <p>Accordion Item 3 - Body</p>--}}
                        {{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin laoreet ante at nisi tempus, maximus bibendum--}}
                        {{--                                            odio consequat. Proin eleifend elit nec facilisis luctus. Donec ut ornare tellus. Proin posuere et leo--}}
                        {{--                                            vel congue. Nunc ipsum eros, vestibulum non mi et, porttitor tristique nulla. Pellentesque habitant morbi--}}
                        {{--                                            tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum a turpis eu quam bibendum--}}
                        {{--                                            interdum a quis erat. Fusce porta odio sed nulla ultrices, gravida viverra nunc imperdiet.</p>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}

                        {{--                        </div>--}}
                        {{--                    </div>--}}
                        <!-- End -->
                        </div>
                        <div class="col-12 col-sm-4"></div>
                    </div>
                </div>
    </div>
    </div>

                <div class="height-2"></div>
                <div class="container">
        <div class="row pb-2">
                <div class="container pt-3 pb-2">
                    <div class="row">
                         <div class="col-sm-2"></div>
                        <div class="col-12 col-sm-8">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-12 col-sm-11">
                                    <div class="row">
                                        <div class="col-12 col-sm-5">
                                            <div class="trainer-image">
                                                @if($data->users['image'] == "")
                                                    <img class="full-img rounded-circle"
                                                         src="{{asset('assets/frontend/img/download.png')}}"
                                                         alt="trainer-img">
                                                @else
                                                    <img class="full-img rounded-circle"
                                                         src="{{asset('users/'. $data->users['image'])}}"
                                                         alt="trainer-img">

                                                @endif
                                            </div>
                                            <ul class="trainer-rating pl-3">
                                                <li>
                                                    <img src="{{asset('assets/frontend/img/trainer-star.png')}}"
                                                         alt="trainer-star">
                                                </li>
                                                <li>
                                                    <h6 class="m-0">
                                                        <dt>4.7</dt>
                                                    </h6>
                                                </li>
                                                <li>
                                                    <div class="plum-text">instructor Rating</div>
                                                </li>
                                            </ul>
                                            <ul class="trainer-rating pl-3">
                                                <li>
                                                    <img src="{{asset('assets/frontend/img/comment.png')}}"
                                                         alt="trainer-star">
                                                </li>
                                                <li>
                                                    <h6 class="m-0">
                                                        <dt>1400</dt>
                                                    </h6>
                                                </li>
                                                <li>
                                                    <div class="plum-text">Reviews</div>
                                                </li>
                                            </ul>
                                            <ul class="trainer-rating pl-3">
                                                <li>
                                                    <img src="{{asset('assets/frontend/img/student.png')}}"
                                                         alt="trainer-star">
                                                </li>
                                                <li>
                                                    <h6 class="m-0">
                                                        <dt>2000</dt>
                                                    </h6>
                                                </li>
                                                <li>
                                                    <div class="plum-text">Students</div>
                                                </li>
                                            </ul>
                                            <ul class="trainer-rating pl-3">
                                                <li>
                                                    <img src="{{asset('assets/frontend/img/course-video.png')}}"
                                                         alt="trainer-star">
                                                </li>
                                                <li>
                                                    <h6 class="m-0">
                                                        <dt>980</dt>
                                                    </h6>
                                                </li>
                                                <li>
                                                    <div class="plum-text">Coures</div>
                                                </li>
                                            </ul>
                                            <ul class="trainer-rating pl-3 mt-3">
                                                <li>
                                                    <img src="{{asset('assets/frontend/img/t-fb.png')}}"
                                                         alt="trainer-star">
                                                </li>
                                                <li>
                                                    <img src="{{asset('assets/frontend/img/t-insta.png')}}"
                                                         alt="trainer-star">
                                                </li>
                                                <li>
                                                    <img src="{{asset('assets/frontend/img/t-link.png')}}"
                                                         alt="trainer-star">
                                                </li>
                                                <li>
                                                    <img src="{{asset('assets/frontend/img/t-twi.png')}}"
                                                         alt="trainer-star">
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-12 col-sm-7">
                                            <div class="trainer-description plum-text">
                                                Jose Marcial Portilla has a BS and MS in Mechanical Engineering from
                                                Santa Clara University and years of experience as a professional
                                                instructor and trainer for Data Science and programming. He has
                                                publications and patents in various fields such as microfluidics,
                                                materials science, and data science technologies. Over the course of his
                                                career he has developed a skill set in analyzing data and he hopes to
                                                use his experience in teaching and data science to help other people
                                                learn the power of programming the ability to analyze data, as well as
                                                present the data in clear and beautiful visualizations. Currently he
                                                works as the Head of Data Science for Pierian Data Inc. and provides
                                                in-person data science and python
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                </div>
            </div>
            </div>

            <div class="height-2"></div>

            <div class="container pt-2 pb-2">

                <!-- Comment Review Section -->
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-12 col-sm-8">
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-12 col-sm-11">
                                <div class="row">
                                    <div class="col-5">

                                        <ul class="trainer-rating pl-3">
                                            <li>
                                                <div class="comment-img">
                                                    <img class="t-img rounded-circle"
                                                         src="{{asset('assets/frontend/img/download.png')}}"
                                                         alt="trainer-star">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="plum-text">
                                                    <dt>A weak ago</dt>
                                                </div>
                                                <div class="plum-text">abcom</div>
                                            </li>
                                        </ul>

                                    </div>
                                    <div class="col-7 mb-3">
                                        <div class="text-center">
                                            <h6>
                                                <dt>Reviews</dt>
                                        </div>
                                        <div>
                                            <ul class="review-rating mb-3">
                                                <li>
                                                    <img src="{{asset('assets/frontend/img/star-review.png')}}"
                                                         alt="trainer-star">
                                                </li>
                                                <li>
                                                    <img src="{{asset('assets/frontend/img/star-review.png')}}"
                                                         alt="trainer-star">
                                                </li>
                                                <li>
                                                    <img src="{{asset('assets/frontend/img/star-review.png')}}"
                                                         alt="trainer-star">
                                                </li>
                                                <li>
                                                    <img src="{{asset('assets/frontend/img/star-review.png')}}"
                                                         alt="trainer-star">
                                                </li>
                                                <li>
                                                    <img src="{{asset('assets/frontend/img/star-r-empty.png')}}"
                                                         alt="trainer-star">
                                                </li>

                                            </ul>
                                        </div>
                                        <div class="comment-description plum-text">
                                            Jose Marcial Portilla has a BS and MS in Mechanical Engineering from Santa
                                            Clara University and years of experience as a professional instructor and
                                            trainer for Data Science and programming.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
                @if(Auth::check() && Auth::user()->role_id == 3 && Auth::user()->is_trainer!=1)
                    @if(!isset($rate))
                        <div class="othr_pages_popup" id="gaveFeedbackPopup">

                            <div class="othr_pages_popup_nxt">
                                <div class="inner---modal">
                                    <form id="ratingForm_Rat">
                                        @if(!isset($trainer_check))
                                            <input type="hidden" name="trainer_id" value="{{$data->user_id}}">
                                        @endif
                                        <input type="hidden" name="type">
                                        <input type="hidden" name="course_id" value="{{$data->id}}">
                                        <input type="hidden" name="rating" value="0">
                                        @if(!isset($trainer_check))
                                            <input type="hidden" name="trainer_rating" value="0">
                                        @endif
                                        <textarea class="coment-feedback" placeholder="Write a review" name="message"
                                                  required></textarea><br>
                                        <label>Course Rating</label>
                                        <div class="star-plugin-main user_ratting"></div>
                                        <br>
                                        @if(!isset($trainer_check))
                                            <label>Trainer Rating</label>
                                            <div class="star-plugin-main trainer_ratting "></div><br>
                                        @endif
                                        <button type="submit" class="submit-btn-popup">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                @endif
            @endif
            <!-- End Comment Review Section-->
                <div class="row"></div>
                <div class="height-2"></div>
            </div><div class="container pt-2 pb-2">

                <!-- Comment Review Section -->
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-12 col-sm-8">
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-12 col-sm-11">
                                <div class="row">
                                    <div class="col-5">

                                        <ul class="trainer-rating pl-3">
                                            <li>
                                                <div class="comment-img">
                                                    <img class="t-img rounded-circle"
                                                         src="{{asset('assets/frontend/img/download.png')}}"
                                                         alt="trainer-star">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="plum-text">
                                                    <dt>A weak ago</dt>
                                                </div>
                                                <div class="plum-text">abcom</div>
                                            </li>
                                        </ul>

                                    </div>
                                    <div class="col-7 mb-3">
                                        <div class="text-center">
                                            <h6>
                                                {{-- <dt>Reviews</dt> --}}
                                        </div>
                                        <div>
                                            <ul class="review-rating mb-3">
                                                <li>
                                                    <img src="{{asset('assets/frontend/img/star-review.png')}}"
                                                         alt="trainer-star">
                                                </li>
                                                <li>
                                                    <img src="{{asset('assets/frontend/img/star-review.png')}}"
                                                         alt="trainer-star">
                                                </li>
                                                <li>
                                                    <img src="{{asset('assets/frontend/img/star-review.png')}}"
                                                         alt="trainer-star">
                                                </li>
                                                <li>
                                                    <img src="{{asset('assets/frontend/img/star-review.png')}}"
                                                         alt="trainer-star">
                                                </li>
                                                <li>
                                                    <img src="{{asset('assets/frontend/img/star-r-empty.png')}}"
                                                         alt="trainer-star">
                                                </li>

                                            </ul>
                                        </div>
                                        <div class="comment-description plum-text">
                                            Jose Marcial Portilla has a BS and MS in Mechanical Engineering from Santa
                                            Clara University and years of experience as a professional instructor and
                                            trainer for Data Science and programming.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
                @if(Auth::check() && Auth::user()->role_id == 3 && Auth::user()->is_trainer!=1)
                    @if(!isset($rate))
                        <div class="othr_pages_popup" id="gaveFeedbackPopup">

                            <div class="othr_pages_popup_nxt">
                                <div class="inner---modal">
                                    <form id="ratingForm_Rat">
                                        @if(!isset($trainer_check))
                                            <input type="hidden" name="trainer_id" value="{{$data->user_id}}">
                                        @endif
                                        <input type="hidden" name="type">
                                        <input type="hidden" name="course_id" value="{{$data->id}}">
                                        <input type="hidden" name="rating" value="0">
                                        @if(!isset($trainer_check))
                                            <input type="hidden" name="trainer_rating" value="0">
                                        @endif
                                        <textarea class="coment-feedback" placeholder="Write a review" name="message"
                                                  required></textarea><br>
                                        <label>Course Rating</label>
                                        <div class="star-plugin-main user_ratting"></div>
                                        <br>
                                        @if(!isset($trainer_check))
                                            <label>Trainer Rating</label>
                                            <div class="star-plugin-main trainer_ratting "></div><br>
                                        @endif
                                        <button type="submit" class="submit-btn-popup">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                @endif
            @endif
            <!-- End Comment Review Section-->
                <div class="row"></div>
            </div>
<div class="height-2"></div>

        <!-- Modal -->
        <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header plum-bg white-text">
                        <h5 class="modal-title" id="exampleModalLabel">Finance compelet course Classes</h5>
                        <button type="button" class="close white-text custom_close" data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <video id="video_1" class="video-js vjs-default-skin" controls preload="auto"
                                       data-setup='{}'>
                                    <source
                                        src="https://upload.wikimedia.org/wikipedia/commons/transcoded/a/ab/Caminandes_3_-_Llamigos_-_Blender_Animated_Short.webm/Caminandes_3_-_Llamigos_-_Blender_Animated_Short.webm.720p.webm"
                                        type="video/webm" label="720P">
                                    <source
                                        src="https://upload.wikimedia.org/wikipedia/commons/transcoded/a/ab/Caminandes_3_-_Llamigos_-_Blender_Animated_Short.webm/Caminandes_3_-_Llamigos_-_Blender_Animated_Short.webm.480p.webm"
                                        type="video/webm" label="480P" selected="true">
                                    <source
                                        src="https://upload.wikimedia.org/wikipedia/commons/transcoded/a/ab/Caminandes_3_-_Llamigos_-_Blender_Animated_Short.webm/Caminandes_3_-_Llamigos_-_Blender_Animated_Short.webm.360p.webm"
                                        type="video/webm" label="360P">
                                    <source
                                        src="https://upload.wikimedia.org/wikipedia/commons/transcoded/a/ab/Caminandes_3_-_Llamigos_-_Blender_Animated_Short.webm/Caminandes_3_-_Llamigos_-_Blender_Animated_Short.webm.240p.webm"
                                        type="video/webm" label="240P">
                                </video>
                            </div>
                        </div>
                        <div class="plum-bg">
                            <div class="row pt-2 pb-2">
                                <div class="col-6">
                                    <ul class="m-v-list">
                                        <li>
                                            <div class="model-video-img">
                                                <img class="full-img thumbnail"
                                                     src="{{asset('assets/frontend/img/thumbnail.png')}}"
                                                     alt="video-thumnail">
                                                <img class="model-play"
                                                     src="{{asset('assets/frontend/img/course-video.png')}}" alt="play">
                                            </div>
                                        </li>
                                        <li>
                                            <div class="model-video-title">
                                                <h6>Title</h6>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-6 text-end model-video-time">
                                    <ul class="m-v-list">

                                        <li>
                                            <div class="model-video-title">
                                                <h6>15:00</h6>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row pt-2 pb-2 m-v-border">
                                <div class="col-6">
                                    <ul class="m-v-list">
                                        <li>
                                            <div class="model-video-img">
                                                <img class="full-img thumbnail"
                                                     src="{{asset('assets/frontend/img/thumbnail.png')}}"
                                                     alt="video-thumnail">
                                                <img class="model-play"
                                                     src="{{asset('assets/frontend/img/course-video.png')}}" alt="play">
                                            </div>
                                        </li>
                                        <li>
                                            <div class="model-video-title">
                                                <h6>Title</h6>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-6 text-end model-video-time">
                                    <ul class="m-v-list">

                                        <li>
                                            <div class="model-video-title">
                                                <h6>15:00</h6>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer plum-bg">

                    </div>
                </div>
            </div>
        </div>

        <!-- Star Rating js-->
    <!-- <script src="{{url('assets/rating/jquery.rating-stars.js')}}"></script> -->
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

        <script>
            $('.user_ratting').starrr({
                max: 5,
                change: function (e, value) {
                    $("#ratingForm_Rat [name=rating]").val(value);
                }
            });
            $('.trainer_ratting').starrr({
                max: 5,
                change: function (e, value) {
                    $("#ratingForm_Rat [name=trainer_rating]").val(value);
                }
            });
            $('.completed_rating').starrr({
                rating: $('.completed_rating').attr('complete-rating'),
                readOnly: true
            });

            // gave rating popup
            $(document).on("click", ".gaveRatingBtnWorker", function (e) {
                $("#ratingForm_Rat").trigger("reset");
                let toId = $(this).data("trainer_id");
                let type = $(this).data("type");
                let bookingId = $(this).data("course_id");
                $("#ratingForm_Rat").find("[name=trainer_id] ").val(toId);
                $("#ratingForm_Rat").find("[name=type]").val(type);
                $("#ratingForm_Rat").find("[name=course_id]").val(bookingId);
                $('#gaveFeedbackPopup, .overlay').fadeIn(700);
            });

            // gave rating
            $("body").on("submit", "#ratingForm_Rat", function (e) {
                e.preventDefault();
                let requestObject = $(this).serialize();
                axios.post('{{route("gaveRating")}}', requestObject)
                    // place
                    .then(function (response) {

                        if (response.data.status == 1) {
                            swal(response.data.message, '', 'success');
                            setTimeout(function () {
                                location.reload();
                            }, 2000);
                        } else {
                            swal(response.data.message, '', 'success');
                        }
                    })
                    .catch(function (error) {
                        // do something
                    });
            });


        </script>
        <script>
            $('#star1').starrr({
                change: function (e, value) {
                    if (value) {
                        $('#review_ratting').val(value);
                    }
                }
            });

            videojs("video_1", {}, function () {
                var player = this;

                player.controlBar.addChild('QualitySelector');
            });


            $(function () {
                $('#basicExampleModal').modal({
                    show: false
                }).on('hidden.bs.modal', function () {
                    $(this).find('video')[0].pause();
                });
            });
        </script>



@endsection
