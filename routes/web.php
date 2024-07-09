<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\API\SocialAuthController;
use App\Http\Controllers\AdminControllers\UserController;
use App\Http\Controllers\BusinessControllers\ServiceController;
use App\Http\Controllers\UserControllers\AppointmentController;
use App\Http\Controllers\AdminControllers\AdminNavigationController;
use App\Http\Controllers\AdminControllers\CategoryController;
use App\Http\Controllers\AdminControllers\ServiceProviderController;
use App\Http\Controllers\BusinessControllers\BusinessNavigationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
})->name('main.index')->middleware('guest');
Route::get('/serviceProviders', [HomeController::class, 'serviceProviders'])->name('services')->middleware('guest');
Route::get('/home/filter', [HomeController::class, 'filter'])->name('home.filter');
Route::get('/service-providers/{id}/services', [HomeController::class, 'services'])->name('service-providers.services');
Route::get('/search', [HomeController::class, 'search'])->name('search');

Auth::routes();
//GOOGLE LOGIN
Route::get('/login-google', [SocialAuthController::class, 'redirectToProvider'])->name('google.login');
Route::get('/auth/google/callback', [SocialAuthController::class, 'handleCallback'])->name('google.login.callback');

Route::middleware('auth')->group(function () {
    //USER ROUTES
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // Route::get('/home/filter', [HomeController::class, 'filter'])->name('home.filter');
    // Route::get('/service-providers/{id}/services', [HomeController::class, 'services'])->name('service-providers.services');
    Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout-page');
    Route::post('/services/book', [ServiceController::class, 'bookService'])->name('services.book');
    Route::get('/services/checkout/', [ServiceController::class, 'checkout'])->name('services.checkout');
    Route::post('/services/fake-payment/{id}', [ServiceController::class, 'fakePayment'])->name('services.fakePayment');
    Route::post('/services/otc-payment/{id}', [ServiceController::class, 'otcPayment'])->name('services.otcPayment');
    Route::get('/services/order-confirmation/{id}', [ServiceController::class, 'orderConfirmation'])->name('services.orderConfirmation');
    Route::get('/services/otc-confirmation/{id}', [ServiceController::class, 'otcConfirmation'])->name('services.otcConfirmation');
    Route::get('/appointments/user/{userId}', [AppointmentController::class, 'userAppointmentPage'])->name('user.appointments');
    Route::get('/appointments/{appointmentId}/view', [AppointmentController::class, 'show'])->name('appointments.show');
    //Route::get('/search', [HomeController::class, 'search'])->name('search');
    Route::put('/appointments/{appointment}/rate', [AppointmentController::class, 'rate'])->name('user-appointments.rate');
    Route::get('/user-change-password', [HomeController::class, 'userChangePassword'])->name('user-change-password'); // julie boi may gawa 
    Route::get('/user-edit-profile', [HomeController::class, 'userEditProfile'])->name('user-edit-profile'); // julie boi may gawa 
    Route::put('/appointments/{appointment}/cancel', [AppointmentController::class, 'cancelBusiness'])->name('appointments.cancel');
});

