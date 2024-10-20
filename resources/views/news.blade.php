@extends('layouts.landinglayout')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
@section('content')
<div class="breadcrumb_wrap" data-stellar-background-ratio="0.3" style="background: url(images/slider_group_in_campus.jpg); background-attachment: fixed; background-position: 50% 50%;">
<div class="breadcrumb_wrap_inner">
<div class="container">
<h1>Popular Courses</h1>
<ul class="breadcrumbs">
<li><a href="index.html">Home</a> /</li>
<li>Courses (grid view)</li>
</ul>
</div>
</div>
</div>


<div id="courses_wrapper" class="courses_wrapper">

<div class="container">

<div class="course_wrapp col-lg-9 col-md-8 col-sm-12 col-xs-12">

<div class="course_to_search_wrapp">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="course_to_search_inner">
<div class="course_to_search">
<div class="course_swicher">
<a class="fa fa-th-large active" title="Grid Layout" href="course_grid.html"></a>
<a class="fa fa-th-list" aria-hidden="true" title="List Layout" href="course_list.html"></a>
</div>
<div class="search_pannel">
<form method="post" action="#">
<select class="selectpicker">
<option>All Categories</option>
<option>Science</option>
<option>Account</option>
<option>Business</option>
<option>Psychology</option>
<option>Food</option>
<option>Art</option>
</select>
<select class="selectpicker">
<option>Price</option>
<option>$70</option>
<option>$77</option>
<option>$90</option>
<option>$95</option>
<option>$100</option>
<option>$110</option>
</select>
</form>
</div>
</div>
</div>
</div>
</div>


<div class="wrapper_course">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="course_block">
<div class="img_wrap">
<img alt="Science" src="elerningtheme/images/science.jpg">
<div class="course_img_hoverlay_btn"><a href="course_dtl.html" title="View More" class="fa fa-eye"></a></div>
<h4>Science</h4>
</div>
<div class="science">
<div class="course_info">
<p>Business Trends changing with latest courses are available with us, lorem ipsum dolor sit amet do, consectetur adipisicing elit, sed do eiusmod temp incididunt ut labore et
dolore magna aliqua cons adipisicing elit, sed do eiusmod eiusmod tempor.</p>
</div>
</div>
<div class="science course_count_wrap">
<div class="course_count">
Duration: <span>9 Month</span>
</div>
<div class="course_price">
Fees: <span>$95.00</span>
</div>
</div>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="course_block">
<div class="img_wrap">
<img alt="Accounting" src="elerningtheme/images/accounting.jpg">
<div class="course_img_hoverlay_btn"><a href="course_dtl.html" title="View More" class="fa fa-eye"></a></div>
<h4>Accounting</h4>
</div>
<div class="accounts">
<div class="course_info">
<p>Business Trends changing with latest courses are available with us, lorem ipsum dolor sit amet do, consectetur adipisicing elit, sed do eiusmod temp incididunt ut labore et
dolore magna aliqua cons adipisicing elit, sed do eiusmod eiusmod tempor.</p>
</div>
</div>
<div class="accounts course_count_wrap">
<div class="course_count">
Duration: <span>7 Month</span>
</div>
<div class="course_price">
Fees: <span>$90.00</span>
</div>
</div>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="course_block">
<div class="img_wrap">
<img alt="Business" src="elerningtheme/images/business.jpg">
<div class="course_img_hoverlay_btn"><a href="course_dtl.html" title="View More" class="fa fa-eye"></a></div>
<h4>Business Development</h4>
</div>
<div class="business">
<div class="course_info">
<p>Business Trends changing with latest courses are available with us, lorem ipsum dolor sit amet do, consectetur adipisicing elit, sed do eiusmod temp incididunt ut labore et
dolore magna aliqua cons adipisicing elit, sed do eiusmod eiusmod tempor.</p>
</div>
</div>
<div class="business course_count_wrap">
<div class="course_count">
Duration: <span>6.5 Month</span>
</div>
<div class="course_price">
Fees: <span>$110.00</span>
</div>
</div>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="course_block">
<div class="img_wrap">
<img alt="Psychology" src="elerningtheme/images/psychology.jpg">
<div class="course_img_hoverlay_btn"><a href="course_dtl.html" title="View More" class="fa fa-eye"></a></div>
<h4>Psychology</h4>
</div>
<div class="psychology">
<div class="course_info">
<p>Business Trends changing with latest courses are available with us, lorem ipsum dolor sit amet do, consectetur adipisicing elit, sed do eiusmod temp incididunt ut labore et
dolore magna aliqua cons adipisicing elit, sed do eiusmod eiusmod tempor.</p>
</div>
</div>
<div class="psychology course_count_wrap">
<div class="course_count">
Students: <span>350</span>
</div>
<div class="course_price">
Fees: <span>$77.00</span>
</div>
</div>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="course_block">
<div class="img_wrap">
<img alt="Food &amp; Drinking" src="elerningtheme/images/food.jpg">
<div class="course_img_hoverlay_btn"><a href="course_dtl.html" title="View More" class="fa fa-eye"></a></div>
<h4>Food &amp; Drinking</h4>
</div>
<div class="food">
<div class="course_info">
<p>Business Trends changing with latest courses are available with us, lorem ipsum dolor sit amet do, consectetur adipisicing elit, sed do eiusmod temp incididunt ut labore et
dolore magna aliqua cons adipisicing elit, sed do eiusmod eiusmod tempor.</p>
</div>
</div>
<div class="food course_count_wrap">
<div class="course_count">
Duration: <span>6 Month</span>
</div>
<div class="course_price">
Fees: <span>$90.00</span>
</div>
</div>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="course_block">
<div class="img_wrap">
<img alt="Arts &amp; Media" src="elerningtheme/images/art.jpg">
<div class="course_img_hoverlay_btn"><a href="course_dtl.html" title="View More" class="fa fa-eye"></a></div>
<h4>Arts &amp; Media</h4>
</div>
<div class="arts">
<div class="course_info">
<p>Business Trends changing with latest courses are available with us, lorem ipsum dolor sit amet do, consectetur adipisicing elit, sed do eiusmod temp incididunt ut labore et
dolore magna aliqua cons adipisicing elit, sed do eiusmod eiusmod tempor.</p>
</div>
</div>
<div class="arts course_count_wrap">
<div class="course_count">
Duration: <span>9 Month</span>
</div>
<div class="course_price">
Fees: <span>$70.00</span>
</div>
</div>
</div>
</div>
</div>

