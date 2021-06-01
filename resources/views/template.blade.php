<!DOCTYPE html>
<html>
<head>
    <title>E-vote Perwira</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <script src="{{asset('js/app.js')}}" defer></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">E-vote</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ Request::segment(1) === 'students' ? 'active' : null }}" href="{{route('students.index')}}">Student</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::segment(1) === 'majors' ? 'active' : null }}" href="{{route('majors.index')}}">Major</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Candidate</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
    @yield('content')
</div>
 
</body>
</html>