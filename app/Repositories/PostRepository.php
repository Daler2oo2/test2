<?php 

namespace App\Repositories;

use App\Interfaces\PostInterface;
use App\Models\Post;

class PostRepository implements PostInterface
{

    public function getAll($order, $dir): \Illuminate\Database\Eloquent\Collection|array
    {
        return Post::orderBy($order,$dir)->get();
    }

    public function getOne($id)
    {
        return Post::find($id);
    }

    public function createPost($data){
        $post = new Post;

        $post->title = $data['title'];
        $post->desc = $data['desc'];
        $post->text = $data['text'];

        $post->save();
       
        return $post;

    }

    public function updatePost($data, $id){
        $post = $this->getOne($id);

        $post->title = $data['title'];
        $post->desc = $data['desc'];
        $post->text = $data['text'];

        $post->update();

        return $post;
    }

    public function deletePost($id)
    {
        $post  = $this->getOne( $id);
        $post->delete();
        return $post;
    }

    public function getTrashed()
    {
       return Post::onlyTrashed()->get();
    }

    public function restoreAll()
    {
        return   Post::onlyTrashed()->restore();
    }

    public function restore($id)
    {
      return  Post::where('id', $id)->withTrashed()->restore();
         
    }

    public function forceDelete($id)
    {
         return Post::where('id', $id)->withTrashed()->forceDelete();
    }


}