<div class="clearfix"></div>

<div class="pager">
<div class="pages">
<ul class="pagination">
<li><a href="">Prev</a></li>
<li class="active"><a href="">1</a></li>
<li><a href="">2</a></li>
<li><a href="">3</a></li>
<li><a href="">4</a></li>
<li><a href="">Next</a></li>
</ul>
</div>
</div>

</div>


<div class="aside_wrapper col-lg-3 col-md-4 col-sm-12 col-xs-12">

<div class="search_course">
<form method="post" action="#">
<input class="form-control" placeholder="What are you looking for?" name="s" type="text">
<button type="submit" class="btn btn_search"><i class="fa fa-search"></i></button>
</form>
</div>


<div class="category_course">
<h4>Categories</h4>
<ul>
<li><a href="#">Library Science</a></li>
<li><a href="#">Digital Marketing</a></li>
<li><a href="#">UI/UX Development</a></li>
<li><a href="#">Graphic Design</a></li>
<li><a href="#">.Net 4.0 Framework</a></li>
<li><a href="#">Advance Java Script</a></li>
</ul>
</div>


<div class="category_events">
<h4>Events</h4>
<ul>
<li>
<div class="date">
<span class="month">Mar</span>
<span class="day">20</span>
</div>
<div class="event_txt">
<h5><a href="#">Grades at Educor Sky Rocket</a></h5>
<p> Vivamus tellus leo, imperdiet sed sapien.</p>
</div>
</li>
<li>
<div class="date">
<span class="month">Apr</span>
<span class="day">15</span>
</div>
<div class="event_txt">
<h5><a href="#">The Design of HTML5</a></h5>
<p> Vivamus tellus leo, imperdiet sed sapien.</p>
</div>
</li>
<li>
<div class="date">
<span class="month">May</span>
<span class="day">25</span>
</div>
<div class="event_txt">
<h5><a href="#">Online Learning Glossary</a></h5>
<p> Vivamus tellus leo, imperdiet sed sapien.</p>
</div>
</li>
</ul>
</div>





</div>

</div>

</div>



@endsection