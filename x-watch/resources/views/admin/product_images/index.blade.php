@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-lefts">Product Images</h1>
        <div class="search-form">
            <form class="search-product-id" action="" method="get">
                <input type="number" placeholder="Search.." name="search">
                <button type="submit">Search</button>
            </form>
        </div>
        <h1 class="pull-rights">
           <a class="btn btn-primary pull-right" style="" href="{{ route('productImages.create') }}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('admin.product_images.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
    <style type="text/css">
        .skin-blue .content-header {
            align-items: center;
            display: flex;
            justify-content: space-between;
        }

        .search-product input {
            min-width: 245px;
        }

        .search-product input, .search-product button {
            height: 30px;
        }

        .search-product button {
            min-width: 40px;
        }

        .skin-blue .content-header svg {
            width: 15px;
            position: relative;
            top: 2px;
        }
        .search-product-id input {
            min-width: 245px;
        }

        .search-product-id input, .search-product-id button {
            height: 30px;
        }

        .search-product-id button {
            min-width: 40px;
        }
    </style>

    <script>
        window.onload=function(){
            document.getElementById("linkid").click();
        };
    </script>

@endsection

