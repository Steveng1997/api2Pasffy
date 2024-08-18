<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Therapist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class therapistController extends Controller
{
    // Get

    public function index($id_admin)
    {
        $therapist = Therapist::where('id_admin', '=', $id_admin)
            ->orderBy('id', 'asc')
            ->get();

        $data = [
            'therapist' => $therapist,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getById($id)
    {
        $therapist = Therapist::find($id);

        if (!$therapist) {
            $data = [
                'message' => 'therapist no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'therapist' => $therapist,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByName($therapist, $id_admin)
    {
        $therapist = Therapist::where(['therapist' => $therapist, 'id_admin' => $id_admin])->get();

        if (!$therapist) {
            $data = [
                'message' => 'Terapeuta no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'therapist' => $therapist,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function orderDateEndDesc()
    {
        $therapist = Therapist::orderBy('dateEnds', 'desc')->get();

        $data = [
            'therapist' => $therapist,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function orderMinutes($id_admin)
    {
        $therapist = Therapist::where('id_admin', '=', $id_admin)
        ->orderBy('minutes', 'asc')
        ->get();

        $data = [
            'therapist' => $therapist,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function activeTrue()
    {
        $therapist = Therapist::where(['active' => '1'])->orderBy('id', 'asc')->get();

        if (!$therapist) {
            $data = [
                'message' => 'Therapist no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'therapist' => $therapist,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    // Register

    public function save(Request $request)
    {
        $therapist = Therapist::create([
            'active' => $request->active,
            'dateEnds' => $request->dateEnds,
            'drink' => $request->drink,
            'drinkTherapist' => $request->drinkTherapist,
            'exit' => $request->exit,
            'id_admin' => $request->id_admin,
            'minutes' => $request->minutes,
            'therapist' => $request->therapist,
            'others' => $request->others,
            'service' => $request->service,
            'tabacco' => $request->tabacco,
            'tip' => $request->tip,
            'vitamin' => $request->vitamin
        ]);

        if (!$therapist) {
            $data = [
                'message' => 'Error al crear la terapeuta',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'therapist' => $therapist,
            'status' => 201
        ];

        return response()->json($data, 201);
    }

    // Update

    public function update(Request $request, $id)
    {
        $therapist = Therapist::find($id);

        if (!$therapist) {
            $data = [
                'message' => 'Terapeuta no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'active' => '',
            'dateEnds' => '',
            'drink' => '',
            'drinkTherapist' => '',
            'exit' => '',
            'minutes' => '',
            'therapist' => '',
            'others' => '',
            'service' => '',
            'tabacco' => '',
            'tip' => '',
            'vitamin' => ''
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $therapist->active = $request->active;
        $therapist->dateEnds = $request->dateEnds;
        $therapist->drink = $request->drink;
        $therapist->drinkTherapist = $request->drinkTherapist;
        $therapist->exit = $request->exit;
        $therapist->minutes = $request->minutes;
        $therapist->therapist = $request->therapist;
        $therapist->others = $request->others;
        $therapist->service = $request->service;
        $therapist->tabacco = $request->tabacco;
        $therapist->tip = $request->tip;
        $therapist->vitamin = $request->vitamin;

        $therapist->save();

        $data = [
            'message' => 'Therapist actualizada',
            'therapist' => $therapist,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function update3Item(Request $request, $therapist)
    {
        $therapist = Therapist::where('therapist', $therapist)->first();

        if (!$therapist) {
            $data = [
                'message' => 'Terapeuta no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $therapist->dateEnds = $request->dateEnds;
        $therapist->exit = $request->exit;
        $therapist->minutes = $request->minutes;

        $therapist->save();

        $data = [
            'message' => 'Therapist actualizada',
            'therapist' => $therapist,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function updateItems($therapist)
    {
        $therapist = Therapist::where('therapist', $therapist)->update([
            'dateEnds' => null,
            'exit' => null,
            'minutes' => 0,
        ]);

        if ($therapist) {
            $data = [
                'message' => 'Therapist actualizada',
                'therapist' => $therapist,
                'status' => 200
            ];
        }

        return response()->json($data, 200);
    }

    public function updateMinutes(Request $request, $id)
    {
        $therapist = Therapist::find($id)->update([
            'minutes' => $request->input('minutes')
        ]);

        if ($therapist) {
            $data = [
                'message' => 'Therapist actualizada',
                'therapist' => $therapist,
                'status' => 200
            ];
        }

        return response()->json($data, 200);
    }

    // Delete

    public function destroy($id)
    {
        $therapist = Therapist::find($id);

        if (!$therapist) {
            $data = [
                'message' => 'Therapist no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $therapist->delete();

        $data = [
            'message' => 'Therapist eliminada',
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
