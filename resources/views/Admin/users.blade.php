@extends('layouts.DashAdmin')

@section('content')

<div class="container mt-5 p-5">
    <h1 class="m-4 text-center" style="color:red;"> Liste des Users </h1>
   
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Number</th>
            <th scope="col">Adress</th> 
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $index => $user)
            <tr>
                <th scope="row">{{$index+1}}</th> <!-- si lindex yebda men 1 nhotou index+1 par def tableau yebda bl 0 (index++)-->
                <td><img src="{{asset('avatar')}}/{{$user->image}}" width="50" height="50"></td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->numberphone}}</td>
                <td>{{$user->adresse}}</td> 
              </tr>
            @endforeach
        </tbody>
      </table>
      <div class="d-flex justify-content-center">
        {!! $users -> links() !!}
    </div>
</div>
    


@endsection