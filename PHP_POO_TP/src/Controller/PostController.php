<?php
namespace App\Controller;

use App\Core\Controller;
use App\Model\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $this->render('posts/index', ['posts' => $posts]);
    }

    public function show()
    {
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        if ($id <= 0) {
            header('HTTP/1.1 400 Bad Request');
            echo 'Invalid id';
            return;
        }

        $post = Post::find($id);
        if (!$post) {
            header('HTTP/1.1 404 Not Found');
            echo 'Post not found';
            return;
        }

        $this->render('posts/show', ['post' => $post]);
    }
}

