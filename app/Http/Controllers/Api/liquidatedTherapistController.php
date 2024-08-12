<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LiquidatedTherapist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class liquidatedTherapistController extends Controller
{
    public function index()
    {
        $liquidTherapist = LiquidatedTherapist::orderBy('id', 'desc')->get();

        if (!$liquidTherapist) {
            $data = [
                'message' => 'La liquidacion no fue encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'liquidTherapist' => $liquidTherapist,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByIdTherapist($idTherap)
    {
        $liquidTherapist = LiquidatedTherapist::where('idTherap', $idTherap)->get();

        if (!$liquidTherapist) {
            $data = [
                'message' => 'La liquidacion no fue encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'liquidTherapist' => $liquidTherapist,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByManagerAndTherapist($therapist, $manager)
    {
        $liquidTherapist = LiquidatedTherapist::where(['therapist' => $therapist, 'manager' => $manager])->orderBy('id', 'desc')->get();

        if (!$liquidTherapist) {
            $data = [
                'message' => 'La liquidacion no fue encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'liquidTherapist' => $liquidTherapist,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByManager($manager)
    {
        $liquidTherapist = LiquidatedTherapist::where(['manager' => $manager])->orderBy('id', 'desc')->get();

        if (!$liquidTherapist) {
            $data = [
                'message' => 'La liquidacion no fue encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'liquidTherapist' => $liquidTherapist,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByTherap($therapist)
    {
        $liquidTherapist = LiquidatedTherapist::where(['therapist' => $therapist])->orderBy('id', 'desc')->get();

        if (!$liquidTherapist) {
            $data = [
                'message' => 'La liquidacion no fue encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'liquidTherapist' => $liquidTherapist,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getDateCurrentDay($created_at)
    {
        $liquidTherapist = LiquidatedTherapist::whereDate('created_at', '=', Carbon::parse($created_at))
            ->orderBy('currentDate', 'desc')->get();

        if (!$liquidTherapist) {
            $data = [
                'message' => 'La liquidacion no fue encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'liquidTherapist' => $liquidTherapist,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getTodayDateAndManager($created_at, $manager)
    {
        $liquidTherapist = LiquidatedTherapist::where(['created_at' => $created_at, 'manager' => $manager])->orderBy('currentDate', 'desc')->get();

        if (!$liquidTherapist) {
            $data = [
                'message' => 'La liquidacion no fue encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'liquidTherapist' => $liquidTherapist,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    // Register

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => '',
            'currentDate' => '',
            'dateStart' => '',
            'dateEnd' => '',
            'idTherap' => '',
            'manager' => '',
            'payment' => '',
            'therapist' => '',
            'treatment' => '',
            'uniqueId' => ''
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $liquidTherapist = LiquidatedTherapist::create([
            'amount' => $request->amount,
            'currentDate' => $request->currentDate,
            'dateStart' => $request->dateStart,
            'dateEnd' => $request->dateEnd,
            'idTherap' => $request->idTherap,
            'manager' => $request->manager,
            'payment' => $request->payment,
            'therapist' => $request->therapist,
            'treatment' => $request->treatment,
            'uniqueId' => $request->uniqueId
        ]);

        if (!$liquidTherapist) {
            $data = [
                'message' => 'Error al crear la liquidación',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'liquidTherapist' => $liquidTherapist,
            'status' => 201
        ];

        return response()->json($data, 201);
    }

    // Update

    public function updateByTherapist(Request $request, $therapist)
    {
        $liquidTherapist = LiquidatedTherapist::where('therapist', $therapist)->update([
            'idTherap' => $request->input('idTherap'),
        ]);

        if ($liquidTherapist) {
            $data = [
                'message' => 'La liquidacion fue actualizada',
                'liquidTherapist' => $liquidTherapist,
                'status' => 200
            ];
        }

        return response()->json($data, 200);
    }

    public function updateAmount(Request $request, $idTherap)
    {
        $liquidTherapist = LiquidatedTherapist::where('idTherap', $idTherap)->update([
            'amount' => $request->input('amount'),
        ]);

        if ($liquidTherapist) {
            $data = [
                'message' => 'La liquidacion fue actualizada',
                'liquidTherapist' => $liquidTherapist,
                'status' => 200
            ];
        }

        return response()->json($data, 200);
    }

    public function updateAmountById(Request $request, $id)
    {
        $liquidTherapist = LiquidatedTherapist::find($id)->update([
            'amount' => $request->input('amount'),
        ]);

        if ($liquidTherapist) {
            $data = [
                'message' => 'La liquidacion fue actualizada',
                'liquidTherapist' => $liquidTherapist,
                'status' => 200
            ];
        }

        return response()->json($data, 200);
    }

    // Delete

    public function destroy($id)
    {
        $liquidTherapist = LiquidatedTherapist::find($id);

        if (!$liquidTherapist) {
            $data = [
                'message' => 'La liquidacion no fue encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $liquidTherapist->delete();

        $data = [
            'message' => 'La liquidacion fue eliminada',
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
