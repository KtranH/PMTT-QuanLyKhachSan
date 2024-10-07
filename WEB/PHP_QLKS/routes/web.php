<?php

use App\Http\Controllers\Admin\Account\HomeAccountAdmin;
use App\Http\Controllers\Admin\Account\LoginAdmin;
use App\Http\Controllers\Admin\Comment\commentAdmin;
use App\Http\Controllers\Admin\Employee\emloyee;
use App\Http\Controllers\Admin\Home\HomeAdmin;
use App\Http\Controllers\Admin\Information\informationAdmin;
use App\Http\Controllers\Admin\Room\categoryRoom;
use App\Http\Controllers\Admin\Room\CT_Reserve;
use App\Http\Controllers\Admin\Room\Invoice;
use App\Http\Controllers\Admin\Room\ReserveAdmin;
use App\Http\Controllers\Admin\Room\RoomAdmin;
use App\Http\Controllers\Admin\Service\serviceAdmin;
use App\Http\Controllers\Admin\Subscription\subscriptionAdmin;
use App\Http\Controllers\User\Account\Account;
use App\Http\Controllers\User\Account\Login;
use App\Http\Controllers\User\Account\SignUp;
use App\Http\Controllers\User\Activity\Comment;
use App\Http\Controllers\User\Activity\ConfirmPay;
use App\Http\Controllers\User\Activity\Pay;
use App\Http\Controllers\User\Activity\Reserve;
use App\Http\Controllers\User\Cart\Cart;
use App\Http\Controllers\User\Contact\Contact;
use App\Http\Controllers\User\Home\HomeUser;
use App\Http\Controllers\User\Information\About;
use App\Http\Controllers\User\Information\Location_Service;
use App\Http\Controllers\User\Room\CategoriesRoom;
use App\Http\Controllers\User\Room\overView;
use Illuminate\Support\Facades\Route;


//----------------------------------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------Phần USER--------------------------------------------------------------------------------------------

// Hiển thị trang chủ
Route::get('/', [HomeUser::class, 'LoadActivity'])->name('home');

// Hiển thị đăng ký/ đăng nhập bằng google
Route::get('/authGoogle', [Login::class, 'loginByGoogle'])->name("loginByGoogle");

// Hiển thị đăng ký/ đăng nhập bằng google
Route::get('/callBackGoogle', [Login::class, 'callBackGoogle'])->name("callBackGoogle");

// Hiển thị form đăng nhập
Route::get('/login', [Login::class, 'showLoginForm'])->name("Formlogin");

// Xử lý dữ liệu đăng nhập
Route::post('/login', [Login::class, 'login'])->name('login');

// Xử lý logout
Route::get('/logout', [Login::class, 'logout'])->name('logout');

// Hiển thị form đăng ký
Route::get('/signup', [SignUp::class, 'showSignUpForm'])->name("FormSignUp");

// Xử lý dữ liệu đăng ký
Route::post('/signup', [SignUp::class, 'signup'])->name('signup');

// Hiển thị trang chủ tài khoản
Route::get('/account', [Account::class, 'Account'])->name('home_account');

//Hiển trang chỉnh sửa tài khoản
Route::get('/edit', [Account::class, 'EditAccout'])->name('edit_account');

//Xử lý dữ liệu chỉnh sửa tài khoản
Route::post('/edit', [Account::class, 'saveEdit'])->name('saveEdit');

//Xử lý cập nhật mật khẩu tài khoản
Route::post('/editpass', [Account::class, 'updateaccountpass'])->name('updateaccountpass');

//Hiển trang đánh giá
Route::get('/pushcomment', [Comment::class, 'pushComment'])->name('pushComment');

//Xử lý nội dung đánh giá
Route::post('/writecomment', [Comment::class, 'writeComment'])->name('writeComment');

//Hiển trang liên hệ
Route::get('/contact', [Contact::class, 'contact'])->name('contact');

//Hiển trang thông tin
Route::get('/about', [About::class, 'about'])->name('about');

//Hiển trang đặt phòng
Route::get('/room', [Reserve::class, 'reserve'])->name('reserve');

//Hiển trang đánh giá
Route::get('/comment', [Comment::class, 'comment'])->name('comment');

