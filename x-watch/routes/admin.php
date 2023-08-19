<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    Route::middleware(['auth', 'verifyAdminLevel'])->group(function () {

        Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');

        Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
        Route::post('upload', [App\Http\Controllers\Web\HomeController::class, 'ckFinder'])
            ->name('uploadAdmin');
        Route::resource('seoContents', App\Http\Controllers\Admin\SeoContentController::class);
        Route::resource('brands', App\Http\Controllers\Admin\BrandController::class);
        Route::resource('tags', App\Http\Controllers\Admin\TagController::class);
        Route::resource('tagGroups', App\Http\Controllers\Admin\TagGroupController::class);
        Route::resource('attributes', App\Http\Controllers\Admin\AttributeController::class);
        Route::resource('categoryBrands', App\Http\Controllers\Admin\CategoryBrandController::class);
        Route::resource('categoryAttributeFilters', App\Http\Controllers\Admin\CategoryAttributeFilterController::class);
        Route::resource('categoryAttributeValueFilters', App\Http\Controllers\Admin\CategoryAttributeValueFiltersController::class);

        Route::resource('attributeValues', App\Http\Controllers\Admin\AttributeValueController::class);
        Route::post('categoryFilter/update-brand', [App\Http\Controllers\Admin\CategoryFilterController::class, 'updateCategoryBrand'])
            ->name('categoryFilter.updateCategoryBrand');

        Route::post('categoryFilter/update-price', [App\Http\Controllers\Admin\CategoryFilterController::class, 'updateCategoryPrice'])
            ->name('categoryFilter.updateCategoryPrice');

        Route::post('categoryFilter/update-attribute-value', [App\Http\Controllers\Admin\CategoryFilterController::class, 'updateCategoryAttributeValueFilter'])
            ->name('categoryFilter.updateCategoryAttributeValueFilter');

        Route::post('categoryFilter/category-tag', [App\Http\Controllers\Admin\CategoryFilterController::class, 'categoryTag'])
            ->name('categoryFilter.categoryTag');
        Route::resource('categoryPriceFilters', App\Http\Controllers\Admin\CategoryPriceFiltersController::class);

        Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
        Route::resource('blog', App\Http\Controllers\Admin\BlogController::class);
        Route::resource('categoryBlog', App\Http\Controllers\Admin\CategoryBlogController::class);

        Route::resource('tmpProducts', App\Http\Controllers\Admin\TmpProductController::class);

        Route::resource('vendors', App\Http\Controllers\Admin\VendorController::class);

        Route::resource('brands', App\Http\Controllers\Admin\BrandController::class);

        Route::resource('productVariants', App\Http\Controllers\Admin\ProductVariantController::class);

        Route::resource('productImages', App\Http\Controllers\Admin\ProductImageController::class);

        Route::resource('menus', App\Http\Controllers\Admin\MenuController::class);

        Route::get('/ajax/attribute-value', [App\Http\Controllers\Admin\AjaxController::class, 'getAttributeValue'])
            ->name('ajaxGetAttributeValue');

        Route::get('/ajax/getDistrict', [App\Http\Controllers\Admin\AjaxController::class, 'getDistrict'])
            ->name('ajax.getDistrict');

        Route::resource('productAttributeValues', App\Http\Controllers\Admin\ProductAttributeValueController::class);

        Route::resource('promotions', App\Http\Controllers\Admin\PromotionController::class);

        Route::resource('promotionObjects', App\Http\Controllers\Admin\PromotionObjectController::class);

        Route::resource('topProducts', App\Http\Controllers\Admin\TopProductController::class);

        Route::post('orders/addCart', [App\Http\Controllers\Admin\OrdersController::class, 'addCart'])
            ->name("addCart");

        Route::get('orders/removerCartItem', [App\Http\Controllers\Admin\OrdersController::class, 'removerCartItem'])
            ->name("removerCartItem");

        Route::post('orders/saveCart', [App\Http\Controllers\Admin\OrdersController::class, 'saveCart'])
            ->name("saveCart");

        Route::post('orders/postUpdate/{id}', [App\Http\Controllers\Admin\OrdersController::class, 'postUpdate'])
            ->name("admin.order.postUpdate");

        Route::get('orders/loadCart/{orderId}', [App\Http\Controllers\Admin\OrdersController::class, 'loadCart'])
            ->name("admin.order.loadCart");

        Route::post('orders/postUpdateOrder/{id}', [App\Http\Controllers\Admin\OrdersController::class, 'postUpdateOrder'])
            ->name("admin.order.postUpdateOrder");

        Route::resource('orders', App\Http\Controllers\Admin\OrdersController::class);

        Route::get('orders/affiliate/user', [App\Http\Controllers\Admin\OrdersController::class, 'getAffiliateUser'])
            ->name("admin.order.affiliate");

        Route::resource('orderLogs', App\Http\Controllers\Admin\OrderLogController::class);

        Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);

        Route::resource('tinyKeys', App\Http\Controllers\Admin\TinyKeyController::class);

        Route::resource('banners', App\Http\Controllers\Admin\BannerController::class);

        Route::resource('pageNews', App\Http\Controllers\Admin\PageNewsController::class);

        Route::resource('categoryBrands', App\Http\Controllers\Admin\CategoryBrandController::class);

        Route::resource('categoryAttributeFilters', App\Http\Controllers\Admin\CategoryAttributeFilterController::class);

        Route::resource('categoryAttributeValueFilters', App\Http\Controllers\Admin\CategoryAttributeValueFiltersController::class);

        Route::resource('categoryPriceFilters', App\Http\Controllers\Admin\CategoryPriceFiltersController::class);

        Route::resource('retailerAddresses', App\Http\Controllers\Admin\RetailerAddressController::class);

        Route::resource('vNPayCallLogs', App\Http\Controllers\Admin\VNPayCallLogsController::class);

        Route::resource('payooCallLogs', App\Http\Controllers\Admin\PayooCallLogController::class);

        Route::resource('partialPaymentFees', App\Http\Controllers\Admin\PartialPaymentFeeController::class);

        Route::resource('payooIpnErrorLogs', App\Http\Controllers\Admin\PayooIpnErrorLogController::class);

        Route::resource('netSuiteItemUpdates', App\Http\Controllers\Admin\NetSuiteItemUpdateController::class);

        Route::post('productPromotions/file/upload', [App\Http\Controllers\Admin\ProductPromotionController::class, 'fileUpload'])
            ->name('productPromotions.fileUpload');
        Route::get('sync-promotion-netsuite', [App\Http\Controllers\Admin\ProductPromotionController::class, 'syncPromotion'])->name("sync_promotion_netsuite");
        Route::resource('productPromotions', App\Http\Controllers\Admin\ProductPromotionController::class);


        Route::resource('promotionImportLogs', App\Http\Controllers\Admin\PromotionImportLogController::class);

        Route::resource('itemLocationMaps', App\Http\Controllers\Admin\ItemLocationMapController::class);

        Route::get('seoContents/brands', [App\Http\Controllers\Admin\SeoContentController::class, 'seoContentBrand'])
            ->name("seoContent_brand");

        Route::get('seoContents/finId', [App\Http\Controllers\Admin\SeoContentController::class, 'seoContentDetail'])
            ->name("seoContent_detail");

        Route::get('seoContents/finId/product', [App\Http\Controllers\Admin\SeoContentController::class, 'seoContentProduct'])
            ->name("seoContent_product");

        Route::resource('seoContents', App\Http\Controllers\Admin\SeoContentController::class);

        Route::resource('landingContactForms', App\Http\Controllers\Admin\LandingContactFormController::class);

        Route::resource('topProductCat', App\Http\Controllers\Admin\TopProductCategoryController::class);

        Route::resource('cloneNetSuiteItems', App\Http\Controllers\Admin\CloneNetSuiteItemController::class);

        Route::resource('reviews', App\Http\Controllers\Admin\ReviewController::class);

        Route::post('review/file/upload', [App\Http\Controllers\Admin\ReviewController::class, 'fileUpload'])
            ->name('review.fileUpload');

        Route::resource('redirectUrls', App\Http\Controllers\Admin\RedirectUrlController::class);

        Route::resource('vouchers', App\Http\Controllers\Admin\VoucherController::class);

        Route::resource('orderVouchers', App\Http\Controllers\Admin\OrderVoucherController::class);

        Route::resource('voucherLandings', App\Http\Controllers\Admin\VoucherLandingsController::class);

        Route::resource('payooBanks', App\Http\Controllers\Admin\PayooBanksController::class);

        Route::resource('payooBankFees', App\Http\Controllers\Admin\PayooBankFeesController::class);


        Route::resource('wishLists', App\Http\Controllers\Admin\WishListController::class);

        Route::get('/ajax/product/changeStatus', [App\Http\Controllers\Admin\ProductController::class, 'changeStatus'])->name("productVariantChangeStatus");

        Route::resource('notifySales', App\Http\Controllers\Admin\NotifySaleController::class);

        Route::get('add/notify-sale/product', [App\Http\Controllers\Admin\NotifySaleController::class, 'addNotifySaleProduct'])
            ->name("notify_sale_product");
        Route::resource('storesSms', App\Http\Controllers\Admin\StoresSmsController::class);

        Route::resource('tags', App\Http\Controllers\Admin\TagController::class);

        Route::resource('productCustomerColumns', App\Http\Controllers\Admin\ProductCustomerColumnController::class);

        Route::resource('productCustomerValues', App\Http\Controllers\Admin\ProductCustomerValueController::class);

        Route::resource('productManual', App\Http\Controllers\Admin\ProductManualController::class);

        Route::resource('tagGroups', App\Http\Controllers\Admin\TagGroupController::class);

        Route::post('product/tags/{productId}', [App\Http\Controllers\Admin\ProductController::class, 'addTag'])
            ->name("admin.product.addTag");

        Route::get('product/csvFacebook', [App\Http\Controllers\Admin\ProductController::class, 'csvFacebook'])
            ->name('admin.product.csvFacebook');

        Route::resource('storeImages', App\Http\Controllers\Admin\StoreImageController::class);

        Route::resource('webhooks', App\Http\Controllers\Admin\WebhookController::class);

        Route::post('upload', [App\Http\Controllers\Web\HomeController::class, 'ckFinder'])
            ->name('uploadAdmin');

        Route::resource('productBestSellers', App\Http\Controllers\Admin\ProductBestSellerController::class);

        Route::resource('productSuggest', App\Http\Controllers\Admin\ProductSuggestController::class);

        Route::resource('loyaltySearches', App\Http\Controllers\Admin\LoyaltySearchController::class);

        Route::get('export-order', [App\Http\Controllers\Admin\OrdersController::class, 'export'])->name('export-order');


        Route::resource('productBonuses', App\Http\Controllers\Admin\ProductBonusController::class);

        Route::resource('facebookWebhooks', App\Http\Controllers\Admin\FacebookWebhookController::class);

        Route::resource('salecalls', App\Http\Controllers\Admin\SalecallController::class);

        Route::resource('labels', App\Http\Controllers\Admin\LabelController::class);

        Route::resource('productLabels', App\Http\Controllers\Admin\ProductLabelController::class);

        Route::resource('shopeePayCallLogs', App\Http\Controllers\Admin\ShopeePayCallLogsController::class);


        Route::post('smsVouchers/import', [App\Http\Controllers\Admin\SmsVouchersController::class, 'saveImport'])->name("smsVouchers.saveImport");

        Route::get('smsVouchers/download-template', [App\Http\Controllers\Admin\SmsVouchersController::class, 'downloadTemplateExcel'])->name("smsVouchers.downloadTemplateExcel");

        Route::resource('smsVouchers', App\Http\Controllers\Admin\SmsVouchersController::class);

        Route::resource('smsVoucherLogs', App\Http\Controllers\Admin\SmsVoucherLogsController::class);

        Route::resource('momoCallLogs', App\Http\Controllers\Admin\MomoCallLogController::class);

        Route::resource('userAgents', App\Http\Controllers\Admin\UserAgentController::class);
    });
});
