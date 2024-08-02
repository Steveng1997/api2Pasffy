<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Therapist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class therapistController extends Controller
{
    // Get

    public function index()
    {
        $therapist = Therapist::orderBy('id', 'asc')->get();

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

    public function getByName($name)
    {
        $therapist = Therapist::where('name', $name)->get();

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
        $therapist = Therapist::orderBy('dateEnd', 'desc')->get();

        $data = [
            'therapist' => $therapist,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function orderMinutes()
    {
        $therapist = Therapist::orderBy('minutes', 'desc')->get();

        $data = [
            'therapist' => $therapist,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByCompany($company)
    {
        $therapist = Therapist::where('company', $company)->orderBy('id', 'asc')->get();

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

    public function getByCompanyOrderByMinutes($company)
    {
        $therapist = Therapist::where('company', $company)->orderBy('minutes', 'desc')->get();

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

    public function getByCompanyAndActive($company)
    {
        $therapist = Therapist::where(['company' => $company, 'active' => '1'])->orderBy('id', 'asc')->get();

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
            'company' => $request->company,
            'dateEnd' => $request->dateEnd,
            'drink' => $request->drink,
            'drinkTherapist' => $request->drinkTherapist,
            'exit' => $request->exit,
            'minutes' => $request->minutes,
            'name' => $request->name,
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
            'company' => '',
            'dateEnd' => '',
            'drink' => '',
            'drinkTherapist' => '',
            'exit' => '',
            'minutes' => '',
            'name' => '',
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
        $therapist->company = $request->company;
        $therapist->dateEnd = $request->dateEnd;
        $therapist->drink = $request->drink;
        $therapist->drinkTherapist = $request->drinkTherapist;
        $therapist->exit = $request->exit;
        $therapist->minutes = $request->minutes;
        $therapist->name = $request->name;
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

    public function update3Item(Request $request, $name)
    {
        $therapist = Therapist::where('name', $name)->first();

        if (!$therapist) {
            $data = [
                'message' => 'Terapeuta no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'dateEnd' => '',
            'exit' => '',
            'minutes' => ''
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $therapist->dateEnd = $request->dateEnd;
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

    public function updateItems(Request $request, $name)
    {
        $therapist = Therapist::where('name', $name)->update([
            'dateEnd' => $request->input('dateEnd'),
            'exit' => $request->input('exit'),
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
