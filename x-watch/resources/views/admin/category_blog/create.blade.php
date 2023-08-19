@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Danh mục tin tức
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'categoryBlog.store']) !!}

                    @include('admin.category_blog.field')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
