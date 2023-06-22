<?php

use App\Models\Event;
use App\Models\ChatMessage;
use App\Models\StaffMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VeldController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PickupController;
use App\Http\Controllers\LocatieController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\StaffMemberController;
use App\Http\Controllers\ContactMessageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $nextEvent = Event::where('datumTijd', '>=', date('Y-m-d H:i:s'))
        ->orderBy('datumTijd', 'asc')
        ->first();

    // dd($nextEvent);
    return view('welcome', ["event" => $nextEvent]);
})->name('home');

Route::get('/staff', function (Request $request) {
    $url = $request->url();
    //split the string untill the last / and then return the last part
    $url = substr($url, strrpos($url, '/') + 1);
    $staffMembers = StaffMember::all();
    // dd($url);
    return view('staff', ['url' => $url, 'staffMembers' => $staffMembers]);
})->name('staff');
Route::get('/staff/{id}', function (Request $request, $id) {
    $url = $request->url();
    //split the string untill the last / and then return the last part
    $url = substr($url, strrpos($url, '/') + 1);
    $member = StaffMember::find($id);

    return view('staff.show', ['url' => $url, 'member' => $member]);
})->name('staff.show');

Route::get('/programme/join', function () {
    return view("guestViews.programme");
})->name("programme.join");
Route::get('/skillsTrainingen', function () {
    return view("guestViews.skills");
})->name("programme.skills");
Route::get('/about', function () {
    return view("guestViews.about");
})->name("guestViews.about");
Route::get('/stage', function () {
    return view("guestViews.stage");
})->name("guestViews.stage");
Route::get('/partners-sponsoren', function () {
    return view("guestViews.partnerSponsor");
})->name("guestViews.partners");

Route::get('/contact', [ContactMessageController::class, 'index'])->name('contact');
Route::post('/contact', [ContactMessageController::class, 'store'])->name('contact.store');

route::get('/feedback', [ContactMessageController::class, 'feedbackIndex'])->name('contact.feedback');
route::get('/feedback/{id}', [ContactMessageController::class, 'show'])->name('contact.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get(
        '/dashboard',
        function () {
            return view('dashboard');
        }
    )->name('dashboard');
    // Route::resource('users', UserController::class);
    Route::resource('pickups', PickupController::class);

    Route::get('/velden', [VeldController::class, 'index'])->name('velden.index');
    Route::get('/velden/create', [VeldController::class, 'create'])->name('velden.create');
    Route::get('/velden/{veld}', [VeldController::class, 'show'])->name('velden.show');
    Route::get('/velden/{veld}/edit', [VeldController::class, 'edit'])->name('velden.edit');
    Route::post('/velden', [VeldController::class, 'store'])->name('velden.store');
    Route::put('/velden/{veld}', [VeldController::class, 'update'])->name('velden.update');
    Route::delete('/velden/{veld}', [VeldController::class, 'destroy'])->name('velden.destroy');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    //edit
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    //update
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::put('/users/{id}/changeRoles', [UserController::class, 'changeRoles'])->name('users.changeRoles');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::get('/permissions/{id}', [PermissionController::class, 'show'])->name('permissions.show');
    Route::get('/permissions/{id}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::post('/permissions', [PermissionController::class, 'store'])->name('permissions.store');
    Route::put('/permissions/{id}', [PermissionController::class, 'update'])->name('permissions.update');
    Route::delete('/permissions/{id}', [PermissionController::class, 'destroy'])->name('permissions.destroy');

    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::get('/roles/{id}', [RoleController::class, 'show'])->name('roles.show');
    Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::put('/roles/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::put('/roles/{id}/permissions/edit', [RoleController::class, 'permissionUpdate'])->name('roles.permissions.update');
    Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');

    Route::resource('events', EventController::class);

    Route::get('/locaties', [LocatieController::class, 'index'])->name('locaties.index');
    Route::get('/locaties/create', [LocatieController::class, 'create'])->name('locaties.create');
    Route::get('/locaties/{id}', [LocatieController::class, 'show'])->name('locaties.show');
    Route::get('/locaties/{id}/edit', [LocatieController::class, 'edit'])->name('locaties.edit');
    Route::post('/locaties', [LocatieController::class, 'store'])->name('locaties.store');
    Route::put('/locaties/{id}', [LocatieController::class, 'update'])->name('locaties.update');

    Route::delete('/locaties/{id}', [LocatieController::class, 'destroy'])->name('locaties.destroy');
    Route::get('/staffMembers', [StaffMemberController::class, 'index'])->name('staffMembers');
    Route::get('/staffMembers/create', [StaffMemberController::class, 'create'])->name('staff.create');
    Route::post('/staffMembers', [StaffMemberController::class, 'store'])->name('staff.store');
    Route::get('/staffMembers/{id}/edit', [StaffMemberController::class, 'edit'])->name('staff.edit');
    Route::put('/staffMembers/{id}', [StaffMemberController::class, 'update'])->name('staff.update');
    Route::delete('/staffMembers/{id}', [StaffMemberController::class, 'destroy'])->name('staff.destroy');

    Route::get('/noti', function () {

        $channelName = 'news';
        $user = Auth()->user()->notification_token;
        // dd($user);

        // You can quickly bootup an expo instance
        $expo = \ExponentPhpSDK\Expo::normalSetup();

        // Subscribe the recipient to the server
        $expo->subscribe($channelName, $user);

        // Build the notification data
        $notification = ['body' => 'Hello World!'];

        // Notify an interest with a notification
        $expo->notify([$channelName], $notification);
        return view('welcome');
    });
});
