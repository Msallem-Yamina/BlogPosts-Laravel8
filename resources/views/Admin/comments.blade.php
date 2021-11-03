@extends('layouts.DashAdmin')

@section('content')
<div class="container mt-3 p-3">

<div class="text-center mt-5 p-5"> <h2>All Comments </h2></div>

    <div>
        @foreach($comments as $comment)

         <h4 style="color:rgb(1, 3, 8);">{{ $comment->user->name }}</h4> 
        <ul class="container mt-2" style="display:flex;">
           <li  style="margin-right:auto;" ><a href="{{ route ('showPost',['id'=> $comment->post_id])}}">
            {{ $comment->content }}</a>
           </li>
            
           <li>
            {{ $comment->created_at->format('D-m-Y H:i:s') }}
           </li>
        </ul>
    <hr />
    @endforeach
       
    </div>
    <div class="d-flex justify-content-center">
        {!! $comments -> links() !!}
    </div>
</div> 
@endsection