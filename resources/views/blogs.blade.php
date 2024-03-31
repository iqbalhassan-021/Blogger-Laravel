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
<div class="page-wrap" style="height:70vh;">
    @if($blogs->isEmpty())
        <h1>There is nothing to show</h1>
    @else
<div class="grid-container">
    @foreach($blogs as $data)
    <div class="grid-item">
    <a href="">
        <img  src="{{$data->blogimg}}" class="blog-image">
        <p>
            <strong>
                {{$data->blogtitle}}
        </strong>
    </p>
</a>
    </div>    
    @endforeach
</div>
@endif

</div>
@include('compoments\footer')
</div>
</body>
</html>
