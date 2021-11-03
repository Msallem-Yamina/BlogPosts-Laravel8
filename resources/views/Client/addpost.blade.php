@extends('layouts.DashClient')
@section('content')

<div class="container mt-5 pt-5">
    <div class="row justify-content-center pt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Post') }}</div>
                {{-- <hr   /> --}}
                <div class="card-body">
                   <form action="{{route('storepost')}}" method="POST" enctype="multipart/form-data">
                       @csrf
                       <div class="form-group mb-3">
                        <label class="mb-2">Title</label>
                        <input type="text" class="form-control" name="title">
                      </div>
                      <div class="form-group  mb-3">
                        <label class="mb-2">Image</label>
                        <input type="file" class="form-control" name="image">
                      </div>
                      <div class="form-group mb-3">
                        <label class="mb-2">description</label>
                        <textarea type="text" class="form-control" name="description" rows="3"></textarea>
                      </div>
                     
                        {{-- <input type="hidden" value="{{ Auth::user()->id}}" class="form-control" name="createur"> --}}
                    
                      <div class="form-group  mb-3">
                        <label class="mb-2">Category</label>
                        <input type="text" class="form-control" name="category">
                      </div>
                      <button type="submit" class="btn btn-primary">Ajouter</button>
                   </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection