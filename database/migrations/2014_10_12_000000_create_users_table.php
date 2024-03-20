<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->char('username');
            $table->char('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->char('alamat');
            $table->char('namalengkap');
            $table->char('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};




// <?php    (LoginController.php)

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class LoginController extends Controller
// {
//     public function index()
//     {
//         return view('Login.Index');
//     }

//     public function authenticate(Request $request)
//     {
//         $credentials = $request->validate([
//             'email' => 'required|email',
//             'password' => 'required'
//         ]);

//         if (Auth::attempt($credentials)) {
//             $request->session()->regenerate();

//             return redirect()->intended('/dashboard/home');
//         }

//         return back()->with('error', 'Login Failed!');
//     }


//     public function logout()
//     {
//         Auth::logout();

//         request()->session()->invalidate();
//         request()->session()->regenerateToken();

//         return redirect('/login');
//     }
// }




// <?php  (PhotoController.php)

// namespace App\Http\Controllers;

// use App\Models\Photo;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Storage;

// class PhotoController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     {
//         return view('Dashboard.Photos.Data', [
//             'photos' => Photo::all()
//         ]);
//     }

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         return view('Dashboard.Photos.Create');
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         $validatedData = $request->validate([
//             'image' => 'required|file|image|max:2048',
//             'judulFoto' => 'required',
//             'deskripsiFoto' => 'required'
//         ]);

//         if ($request->file('image')) {
//             $validatedData['image'] = $request->file('image')->store('images');
//         }

//         Photo::create($validatedData);

//         return redirect('dashboard/photos')->with('created', 'Gallery Created!');
//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show(Photo $photo)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(Photo $photo)
//     {
//         return view('Dashboard.Photos.Edit', [
//             'photo' => $photo
//         ]);
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, Photo $photo)
//     {
//         $rules = [
//             'image' => 'file|image|max:2048',
//             'judulFoto' => 'required',
//             'deskripsiFoto' => 'required'
//         ];

//         $validatedData = $request->validate($rules);

//         if ($request->file('image')) {
//             if ($request->oldImage) {
//                 Storage::delete($request->oldImage);
//             }
//             $validatedData['image'] = $request->file('image')->store('images');
//         };

//         Photo::where('id', $photo->id)->update($validatedData);

//         return redirect('dashboard/photos')->with('updated', 'Gallery Updated!');
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(Photo $photo)
//     {
//         if ($photo->image) {
//             Storage::delete($photo->image);
//         }

//         Photo::destroy($photo->id);

//         return redirect('dashboard/photos')->with('deleted', 'Gallery Deleted!');
//     }
// }




// <?php  (RegisterController.php)

// namespace App\Http\Controllers;

// use App\Models\User;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash;

// class RegisterController extends Controller
// {
//     public function index()
//     {
//         return view('Register.Index');
//     }

//     public function store(Request $request)
//     {
//         $validatedData = $request->validate([
//             'username' => 'required|max:255',
//             'email' => 'required|email|unique:users',
//             'alamat' => 'required|max:255',
//             'namalengkap' => 'required|max:255',
//             'password' => 'required|min:3'
            
//         ]);

//         $validatedData['password'] = Hash::make($validatedData['password']);

//         User::create($validatedData);

//         return redirect('/login')->with('loginSuccess', 'Register Berhasil, Silahkan Login');
//     }
// }