//BUSINESS SUBDOMAIN
Route::domain('business.localhost')->group(function () {
    Route::get('/', function () {
        return view('business.index');
    })->name('business.index')->middleware('guest');

    Route::middleware('service-provider')->group(function () {
        Route::get('/business/home', [BusinessNavigationController::class, 'index'])->name('business.home');
        Route::get('/business-profile', [BusinessNavigationController::class, 'viewProfile'])->name('business-profile');
        Route::get('/help', [BusinessNavigationController::class, 'viewHelp'])->name('business-help');
        Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
        Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
        Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
        Route::get('/services/{id}', [ServiceController::class, 'show'])->name('services.show');
        Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('services.edit');
        Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');
        Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');

        Route::get('/appointments/{businessId}', [AppointmentController::class, 'businessAppointmentPage'])->name('business.appointments');
        Route::get('/appointments/{appointmentId}', [AppointmentController::class, 'show'])->name('appointments.show');
        Route::put('/appointments/{appointment}/cancel', [AppointmentController::class, 'cancelBusiness'])->name('business-appointments.cancel');
        Route::put('/appointments/{appointment}/noshow', [AppointmentController::class, 'noshow'])->name('business-appointments.noshow');
        Route::put('/appointments/{appointment}/done', [AppointmentController::class, 'done'])->name('business-appointments.done');
        Route::put('/appointments/{appointment}/paid', [AppointmentController::class, 'paid'])->name('business-appointments.paid');
    });

    //BUSINESS AUTHENTICATION
    Auth::routes(['register' => true, 'reset' => false, 'verify' => false]);
    Route::get('/register', 'App\Http\Controllers\BusinessControllers\BusinessRegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'App\Http\Controllers\BusinessControllers\BusinessRegisterController@register');
    Route::get('/business-login', 'App\Http\Controllers\BusinessControllers\BusinessLoginController@showLoginForm')->name('business-login');
    Route::post('/business-login', 'App\Http\Controllers\BusinessControllers\BusinessLoginController@login');
    Route::post('/logout', 'App\Http\Controllers\BusinessControllers\BusinessLoginController@logout')->name('logout');
});
//END OF BUSINESS SUBDOMAIN

//ADMIN SUBDOMAIN LOCALHOST
Route::domain('admin.localhost')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index')->middleware('guest');

    Route::middleware('admin')->group(function () {
        Route::get('/admin/home', [AdminNavigationController::class, 'index'])->name('admin.home');
        Route::get('/admin-profile', [AdminNavigationController::class, 'viewProfile'])->name('admin-profile');
        Route::get('/help', [AdminNavigationController::class, 'viewHelp'])->name('help');
        Route::post('/notifications/markAsRead', [AdminNavigationController::class, 'markAsRead']);

        //CRUD for users
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create-admin', [UserController::class, 'createAdmin'])->name('users.create-admin');
        Route::get('/users/create-business', [UserController::class, 'createBusiness'])->name('users.create-business');
        Route::post('/usersA', [UserController::class, 'storeAdmin'])->name('users.store-admin');
        Route::post('/usersB', [UserController::class, 'storeBusiness'])->name('users.store-business');
        Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
        Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

        //CRUD for service providers 
        Route::get('/service-providers', [ServiceProviderController::class, 'index'])->name('service-providers.index');
        Route::get('/service-providers/create', [ServiceProviderController::class, 'create'])->name('service-providers.create');
        Route::post('/service-providers', [ServiceProviderController::class, 'store'])->name('service-providers.store');
        Route::get('/service-providers/{id}', [ServiceProviderController::class, 'show'])->name('service-providers.show');
        Route::get('/service-providers/{id}/edit', [ServiceProviderController::class, 'edit'])->name('service-providers.edit');
        Route::put('/service-providers/{id}', [ServiceProviderController::class, 'update'])->name('service-providers.update');
        Route::delete('/service-providers/{id}', [ServiceProviderController::class, 'destroy'])->name('service-providers.destroy');

        //CRUD for categories 
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
        Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

        Route::get('/appointments', [AppointmentController::class, 'adminAppointmentPage'])->name('admin.appointments');
        Route::get('/appointments/search', [AppointmentController::class, 'search'])->name('appointments.search');
        Route::get('/appointments/filterDate', [AppointmentController::class, 'filterDate'])->name('appointments.filterDate');
        //Route::get('/appointments/{appointmentId}', [AppointmentController::class, 'show'])->name('appointments.show');
        Route::get('/appointments/export/{search}/{start_date}/{end_date}', [AppointmentController::class, 'generatePDF'])->name('appointments.export');
    });

    //ADMIN AUTHENTICATION
    Auth::routes(['register' => true, 'reset' => false, 'verify' => false]);
    Route::get('/register', 'App\Http\Controllers\AdminControllers\AdminRegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'App\Http\Controllers\AdminControllers\AdminRegisterController@register');
    Route::get('/admin-login', 'App\Http\Controllers\AdminControllers\AdminLoginController@showLoginForm')->name('admin-login');
    Route::post('/admin-login', 'App\Http\Controllers\AdminControllers\AdminLoginController@login');
    Route::post('/logout', 'App\Http\Controllers\AdminControllers\AdminLoginController@logout')->name('logout');
});
//END OF ADMIN SUBDOMAIN

