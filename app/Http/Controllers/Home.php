<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel;
use Session;
class Home extends Controller
{
    function saveUser(){
    	$dataArray = $_POST['data'];
    	$data = array('username'=>$dataArray['username'],
    				  'email'=>$dataArray['email'],
    				  'password'=>md5($dataArray['password']) 
    			);
    	$save = UserModel::insert($data); 
    	if($save){
    		echo json_encode(array('response'=>'ok'));
    	}else{
    		echo json_encode(array('response'=>'err'));
    	}
    }

    function dataUser(){
    	$user = new UserModel;
    	$data['user'] = $user->get();
    	return view('user',$data);
    }

    function deleteUser($id){
    	$user = UserModel::find($id);
    	$delete = $user->delete();
    	if($delete){
    		echo json_encode(array('response'=>'ok'));
    	}else{
    		echo json_encode(array('response'=>'err'));
    	}
    }

    function getUser($id){
    	$user = UserModel::find($id);
    	$get = $user->get();
    	$data['response'] = "err";
    	if(count($get)){
    		$data['response'] = "ok";
    		foreach ($get as $key => $value) {
    			$data['users']['username'] = $value['username'];
    			$data['users']['email'] = $value['email'];
    			$data['users']['password'] = $value['password'];
    		}
    	}
    	echo json_encode($data);
    }

    function updateData(){
    	unset($_POST['_token']);
    	$id = $_POST['id'];
    	unset($_POST['id']);
    	$update = UserModel::where('id', '=', $id)->update($_POST);
    	if($update){
    		echo json_encode(array('response'=>'ok'));
    	}else{
    		echo json_encode(array('response'=>'err'));
    	}
    }

    function loginUser(Request $r){
        $user = $r->input('username');
        $pass = $r->input('password');
        if($pass == "123" && $user == "user"){
           Session::put('username','elhaq');
           return redirect('');
        }else{
            session()->flash('msg','error');
            return redirect('loginform');
        }
    }

    function logout(){
        Session::flush();
        return redirect('loginform');
    }

    function aa(){

    }

    function aaa(){
        echo "aaaa";
    }
}
