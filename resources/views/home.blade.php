@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <a href="{{url('/admin/add')}}">管理员添加</a> &nbsp;|&nbsp; <a href="{{url('/admin/list')}}">管理员列表</a><br>
                        <a href="{{url('/cate/add')}}">分类添加</a> | <a href="{{url('/cate/list')}}">分类列表</a><br>
                        <a href="{{url('/goods/add')}}">商品添加</a> | <a href="{{url('/goods/list')}}">商品列表</a><br>
                        <a href="{{url('/brand/add')}}">品牌添加</a> | <a href="{{url('/brand/list')}}">品牌列表</a><br>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