//Hiển thị tất cả loại phòng
Route::get('/allCategories', [CategoriesRoom::class, 'showALLCategory'])->name('all.category');

//Hiển thị phòng cao cấp
Route::get('/loaicaocap', [CategoriesRoom::class, 'showCaoCap'])->name('loai.caocap');

//Hiển thị phòng phổ thông
Route::get('/loaiphothong', [CategoriesRoom::class, 'showPhoThong'])->name('loai.phothong');

//Hiển thị phòng giá trẻ
Route::get('/loaigiare', [CategoriesRoom::class, 'showGiaRe'])->name('loai.giare');

//Hiển thị phòng từ thấp tới cao
Route::get('/priceLow-Hight', [CategoriesRoom::class, 'showRoomsByPriceLowHigh'])->name('price.low');

//Hiển thị phòng từ cao tới thấp
Route::get('/priceHigh-Low', [CategoriesRoom::class, 'showRoomsByPriceHightLow'])->name('price.high');

//Hiển thị phòng từ thanh tìm kiếm
Route::get('/search', [HomeUser::class, 'search']);

//Hiển thị trang xem chi tiết phòng
Route::get('/overview', [overView::class, 'overViewProduct'])->name('overviewProduct');

//Hiển thị xử lý trang giỏ hàng
Route::get('/cart', [Cart::class, 'cartUser'])->name('cartUser');

//Hiển thị xử lý cập nhật giỏ hàng
Route::get('/cartUpdate', [Cart::class, 'updateCart'])->name('updateCart');

//Xử lý hủy đặt phòng
Route::get('/cancel_seserve', [Reserve::class, 'cancel_seserve'])->name('cancel_seserve');

//Hiển thị xử lý trang thanh toán
Route::get('/pay', [Pay::class, 'payment'])->name('payUser');

//Hiển thị xử lý trang thanh toán giỏ hàng
Route::get('/payCart', [Pay::class, 'paymentCart'])->name('paymentUserCart');

//Hiển thị xử lý trang thanh toán
Route::post('/pay', [Pay::class, 'payment'])->name('payUser');

//Hiển thị xử lý thanh toán và đăng ký phiếu
Route::get('/confirmpay', [ConfirmPay::class, 'confirmpay'])->name('confirmpay');

//Hiển thị xử lý thanh toán giỏ và đăng ký phiếu
Route::get('/confirmpPayCart', [ConfirmPay::class, 'confirmpaycart'])->name('confirmpaycart');

//Hiển thị xử lý trang thanh toán giỏ hàng
Route::post('/payCart', [Pay::class, 'paymentCart'])->name('paymentUserCart');

//Xử lý kết quả trả về từ thanh tìm kiếm
Route::get('/search_results/{searchTerm}', [HomeUser::class, 'searchResult'])->name('search.result');

//Hiển thị tất cả dịch vụ
Route::get('/dichvu', [Location_Service::class, 'showAllDichVu'])->name('dichvu');

//Hiển thị cơ sở 1
Route::get('/coso1', [Location_Service::class, 'loadCoSo1'])->name('coso1');

//Hiển thị cơ sở 2
Route::get('/coso2', [Location_Service::class, 'loadCoSo2'])->name('coso2');

//Hiển thị cơ sở 3
Route::get('/coso3', [Location_Service::class, 'loadCoSo3'])->name('coso3');

//Hiển thị xử lý tạo ảnh bằng AI
Route::get('/generativeAI', [Account::class, 'generativeAI'])->name('generativeAI');

//-----------------------------------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------Phần ADMIN--------------------------------------------------------------------------------------------

//Hiển thị trang chủ admin
Route::get('/homeadmin', [HomeAdmin::class, 'homeAdmin'])->name('homeAdmin');

//Hiển thị trang loại phòng
Route::get('/categoryadmin', [categoryRoom::class, 'categoryAdmin'])->name('categoryAdmin');

//Hiển thị trang phòng
Route::get('/roomadmin', [RoomAdmin::class, 'roomadmin'])->name('roomAdmin');

//Hiển thị trang dịch vụ
Route::get('/serviceadmin', [serviceAdmin::class, 'serviceadmin'])->name('serviceadmin');

//Hiển thị trang đăng nhập
Route::get('/loginadmin', [LoginAdmin::class, 'loginadmin'])->name('loginadmin');

