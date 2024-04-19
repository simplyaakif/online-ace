<?php

    use App\Http\Resources\CoursesCollection;
    use App\Models\Course;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;
    use Illuminate\Validation\ValidationException;
    use App\Models\User;

    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | is assigned the "api" middleware group. Enjoy building your API!
    |
    */

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
            return $request->user();
        });


//    App Authentication
    Route::post('/sanctum/token', function (Request $request) {
        $request->validate([
                               'email' => 'required|email',
                               'password' => 'required',
                               'device_name' => 'required',
                           ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                                                        'email' => ['The provided credentials are incorrect.'],
                                                    ]);
        }

        return $user->createToken($request->device_name)->plainTextToken;
    });


//2. All Courses
    Route::get('/courses', function () {
        return new CoursesCollection(Course::all());
    });

//3. Home
    Route::prefix('home')->group(function () {
        Route::get('active-courses', function () {
            return new CoursesCollection(Course::all());
        });
    });



//5. Student Profile
    Route::middleware('auth:sanctum')->get('/profile', function (Request $request) {
        return [
            "student"=>$request->user()->student,
            
        ];
    });




    Route::post('/tokens/create', function (Request $request) {
        $token = $request->user()->createToken($request->token_name);

        return ['token' => $token->plainTextToken];
    });
