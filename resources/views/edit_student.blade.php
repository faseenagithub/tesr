<!DOCTYPE html>
<html lang="en">
@extends('layout')

<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
   
      <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="/">Home</a></li>
        <li class="active"><a href="/students-list">Students List</a></li>
        <li><a href="/mark-list">Mark List</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-4 sidenav">
    </div>

    <div class="col-sm-4 sidenav">
      <form action="/update-student/{{encrypt($data->id)}}" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="container">
          <h2>Edit Student</h2>
        </div>

        <div class="container" style="background-color:white">

          <span>Name</span>
          <input type="text" placeholder="Name" name="name" value="{{$data->name}}" required>

          <span>Age</span>
          <input type="number" placeholder="Age" name="age" min="1" value="{{$data->age}}" required>

          <span>Gender</span>
          <select id="gender" name="gender" required>
            <option value="">Select Gender</option>
            <option value="m" @if($data->gender == 'm') selected @endif >Male</option>
            <option value="f" @if($data->gender == 'f') selected @endif >Female</option>
          </select>

          <span>Reporting Teacher</span>
          <select id="teacher" name="teacher" required>
            <option value="">Select Teacher</option>
            <option value="Katie" @if($data->teacher == 'Katie') selected @endif >Katie</option>
            <option value="Max" @if($data->teacher == 'Max') selected @endif>Max</option>
            <option value="Tom" @if($data->teacher == 'Tom') selected @endif>Tom</option>
          </select>
        </div>

        <div class="container">
          <input type="submit" value="Update" class="btn btn-primary">
        </div>
      </form>
    </div>
    <div class="col-sm-4 sidenav">
    </div>
  </div>
</div>

</body>
</html>
