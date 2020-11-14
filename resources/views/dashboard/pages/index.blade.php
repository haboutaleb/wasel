@extends('dashboard.layout.master')
@section('content')
<div class="page-header">
    <div class="page-title">
        <h3>إستيراد</h3>
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
<form action="{{route('orders.import')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
        <input type="file" class="form-control" id="sFile" aria-describedby="fileHelp1" name="file">
        <small id="fileHelp1" class="form-text text-muted"> قم بإختار ملف الإكسيل الخاص بك </small>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>
</div>
</div>
</div>


@endsection
