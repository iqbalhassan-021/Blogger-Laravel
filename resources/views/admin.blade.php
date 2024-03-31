<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Page</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    /* Optional: Add custom styles here */
    .content {
        padding: 20px;
    }
</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Admin Panel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <button class="nav-link btn btn-link" onclick="showDashboard()">Dashboard</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link btn btn-link" onclick="showEditStore()">Edit Site</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link btn btn-link" onclick="showSubscribers()">Subscribers</button>
                </li>
   
                <li class="nav-item">
                    <button class="nav-link btn btn-link" onclick="showBlogs()">Blogs</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link btn btn-link" onclick="showHome()">Home</button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container content" id="dashboard">
<h2>Blogs</h2>
    @if($blogs->isEmpty())
    <div class="alert alert-info" role="alert">
        No Blogs found.
    </div>

    @else
    <div class="row">
        @foreach($blogs as $data)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
                <img src="{{$data->blogimg}}" class="card-img-top" alt="{{$data->blogtitle}}">
                <div class="card-body">
                    <h5 class="card-title">{{$data->blogtitle}}</h5>

                    <a href="{{url('delete/'.$data->id)}}" class="btn btn-danger">Remove</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>



<div class="container content" id="edit-store" style="display: none;">
    <h2>Edit Site</h2>
    @if($site_info->isEmpty())
    <div class="container content" id="edit-store">
    <h2>Edit Site Details</h2>
    <div class="row">
        <div class="col-md-6">
            <form action="site_details" method="post" class="edit-store-form">
                @csrf <!-- CSRF protection -->
                <div class="form-group">
                    <label for="sitename">Site Name:</label>
                    <input type="text" id="sitename" name="sitename" class="form-control" required value="">
                </div>
                <div class="form-group">
                    <label for="email">Site email:</label>
                    <input type="text" id="email" name="email" class="form-control" required value="">
                </div> 
                <div class="form-group">
                    <label for="phone">Site Phone:</label>
                    <input type="text" id="phone" name="phone" class="form-control" required value="">
                </div>  
                <div class="form-group">
                    <label for="facebook">Site facebook:</label>
                    <input type="text" id="facebook" name="facebook" class="form-control" required value="">
                </div>            
                <input type="submit" value="Submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
    @else
    <div class="container content" id="edit-store">
    <h2>Edit Site Details</h2>
    <div class="row">
        <div class="col-md-6">
            <form action="site_details" method="post" class="edit-store-form">
                @csrf <!-- CSRF protection -->
                <div class="form-group">
                    <label for="sitename">Site Name:</label>
                    <input type="text" id="sitename" name="sitename" class="form-control" required value="{{$site_info->last()->sitename}}">
                </div>
                <div class="form-group">
                    <label for="email">Site email:</label>
                    <input type="text" id="email" name="email" class="form-control" required value="{{$site_info->last()->email}}">
                </div> 
                <div class="form-group">
                    <label for="phone">Site Phone:</label>
                    <input type="text" id="phone" name="phone" class="form-control" required value="{{$site_info->last()->phone}}">
                </div>  
                <div class="form-group">
                    <label for="facebook">Site facebook:</label>
                    <input type="text" id="facebook" name="facebook" class="form-control" required value="{{$site_info->last()->facebook}}">
                </div>            
                <input type="submit" value="Submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
    @endif

</div>

<div class="container content" id="subscribers" style="display: none;">   
 <h2>Subscriber List</h2>

@if(count($subs) > 0)
<div class="row">
    @foreach ($subs as $sub)
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Email: {{$sub->email}}</h5>
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
<div class="alert alert-info" role="alert">
    No subscribers found.
</div>
@endif
</div>


<div class="container content" id="blogs" style="display: none;">
<h2>Post a Blog</h2>
    <div class="row">
        <div class="col-md-6">
            <form action="post_blog" method="post" enctype="multipart/form-data">
                @csrf <!-- CSRF protection -->
                <div class="form-group">
                    <label for="blogimg">Blog Image:</label>
                    <input type="file" id="blogimg" name="blogimg" class="form-control-file" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label for="blogtitle">Blog Title:</label>
                    <input type="text" id="blogtitle" name="blogtitle" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="content">Blog Content:</label>
                    <textarea id="content" name="content" class="form-control" required></textarea>
                </div>
                <input type="submit" value="Post" class="btn btn-primary">
            </form>
        </div>
    </div>    
    <h2>Blog List</h2>
    @if(count($blogs) > 0)
    <div class="row">
        @foreach($blogs as $data)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
                <img src="{{$data->blogimg}}" class="card-img-top" alt="{{$data->blogtitle}}">
                <div class="card-body">
                    <h5 class="card-title">{{$data->blogtitle}}</h5>
                    <p class="card-text">Description: {{$data->content}}</p>
                    <a href="{{url('delete/'.$data->id)}}" class="btn btn-danger">Remove</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="alert alert-info" role="alert">
        No Blogs found.
    </div>
    @endif
</div>

<div class="container content" id="home" style="display: none;">
    <a href="{{url('/')}}">Go back</a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function showDashboard() {
        hideAll();
        document.getElementById('dashboard').style.display = 'block';
    }

    function showEditStore() {
        hideAll();
        document.getElementById('edit-store').style.display = 'block';
    }


    function showSubscribers() {
        hideAll();
        document.getElementById('subscribers').style.display = 'block';
    }


    function showBlogs() {
        hideAll();
        document.getElementById('blogs').style.display = 'block';
    }

    function showHome() {
        hideAll();
        document.getElementById('home').style.display = 'block';
    }

    function hideAll() {
        document.getElementById('dashboard').style.display = 'none';
        document.getElementById('edit-store').style.display = 'none';
        document.getElementById('subscribers').style.display = 'none';
        document.getElementById('blogs').style.display = 'none';
        document.getElementById('home').style.display = 'none';
    }

    // Show default section
    showDashboard();
</script>

</body>
</html>
