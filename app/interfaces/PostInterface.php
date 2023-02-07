<?php 

namespace App\Interfaces;

interface PostInterface
{
    public function getAll($order, $dir);
    public function getOne($id);
    public function createPost($data);
    public function updatePost($data, $id);
    public function deletePost($id);
    public function getTrashed();
    public function restoreAll();
    public function restore($id);
    public function forceDelete($id);
}