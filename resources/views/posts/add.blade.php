@extends('layouts.app')
@section('title')
Add new post
@endsection

@section('content')
       
        <main class="flex-shrink-0 m-5 p-2">

         <form class="form mt-3" action="{{ route('post.store') }}" method="POST">
            @csrf
            <input class="form-control m-1" name="title" placeholder="title" >
            <input class="form-control m-1" name="desc"  placeholder="description">
            <textarea rows="5" class="form-control m-1" name="text" placeholder="text" ></textarea>
            <input  name="submit" class="float-end btn btn-primary m-1" type="submit" value="Add">
         </form>

        </main>

       
    @endsection
