<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'front';

$route['swi-admin'] = "admin_login/adminLoginPage";
$route[A.'-login'] = "admin_login/adminLoginPage";
$route['adminlogin'] = "admin_login/doLogin";

$route[A] = A;
$route[A.'-logout'] = A."/logout";

//category links
$route[A.'/add-category'] = A."/addCategoryPage";
$route[A.'/all-category'] = A."/categoryListPage";
$route[A.'/home-category-banner'] = A."/categoryHomeBannerPage";

$route[A.'/user-songs'] = A."/UserSongsPage";
//product links
$route[A.'/add-producer'] = A."/addProducerPage";
$route[A.'/producers-list'] = A."/allProducersList";

$route[A.'/add-video'] = A."/AddVideoPage";
$route[A.'/video-list'] = A."/AllVideoListPage";
$route[A.'/subscriptions'] = A."/SubscriptionSettingPage";
$route[A.'/edit-subsciption/(:any)'] = A."/editSubsciptionPage/$1";


$route[A.'/product-list'] = A."/allProductList";
$route[A.'/edit-product/(:any)'] = A."/editProductPage/$1";
$route[A.'/edit-producer/(:any)'] = A."/EditProducerPage/$1";

$route[A.'/all-product-tag'] = A."/allProductTagsPage";

$route[A.'/watch-video/(:any)'] = A."/Watchvideopage/$1";
$route[A.'/edit-video/(:any)'] = A."/EditVideoPage/$1";

$route[A.'/coupon-list'] = A."/couponListPage";

$route[A.'/user-list'] = A."/usersListPage";

$route[A.'/pincode-list'] = A."/pincodeListPage";
$route[A.'/pincode-list/(:any)'] = A."/pincodeListPage/$1";

$route[A.'/flex-image'] = A."/addFleximagePage";
$route[A.'/left-image'] = A."/addLeftimagePage";

$route[A.'/product-notify-list'] = A."/productNotifyListPage";
$route[A.'/affilated-products'] = A."/AffilatedMarketingPage";

$route[A.'/order-report-search'] = A."/reportSearchPage";
$route[A.'/order-report'] = A."/orderReport";

$route[A.'/order-list'] = A."/allOrderListPage";
$route[A.'/order-invoice/(:any)'] = A."/orderInvoice/$1";
$route[A.'/cancle-order-list'] = A."/cancleOrderList";

$route[A.'/add-slider-banner'] = A."/addSliderBannerPage";
$route[A.'/below-slider-banner'] = A."/addBelowSliderBannerPage";




/* Producer */
$route[P] = P;
$route[P.'/song-detail/(:any)'] = "producer/UserSongsDetailPage/$1";
$route[P.'/add-products'] = "producer/addProductPage";


$route[P.'/add-events'] = "producer/addProductPage";
$route[P.'/events-list'] = "producer/ProductList";

$route[P.'/add-research'] = "producer/addProductPage";
$route[P.'/research-list'] = "producer/ProductList";


$route[P.'/edit-profile'] = P."/editProfilePage";
$route[P.'/edit-product/(:any)'] = P."/editProductPage/$1";


//front

$route['category-list/(:any)/(:any)'] = "front/getCategoryListPage/$1/$2";
$route['category-list/(:any)/(:any)/(:any)'] = "front/getSubCategoryListPage/$1/$2/$3";

$route['research-and-events'] = "front/getAllProducts";
$route['details/(:any)/(:any)'] = "front/productDetailPage/$1/$2";

$route['products/(:any)/(:any)'] = "front/shopPage/$1/$2";
$route['products/(:any)'] = "front/FandBSshopPage/$1";
// $route['product-detail/(:any)/(:any)'] = "front/productDetailPage/$1/$2";

$route['product-tag/(:any)'] = "front/searchProductByTagPage/$1";

$route['shopping-cart'] = "front/shoppingCartPage";
$route['checkout'] = "front/userCheckoutPage";
$route['thank-you'] = "front/thankYouPage";
$route['login'] = "front/Loginpage";

$route['about-us'] = "front/aboutUsPage";
$route['privacy-policy'] = "front/privacyPolicyPage";
$route['cancellation-policy'] = "front/cancellationPolicyPage";
$route['shipping-and-refund-policy'] = "front/shippingRefundPage";
$route['terms-and-condition'] = "front/termConditionPage";
$route['disclamer'] = "front/disclamerPage";
$route['faq'] = "front/faqPage";
$route['contact-us'] = "front/contactUsPage";
$route['track-order'] = "front/trackOrderPage";
$route['trackorder'] = "front/trackPage";
$route['track-order-action'] = "front/trackOrderAction";
$route['refund-replacement'] = "front/refundreplacementPage";
$route['shipping-policy'] = "front/shippingpolicyPage";

$route['search-product'] = "front/directSearchProduct";
$route['search-product-auto'] = "front/searchProductAuto";
$route['wishlist'] = "front/wishlistPage";
$route['compare-product'] = "front/comparePage";

/** User **/

$route[P.'-login'] = "producer_login/loginPage";
$route['user-login'] = "user_login/loginPage";
// $route['user-registration'] = "user_login/registrationPage";
$route['user-profile'] = "profile/userProfilePage";
$route['song-comments/(:any)'] = "profile/SongCommentPage/$1";
$route['subscribe-now'] = "profile/subscriptionPage";
$route['upload-song'] = "profile/UploadSongPage";
$route['my-songs'] = "profile/userallSongs";
$route['comments-delete-songs'] = "profile/CommentsDeleteSongs";


$route['account-details'] = "profile/UserAccountDetails";
$route['add-billing-address'] = "profile/userBillingAddressPage";
$route['add-shipping-address'] = "profile/userShippingAddressPage";
$route['change-password'] = "profile/userChangePasswordPage";
$route['edit-profile'] = "profile/UserEditProfilePage";
$route['user-order-detail/(:any)'] = "profile/orderCartDetailPage/$1";

$route['forgot-password'] = "user_login/forgetPasswordPage";

/** User **/

$route['logout'] = "front/logout";



$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
