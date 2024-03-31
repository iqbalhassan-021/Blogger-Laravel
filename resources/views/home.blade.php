<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

<title>
{{$siteDetails->last()->sitename}}
    </title>
</head>
<body>

<div class="body-cover">
    
@include('compoments\header')


<div class="row">
  <div class="leftcolumn">
    @if($lastTwoBlogs->isEmpty())
    <h2>No Blogs avaoable at the moment</h2>
    @else
    @foreach ($lastTwoBlogs as $blog)
    <div class="card">
     <a href="{{url('/blog/'.$blog->id)}}"><h2>{{$blog->blogtitle}}</h2></a> 
     <h5>{{$blog->time}}</h5>
      <a href="{{url('/blog/'.$blog->id)}}"><img  src="{{$blog->blogimg}}" class="blog-image" alt="{{$blog->blogtitle}}"></a>

      <p class="wrap">
      {{$blog->content}}
    </p>
      <br>

    </div>
    @endforeach
    @endif
    <br>
      <a href="{{url('/blogs')}}"><button class="button" style="width: 100%;">
          Load More
      </button></a>
  </div>
  <div class="rightcolumn">
  @if($blogs->isEmpty())
    <h2>No Blogs avaoable at the moment</h2>
    @else
    @foreach ($blogs as $blog)
    <div class="card">
     <a href="{{url('/blog/'.$blog->id)}}"><h2>{{$blog->blogtitle}}</h2></a> 
     <h5>{{$blog->time}}</h5>
      <a href="{{url('/blog/'.$blog->id)}}"><img  src="{{$blog->blogimg}}" class="blog-image" alt="{{$blog->blogtitle}}"></a>


    </div>
      @endforeach
      @endif
      <br>
      <a href="{{url('/blogs')}}"><button class="button" style="width: 100%;">
          Load More
      </button></a>
  </div>
</div>
@include('compoments\footer')
</div>


</body>
</html>
