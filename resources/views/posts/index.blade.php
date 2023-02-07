@extends('layouts.app')
@section('title')
    Posts
@endsection

@section('content')
       
        <main class="flex-shrink-0 m-5 p-2">
           
          <div class="row">
                <div class="col-12">
                        <a class="mt-3 m-3 float-end btn btn-success "  href="{{ route('post.create') }} " >Add</a>
                        <a class="mt-3  float-end btn btn-warning "  href="{{ route('post.getDelete') }} " >Show Delete Posts</a>
                </div>
          </div>
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
                    @foreach($posts as $post)
                        <tr>
                            <th scope="row">{{ $loop->index+1 }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->desc }}</td>
                            <td><a type="button" class="btn btn-primary" href="{{ route('post.show', [$post->id]) }} ">show</a>  </td>
                            <td><a type="button" class="btn btn-warning" href="{{ route('post.edit', [$post->id]) }} ">edit</a>  </td>
                            <td><a type="button" class="btn btn-danger" href="{{ route('post.force_del', [$post->id])}}">force Delete</a></td>
                            <td><a type="button" class="btn btn-danger" href="{{ route('post.del', [$post->id])}}">delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
              </table>

        </main>

       
    @endsection