//SUBDOMAIN IP ADDRESS
// Route::domain('64.227.25.195')->group(function () {
//     Auth::routes();
//     Route::get('/', function () {
//         return view('welcome');
//     })->name('main.index')->middleware('guest');

//     //GOOGLE LOGIN
//     Route::get('/login-google', [SocialAuthController::class, 'redirectToProvider'])->name('google.login');
//     Route::get('/auth/google/callback', [SocialAuthController::class, 'handleCallback'])->name('google.login.callback');

//     //USER ROUTES
//     Route::get('/home', [HomeController::class, 'index'])->name('home');
//     Route::get('/home/filter', [HomeController::class, 'filter'])->name('home.filter');
//     Route::get('/service-providers/{id}/services', [HomeController::class, 'services'])->name('service-providers.services');
//     Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout-page');
//     Route::post('/services/book', [ServiceController::class, 'bookService'])->name('services.book');
//     Route::get('/services/checkout/', [ServiceController::class, 'checkout'])->name('services.checkout');
//     Route::post('/services/fake-payment/{id}', [ServiceController::class, 'fakePayment'])->name('services.fakePayment');
//     Route::post('/services/otc-payment/{id}', [ServiceController::class, 'otcPayment'])->name('services.otcPayment');
//     Route::get('/services/order-confirmation/{id}', [ServiceController::class, 'orderConfirmation'])->name('services.orderConfirmation');
//     Route::get('/services/otc-confirmation/{id}', [ServiceController::class, 'otcConfirmation'])->name('services.otcConfirmation');
//     Route::get('/appointments/user/{userId}', [AppointmentController::class, 'userAppointmentPage'])->name('user.appointments');
//     Route::get('/appointments/{appointmentId}/view', [AppointmentController::class, 'show'])->name('appointments.show');
//     Route::get('/search', [HomeController::class, 'search'])->name('search');
//     Route::put('/appointments/{appointment}/cancel', [AppointmentController::class, 'cancel'])->name('user-appointments.cancel');
//     Route::put('/appointments/{appointment}/rate', [AppointmentController::class, 'rate'])->name('user-appointments.rate');
    
//     //ADMIN PREFIX
//     Route::prefix('admin')->group(function () {
//         Route::get('/', function () {
//             return view('admin.index');
//         })->name('admin.index')->middleware('guest');
    
//         Route::middleware('admin')->group(function () {
//             Route::get('/admin/home', [AdminNavigationController::class, 'index'])->name('admin.home');
//             Route::get('/admin-profile', [AdminNavigationController::class, 'viewProfile'])->name('admin-profile');
//             Route::get('/help', [AdminNavigationController::class, 'viewHelp'])->name('help');
//             Route::post('/notifications/markAsRead', [AdminNavigationController::class, 'markAsRead']);
    
//             //CRUD for users
//             Route::get('/users', [UserController::class, 'index'])->name('users.index');
//             Route::get('/users/create-admin', [UserController::class, 'createAdmin'])->name('users.create-admin');
//             Route::get('/users/create-business', [UserController::class, 'createBusiness'])->name('users.create-business');
//             Route::post('/usersA', [UserController::class, 'storeAdmin'])->name('users.store-admin');
//             Route::post('/usersB', [UserController::class, 'storeBusiness'])->name('users.store-business');
//             Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
//             Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
//             Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
//             Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    
//             //CRUD for service providers 
//             Route::get('/service-providers', [ServiceProviderController::class, 'index'])->name('service-providers.index');
//             Route::get('/service-providers/create', [ServiceProviderController::class, 'create'])->name('service-providers.create');
//             Route::post('/service-providers', [ServiceProviderController::class, 'store'])->name('service-providers.store');
//             Route::get('/service-providers/{id}', [ServiceProviderController::class, 'show'])->name('service-providers.show');
//             Route::get('/service-providers/{id}/edit', [ServiceProviderController::class, 'edit'])->name('service-providers.edit');
//             Route::put('/service-providers/{id}', [ServiceProviderController::class, 'update'])->name('service-providers.update');
//             Route::delete('/service-providers/{id}', [ServiceProviderController::class, 'destroy'])->name('service-providers.destroy');
    
