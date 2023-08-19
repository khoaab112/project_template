@extends('web.layouts.master')
@section('content')
    <div class="bota_body_center">
        <div class="bota_breadcrumb_main">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="/" title="Trang chủ">Trang chủ</a></li>
                    <li><span>Thương hiệu đồng hồ</span></li>
                </ul>
            </div>
        </div>
        <div class="bota_brand_page">
            <div class="container">
                <h1 class="bota_title_page">Thương hiệu</h1>
                <div class="bota_brand_list_char">
                    <ul>
                        @foreach($listAlphabet as $item)
                        <li><a href="#" onclick="getBrands('{!! $item !!}')" title="{!! \Illuminate\Support\Str::upper($item) !!}">{!! \Illuminate\Support\Str::upper($item) !!}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="bota_brand_content result">
                    <div class="item row">
                        <div id="Letterb" class="letterheader col-lg-3 col-md-3">b</div>
                        <div class="col-lg-9 col-md-9">
                            <h2 class="letter_item"><a title="Đồng hồ Bentley" href="product.html"><img src="statics/imgs/hang-bently_1569042227.png" alt="Đồng hồ Bentley"></a></h2>
                            <h2 class="letter_item"><a title="Đồng hồ Bulova" href="product.html"><img src="statics/imgs/brand-bulova_1561519549.png" alt="Đồng hồ Bulova"></a></h2>
                        </div>
                    </div>
                    <div class="item row">
                        <div id="Letterc" class="letterheader col-lg-3 col-md-3 ">c</div>
                        <div class="col-lg-9 col-md-9">
                            <h2 class="letter_item"><a title="Đồng hồ Candino" href="product.html"><img src="statics/imgs/brand-candino_1652154877.png" alt="Đồng hồ Candino"></a></h2>
                            <h2 class="letter_item"><a title="Casio" href="product.html"><img src="statics/imgs/brand-casio_1561517812.png" alt="Casio"></a></h2>
                            <h2 class="letter_item"><a title="Đồng hồ Citizen" href="product.html"><img src="statics/imgs/brand-citizen_1561519960.png" alt="Đồng hồ Citizen"></a></h2>
                        </div>
                    </div>
                    <div class="item row">
                        <div id="Letterf" class="letterheader col-lg-3 col-md-3 ">f</div>
                        <div class="col-lg-9 col-md-9">
                            <h2 class="letter_item"><a title="Đồng hồ Festina" href="product.html"><img src="statics/imgs/brand-festina_1592444667.png" alt="Đồng hồ Festina"></a></h2>
                            <h2 class="letter_item"><a title="Đồng hồ Freelook" href="product.html"><img src="statics/imgs/brand-freelook_1570673916.png" alt="Đồng hồ Freelook"></a></h2>
                        </div>
                    </div>
                    <div class="item row">
                        <div id="Letterm" class="letterheader col-lg-3 col-md-3 ">m</div>
                        <div class="col-lg-9 col-md-9">
                            <h2 class="letter_item"><a title="Đồng hồ Michael Kors" href="product.html"><img src="statics/imgs/brand-michael-kors_1561517765.png" alt="Đồng hồ Michael Kors"></a></h2>
                        </div>
                    </div>
                    <div class="item row">
                        <div id="Lettero" class="letterheader col-lg-3 col-md-3 ">o</div>
                        <div class="col-lg-9 col-md-9">
                            <h2 class="letter_item"><a title="Đồng hồ Ogival" href="product.html"><img src="statics/imgs/brand-ogival_1561519995.png" alt="Đồng hồ Ogival"></a></h2>
                            <h2 class="letter_item"><a title="Đồng hồ OP Olym Pianus Olympia Star" href="https://xwatch.vn/dong-ho-pc754/dong-ho-op-olym-pianus-olympia-star.html"><img src="statics/imgs/1_1562147820.png" alt="Đồng hồ OP Olym Pianus Olympia Star"></a></h2>
                            <h2 class="letter_item"><a title="Đồng hồ Orient" href="product.html"><img src="statics/imgs/brand-orient_1561519585.png" alt="Đồng hồ Orient"></a></h2>
                        </div>
                    </div>
                    <div class="item row">
                        <div id="Letters" class="letterheader col-lg-3 col-md-3 ">s</div>
                        <div class="col-lg-9 col-md-9">
                            <h2 class="letter_item"><a title="Đồng hồ Seiko" href="product.html"><img src="statics/imgs/brand-seiko_1561519576.png" alt="Đồng hồ Seiko"></a></h2>
                            <h2 class="letter_item"><a title="Đồng hồ SRWATCH" href="product.html"><img src="statics/imgs/srwatch-brand_1572316117.png" alt="Đồng hồ SRWATCH"></a></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script>
        function getBrands(item) {
            $('.result').html('');
            $.ajax({
                url: {!! route('getBrands') !!},
                dataType: 'json',
                data: {
                    item: item
                },
                type: 'post',
                success: function (res) {

                }
            });
        }
    </script>
@stop
