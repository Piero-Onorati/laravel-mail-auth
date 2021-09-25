@extends('layouts.app')

@section('content')

<div class="container pt-4">

  <!-- start CARD -->
  <div class="card mb-3">

    {{-- card header --}}
    <div class="card-header">
      <h4 class="card-title">{{$post->title}}</h4>
    </div>

    {{-- Card body --}}
    <div class="row g-0">

      <!-- CARD IMAGE -->
      @if($post->cover)
      <div class="col-md-4 ">
        <img src="{{ asset('storage/' . $post->cover)}}" class="img-fluid rounded-start" alt="">
      </div>
      @endif

      <!-- CARD CONTENT + CATEGORY + TAGS -->
      <div class="col-md-8">
        <div class="card-body">
    
          <!--# Content #-->
          <p class="card-text">{{$post->content}}</p>

          <!--# List: CATEGORY + TAGS  -->
          <ul class="list-group list-group-flush">

            <!--------- Categorty ---------->
            <li class="list-group-item">
              @if ($post->category)
                <h5>Category: <span class="text-uppercase badge bg-light text-dark">{{$post->category->name}}</span></h5>
              @endif
            </li>

            <!----------- Tags ------------->
            <li class="list-group-item">
              @forelse ($post->tags as $tag)
                <h5 class="d-inline-block"><span class="badge post_tag">{{$tag->name}}</span></h5>
              @empty
              there are not tags      
              @endforelse
            </li>
          </ul>
  
        </div>
      </div>

    </div>

    {{-- card footer --}}
    <div class="card-footer text-muted">
      Written by: User
    </div>
 
  </div>
  <!-- end CARD -->

  <!-- BUTTONS -->
  <a href="{{route('admin.posts.edit', $post->id)}}" class="btn blue_button">Edit Post</a>

  <a href="{{route('admin.posts.index')}}" class="btn dark_button mx-3">Back to Posts List</a>

</div>
    
@endsection