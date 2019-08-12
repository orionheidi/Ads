@extends('layouts.app')
@section('content')
    <main role="main" class="container">
      <div class="row">
        <div class="col-sm-10" >
            <h4 class="pb-3 mb-4 font-italic border-bottom"> {{  $user->name  }}</h4>  
        <div>Email: {{  $user->email  }}</div>
            <br>
            @foreach($user->ads as $ad)
            <p></p>
            <h4 class="blog-post-title"><a href="{{ route('single-ad',['id' => $ad->id]) }}"> {{ $ad->title }}</a></h4>
            <p class="blog-post-meta"> {{ $ad->created_at }}</p>
         <form method="POST" action="{{route('destroy', ['id' => $ad->id])}}">
             @csrf
             @method('DELETE')
             <button type="submit" class="btn btn-danger">Delete Ad</button>
         </form>
         <br>
         <form method="PUT" action="{{route('edit', ['id' => $ad->id])}}">
            @csrf
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
            <hr/> 
            </div>           
        </div>
    </main>   
</div>
@endsection 