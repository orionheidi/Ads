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
            {{-- <div class="form-group">
                <label for="title" class="control-block">Find Category for the Ad:</label>
                <select class="form-control">
                    @foreach($categories as $category)
                    {{-- <option value="{{ $category->id }}">{{ $category->name }}</option> --}}
                  
                    {{-- <a href="{{URL::route('single-ad',$category->id)}}">
                        <option value="{{$category->id}}">{{ $category->name }}</option>
                    </a>
                    @endforeach
        </select>
            </div> --}} 
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                   aria-haspopup="true" aria-expanded="false">Pick Category
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li>@foreach($categories as $category)
                            <a href="{{URL::route('category-ads',$category->id)}}">
                                <option value="{{$category->id}}">{{ $category->name }}</option>
                            </a>
                        @endforeach
                    </li>
                </ul>
            </li>
            @foreach($ads as $ad)
                <p></p>
                <p class="blog-post-meta"> {{ $ad->id }}</p>
                <h4 class="blog-post-title"><a href="{{ route('single-ad',['id' => $ad->id]) }}"> {{ $ad->title }}</a></h4>
                <p class="blog-post-meta"> {{ $ad->created_at }}</p>
            @if($ad->user)
                Created by: <h4 class="blog-post-title"><a href="{{ route('user-details',['id' => $ad->user->id]) }}"> {{ $ad->user->name }}</a></h4>
            @endif
            <p class="blog-post-meta"> Product Name: {{ $product->name }}</p>
            <p class="blog-post-meta"> Product Price: {{ $product->price }}</p>
            <div class="clearfix">
                    <a href="{{ route('product-add-cart',['id' => $product->id]) }}" class="btn btn-dark pull-right" role="button">Add to Cart</a>
            </div>
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
            {{-- <h4 class="blog-post-title"> Product Name: {{ $ad->product->name }}</h4> --}}
                <h6 class="border-bottom">Description: {{ $ad->description }}</h6>
                {{-- <p class="blog-post-meta">Price: {{ $ad->price }}</p> --}}
                <div class="image-container">
                    <img height="200" src="{{$ad->path}}" alt="">
                    </div>
                    <p></p>
                    <p class="blog-post-meta">Location: {{ $ad->location }}</p>
                    <p class="blog-post-meta">Phone: {{ $ad->phone }}</p>
            @endforeach
                <p></p>
                {{$ads->links()}}
            </div>           
    </div>
</div> 

@endsection