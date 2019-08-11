@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('success_message'))
        <div class="alert alert-success">
            {{ session('success_message') }}
        </div>
    @endif
    @if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" action="{{ route('update-ad', ['id' => $ad->id]) }}" id="editForm" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" id="id" value="{{ $ad->id}}">
        <div class="form-group row">
        <label for="text" class="col-4 col-form-label">Title</label>
        <div class="col-8">
        <input id="title" name="title" type="text" class="form-control" value="{{ old('title') }}" autofocus>
        </div>
        </div>
        <div class="form-group row">
            <label for="textarea" class="col-4 col-form-label">Content</label>
            <div class="col-8">
                <textarea id="description" cols="40" rows="5" class="form-control"  name="description" value="{{ old('description') }}" autofocus></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="text" class="col-4 col-form-label">Price</label>
            <div class="col-8">
            <input id="price" type="number" step=".01" class="form-control" name="price" value="{{ old('price') }}" autofocus>
        </div>
        </div>
        <div class="form-group row">
            <label for="file" class="col-4 col-form-label">File</label>
            <div class="col-8">
            <input id="file" name="file" type="file" class="form-control-file">
            </div>
        </div>
        <div class="form-group row">
            <label for="text" class="col-4 col-form-label">Phone</label>
            <div class="col-8">
            <input id="phone" type="number" class="form-control" name="phone" value="{{ old('phone') }}" autofocus>
        </div>
    </div>
        <div class="form-group row">
            <label for="text" class="col-4 col-form-label">Location</label>
            <div class="col-8">
            <input id="location" name="location" type="text" class="form-control" value="{{ old('location') }}" autofocus>
        </div>
        </div>
        <div class="form-group row">
            <label for="text" class="col-4 col-form-label">Condition</label>
            <div class="col-8">
            <input id="condition" name="condition" type="text" class="form-control" value="{{ old('condition') }}" autofocus>
        </div>
        </div>
        <div class="form-group row">
            <label for="text" class="col-4 col-form-label">Product Name</label>
            <div class="col-8">
            <input id="name" name="name" type="text" class="form-control" value="{{ old('name') }}" autofocus>
        </div>
        </div>
        <br>
        <div class="form-group row">
            <div class="offset-4 col-8">
            <button type="submit" class="btn btn-dark">Submit</button>
        </div>     
        </div>
</form>
@endsection



