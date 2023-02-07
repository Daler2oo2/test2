@extends('layouts.app')
@section('title')
   Delete  Posts
@endsection

@section('content')
       
        <main class="flex-shrink-0 m-5 p-2">
           
          <div class="row">
                <div class="col-12">
                        <a class="mt-3  float-end btn btn-success "  href="{{ route('post.res_all') }} " >Restore All</a>
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
                    @foreach($trashedPosts as $post)
                        <tr>
                            <th scope="row">{{ $loop->index+1 }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->desc }}</td>
                            <td><a type="button" class="btn btn-primary" href="{{ route('post.res', [$post->id]) }} ">Restore</a>  </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>

        </main>

       
    @endsection
