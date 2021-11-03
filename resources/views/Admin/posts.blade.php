@extends('layouts.DashAdmin')

@section('content')
    
    <div class="container mt-5 p-5">
        <div class="row mt-5">
            <div class="col-lg-5">
                <div class="section-heading wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                    <h6>All Posts</h6>
                    <h4>See All Recent <em>Posts</em> Public and private</h4>
                    <div class="line-dec"></div>
                </div>
            </div>
        </div>

    <div class="row mt-5">
      @foreach ($posts as $post)
      <div class="col-sm-6">
        <div class="card mb-3" style="height: 23rem;">
          <h5 class="card-title m-3">{{ $post->user->name }}  <span class="badge bg-info">{{$post->created_at}}</span>
          {{-- test si post public ou priveé --}}
          @if ($post->stat == 1)
          <i class="fas fa-user-lock"></i> 
          @else
          <i class="fas fa-globe-europe"></i>
          @endif
          
        </h5>
          <div class="card-body">
            <p class="card-text"> {{ $post->title }} </p>
            <img class="card-img" src="{{ asset('uploads') }}/{{$post->image}}" height="200" width="200" >
              <a href="{{ route ('showPost',['id'=> $post->id ])}}" class="btn btn-primary mt-2"> <i class="fas fa-eye"></i></a>
              <button class="btn btn-success mt-2"><i class="fa fa-comments" aria-hidden="true"></i> ({{ count ($post->comments)}})</button>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

@endsection