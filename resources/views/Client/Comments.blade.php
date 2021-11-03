@extends('layouts.DashClient')

@section('content')
<div class="container mt-3 p-3">

<div class="text-center mt-5 p-5"> <h2>Tous Mes Commentaires </h2></div>

    <div>
        @foreach (Auth::user()->comments as $comment)

        {{-- <h4 style="color:rgb(89, 123, 236);">{{ $comment->post_id }}</h4> --}}
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
</div> 
@endsection