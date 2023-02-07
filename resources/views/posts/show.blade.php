@extends('layouts.app')
@section('title')
Post {{$post->title}}
@endsection

@section('content')
       
        <main class="flex-shrink-0 m-5 p-2">

            <table class="table " >
                <thead>
                  <tr>
                    <th scope="col">№</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th> </th>
                  </tr>
                </thead>
                <tbody>
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->desc }}</td>
                        </tr>

                </tbody>
              </table>

        </main>

       
    @endsection
