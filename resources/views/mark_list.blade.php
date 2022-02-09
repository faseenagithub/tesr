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
    <div class="col-sm-8 sidenav">  
       <div class="container">
          <h2>Mark List</h2>
        </div>
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
          <th>Maths</th>
          <th>Science</th>
          <th>History</th>
          <th>Term</th>
          <th>Total Marks</th>
          <th>Created On</th>
          <th>Action</th>
        </thead>
        <tbody>
        @if(count($data) > 0)
          @foreach($data as $key=>$item)
            @if($item->students != null)  <!-- to avoid deleted students marks -->

            <tr>
              <td>{{$key+1}}</td>
              <td>{{$item->students->name}}</td>
              <td>{{$item->maths}}</td>
              <td>{{$item->science}}</td>
              <td>{{$item->history}}</td>
              <td>{{$item->term}}</td> 
              <td>{{$item->maths+$item->science+$item->history}}</td> 
              <td>{{$item->created_at}}</td>
              <td>
                  <a href="/edit-mark/{{encrypt($item->id)}}" class="text-info">Edit</a> /
                  <a href="/delete-mark/{{encrypt($item->id)}}" class="text-danger">Delete</a>
              </td>
            </tr>
            @endif
          @endforeach
        @else
           <tr><td colspan="9" class="text-center">No Data Found</td></tr>
        @endif
        </tbody>
      </table>
    </div>
  </div>

  <div class="col-sm-4 sidenav">
    <form action="add-mark" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="container">
        <h2>Add Marks</h2>
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
        <select id="student" name="student" required>
          <option value="">Select Student</option>
          @foreach($students as $key => $data)
          <option value="{{$key}}">{{ucfirst($data)}}</option>

          @endforeach
        </select>
        <select id="term" name="term" required>
          <option value="">Select Term</option>
          <option value="One">One</option>
          <option value="Two">Two</option>
          <option value="Three">Three</option>
        </select>
        <input type="number" step="any" min="0" placeholder="Mark for Maths" name="maths" required>
        <input type="number" step="any" min="0" placeholder="Mark for Science" name="science" required>
        <input type="number" step="any" min="0" placeholder="Mark for History" name="history" required>

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
