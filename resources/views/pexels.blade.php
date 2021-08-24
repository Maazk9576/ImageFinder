<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,800,300' rel='stylesheet' type='text/css'>
    <title>Image Finder</title>
    <style>

body {
  padding: 20px;
  font-family: sans-serif;
  background:#e1dee4e8;
}
img {
  width: 100%; /* need to overwrite inline dimensions */
  height: auto;
}
h2 {
  margin-bottom: .5em;
}
.grid-container {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  grid-gap: 1em;
}


/* hover styles */
.location-listing {
  position: relative;
}

.location-image {
  line-height: 0;
  overflow: hidden;
}

.location-image img {
  filter: blur(0px);
  transition: filter 0.3s ease-in;
  transform: scale(1.1);
}

.location-title {
  font-size: 1.5em;
  font-weight: bold;
  text-decoration: none;
  z-index: 1;
  position: absolute;
  height: 100%;
  width: 100%;
  top: 0;
  left: 0;
  opacity: 0;
  transition: opacity .5s;
  background: rgba(139, 5, 151, 0.13);
  color: white;

  /* position the text in t’ middle*/
  display: flex;
  align-items: center;
  justify-content: center;
}

.location-listing:hover .location-title {
  opacity: 1;
}

.location-listing:hover .location-image img {
  filter: blur(2px);
}


/* for touch screen devices */
@media (hover: none) {
  .location-title {
    opacity: 1;
  }
  .location-image img {
    filter: blur(2px);
  }
}


        .container {
  padding: 2rem 0rem;
}
}
    </style>
</head>
<body>

    <div class="container">
        <form action="{{url('index/submit')}}" method="POST">
            <div class="form-group">
                @csrf
                <label style="color: black;font-weight: bolder;" for="exampleInputPassword1">Search For Free Images</label>
                <input type="text" class="form-control" name="sea" id="sea" placeholder="search" required>
              </div>
              <button type="submit" class="col-md-12 btn btn-dark">Submit</button>
        </form>
    </div>
<div class="container">
  <div class="child-page-listing">

    <div class="grid-container">
      @if (is_array($res) || is_object($res))
      @foreach ($res as $r)
      <article id="3685" class="location-listing">

        <a href="{{$r['src']['original']}}" download="myimage" target="_blank"><span class="location-title">{{$r['photographer']}}</span></a>


        <div class="location-image">
              <img width="300" height="169" src="{{$r['src']['original']}}" alt="img" height="auto" width="100%">
        </div>

      </article>
      @endforeach
      @else

      @endif

    </div>

  </div>

</div>















</body>
</html>
