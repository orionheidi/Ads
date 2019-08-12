@extends('layouts.app')
@section('content')
    <main role="main" class="container">
      <h5 class="row">
            <div class="col-sm-10" >
                <h4 class="pb-3 mb-4 font-italic border-bottom"> {{  $ad->title  }}</h4>
            @if($ad->user)
                Created by: <h5 class="blog-post-title"><a href="{{ route('user-details',['id' => $ad->user->id]) }}"> {{ $ad->user->name }}</a></h5>
            @endif
                Created at: <div>{{  $ad->created_at  }}</div>
                <br>
                <h5 class="blog-post-title">Product: {{  $ad->product->name  }}</h5>
                <p class="blog-post-meta">Price: {{ $ad->product->price }}</p>
                <div>Description: {{  $ad->description  }}</div>
             {{-- <p class="blog-post-meta">Product Name: {{ $product->name }}</p> --}}
                <br>
                <form method="POST" action="{{route('destroy', ['id' => $ad->id])}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Ad</button>
                </form>
                <br>
                <form method="PUT" action="{{route('edit', ['id' => $ad->id])}}">
                        @csrf
                        {{-- @csrf --}}
                        <button type="submit" id="editArticle" class="btn btn-success">Edit Ad</button>
                </form>
                <br>
                    <img src="{{ $ad->path }}" height="400" />
                    <p></p>
                    <p class="blog-post-meta">Location: {{ $ad->location }}</p>
                    <p class="blog-post-meta">Phone: {{ $ad->phone }}</p>
            <hr/> 
            </div>           
        </div>
    </main>   
</div>
@endsection 

