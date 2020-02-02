@extends('layouts.app')

<style>
    .form {
        margin: 0 auto;
        width: 35%;
    }

    .center-headline {
        margin: auto;
        text-align: center;
    }
</style>

@section('content')
    <div class="center-headline">
        <h2>Create Post</h2>
    </div>
    <div class="form">
        <form action="{{ url('addPost') }}" method="POST">
            @csrf
            <input name="author" type="text" placeholder="Your Name" required>
            <input name="title" type="text" placeholder="Title"><br>
            <textarea name="content" cols="80" rows="10" placeholder="Content">
            </textarea><br>
            <input type="submit" value="Add Post">
        </form>

        @if(session()->has('success'))
            {{ session()->get('success') }}
        @endif
        
    </div>

@endsection