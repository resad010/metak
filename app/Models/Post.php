<?php
namespace App\Models;
use App\Models\Model;

class Post extends Model
{
    public $conn;
    public function get()
    {
        $stmt = $this->conn->prepare("SELECT * from posts");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function paginate()
    {
        $offset = (((int) request('page')) -1) *5;
        $offset = $offset > 0 ? $offset: 0;
        $stmt = $this->conn->prepare("SELECT * from posts limit 5 offset ?");
        $stmt->bind_param('i',$offset);
        $stmt->execute();
        $data['result'] = $stmt->get_result();

        $stmt = $this->conn->prepare("SELECT count(*) as count from posts");
        $stmt->execute();
        $data['count'] = $stmt->get_result()->fetch_assoc();
        return $data;
    }

    public function find($id)
    {
        $stmt = $this->conn->prepare("select * from posts where id=?");
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function create($params = [])
    {
        $keys = '('.implode(', ',array_keys($params)).')';
        $bind =  "(".substr(str_repeat("?, ", count($params)),0,-2).")";
        $binder =  str_repeat("s", count($params));
        $stmt = $this->conn->prepare("INSERT INTO posts $keys VALUES $bind");
        $stmt->bind_param($binder,$params['title'],$params['password'],$params['text'],$params['image'],$params['created_at']);
        $stmt->execute();
    }
}