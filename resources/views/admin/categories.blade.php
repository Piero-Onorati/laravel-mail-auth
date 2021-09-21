@extends('layouts.app')

@section('content')

   <div class="container">

    <div class="card-header my-4">
        <h3>Categories list</h3>
    </div>

    <div class="row row-cols-1 row-cols-md-2 g-4">

        @foreach ($categories as $category)
            <div class="col mb-5">
                <!-- start CARD -->
                <div class="card">

                    {{-- card header --}}
                    <button class="card-header border-0 btn dark_blue_btn" type="button" 
                        data-bs-toggle="collapse" data-bs-target="#tag{{$loop->iteration}}" aria-expanded="false" aria-controls="collapseExample">
                        <h6 class="text-uppercase fw-bold">
                            <i class="bi bi-arrow-down-square"></i>
                            {{$category->name}}
                            <span class="badge notification_span">{{count($category->posts)}}+</span>
                        </h6>
                    
                    </button>

                    {{-- card body --}}
                    <div class="collapse" id="tag{{$loop->iteration}}">
                        <table class="table table-hover">
                            <tbody class="text-center">
                                @forelse ($category->posts as $post)
                                <tr>
                                    <td>
                                        <a href="{{route('admin.posts.show', $post->id)}}">
                                            <i class="bi bi-file-text"></i>
                                            {{$post->title}}
                                        </a>
                                    </td>
                                @empty
                                    <td>
                                        There are not posts with this category. 
                                        <a href="{{route('admin.posts.create')}}" class="link-dark">Write it now!</a>
                                    </td>
                                </tr>
                                @endforelse 
                            </tbody>
                        </table>
                    </div>
                    
                </div>
                <!-- end CARD -->
            </div>
        @endforeach
      </div>

   </div>
   
@endsection