//Hiển thị xử lý đăng nhập
Route::post('/loginadmin', [LoginAdmin::class, 'authAdmin'])->name('authAdmin');

//Hiển thị trang tài khoản admin
Route::get('/homeaccountadmin', [HomeAccountAdmin::class, 'homeaccountadmin'])->name('homeaccountadmin');

//Xử lý đăng xuất
Route::get('/logoutAdmin', [LoginAdmin::class, 'logoutAdmin'])->name('logoutAdmin');

//Hiển thị trang nhân viên
Route::get('/employeeAdmin', [emloyee::class, 'emloyeeAdmin'])->name('emloyeeAdmin');

//Hiển thị trang đánh giá
Route::get('/commentAdmin', [commentAdmin::class, 'commentadmin'])->name('commentadmin');

//Hiển thị trang tra cứu
Route::get('/searchadmin', [informationAdmin::class, 'informationadmin'])->name('informationadmin');

//Xử lý đăng ký phòng
Route::get('/reserveAdmin', [ReserveAdmin::class, 'reserveAdmin'])->name('reserveAdmin');

//Xử lý đăng ký phòng trực tiếp
Route::post('/rentAdmin', [ReserveAdmin::class, 'rentAdmin'])->name('rentAdmin');

//Xử lý chi tiết phiếu đăng ký
Route::get('/ctroomadmin', [CT_Reserve::class, 'ct_reserve'])->name('ct_reserve');

//Thể hiện danh sách phiếu chỉnh sửa
Route::get('/editctroomadmin', [CT_Reserve::class, 'editctroom'])->name('editctroom');

//Xử lý xem chi tiết phiếu đăng ký
Route::get('/detailpdkadmin', [CT_Reserve::class, 'detailroom'])->name('detailroom');

//Xử lý chi tiết phiếu đăng ký
Route::post('/ctroomadmin', [CT_Reserve::class, 'ct_reserve'])->name('ct_reserve_kh');

//Xử lý chi tiết phiếu đăng ký đặt trước
Route::get('/ctpdkdt', [CT_Reserve::class, 'ct_pdkdt'])->name('ct_pdkdt');

//Xử lý chi tiết phiếu đăng ký đặt trước
Route::post('/ctpdkdt', [CT_Reserve::class, 'ct_pdkdt'])->name('ct_pdkdt_kh');

//Xử lý thêm khách hàng vào phiếu
Route::get('/addkh', [CT_Reserve::class, 'addkh'])->name('addkh');

//Xử lý thêm mới một khách hàng
Route::post('/addmorekh', [CT_Reserve::class, 'addkh2'])->name('addkh2');

//Xử lý xóa khách hàng trong chi tiết phiếu
Route::get('/removekh', [CT_Reserve::class, 'removekh'])->name('removekh');

//Xử lý xóa phiếu đặt trước
Route::get('/deletepdk', [CT_Reserve::class, 'deletepdk'])->name('deletepdk');

//Xử lý hoàn thành phiếu đăng ký đặt trước
Route::get('/completepdkdt', [CT_Reserve::class, 'completepdkdt'])->name('completepdkdt');

//Xử lý hoàn thành phiếu đăng ký
Route::get('/completepdk', [CT_Reserve::class, 'completepdk'])->name('completepdk');

//Xử lý lựa chọn hóa đơn
Route::get('/selectinvoice', [Invoice::class, 'selectinvoice'])->name('selectinvoice');

//Xử lý chi tiết hóa đơn
Route::get('/ct_invoice', [Invoice::class, 'ct_invoice'])->name('ct_invoice');

//Xử lý thêm dịch vụ vào chi tiết hóa đơn
Route::post('/addservice_ctinvoice', [Invoice::class, 'addServiceInvoice'])->name('addServiceInvoice');

//Xử lý xóa dịch vụ trong chi tiết hóa đơn
Route::get('/removeservice_ctinvoice', [Invoice::class, 'removeServiceInvoice'])->name('removeServiceInvoice');

//Xử lý hoàn tất hóa đơn
Route::get('/completeInvoice', [Invoice::class, 'completeInvoice'])->name('completeInvoice');

