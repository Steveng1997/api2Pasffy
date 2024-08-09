<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class serviceController extends Controller
{
    // Get

    public function index()
    {
        $service = Service::all()->sortByDesc('currentDate');

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByTherapistAndManagerNotLiquidatedTherapist($therapist, $manager)
    {
        $service = Service::where(['therapist' => $therapist, 'manager' => $manager, 'liquidatedTherapist' => '0'])->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByTherapistNotLiquidatedTherapist($therapist)
    {
        $service = Service::where(['therapist' => $therapist, 'liquidatedTherapist' => '0'])->orderBy('id', 'desc')->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByManagerNotLiquidatedManager($manager)
    {
        $service = Service::where(['manager' => $manager, 'liquidatedManager' => '0'])->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByManagerCurrentDateDesc($manager)
    {
        $service = Service::where('manager', $manager)->orderBy('currentDate', 'desc')->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByLiquidateTherapistFalse()
    {
        $service = Service::where('liquidatedTherapist', '0')->orderBy('currentDate', 'desc')->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByLiquidateManagerFalse()
    {
        $service = Service::where('liquidatedManager', '0')->orderBy('currentDate', 'desc')->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByIdTherapist($idTherap)
    {
        $service = Service::where('idTherap', $idTherap)->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByIdManager($idManag)
    {
        $service = Service::where('idManag', $idManag)->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getById($id)
    {
        $service = Service::find($id);

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByIdEditTrue($id)
    {
        $service = Service::where(['id' => $id, 'edit' => '1'])->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByTherapistIdAsc($therapist)
    {
        $service = Service::where('therapist', $therapist)->orderBy('id', 'asc')->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByTherapistIdDesc($therapist)
    {
        $service = Service::where('therapist', $therapist)->orderBy('id', 'desc')->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByTherapist($therapist)
    {
        $service = Service::where('therapist', $therapist)->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByManager($manager)
    {
        $service = Service::where('manager', $manager)->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByManagerAndNotLiquidatedTherapist($manager)
    {
        $service = Service::where(['manager' => $manager, 'liquidatedTherapist' => '0'])->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByManagerAndNotLiquidatedManagerTodayDateDesc($manager)
    {
        $service = Service::where(['manager' => $manager, 'liquidatedManager' => '0'])->orderBy('dateToday', 'desc')->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByManagerAndNotLiquidatedTherapistTodayDateDesc($manager)
    {
        $service = Service::where(['manager' => $manager, 'liquidatedTherapist' => '0'])->orderBy('dateToday', 'desc')->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByManagerAndNotLiquidatedManagerTodayDateAsc($manager)
    {
        $service = Service::where(['manager' => $manager, 'liquidatedManager' => '0'])->orderBy('dateToday', 'asc')->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByManagerAndNotLiquidatedTherapistTodayDateAsc($manager)
    {
        $service = Service::where(['manager' => $manager, 'liquidatedTherapist' => '0'])->orderBy('dateToday', 'asc')->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByTherapistAndManagerAndNotLiquidatedTherapistCurrentDateAsc($therapist, $manager)
    {
        $service = Service::where(['therapist' => $therapist, 'manager' => $manager, 'liquidatedTherapist' => '0'])->orderBy('dateStart', 'asc')->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByTherapistAndManagerAndLiquidatedTherapistCurrentDateAsc($therapist, $manager)
    {
        $service = Service::where(['therapist' => $therapist, 'manager' => $manager, 'liquidatedTherapist' => '1'])->orderBy('currentDate', 'asc')->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByManagerAndLiquidatedManagerCurrentDateAsc($manager)
    {
        $service = Service::where(['manager' => $manager, 'liquidatedManager' => '1'])->orderBy('currentDate', 'asc')->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByManagerAndNotLiquidatedManagerIdDesc($manager)
    {
        $service = Service::where(['manager' => $manager, 'liquidatedManager' => '0'])->orderBy('id', 'desc')->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByManagerAndNotLiquidatedManagerCurrentDateAsc($manager)
    {
        $service = Service::where(['manager' => $manager, 'liquidatedManager' => '0'])->orderBy('currentDate', 'asc')->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByTherapistAndManagerAndNotLiquidatedTherapistCurrentDateDesc($therapist, $manager)
    {
        $service = Service::where(['therapist' => $therapist, 'manager' => $manager, 'liquidatedTherapist' => '0'])->orderBy('currentDate', 'desc')->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByTherapistAndManagerAndLiquidatedTherapistCurrentDateDesc($therapist, $manager)
    {
        $service = Service::where(['therapist' => $therapist, 'manager' => $manager, 'liquidatedTherapist' => '1'])->orderBy('currentDate', 'desc')->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByManagerAndLiquidatedManagerCurrentDateDesc($manager)
    {
        $service = Service::where(['manager' => $manager, 'liquidatedManager' => '1'])->orderBy('currentDate', 'desc')->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByTherapistCurrentDateDesc($therapist)
    {
        $service = Service::where('therapist', $therapist)->orderBy('currentDate', 'desc')->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByManagerAndNotLiquidatedManager($manager)
    {
        $service = Service::where(['manager' => $manager, 'liquidatedManager' => '0'])->orderBy('currentDate', 'desc')->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByManagerIdAsc($manager)
    {
        $service = Service::where('manager', $manager)->orderBy('id', 'asc')->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByManagerIdDesc($manager)
    {
        $service = Service::where('manager', $manager)->orderBy('id', 'desc')->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByDateDayAndCompantCurrentDateDesc($dateToday, $company)
    {
        $service = Service::where(['company' => $company])
            ->whereDate('dateToday', '=', Carbon::parse($dateToday))
            ->orderBy('currentDate', 'desc')
            ->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByUniqueIdDesc($uniqueId)
    {
        $service = Service::where('uniqueId', $uniqueId)->orderBy('id', 'desc')->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByTherapistAndManagerAndCompany($therapist, $manager, $dateStart, $dateEnd, $company)
    {
        $fromDate = $dateStart;
        $toDate = $dateEnd;

        $service = Service::where(['therapist' => $therapist, 'manager' => $manager, 'liquidatedTherapist' => '0', 'company' => $company])
            ->whereRaw("(dateStart >= ? AND dateEnd <= ?)", [$fromDate, $toDate])
            ->orderBy('id', 'desc')
            ->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByManagerAndDateStartAndDateEndAndCompany($manager, $dateStart, $dateEnd, $company)
    {
        $fromDate = $dateStart;
        $toDate = $dateEnd;

        $service = Service::where(['manager' => $manager, 'liquidatedManager' => '0', 'company' => $company])
            ->whereRaw("(dateStart >= ? AND dateEnd <= ?)", [$fromDate, $toDate])
            ->orderBy('id', 'desc')
            ->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByTodayDateAndManagerAndCompanyCurrentDateDesc($dateToday, $manager, $company)
    {
        $service = Service::where(['manager' => $manager, 'company' => $company])
            ->whereDate('dateToday', '=', Carbon::parse($dateToday))
            ->orderBy('currentDate', 'desc')
            ->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getLikePayment($payment)
    {
        $service = Service::orWhere('payment', 'like', "%{$payment}%")->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByTodayDateAndTherapistAndCompany($dateToday, $therapist, $company)
    {
        $service = Service::where(['therapist' => $therapist, 'company' => $company])
            ->whereDate('dateToday', '=', Carbon::parse($dateToday))
            ->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByTodayDateAndManagerAndCompany($dateToday, $manager, $company)
    {
        $service = Service::where(['manager' => $manager, 'company' => $company])
            ->whereDate('dateToday', '=', Carbon::parse($dateToday))
            ->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByTodayDateAndManagerAndCompanyDistinctTherapist($dateToday, $manager, $company)
    {
        $service = Service::where(['manager' => $manager, 'company' => $company])
            ->whereDate('dateToday', '=', Carbon::parse($dateToday))
            ->distinct('therapist')
            ->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getByTodayDateAndTherapistAndManagerAndCompany($dateToday, $therapist, $manager, $company)
    {
        $service = Service::where(['therapist' => $therapist, 'manager' => $manager, 'company' => $company])
            ->whereDate('dateToday', '=', Carbon::parse($dateToday))
            ->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function getCompany($company)
    {
        $service = Service::where(['company' => $company])->get();

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    // Register

    public function save(Request $request)
    {
        $service = Service::create([
            'bizuManager' => $request->bizuManager,
            'bizuDriverTaxi' => $request->bizuDriverTaxi,
            'bizuFloor1' => $request->bizuFloor1,
            'bizuFloor2' => $request->bizuFloor2,
            'bizuTherapist' => $request->bizuTherapist,
            'cardManager' => $request->cardManager,
            'cardDriverTaxi' => $request->cardDriverTaxi,
            'cardFloor1' => $request->cardFloor1,
            'cardFloor2' => $request->cardFloor2,
            'cardTherapist' => $request->cardTherapist,
            'cashManager' => $request->cashManager,
            'cashDriverTaxi' => $request->cashDriverTaxi,
            'cashFloor1' => $request->cashFloor1,
            'cashFloor2' => $request->cashFloor2,
            'cashTherapist' => $request->cashTherapist,
            'closing' => $request->closing,
            'client' => $request->client,
            'company' => $request->company,
            'createdBy' => $request->createdBy,
            'currentDate' => $request->currentDate,
            'dateStart' => $request->dateStart,
            'dateEnd' => $request->dateEnd,
            'dateToday' => $request->dateToday,
            'drink' => $request->drink,
            'drinkTherapist' => $request->drinkTherapist,
            'edit' => $request->edit,
            'exit' => $request->exit,
            'idClosing' => $request->idClosing,
            'idManag' => $request->idManag,
            'idTherap' => $request->idTherap,
            'liquidatedManager' => $request->liquidatedManager,
            'liquidatedTherapist' => $request->liquidatedTherapist,
            'manager' => $request->manager,
            'minutes' => $request->minutes,
            'modifiedBy' => $request->modifiedBy,
            'note' => $request->note,
            'numberManager' => $request->numberManager,
            'numberTaxi' => $request->numberTaxi,
            'numberFloor1' => $request->numberFloor1,
            'numberFloor2' => $request->numberFloor2,
            'numberTherapist' => $request->numberTherapist,
            'others' => $request->others,
            'payment' => $request->payment,
            'screen' => $request->screen,
            'service' => $request->service,
            'tabacco' => $request->tabacco,
            'taxi' => $request->taxi,
            'therapist' => $request->therapist,
            'tip' => $request->tip,
            'totalService' => $request->totalService,
            'transactionManager' => $request->transactionManager,
            'transactionDriverTaxi' => $request->transactionDriverTaxi,
            'transactionFloor1' => $request->transactionFloor1,
            'transactionFloor2' => $request->transactionFloor2,
            'transactionTherapist' => $request->transactionTherapist,
            'uniqueId' => $request->uniqueId,
            'valueBizuManager' => $request->valueBizuManager,
            'valueBizuTherapist' => $request->valueBizuTherapist,
            'valueBizum' => $request->valueBizum,
            'valueEfectManager' => $request->valueEfectManager,
            'valueEfectTherapist' => $request->valueEfectTherapist,
            'valueCash' => $request->valueCash,
            'valueFloor1Bizum' => $request->valueFloor1Bizum,
            'valueFloor1Cash' => $request->valueFloor1Cash,
            'valueFloor1Card' => $request->valueFloor1Card,
            'valueFloor1Transaction' => $request->valueFloor1Transaction,
            'valueFloor2Bizum' => $request->valueFloor2Bizum,
            'valueFloor2Cash' => $request->valueFloor2Cash,
            'valueFloor2Card' => $request->valueFloor2Card,
            'valueFloor2Transaction' => $request->valueFloor2Transaction,
            'valueCardManager' => $request->valueCardManager,
            'valueCardTherapist' => $request->valueCardTherapist,
            'valueCard' => $request->valueCard,
            'valueTransaction' => $request->valueTransaction,
            'valueTransactionManager' => $request->valueTransactionManager,
            'valueTransactionTherapist' => $request->valueTransactionTherapist,
            'vitamin' => $request->vitamin
        ]);

        if (!$service) {
            $data = [
                'message' => 'Error al crear el servicio',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'service' => $service,
            'status' => 201
        ];

        return response()->json($data, 201);
    }

    // Update

    public function update(Request $request, $id)
    {
        $service = Service::find($id);

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $service->bizuManager = $request->bizuManager;
        $service->bizuDriverTaxi = $request->bizuDriverTaxi;
        $service->bizuFloor1 = $request->bizuFloor1;
        $service->bizuFloor2 = $request->bizuFloor2;
        $service->bizuTherapist = $request->bizuTherapist;
        $service->cardManager = $request->cardManager;
        $service->cardDriverTaxi = $request->cardDriverTaxi;
        $service->cardFloor1 = $request->cardFloor1;
        $service->cardFloor2 = $request->cardFloor2;
        $service->cardTherapist = $request->cardTherapist;
        $service->cashManager = $request->cashManager;
        $service->cashDriverTaxi = $request->cashDriverTaxi;
        $service->cashFloor1 = $request->cashFloor1;
        $service->cashFloor2 = $request->cashFloor2;
        $service->cashTherapist = $request->cashTherapist;
        $service->closing = $request->closing;
        $service->client = $request->client;
        $service->company = $request->company;
        $service->createdBy = $request->createdBy;
        $service->currentDate = $request->currentDate;
        $service->dateStart = $request->dateStart;
        $service->dateEnd = $request->dateEnd;
        $service->dateToday = $request->dateToday;
        $service->drink = $request->drink;
        $service->drinkTherapist = $request->drinkTherapist;
        $service->edit = $request->edit;
        $service->exit = $request->exit;
        $service->idClosing = $request->idClosing;
        $service->idManag = $request->idManag;
        $service->idTherap = $request->idTherap;
        $service->liquidatedManager = $request->liquidatedManager;
        $service->liquidatedTherapist = $request->liquidatedTherapist;
        $service->manager = $request->manager;
        $service->minutes = $request->minutes;
        $service->modifiedBy = $request->modifiedBy;
        $service->note = $request->note;
        $service->numberManager = $request->numberManager;
        $service->numberTaxi = $request->numberTaxi;
        $service->numberFloor1 = $request->numberFloor1;
        $service->numberFloor2 = $request->numberFloor2;
        $service->numberTherapist = $request->numberTherapist;
        $service->others = $request->others;
        $service->payment = $request->payment;
        $service->screen = $request->screen;
        $service->service = $request->service;
        $service->tabacco = $request->tabacco;
        $service->taxi = $request->taxi;
        $service->therapist = $request->therapist;
        $service->tip = $request->tip;
        $service->totalService = $request->totalService;
        $service->transactionManager = $request->transactionManager;
        $service->transactionDriverTaxi = $request->transactionDriverTaxi;
        $service->transactionFloor1 = $request->transactionFloor1;
        $service->transactionFloor2 = $request->transactionFloor2;
        $service->transactionTherapist = $request->transactionTherapist;
        $service->uniqueId = $request->uniqueId;
        $service->valueBizuManager = $request->valueBizuManager;
        $service->valueBizuTherapist = $request->valueBizuTherapist;
        $service->valueBizum = $request->valueBizum;
        $service->valueEfectManager = $request->valueEfectManager;
        $service->valueEfectTherapist = $request->valueEfectTherapist;
        $service->valueCash = $request->valueCash;
        $service->valueFloor1Bizum = $request->valueFloor1Bizum;
        $service->valueFloor1Cash = $request->valueFloor1Cash;
        $service->valueFloor1Card = $request->valueFloor1Card;
        $service->valueFloor1Transaction = $request->valueFloor1Transaction;
        $service->valueFloor2Bizum = $request->valueFloor2Bizum;
        $service->valueFloor2Cash = $request->valueFloor2Cash;
        $service->valueFloor2Card = $request->valueFloor2Card;
        $service->valueFloor2Transaction = $request->valueFloor2Transaction;
        $service->valueCardManager = $request->valueCardManager;
        $service->valueCardTherapist = $request->valueCardTherapist;
        $service->valueCard = $request->valueCard;
        $service->valueTransaction = $request->valueTransaction;
        $service->valueTransactionManager = $request->valueTransactionManager;
        $service->valueTransactionTherapist = $request->valueTransactionTherapist;
        $service->vitamin = $request->vitamin;

        $service->save();

        $data = [
            'message' => 'El servicio fue actualizado correctamente!',
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function updateAmountsById($id)
    {
        $service = Service::find($id)->update([
            'numberFloor1' => 0,
            'numberTherapist' => 0,
            'tip' => 0,
            'service' => 0,
            'totalService' => 0,
            'minutes' => 0
        ]);

        if ($service) {
            $data = [
                'message' => 'El servicio fue actualizado correctamente!',
                'service' => $service,
                'status' => 200
            ];
        }

        return response()->json($data, 200);
    }

    public function updateNumberFloor1($uniqueId)
    {
        $service = Service::where('uniqueId', $uniqueId)->update([
            'numberFloor1' => 0
        ]);

        if ($service) {
            $data = [
                'message' => 'El servicio fue actualizado correctamente!',
                'service' => $service,
                'status' => 200
            ];
        }

        return response()->json($data, 200);
    }

    public function updateValues($id)
    {
        $service = Service::find($id)->update([
            'valueFloor1Cash' => 0,
            'valueFloor1Bizum' => 0,
            'valueFloor1Card' => 0,
            'valueFloor1Transaction' => 0,
            'valueFloor2Cash' => 0,
            'valueFloor2Bizum' => 0,
            'valueFloor2Card' => 0,
            'valueFloor2Transaction' => 0
        ]);

        if ($service) {
            $data = [
                'message' => 'El servicio fue actualizado correctamente!',
                'service' => $service,
                'status' => 200
            ];
        }

        return response()->json($data, 200);
    }

    public function updateNumberFloor1ById(Request $request, $id)
    {
        $service = Service::find($id)->update([
            'numberFloor1' => $request->input('numberFloor1'),
        ]);

        if ($service) {
            $data = [
                'message' => 'El servicio fue actualizado correctamente!',
                'service' => $service,
                'status' => 200
            ];
        }

        return response()->json($data, 200);
    }

    public function updateNumberFloor2ZeroById($id)
    {
        $service = Service::find($id)->update([
            'numberFloor2' => 0,
        ]);

        if ($service) {
            $data = [
                'message' => 'El servicio fue actualizado correctamente!',
                'service' => $service,
                'status' => 200
            ];
        }

        return response()->json($data, 200);
    }

    public function updateNumberFloor2ByUniqueId(Request $request, $uniqueId)
    {
        $service = Service::where('uniqueId', $uniqueId)->update([
            'numberFloor2' => $request->input('numberFloor2'),
        ]);

        if ($service) {
            $data = [
                'message' => 'El servicio fue actualizado correctamente!',
                'service' => $service,
                'status' => 200
            ];
        }

        return response()->json($data, 200);
    }

    public function updateLiquidatedTherapist(Request $request, $id)
    {
        $service = Service::find($id)->update([
            'liquidatedTherapist' => 1,
            'idTherap' => $request->input('idTherap')
        ]);

        if ($service) {
            $data = [
                'message' => 'El servicio fue actualizado correctamente!',
                'service' => $service,
                'status' => 200
            ];
        }

        return response()->json($data, 200);
    }

    public function updateLiquidatedManager(Request $request, $id)
    {
        $service = Service::find($id)->update([
            'liquidatedManager' => 1,
            'idManag' => $request->input('idManag')
        ]);

        if ($service) {
            $data = [
                'message' => 'El servicio fue actualizado correctamente!',
                'service' => $service,
                'status' => 200
            ];
        }

        return response()->json($data, 200);
    }

    public function updateLiquidatedTherapistByIdTherap($idTherap)
    {
        $service = Service::where('idTherap', $idTherap)->update([
            'liquidatedTherapist' => 0,
            'idTherap' => ''
        ]);

        if ($service) {
            $data = [
                'message' => 'El servicio fue actualizado correctamente!',
                'service' => $service,
                'status' => 200
            ];
        }

        return response()->json($data, 200);
    }

    public function updateLiquidatedManagerByIdManager($idManag)
    {
        $service = Service::where('idManag', $idManag)->update([
            'liquidatedManager' => 0,
            'idManag' => ''
        ]);

        if ($service) {
            $data = [
                'message' => 'El servicio fue actualizado correctamente!',
                'service' => $service,
                'status' => 200
            ];
        }

        return response()->json($data, 200);
    }

    public function updateScreen(Request $request, $id)
    {
        $service = Service::find($id)->update([
            'screen' =>  $request->input('screen')
        ]);

        if ($service) {
            $data = [
                'message' => 'El servicio fue actualizado correctamente!',
                'service' => $service,
                'status' => 200
            ];
        }

        return response()->json($data, 200);
    }

    public function updateNotes(Request $request, $id)
    {
        $service = Service::find($id)->update([
            'note' =>  $request->input('note')
        ]);

        if ($service) {
            $data = [
                'message' => 'El servicio fue actualizado correctamente!',
                'service' => $service,
                'status' => 200
            ];
        }

        return response()->json($data, 200);
    }

    // Delete

    public function destroy($id)
    {
        $service = Service::find($id);

        if (!$service) {
            $data = [
                'message' => 'el servicio no fue encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $service->delete();

        $data = [
            'message' => 'El servicio fue eliminado',
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