//             //CRUD for categories 
//             Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
//             Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
//             Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
//             Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
//             Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
//             Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
//             Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    
//             Route::get('/appointments', [AppointmentController::class, 'adminAppointmentPage'])->name('admin.appointments');
//             Route::get('/appointments/search', [AppointmentController::class, 'search'])->name('appointments.search');
//             Route::get('/appointments/filterDate', [AppointmentController::class, 'filterDate'])->name('appointments.filterDate');
//             //Route::get('/appointments/{appointmentId}', [AppointmentController::class, 'show'])->name('appointments.show');
//             Route::get('/appointments/export/{search}/{start_date}/{end_date}', [AppointmentController::class, 'generatePDF'])->name('appointments.export');
//         });
    
//         //ADMIN AUTHENTICATION
//         Auth::routes(['register' => true, 'reset' => false, 'verify' => false]);
//         Route::get('/register', 'App\Http\Controllers\AdminControllers\AdminRegisterController@showRegistrationForm')->name('register');
//         Route::post('/register', 'App\Http\Controllers\AdminControllers\AdminRegisterController@register');
//         Route::get('/admin-login', 'App\Http\Controllers\AdminControllers\AdminLoginController@showLoginForm')->name('admin-login');
//         Route::post('/admin-login', 'App\Http\Controllers\AdminControllers\AdminLoginController@login');
//         Route::post('/logout', 'App\Http\Controllers\AdminControllers\AdminLoginController@logout')->name('logout');
//     });
//     //BUSINESS PREFIX
//     Route::prefix('business')->group(function () {
//         Route::get('/', function () {
//             return view('business.index');
//         })->name('business.index')->middleware('guest');
    
//         Route::middleware('service-provider')->group(function () {
//             Route::get('/business/home', [BusinessNavigationController::class, 'index'])->name('business.home');
//             Route::get('/business-profile', [BusinessNavigationController::class, 'viewProfile'])->name('business-profile');
//             Route::get('/help', [BusinessNavigationController::class, 'viewHelp'])->name('business-help');
//             Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
//             Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
//             Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
//             Route::get('/services/{id}', [ServiceController::class, 'show'])->name('services.show');
//             Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('services.edit');
//             Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');
//             Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');
    
//             Route::get('/appointments/{businessId}', [AppointmentController::class, 'businessAppointmentPage'])->name('business.appointments');
//             Route::get('/appointments/{appointmentId}', [AppointmentController::class, 'show'])->name('appointments.show');
//             Route::put('/appointments/{appointment}/cancel', [AppointmentController::class, 'cancelBusiness'])->name('business-appointments.cancel');
//             Route::put('/appointments/{appointment}/noshow', [AppointmentController::class, 'noshow'])->name('business-appointments.noshow');
//             Route::put('/appointments/{appointment}/done', [AppointmentController::class, 'done'])->name('business-appointments.done');
//             Route::put('/appointments/{appointment}/paid', [AppointmentController::class, 'paid'])->name('business-appointments.paid');
//         });
    
//         //BUSINESS AUTHENTICATION
//         Auth::routes(['register' => true, 'reset' => false, 'verify' => false]);
//         Route::get('/register', 'App\Http\Controllers\BusinessControllers\BusinessRegisterController@showRegistrationForm')->name('register');
//         Route::post('/register', 'App\Http\Controllers\BusinessControllers\BusinessRegisterController@register');
//         Route::get('/business-login', 'App\Http\Controllers\BusinessControllers\BusinessLoginController@showLoginForm')->name('business-login');
//         Route::post('/business-login', 'App\Http\Controllers\BusinessControllers\BusinessLoginController@login');
//         Route::post('/logout', 'App\Http\Controllers\BusinessControllers\BusinessLoginController@logout')->name('logout');
//     });
// });
