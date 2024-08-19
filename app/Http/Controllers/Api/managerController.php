<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class managerController extends Controller
{
    // Get

    public function index($id_admin)
    {
        $manager = Manager::join('users', 'users.id_manager', '=', 'manager.id')
            ->where('users.id_admin', '=', $id_admin)
            ->orderBy('manager.id', 'asc')
            ->get();

        if (count($manager) == "0") {
            $manager = Manager::join('users', 'users.id_manager', '=', 'manager.id')
                ->where('users.id', '=', $id_admin)
                ->get();
        }

        $data = [
            'manager' => $manager,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getById($id)
    {
        $manager = Manager::join('users', 'users.id_manager', '=', 'manager.id')
        ->where('users.id', '=', $id)
        ->get();

        if (!$manager) {
            $data = [
                'message' => 'Manager not found',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'manager' => $manager,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    // Register

    public function save(Request $request)
    {
        $manager = Manager::create([
            'drink' => $request->drink,
            'drinkTherapist' => $request->drinkTherapist,
            'fixeDay' => $request->fixeDay,
            'others' => $request->others,
            'service' => $request->service,
            'tabacco' => $request->tabacco,
            'tip' => $request->tip,
            'vitamin' => $request->vitamin
        ]);

        return response()->json([
            'id' => $manager->id,
        ]);
    }

    // Update

    public function update(Request $request, $id)
    {
        $manager = Manager::find($id);

        if (!$manager) {
            $data = [
                'message' => 'Manager not found',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $manager->drink = $request->drink;
        $manager->drinkTherapist = $request->drinkTherapist;
        $manager->fixeDay = $request->fixeDay;
        $manager->others = $request->others;
        $manager->tip = $request->tip;
        $manager->service = $request->service;
        $manager->tabacco = $request->tabacco;
        $manager->vitamin = $request->vitamin;

        $manager->save();

        $data = [
            'message' => 'Updated manager',
            'manager' => $manager,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function updateActive(Request $request, $id)
    {
        $manager = Manager::find($id);

        if (!$manager) {
            $data = [
                'message' => 'Manager not found',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'active' => ''
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Data validation error',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $manager->active = $request->active;

        $manager->save();

        $data = [
            'message' => 'Updated manager',
            'manager' => $manager,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    // Delete

    public function destroy($id)
    {
        $manager = Manager::find($id);

        if (!$manager) {
            $data = [
                'message' => 'Manager not found',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $manager->delete();

        $data = [
            'message' => 'Manager removed',
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
