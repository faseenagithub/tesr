<!DOCTYPE html>
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
    <div class="col-sm-8 sidenav">
        <div class="container">
          <h2>Students List</h2>
        </div>
        <!-- Session message holder -->
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{ $message }}</strong>
        </div>
        @endif
        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{ $message }}</strong>
        </div>
        @endif

        <div class="container" style="background-color:white">
          <table class="table table-hover">
            <thead>
              <th>Sl No</th>
              <th>Name</th>
              <th>Age</th>
              <th>Gender</th>
              <th>Reporting Teacher</th>
              <th>Action</th>
            </thead>
              @if(count($data) > 0)
            <tbody>
                @foreach($data as $key=>$item)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{ucfirst($item->name)}}</td>
                    <td>{{$item->age}}</td>
                    <td>@if($item->gender == 'm')
                          Male
                        @else
                          Female
                        @endif
                    </td>
                    <td>{{$item->teacher}}</td>
                    <td>
                      <a href="/edit-student/{{encrypt($item->id)}}" class="text-info">Edit</a> /
                      <a href="/delete-student/{{encrypt($item->id)}}" class="text-danger">Delete</a>
                    </td>
                  </tr>
                @endforeach
              @else
                <tr><td colspan="6" class="text-center">No Data Found</td></tr>
              @endif
            </tbody>
          </table>
        </div>
    </div>

    <div class="col-sm-4 sidenav">
      <form action="/add-user" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="container">
          <h2>Add Student</h2>
        </div>
        @if ($message = Session::get('success_reg'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{ $message }}</strong>
        </div>
        @endif


        @if ($message = Session::get('error_reg'))
        <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="container" style="background-color:white">
          <input type="text" placeholder="Name" name="name" required>
          <input type="number" placeholder="Age" min="1" name="age" required>
          <select id="gender" name="gender" required>
            <option value="">Select Gender</option>
            <option value="m">Male</option>
            <option value="f">Female</option>
          </select>
          <select id="teacher" name="teacher" required>
            <option value="">Select Teacher</option>
            <option value="Katie">Katie</option>
            <option value="Max">Max</option>
            <option value="Tom">Tom</option>
          </select>
        </div>

        <div class="container">
          <input type="submit" value="Submit" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>
