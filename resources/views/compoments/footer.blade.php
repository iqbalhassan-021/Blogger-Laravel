<footer>
  <div class="container">
      <div class="text-holder">
        <a href="/" class="no-decoration">
          <h1>
          {{$siteDetails->last()->sitename}}
          </h1>
        </a>
      </div>
      <div class="text-holder">

          <h3>Contact Details</h3>
          
          <a href="mailto:{{$siteDetails->last()->email}}" class="no-decoration"> 
            <p>
            {{$siteDetails->last()->email}}
            </p>
          </a>
          <a href="tel:{{$siteDetails->last()->phone}}" class="no-decoration">
            <p>
            {{$siteDetails->last()->phone}}
            </p>
          </a>
          <a href="{{$siteDetails->last()->facebook}}" class="no-decoration">
            <p>
              Facebook
            </p>
          </a>
      </div>
      <div class="text-holder">
          <h3>Blogs</h3>
          @if($blogs->isEmpty())
          <p>No Blogs avaoable at the moment</p>
    @else
    @foreach ($blogs as $blog)
          <a href="{{url('/blog/'.$blog->id)}}" class="no-decoration">
            <p>
             {{$blog->blogtitle}}
            </p>
   
          </a>
          @endforeach
          @endif
      </div>
      <div class="text-holder">
        <form class="search-form" action="subscribe" method="post">
          @csrf
          <input type="email" class="search-input" name="email" placeholder="email">
          <button type="submit" class="search-button">Subscribe</button>
      </form>
      <br>
      <p style="font-size: 10px;">
        By subscribing you'll get notified whenever i'll post a blog
</p>
      </div>
  </div>
  <br>
    <p>&copy; 2024 We Know | Developed by : <a href="#" class="me">E N T E R T A I N E R</a></p>
</footer>