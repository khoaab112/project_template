<li class="{{ Request::is('orders*') ? 'active' : '' }}">
    <a href="{{ route('orders.index') }}"><span>Orders</span></a>
</li>

<li class="{{ Request::is('admin/blog*') ? 'active menu-open' : '' }} treeview">
    <a href="#">
        <span>Tin tức</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('admin/blog*') ? 'active' : '' }}">
            <a href="{{ route('blog.index') }}"><span>Tin tức</span></a>
        </li>
        <li class="{{ Request::is('admin/categoryBlog*') ? 'active' : '' }}">
            <a href="{{ route('categoryBlog.index') }}"><span>Danh mục tin tức</span></a>
        </li>
    </ul>
</li>

<li class="">
    <a href="{{ route('admin.order.affiliate') }}"><span>Orders affiliate</span></a>
</li>

<li class="{{ Request::is('admin/attributes*') ? 'active menu-open' : '' }} treeview">
    <a href="#">
        <span>Attributes</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('admin/attributes*') ? 'active' : '' }}">
            <a href="{{ route('attributes.index') }}"><span>Attributes</span></a>
        </li>

        <li class="{{ Request::is('admin/attributeValues*') ? 'active' : '' }}">
            <a href="{{ route('attributeValues.index') }}"><span>Attribute Values</span></a>
        </li>
    </ul>
</li>

<li class="{{ Request::is('admin/productCustomerColumns*') ? 'active menu-open' : '' }} treeview">
    <a href="#">
        <span>Product Customer Columns</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('productCustomerColumns*') ? 'active' : '' }}">
            <a href="{{ route('productCustomerColumns.index') }}"><i class="fa fa-edit"></i><span>Product Customer Columns</span></a>
        </li>

        <li class="{{ Request::is('productCustomerValues*') ? 'active' : '' }}">
            <a href="{{ route('productCustomerValues.index') }}"><i
                    class="fa fa-edit"></i><span>Product Customer Values</span></a>
        </li>

    </ul>
</li>

<li class="{{ Request::is('admin/products*') ? 'active menu-open' : '' }} treeview">
    <a href="#">
        <span>Sản phẩm</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('admin/products*') ? 'active' : '' }}">
            <a href="{{ route('products.index') }}"><span>Products</span></a>
        </li>
        <li class="{{ Request::is('admin/productManual*') ? 'active' : '' }}">
            <a href="{{ route('productManual.index') }}"><span>Hướng dẫn sử dụng sản phẩm</span></a>
        </li>
        <li class="{{ Request::is('admin/productImages*') ? 'active' : '' }}">
            <a href="{{ route('productImages.index') }}"><span>Hình ảnh sản phẩm</span></a>
        </li>
        <li class="{{ Request::is('admin/productAttributeValues*') ? 'active' : '' }}">
            <a href="{{ route('productAttributeValues.index') }}"><span>Product Attribute Values</span></a>
        </li>
        <li class="{{ Request::is('topProducts*') ? 'active' : '' }}">
            <a href="{{ route('topProducts.index') }}"><span>Page Products Config</span></a>
        </li>
        <li class="{{ Request::is('productPromotions*') ? 'active' : '' }}">
            <a href="{{ route('productPromotions.index') }}"><span>Product Promotions</span></a>
        </li>
        <li class="{{ Request::is('topProductCat*') ? 'active' : '' }}">
            <a href="{{ route('topProductCat.index') }}"><span>Top Product Cat</span></a>
        </li>
        <li class="{{ Request::is('productBestSellers*') ? 'active' : '' }}">
            <a href="{{ route('productBestSellers.index') }}"><span>Best Sellers</span></a>
        </li>
        <li class="{{ Request::is('productSuggest*') ? 'active' : '' }}">
            <a href="{{ route('productSuggest.index') }}"><span>Product Suggest</span></a>
        </li>
    </ul>
</li>

<li class="{{ Request::is('admin/categories*') ? 'active menu-open' : '' }} treeview">
    <a href="#">
        <span>Categories</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('admin/categories*') ? 'active' : '' }}">
            <a href="{{ route('categories.index') }}"><span>Categories</span></a>
        </li>
        <li class="{{ Request::is('categoryBrands*') ? 'active' : '' }}">
            <a href="{{ route('categoryBrands.index') }}"><span>Category Brands</span></a>
        </li>

        <li class="{{ Request::is('categoryAttributeFilters*') ? 'active' : '' }}">
            <a href="{{ route('categoryAttributeFilters.index') }}">
                <span>Category Filters</span>
            </a>
        </li>

        {{--<li class="{{ Request::is('categoryAttributeValueFilters*') ? 'active' : '' }}">--}}
        {{--<a href="{{ route('categoryAttributeValueFilters.index') }}"><span>Category Attribute Value Filters</span></a>--}}
        {{--</li>--}}

        {{--<li class="{{ Request::is('categoryPriceFilters*') ? 'active' : '' }}">--}}
        {{--<a href="{{ route('categoryPriceFilters.index') }}">--}}
        {{--<span>Category Price Filters</span>--}}
        {{--</a>--}}
        {{--</li>--}}
    </ul>
</li>

<li class="{{ Request::is('admin/other*') ? 'active menu-open' : '' }} treeview">
    <a href="#">
        <span>Khác</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">

        <li class="{{ Request::is('admin/brands*') ? 'active' : '' }}">
            <a href="{{ route('brands.index') }}">
                <span>Thương hiệu</span>
            </a>
        </li>

        <li class="{{ Request::is('admin/menus*') ? 'active' : '' }}">
            <a href="{{ route('menus.index') }}">
                <span>Menus</span>
            </a>
        </li>

        <li class="{{ Request::is('banners*') ? 'active' : '' }}">
            <a href="{{ route('banners.index') }}"><span>Banners</span></a>
        </li>

        <li class="{{ Request::is('promotionImportLogs*') ? 'active' : '' }}">
            <a href="{{ route('promotionImportLogs.index') }}"><span>Promotion Import Logs</span></a>
        </li>

        <li class="{{ Request::is('seoContents*') ? 'active' : '' }}">
            <a href="{{ route('seoContents.index') }}"><span>Seo Contents</span></a>
        </li>

    </ul>
</li>


<li class="{{ Request::is('reviews*') ? 'active' : '' }}">
    <a href="{{ route('reviews.index') }}"><i class="fa fa-edit"></i><span>Reviews</span></a>
</li>


<li class="{{ Request::is('tags*') ? 'active' : '' }}">
    <a href="{{ route('tags.index') }}"><i class="fa fa-edit"></i><span>Tags</span></a>
</li>


<li class="{{ Request::is('tagGroups*') ? 'active' : '' }}">
    <a href="{{ route('tagGroups.index') }}"><i class="fa fa-edit"></i><span>Tag Groups</span></a>
</li>


<li class="{{ Request::is('labels*') ? 'active' : '' }}">
    <a href="{{ route('labels.index') }}"><i class="fa fa-edit"></i><span>Labels</span></a>
</li>

<li class="{{ Request::is('productLabels*') ? 'active' : '' }}">
    <a href="{{ route('productLabels.index') }}"><i class="fa fa-edit"></i><span>Product Labels</span></a>
</li>


<li class="{{ Request::is('userAgents*') ? 'active' : '' }}">
    <a href="{{ route('userAgents.index') }}"><i class="fa fa-edit"></i><span>User Agents</span></a>
</li>
