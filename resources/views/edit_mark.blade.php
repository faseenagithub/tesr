<!DOCTYPE html>
<html lang="en">
@extends('layout')

<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
   
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="/">Home</a></li>
        <li><a href="/students-list">Students List</a></li>
        <li class="active"><a href="/mark-list">Mark List</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-3 sidenav">  
    </div>

  <div class="col-sm-6 sidenav">
    <form action="/update-mark/{{encrypt($data->id)}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="container">
        <h2>Edit Marks</h2>
      </div>

      <div class="container" style="background-color:white">

        <span>Name</span>
        <select id="student" name="student">
          <option value="">Select Student</option>
          @foreach($students as $key => $user)
          <option value="{{$key}}" @if($key == $data->student_id) selected @endif>{{ucfirst($user)}}</option>
          @endforeach
        </select>

        <span>Term</span>
        <select id="term" name="term">
          <option value="">Select Term</option>
          <option value="One" @if($data->term == 'One') selected @endif>One</option>
          <option value="Two" @if($data->term == 'Two') selected @endif>Two</option>
          <option value="Three" @if($data->term == 'Three') selected @endif>Three</option>
        </select>

        <span>Mark For Maths</span>
        <input type="number" step="any" min="0" placeholder="Mark for Maths" name="maths" value="{{$data->maths}}" required>
        
        <span>Mark For Science</span>
        <input type="number" step="any" min="0" placeholder="Mark for Science" name="science" value="{{$data->science}}" required>

        <span>Mark For History</span>
        <input type="number" step="any" min="0" placeholder="Mark for History" name="history" value="{{$data->history}}" required>

      </div>
    
      <div class="container">
        <input type="submit" value="Update" class="btn btn-primary">
      </div>
    </form>
    </div>
    <div class="col-sm-3 sidenav">  
    </div>
  </div>
</div>



</body>
</html>
