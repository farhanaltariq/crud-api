<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ApiPassportAuthController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $token = $user->createToken('Laravel-9-Passport-Auth')->accessToken;

        return response(['token' => $token]);
    }
    public function login()
    {
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $response['status'] = true;
            $response['message'] = 'Berhasil login';
            $response['data']['token'] = 'Bearer ' . $user->createToken('LawanKovid')->accessToken;

            return response()->json($response, 200);
        }else{
            $response['status'] = false;
            $response['message'] = 'Unauthorized';

            return response()->json($response, 401);
        }

    }
    public function info($id){
        $user = User::where('id', $id)->first();
        return response()->json(['user' => $user], 200);
    }
}
