@extends('dashboard.layout.master')
@section('content')
<div class="page-header">
    <div class="page-title">
        <h3>المستخدمين</h3>
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
                            <th>الإسم</th>
                            <th>السن</th>
                            <th>عدد الطلبات</th>
                            <th class="no-content"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->age}}</td>
                            <td>{{$item->orders->count()}}</td>
                            <td>
                              <a href="{{route('users.send-mail',$item->id)}}" title="إيميل إرسال">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg>
                              </a>
                            </td>
                        </tr>   
                        @empty
                        <td colspan="5">لايوجد مستخدمين</td>                        
                        @endforelse
                        
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
