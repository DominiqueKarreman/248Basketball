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
    $players = [
        [
            "name" => "Ayoub",
            "image" => "/images/DSC09967.jpg",
            "description" => "Mijn ervaring met de 24/8 programme is fantastisch. Ik heb de kans om elke dag binnen te Basketballen en ik ben omringd met de leukste mensen. De trainingen zijn goed er wordt meer dan voldoende aandacht gegeven aan de groep en individu. ⭐️⭐️⭐️⭐️⭐️"
        ],
        [
            "name" => "Romello",
            "image" => "http://www.248basketball.nl/wp-content/uploads/2021/06/IMG_0731-scaled.jpg",
            "description" => "Ik heb ongeveer anderhalf jaar ervaring met 24/8 en ik kan met volle overtuiging zeggen dat mijn vaardigheden als basketbal speler een nieuw niveau hebben bereikt. De trainers/oprichters Denzel en Jorg zijn ervaren spelers/coaches met een harde work ethic en passie voor het spel. Basketbal terzijde zijn ze super down to earth en vriendelijk. 24/8 is de place to be om jouw game te verbeteren."
        ],
        [
            "name" => "Kristo",
            "image" => "http://www.248basketball.nl/wp-content/uploads/2021/06/IMG_0720-scaled.jpg",
            "description" => "Bij 248 voel ik me thuis en ben ik veel gegroeid on en Off the court. Off the court heb ik meer ordening in mijn leven en on the court heb ik veel meer geleerd over de game skill wise, maar ook hoe beter te spelen met mijn team."
        ],
        [
            "name" => "Evandro",
            "image" => "http://www.248basketball.nl/wp-content/uploads/2023/01/IMG_2951-scaled.jpg",
            "description" => "Sinds ik lid ben van 24/8 heb ik meer geleerd in een aantal maanden dan in de hele 2 jaar dat ik basketbal. Wat ik zelf het beste vind aan de program is dat ik zelf ook zoveel uren als mogelijk de voorzieningen kan gebruiken. Ik vind het erg fijn om omringd te zijn met mensen die allemaal hetzelfde doel hebben. Zo pushen wij elkaar ook om de beste versie van onszelf te zijn. De 24/8 program is ver boven mijn verwachtingen gegaan en ik merk de resultaten ook echt. Deelnemers worden van 24/8 is het voor mij dus ook echt waard en de beste keus die ik kon maken."
        ],
        [
            "name" => "Jonah",
            "image" => "http://www.248basketball.nl/wp-content/uploads/2023/01/WhatsApp-Image-2023-01-03-at-09.01.34-225x300.jpeg",
            "description" => "Ik ben Jonah ik wil een professionele basketbal speler worden. Ik zit nu ongeveer 3 maanden bij de programme, In die 3 maanden heb ik erg veel geleerd de trainers zijn aardig en supportive en zullen jou echt helpen om op hoger niveau te komen. Niet alleen vind ik de trainingen leuk maar de spelers ook, 248 basketbal is niet alleen basketbal vereneging maar het is ook een familie."
        ],
        [
            "name" => "Jayden",
            "image" => "http://www.248basketball.nl/wp-content/uploads/2021/06/IMG_0713-2-scaled.jpg",
            "description" => "Ik ga zo vaak als ik kan naar 248 om te trainen. We oefenen schieten, dribbelen en ook kracht. Het is een leuke groep om je game te verbeteren en eerlijk gezegd zou ik niet zien waarom je niet zou gaan."
        ]
    ];
    return view("guestViews.programme", ["spelers" => $players]);
})->name("programme.join");
Route::get('/skillsTrainingen', function () {
    return view("guestViews.skills");
})->name("programme.skills");
Route::get('/about', function () {
    return view("guestViews.about");
})->name("guestViews.about");
Route::get('/stage', function () {
    $stagairs = [
        [
            "name" => "Tiziano Antonio
            ",
            "image" => "/images/tizi.jpg",
            "description" => "Ik doe Sport en Bewegen op ROC Almere Poort. Binnen 248 help ik met trainingen geven en het opzetten van evenementen. Ik vind het een leuke en leerzame stage. Deze stageplek zou ik zeker aanraden voor mensen die van basketbal houden en die passie willen delen."
        ],
        [
            "name" => "Alpy Wendwesan",
            "image" => "/images/alpy.jpg",
            "description" => " Hoi, ik ben Alperazim Wendwesan. Ik zit nu op het Baken Park Lyceum in Almere, ik doe havo 5 met een n/g profiel. Als stage help ik mee met toernooien onderhouden of helpen met clinics, trainingen geven. Ik train ook bij 24/8 Basketbal voor mij is het heel erg leuk om altijd omringd te zijn met een basketbal cultuur wat 24/8 heeft. 24/8 begint in mijn mening ook wel langzaam de kern van basketbal beginnen te worden in Almere. Het is ook leuk om iedereen te zien spelen en beïnvloed zijn met basketbal. Mijn favoriete evenement was het 3×3 toernooi in Almere Centrum. Het was als het ware dat een van mijn dromen uitkwam. "
        ],
        [
            "name" => "Dayvinn Jansen",
            "image" => "/images/dayvin.jpeg",
            "description" => "Mijn naam is Dayvinn Jansen. Ik heb hier stage gelopen vanuit mijn school ROC Almere Poort. Opleiding: sport en bewegen.
            De reden dat ik bij 24/8 Basketball mijn stage wilden lopen is omdat ik zelf een basketballer ben en het spel heel leuk en interessant vind zowel Theoretisch als praktisch.
            Ik heb hier een hoop geleerd over het organiseren van verschillende evenementen, lesgeven aan verschillende leeftijdsgroepen en plannen.
            Ik heb het echt naar me zin gehad met de hele 24/8 crew met een hele fijne begeleiding.
            Heel professioneel.
             Ik raad dit iedereen die van basketbal houd aan."
        ],
        [
            "name" => "Ramon Klop",
            "image" => "/images/ramon.jpeg",
            "description" => " Ik ben Ramon Klop uit Lelystad. Ik doe de opleiding sport en bewegen en loop stage bij 24/8. Ik loop hier stage omdat ik de amerikaanse sporten altijd al leuk heb gevonden. Ik kom zelf uit de American football en wou me ook graag verdiepen in het basketball. Wat ik leuk vind aan het stage lopen bij 24/8 is dat iedereen die hier komt goed gemotiveerd is om beter te worden in de sport. verder hebben wij als stagaires veel vrijheid om zelf dingen te ondernemen."
        ],

    ];
    return view("guestViews.stage", ["stagairs" => $stagairs]);
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
