@extends('dashboard.layout.master')
@section('content')
<div class="page-header">
    <div class="page-title">
        <h3>الطلبات</h3>
    </div>
</div>
@if(session('message'))
 @if(session('message')['type'] == 'success')
    <div class="col-xl-12 alert alert-dismissible alert-success fade show" role="alert">
        {{ session('message')['content']  }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
 @endif
 @endif

<div class="row layout-top-spacing" id="cancel-row">

    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div class="table-responsive mb-4 mt-4">
                <table id="zero-config" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>رقم الطلب</th>
                            <th>رقم العميل  </th>
                            <th>اسم العميل </th>
                            <th> التاريخ </th>
                            <th> الوقت </th>
                            <th> الكمية </th>
                            <th> نوع المحل </th>

                            <th class="no-content"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->user->id}}</td>
                            <td>{{$item->user->name}}</td>
                            <td>{{date('Y-m-d',strtotime($item->date))}}</td>
                            <td>{{date('H:i',strtotime($item->time))}}</td>
                            <td>{{$item->amount}}</td>
                            
                            <td>{{$item->shop_type}}</td>

                            <td>
                                <a href="{{route('orders.edit',$item->id)}}"  data-toggle="tooltip" data-placement="top" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                                <a href="{{route('orders.delete',$item->id)}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>
                              <a href="{{route('users.send-mail',$item->user->id)}}" title="إيميل إرسال">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg>
                              </a>
                            </td>
                        </tr>   
                        @empty
                        <td colspan="5">لايوجد طلبات</td>                        
                        @endforelse
                        
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
