@extends('layouts.main')
@section('online-course')
<style>
    .carousel-item{
        position: relative;
    }
    .main_bg_color{
        background-color:#570055;
    }
    .carousel_item_header_icon{
      overflow: hidden;
      position: absolute;
      top: 4px;
      right: 15px;
      padding:0px 5px;
    }
        .carousel_item_header_icon p{
            background-color: black;
            padding:3px 5px;
        }
        .carousel_item_header_icon i{
            font-size:24px;
            color: white;
        }
    .newcard{
        margin-bottom: 2%;
    }
    .carousel_item_footer{
      overflow: hidden;
      position: relative;
      bottom: 0px;
      right: 0px;
      border-bottom-left-radius: 10px;
      border-bottom-right-radius: 10px;
      padding: 2%;
    }
        .carousel_item_footer div p:nth-child(1){
            font-size: 14px;
        }
        .carousel_item_footer div p:nth-child(2){
            font-size: 8px;
        }
        .carousel_item_footer div p{
            margin: 0px;
        }

</style>

<div class="flex-center mb-1 mt-1 offline_courses">
    @if($category == "")
    <u><a class="Socialb plum-text" href="#">All Courses</a></u>
        @else
        <u><a class="Socialb plum-text" href="#">{{$category->name}} Courses</a></u>
    @endif
</div>


        <div class="container">
            <div class="row">
                <!-- start block -->
                <div class="col-sm-12 col-md-4 newcard">
                    <div class="card">
                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg" alt="Card image cap">
                    </div>
                    <div class="col carousel_item_footer main_bg_color" style="color: white">
                        <div class="col float-left">
                            <p>The Art Painting and Digital Art Course<br>
                              -12 Courses in 1</p>
                            <p>Miss Nabeela, Coderstars by rob  percival Experien</p>
                            <p class="float-right p-0" style="font-size:10px">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span> 5</span>
                                <span>(12345)</span>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- blocek close -->
                 <!-- start block -->
                <div class="col-sm-12 col-md-4 newcard">
                    <div class="card">
                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg" alt="Card image cap">
                    </div>
                    <div class="col carousel_item_footer main_bg_color" style="color: white">
                        <div class="col float-left">
                            <p>The Art Painting and Digital Art Course<br>
                              -12 Courses in 1</p>
                            <p>Miss Nabeela, Coderstars by rob  percival Experien</p>
                            <p class="float-right p-0" style="font-size:10px">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span> 5</span>
                                <span>(12345)</span>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- blocek close -->
                 <!-- start block -->
                <div class="col-sm1-12 col-md-4 newcard">
                    <div class="card">
                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg" alt="Card image cap">
                    </div>
                    <div class="col carousel_item_footer main_bg_color" style="color: white">
                        <div class="col float-left">
                            <p>The Art Painting and Digital Art Course<br>
                              -12 Courses in 1</p>
                            <p>Miss Nabeela, Coderstars by rob  percival Experien</p>
                            <p class="float-right p-0" style="font-size:10px">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span> 5</span>
                                <span>(12345)</span>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- blocek close -->
                 <!-- start block -->
                <div class="col-sm-12 col-md-4 newcard">
                    <div class="card">
                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg" alt="Card image cap">
                    </div>
                    <div class="col carousel_item_footer main_bg_color" style="color: white">
                        <div class="col float-left">
                            <p>The Art Painting and Digital Art Course<br>
                              -12 Courses in 1</p>
                            <p>Miss Nabeela, Coderstars by rob  percival Experien</p>
                            <p class="float-right p-0" style="font-size:10px">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span> 5</span>
                                <span>(12345)</span>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- blocek close -->
            </div>
        </div>


                                <!--/.First slide-->





<!-- umer :P

<div class="container mt-5 mb-5">
    <div class="carousel slide multi-item-carousel" id="theCarousel">
        <div class="carousel-inner row w-100 mx-auto">
            <div class="row">
{{--            {{dd($data)}}--}}
            @foreach($data as $row)
            <div class="carousel-item active col">
{{--            <a href="{{route('detail-course',['id'=>$row->id])}}">
                    <img src="{{asset('course/'. $row->thumbnail)}}" class="img-fluid mx-auto d-block zoom">
                </a>--}}
                <a href="{{route('detail-course',['id'=>$row->id])}}">
                    <img src="{{asset('course/'. $row->thumbnail)}}" class="img-fluid mx-auto d-block">
                    <div class="carousel_item_header_icon">
                        <p class="mb-1"><i class="fa fa-clock-o"></i></p>
                        <p class="mb-0"><i class="fa fa-bars"></i></p>
                    </div>

                    <div class="col carousel_item_footer main_bg_color" style="color: white">
                        <div class="col-md-3 float-left p-0">
                            @if($row->users['image'] == "")
                            <img src="{{asset('assets/frontend/img/onlinecourse/iso.png')}}" class="img-fluid mx-auto d-block rounded-circle"style= "width:60px;height: 60px">
                            @else
                            <img src="{{asset('users/'. $row->users['image'])}}" class="img-fluid mx-auto d-block rounded-circle"style= "width:60px;height: 60px">
                            @endif
                        </div>
                        <div class="col-md-9 float-left pl-0">
                            <p>{{$row->users['name']}}</p>
                            <p>{{$row->name}}<br> {{$row->description}}</p>
                            <p class="float-right p-0" style="font-size: 10px">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span> 5</span>
                                <span>(12345)</span>
                            </p>
                        </div>
                    </div>

                </a>
            </div>
            @endforeach
            </div>
        </div>
    </div>
</div>

old-->
<div class="pagina-footer">
<nav aria-label="Page navigation example">
  <ul class="pagination pg-blue">
    <li class="page-item ">
      <a class="page-link" tabindex="-1">Previous</a>
    </li>
    <li class="page-item"><a class="page-link">1</a></li>
    <li class="page-item active">
      <a class="page-link">2 <span class="sr-only">(current)</span></a>
    </li>
    <li class="page-item"><a class="page-link">3</a></li>
    <li class="page-item ">
      <a class="page-link">Next</a>
    </li>
  </ul>
</nav>
</div>
<!-- <div class="next_previous flex-center mb-1 mt-1 offline_courses">

    <a href="#" class="Socialb plum-text ">{{$data->links()}}</a>
  <a href="#" class=" Socialb plum-text next">Next &raquo;</a>
</div> -->
<!--Description-->

<div class="plum-bg">
    <div class="col-12 col-sm-10 offset-md-1" style="padding: 40px 15px;line-height: 1;">
        <div class="row">
            <div class="col-12 col-sm-6">
                <!-- <div class="mb-1 white-text">Sign up to receive our weekly newsletter</div> -->
                <div class="white-text pull-right">Sign up to receive our weekly newsletter</div><br><br>
                <div class="white-text pull-right">Stay uploaded on all new online and offline training courses</div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="Subscription">
                    <input class="SubInput z-depth-1" type="text" placeholder="Enter your email"><span class="SubBtn"><a
                            href="#">Subscribe</a></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="to-top" title="back to top">↑</div>
<!-- Latter Subscription End -->
    @endsection
