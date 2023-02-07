<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PostRepository;
use App\Services\PostService;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{


    protected PostService $service;

    private PostRepository $repository;

    public function __construct(PostService $postService, PostRepository $postRepository)
    {
        $this->service = $postService;
        $this->repository = $postRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( $order = 'created_at', $dir = 'desc')
    {
        $posts = $this->repository->getAll($order, $dir);
        
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
     
       $post = $this->service->create($request);

        return back()->with('success','Post '.$post->title.' created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
        $post =$this->service->findOrFile($id);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post =$this->service->findOrFile($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {

        if ($request->has('submit')) {

            $post = $this->service->updatePost($request, $id);
        }
       
        return redirect()->route('home')->with('success',"Post ".$post->title." edit successflay!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = $this->repository->deletePost($id);

        return redirect()->route('home')->with('success',"Post ".$post->title." delete successflay!");
        
    }

    public function forceDelete($id) 
    {
        $this->repository->forceDelete($id);

        return back()->with('success','Post  force delete successfully!');
    }

    public function restore($id) 
    {
        $this->repository->restore($id);

        return back()->with('success','Post restore successfully!');
    }

    public function restoreAll() 
    {
       $this->repository->restoreAll();

        return back()->with('success','Posts restore all successfully!');
    }

    public function getDelete(){
    
    $trashedPosts = $this->repository->getTrashed(); 

    return view('posts.show_delete_posts', compact('trashedPosts'));
        
    }
}
