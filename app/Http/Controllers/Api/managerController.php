<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class managerController extends Controller
{
    // Get

    public function index()
    {
        $manager = Manager::orderBy('id', 'asc')->get();

        $data = [
            'manager' => $manager,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getById($id)
    {
        $manager = Manager::find($id);

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
        $validator = Validator::make($request->all(), [
            'drink' => '',
            'drinkTherapist' => '',
            'fixeDay' => '',
            'others' => '',
            'service' => '',
            'tabacco' => '',
            'tip' => '',
            'vitamin' => ''
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Data validation error',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

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

        if (!$manager) {
            $data = [
                'message' => 'Error al crear la encargada',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'manager' => $manager,
            'status' => 201
        ];

        return response()->json($data, 201);
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

        $validator = Validator::make($request->all(), [
            'drink' => '',
            'drinkTherapist' => '',
            'fixeDay' => '',
            'others' => '',
            'tip' => '',
            'service' => '',
            'tabacco' => '',
            'vitamin' => ''
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Data validation error',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
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