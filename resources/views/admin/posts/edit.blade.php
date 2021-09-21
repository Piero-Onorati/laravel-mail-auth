@extends('layouts.app')

@section('content')
    <div class="container pt-4">
        <h2>Edit post n. {{$post->id}}</h2>

        <form action="{{route('admin.posts.update', $post->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- start POST TITLE -->
            <div class="mb-3">
                <label for="post_title" class="form-label"> Post Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="post_title" value="{{old('title', $post->title)}}">

                {{-- Error message --}}
                @error('title')
                    <div class="alert alert-danger my-3">{{ $message }}</div>
                @enderror
            </div>
            <!-- end POST TITLE -->

            <!-- start POST CATEGORY -->
            <div class="mb-3">
                <label class="visually-hidden" for="category_post">Category</label>
                <select name="category_id" class="form-select form-control" id="category_post">
                  <option value="">Choose category...</option>
                  @foreach ($categories as $category)
                    <option value="{{$category->id}}"
                        @if ($category->id == old('category_id', $post->category_id))
                            selected
                        @endif
                    >
                        {{$category->name}}
                    </option>  
                  @endforeach
                </select>
            </div>
            <!-- end POST CATEGORY -->

            <!-- start POST IMAGE -->
            <div style="width: 18rem">
                @if($post->cover)
                    <img src="{{ asset('storage/' . $post->cover)}}" class="img-fluid" alt="">
                @endif
            </div>
            <div class="mb-3">
                <label for="img" class="form-label">Immagine</label>
                <input id="img" type="file" name="image" class="form-control-file 
                @error('image') 
                is-invalid 
                @enderror">

                {{-- Error message --}}
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror 

            </div>
            <!-- end POST IMAGE -->

            <!-- start POST CONTENT -->
            <div class="mb-3">
                <label for="post_desc" class="form-label">Post Content</label>
                <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="post_desc" rows="3">{{old('content', $post->content)}}</textarea>

                {{-- Error message --}}
                @error('content')
                    <div class="alert alert-danger my-3">{{ $message }}</div>
                @enderror
            </div>
            <!-- end POST CONTENT -->

            <!-- start POST TAGS -->
            <div class="mb-3">
                <label class="form-label d-block">Tags</label>

                @foreach ($tags as $tag)       
                    <div class="form-check form-check-inline me-3">
                        <input class="form-check-input" type="checkbox" name="tags[]"
                            id="tag{{$loop->iteration}}" 
                            value="{{$tag->id}}"
                            @if(!$errors->any() && $post->tags->contains($tag->id))
                                checked
                            @elseif(in_array($tag->id, old('tags', [])))
                                checked
                            @endif
                        >
                        <label class="form-check-label" for="tag{{$loop->iteration}}">{{$tag->name}}</label>
                    </div>
                @endforeach
        
            </div>
            <!-- end POST TAGS -->

            {{-- BUTTON --}}
            <div class="mb-3">
                <button type="submit" class="btn blue_button">Edit Post</button>
                <a href="{{route('admin.posts.index')}}" class="btn dark_button mx-3">Back to Posts List</a>
            </div>
        </form>

    </div>
    
@endsection