<?php

namespace App\Http\Controllers;

use App\Mail\SendUserMail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    //
    private $model;
    private $page;
    private $url;
    private $data;
    private $route;

    public function __construct(User $user)
    {
        $this->model = $user;
        $this->page  = 'dashboard.cruds.users.';
        $this->url   = '/users';

        $this->data  = [];
        $this->route = 'users.index';
    }

    public function index()
    {
        $data['users'] = $this->model::with('orders')->get();
        return view($this->page.'index',$data);
    }

    public function sendMail($id)
    {
        $user = $this->model->find($id);
        $details = [
            'id' => $user->id,
            'name' => $user->name,
            'age'=>$user->age
        ];
       
        Mail::to('it@wssel.com')->send(new SendUserMail($details));
       
        return redirect()->back()->withMessage(['type'=>'success','content'=>'تم إرسال الإيميل بنجاح']);
    }
}
