@extends('layouts.app')

@section('content')

<div class="container"> 
    <main role="main" class="container">
      <div class="row">
            <div class="col-sm-10" >
                <h3 class="pb-3 mb-4 font-italic border-bottom">List of all Ads</h3>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @foreach ($ads as $ad)
                <p></p>
                <h4 class="blog-post-title"><a href="{{ route('single-ad',['id' => $ad->id]) }}"> {{ $ad->title }}</a></h4>
                Category Name: <p class="blog-post-meta"> {{ $category->name }}</p>
                <p class="blog-post-meta"> {{ $ad->created_at }}</p>
            @if($ad->user)
                Created by: <h4 class="blog-post-title"> {{ $ad->user->name }}</h4>
            @endif
            {{-- <p class="blog-post-meta"> Product Name: {{ $ad->product->name }}</p> --}}
            <form method="POST" action="{{route('destroy', ['id' => $ad->id])}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Ad</button>
            </form>
            <br>
            <form method="PUT" action="{{route('edit', ['id' => $ad->id])}}">
                    @csrf
                    {{-- @csrf --}}
                    <button type="submit" id="editAd" class="btn btn-success">Edit Ad</button>
            </form>
            <br>
                <h6 class="border-bottom">Description: {{ $ad->description }}</h6>
                <p class="blog-post-meta">Price: {{ $ad->price }}</p>
                <div class="image-container">
                    <img height="100" src="{{$ad->path}}" alt="">
                    </div>
                    <p></p>
                    <p class="blog-post-meta">Location: {{ $ad->location }}</p>
                    <p class="blog-post-meta">Phone: {{ $ad->phone }}</p>
            @endforeach
                <p></p>
            </div>           
    </div>
</div> 

@endsection