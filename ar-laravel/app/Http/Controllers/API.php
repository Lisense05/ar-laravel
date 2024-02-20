<?php

namespace App\Http\Controllers;

use App\Models\AdminDuty;
use App\Models\AdminReports;
use App\Models\OwnedVehicles;
use App\Models\Players;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class API extends Controller
{
    function getAllUsers() {
        $users = User::all();
        return response()->json($users,200);
    }

    public function getUserById(Request $request, $id)
    {

        $user = User::find($id);
        if (!$user) {

            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json([$user], 200);
    }

    function updateUserById(Request $request, $id) {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        try {
            $request->validate([
                'name' => [ 'string', 'max:255'],
                'email' => ['string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password' => [ Rules\Password::defaults()],
            ]);
            if ($request->filled('name')) {
                $user->name = $request->name;
            }
        
            if ($request->filled('email')) {
                $user->email = $request->email;
            }
        
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
            $user->save();
            return response()->json(['message' => 'User updated'], 200);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);;
        }
        
    }

    function registerUser(Request $request) {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required',  Rules\Password::defaults()],
            ]);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'api_token' => Str::random(60),
            ]);
            event(new Registered($user));
            return response()->json(['message' => 'User created'], 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);;
        }
    }

    function deleteUserById(Request $request, $id) {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $user->delete();
        return response()->json(['message' => 'User deleted'], 200);
    }

    function getAdminDuty(Request $request, $identifier) {
        if (AdminDuty::where('identifier', $identifier)->doesntExist()) {
            return response()->json(['message' => 'Identifier not found'], 404);
        }

        $rules = [
            'startdate' => 'required|integer', 
            'enddate' => 'required|integer', 
        ];
    
        
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        $startDate = $request->startdate;
        $endDate = $request->enddate;

        if ($startDate === $endDate) {
            if (date('Y-m-d',$startDate) == date('Y-m-d',strtotime(('today')))) {
                $startDate -= 86400;
            } else {
                $endDate += 86400;
            }
            
        }
        try {
            
            $data = AdminDuty::where('identifier', $identifier)
            ->whereBetween('savedate', [$startDate, $endDate])
            ->get();
            if ($data->isEmpty()) {
                return response()->json(['message' => 'No data found for the provided identifier and date range'], 404);
            }
            return response()->json($data, 200);
        } catch(ModelNotFoundException $e) {
            return response()->json(['message' => 'Identifier not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred'], 500);
        }

        
    }
    function getAdminReports(Request $request, $identifier) {
        if (AdminReports::where('identifier', $identifier)->doesntExist()) {
            return response()->json(['message' => 'Identifier not found'], 404);
        }
        $reports = AdminReports::where('identifier', $identifier)->get();
        return response()->json($reports, 200);

    }

    function getPlayer(Request $request, $identifier) {
        $player = Players::where('identifier', $identifier)->with('vehicles')
        ->with('contacts')
        ->with('lottery')->first();
        if (!$player) {
            return response()->json(['message' => 'Player not found'], 404);
        }
        return response()->json($player, 200);
    }

    function getCar(Request $request, $plate) {
        $car = OwnedVehicles::where('plate', $plate)->first();
        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }
        return response()->json($car, 200);
    }

}
