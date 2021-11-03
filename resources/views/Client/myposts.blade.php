@extends('layouts.DashClient')
@section('content')

<div class="container mt-5 pt-5">
    <div class="row justify-content-center pt-5">
        <div class="col-12">
                <h2 class="text-center"> My Posts</h2> 
                    <hr />
                   <a href="{{ route('addpost')}}" class="btn btn-info m-3"> Add New Post</a>
                   <table class="table border-5 table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Auth::user()->posts as $post) <!--les posts de personne cncté-->
                        <tr>
                            <td>{{$post->title}}</td>
                            <td>{{$post->description}}</td>
                            <td>{{$post->category}}</td>
                            <td><img src="{{ asset('uploads') }}/{{$post->image}}" width="80" height="80"></td>
                            <td>
                                <a href="{{ route ('showPost',['id'=> $post->id ])}}" class="btn btn-primary"> <i class="fas fa-eye"></i></a>
                                <a href="" class="btn btn-success"> <i class="fas fa-edit"></i></a>
                                <a href="{{ route ('deletepost',['id'=> $post->id ])}}" class="btn btn-danger"> <i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                   </table>
        </div>
    </div>
</div>
    
@endsection