<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Imports\MainImport;
use App\Mail\SendUserMail;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    public function __construct(Order $order)
    {
        $this->model = $order;
        $this->page  = 'dashboard.cruds.orders.';
        $this->url   = '/orders';

        $this->data  = [];
        $this->route = 'orders.index';
    }

    public function index()
    {
        $data['orders'] = $this->model::with('user')->get();
        return view($this->page.'index',$data);
    }

    public function import(ImportRequest $request)
    {
        $import = new MainImport();
        Excel::import($import,$request->file);
        return redirect()->back()->withMessage(['type'=>'success','content'=>'تم حفظ البيانات بنجاح  ']);
    }

    public function edit($id)
    {
        $order = $this->model->find($id);
        return view($this->page.'edit',compact('order'));
    }

    public function update(UpdateOrderRequest $request,$id)
    {
        $order = $this->model->find($id);
        $order->amount = $request->amount;
        $order->shop_type = $request->shop_type;
        $order->save();
        return redirect()->route($this->route)->withMessage(['type'=>'success','content'=>'تم تعديل الطلب بنجاح  ']);
    }

    public function delete($id)
    {
        $order = $this->model->find($id);

        $order->delete();
        return redirect()->route($this->route)->withMessage(['type'=>'success','content'=>'تم حذف الطلب بنجاح  ']);
    }

}
