<?php
namespace App\Controllers;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $post = (new Post)->paginate();
        $count = $post['count']['count'];
        $post = $post['result'];
        view('index',['post' => $post,'count' => $count]);
    }

    public function create()
    {
        view('post.create');
    }

    public function showPassword($id)
    {
        view('show',['id' => $id]);
    }

    public function show($id)
    {
        $post = (new Post)->find($id);
        if($post){
            if($post['password'] == request('password')){
                view('showPassword',['post' => $post]);
            }else{
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    }

    public function store()
    {
        $this->storeHandler();
        header('Location: ../');
    }

    public function password($id)
    {
        $post = (new Post)->find($id);
        if($post['password'] == request('password')){
            include '../resources/views/includes/card.php';
        }else{
            header("HTTP/1.0 403");
        }
    }

    public function storeApi()
    {
        $this->storeHandler();
        echo json_encode([
           'message' => "Post successfully added"
        ]);
    }

    public function storeHandler()
    {
        $image = '';
        $time = date("h:i:s");
        $imageName = $time.rand(100,1000);
        $imageName = md5($imageName);
        $target_dir = "uploads/";
        $temp = explode(".", $_FILES["image"]["name"]);
        $target_file = $target_dir . $imageName . '.' . end($temp);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if ($imageFileType != "" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            return;
        }
        if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
            $image = $target_file;
        }
        (new Post)->create([
            'title' => request('title'),
            'password' => request('password'),
            'text' => request('text'),
            'image' => $image,
            'created_at' => now()
        ]);
    }

}