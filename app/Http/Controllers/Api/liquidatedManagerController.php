<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LiquidatedManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class liquidatedManagerController extends Controller
{
    public function index()
    {
        $liquidManager = LiquidatedManager::orderBy('id', 'desc')->get();

        if (!$liquidManager) {
            $data = [
                'message' => 'La liquidacion no fue encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'liquidManager' => $liquidManager,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByIdManager($idManag)
    {
        $liquidManager = LiquidatedManager::where('idManag', $idManag)->get();

        if (!$liquidManager) {
            $data = [
                'message' => 'La liquidacion no fue encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'liquidManager' => $liquidManager,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByManager($manager)
    {
        $liquidManager = LiquidatedManager::where('manager', $manager)->get();

        if (!$liquidManager) {
            $data = [
                'message' => 'La liquidacion no fue encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'liquidManager' => $liquidManager,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getDateCurrentDay($created_at)
    {
        $liquidManager = LiquidatedManager::whereDate('created_at', '=', Carbon::parse($created_at))->get();

        if (!$liquidManager) {
            $data = [
                'message' => 'La liquidacion no fue encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'liquidManager' => $liquidManager,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getDateTodayByManager($created_at, $manager)
    {
        $liquidManager = LiquidatedManager::where(['manager' => $manager])
            ->whereDate('created_at', '=', Carbon::parse($created_at))
            ->get();

        if (!$liquidManager) {
            $data = [
                'message' => 'La liquidacion no fue encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'liquidManager' => $liquidManager,
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
            'fixeDay' => '',
            'idManag' => '',
            'manager' => '',
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

        $liquidManager = LiquidatedManager::create([
            'amount' => $request->amount,
            'currentDate' => $request->currentDate,
            'dateStart' => $request->dateStart,
            'dateEnd' => $request->dateEnd,
            'fixeDay' => $request->fixeDay,
            'idManag' => $request->idManag,
            'manager' => $request->manager,
            'treatment' => $request->treatment,
            'uniqueId' => $request->uniqueId
        ]);

        if (!$liquidManager) {
            $data = [
                'message' => 'Error al crear la liquidación',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'liquidManager' => $liquidManager,
            'status' => 201
        ];

        return response()->json($data, 201);
    }

    // Update

    public function updateByManager(Request $request, $manager)
    {
        $liquidManager = LiquidatedManager::where('manager', $manager)->update([
            'idManag' => $request->input('idManag'),
        ]);

        if ($liquidManager) {
            $data = [
                'message' => 'La liquidacion fue actualizada',
                'liquidManager' => $liquidManager,
                'status' => 200
            ];
        }

        return response()->json($data, 200);
    }

    public function updateAmount(Request $request, $idManag)
    {
        $liquidManager = LiquidatedManager::where('idManag', $idManag)->update([
            'amount' => $request->input('amount'),
        ]);

        if ($liquidManager) {
            $data = [
                'message' => 'La liquidacion fue actualizada',
                'liquidManager' => $liquidManager,
                'status' => 200
            ];
        }

        return response()->json($data, 200);
    }

    public function updateAmountById(Request $request, $id)
    {
        $liquidManager = LiquidatedManager::find($id)->update([
            'amount' => $request->input('amount'),
        ]);

        if ($liquidManager) {
            $data = [
                'message' => 'La liquidacion fue actualizada',
                'liquidManager' => $liquidManager,
                'status' => 200
            ];
        }

        return response()->json($data, 200);
    }

    // Delete

    public function destroy($id)
    {
        $liquidManager = LiquidatedManager::find($id);

        if (!$liquidManager) {
            $data = [
                'message' => 'La liquidacion no fue encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $liquidManager->delete();

        $data = [
            'message' => 'La liquidacion fue eliminada',
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