//Hiển thị chi tiết hóa đơn
Route::get('/detailInvoiceAdmin', [Invoice::class, 'detailInvoice'])->name('detailInvoice');

//Xử lý cập nhật tài khoản admin
Route::post('/updateaccountadmin', [HomeAccountAdmin::class, 'updateaccountadmin'])->name('updateaccountadmin');

//Xử lý cập nhật mật khẩu tài khoản admin
Route::post('/updateaccountadminpass', [HomeAccountAdmin::class, 'updateaccountadminpass'])->name('updateaccountadminpass');

//Xử lý xét duyệt đánh giá
Route::get('/checkcomment', [commentAdmin::class, 'checkcomment'])->name('checkcomment');

//Xử lý khôi phục hoặc khóa tài khoản khách
Route::get('/unlockorlock', [informationAdmin::class, 'unlockorlockaccountkh'])->name('unlockorlockaccountkh');

//Xử lý xét duyệt đánh giá
Route::get('/checkcomment', [commentAdmin::class, 'checkcomment'])->name('checkcomment');

//Xử lý thêm một loại phòng
Route::post('/addmorecateroomadmin', [categoryRoom::class, 'addmorecate'])->name('addmorecate');

//Hiển thị chỉnh sửa loại phòng
Route::get('/updatecateroomadmin', [categoryRoom::class, 'updatecate'])->name('updatecate');

//Xử lý chỉnh sửa loại phòng
Route::post('/showupdatecateroomadmin', [categoryRoom::class, 'finupdatecate'])->name('finupdatecate');

//Xử lý xóa hoặc khôi phục một loại phòng
Route::get('/deleterecoveryroomadmin', [categoryRoom::class, 'deletecateorrecoverycate'])->name('deletecateorrecoverycate');

//Xử lý thêm một phòng
Route::post('/addmoreroomadmin', [RoomAdmin::class, 'addmoreroom'])->name('addmoreroom');

//Thể hiện chỉnh sửa một phòng
Route::get('/showupdateroomadmin', [RoomAdmin::class, 'updateroom'])->name('updateroom');

//Xử lý chỉnh sửa một phòng
Route::post('/updateroomadmin', [RoomAdmin::class, 'finupdateroom'])->name('finupdateroom');

//Xử lý xóa hoặc khôi phục một phòng
Route::get('/deleteroomorrecoveryroomadmin', [RoomAdmin::class, 'deleteroomorrecoveryroom'])->name('deleteroomorrecoveryroom');

//Xử lý thêm một dịch vụ
Route::post('/addmoreserivceadmin', [serviceAdmin::class, 'addmoreservice'])->name('addmoreservice');

//Thể hiện chỉnh sửa một dịch vụ
Route::get('/showupdateserviceadmin', [serviceAdmin::class, 'updateservice'])->name('updateservice');

//Xử lý chỉnh sửa một dịch vụ
Route::post('/updateserviceadmin', [serviceAdmin::class, 'finupdateservice'])->name('finupdateservice');

//Xử lý xóa hoặc khôi phục một dịch vụ
Route::get('/deleteroomorrecoveryserviceadmin', [serviceAdmin::class, 'deleteroomorrecoveryservice'])->name('deleteroomorrecoveryservice');

//Xử lý thêm một nhân viên
Route::post('/addmoreemloyeeadmin', [emloyee::class, 'addmoreemloyee'])->name('addmoreemloyee');

//Thể hiện chỉnh sửa một nhân viên
Route::get('/showupdateemloyeeadmin', [emloyee::class, 'updateemloyee'])->name('updateemloyee');

//Xử lý chỉnh sửa một nhân viên
Route::post('/updateemloyeeadmin', [emloyee::class, 'finupdateemloyee'])->name('finupdateemloyee');

//Xử lý xóa hoặc khôi phục một nhân viên
Route::get('/deleteroomorrecoveryemloyeeadmin', [emloyee::class, 'deleteroomorrecoveryemloyee'])->name('deleteroomorrecoveryemloyee');
//Test Pusher
//Route::get('/testPusher', function () {
//    return view("Admin.Subscription.subscriptionAdmin");
//});

//Route::get('/result', function () {
//    return view("Admin.Subscription.test");
//});

//Route::post('/testPusher', [subscriptionAdmin::class, 'testPuser'])->name('testPuser');
