<?php 

namespace App\Services;

use App\Repositories\PostRepository;

use App\Http\Requests\CreatePostRequest;

class PostService{

    protected $repository;

    public function __construct(PostRepository $postRepository)
    {
        $this->repository = $postRepository;
    }
    

    public function  findOrFile($id){
        
        $post = $this->repository->getOne($id);

        if(empty($post)){
           return abort(404);
        }

        return $post;

    }

    public function create($request){
        
        return $this->repository->createPost($request);
    }

    public function updatePost($request,$id){
        
        return $this->repository->updatePost($request,$id);
    }


}