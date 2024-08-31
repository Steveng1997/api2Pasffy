<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;

class serviceController extends Controller
{
    // Get

    public function index()
    {
        $service = Service::join('users', 'users.id', '=', 'service.idManager')
            ->join('therapist', 'therapist.id', '=', 'service.idTherapist')
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

    public function getByTherapistAndManagerNotLiquidatedTherapist($idTherapist, $manager)
    {
        $service = Service::where(['idTherapist' => $idTherapist, 'manager' => $manager, 'idLiquidatedTherapist' =>  null])->get();

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

    public function getByTherapistNotLiquidatedTherapist($idTherapist)
    {
        $service = Service::where(['idTherapist' => $idTherapist, 'idLiquidatedTherapist' => null])->orderBy('idService', 'desc')->get();

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
        $service = Service::where(['manager' => $manager, 'idLiquidatedManager' => null])->get();

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
        $service = Service::where('idLiquidatedTherapist', null)->orderBy('dateStart', 'desc')->get();

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
        $service = Service::where('idLiquidatedManager', null)->orderBy('dateStart', 'desc')->get();

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

    public function getByIdTherapist($idLiquidatedTherapist)
    {
        $service = Service::where('idLiquidatedTherapist', $idLiquidatedTherapist)->get();

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

    public function getById($idService)
    {
        $service = Service::join('users', 'users.id', '=', 'service.idManager')
            ->join('therapist', 'therapist.id', '=', 'service.idTherapist')
            ->where('service.idService', '=', $idService)
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

    public function getByTherapistIdAsc($idTherapist)
    {
        $service = Service::where('idTherapist', $idTherapist)->orderBy('idService', 'asc')->get();

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

    public function getByTherapistIdDesc($idTherapist)
    {
        $service = Service::where('idTherapist', $idTherapist)->orderBy('idService', 'desc')->get();

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

    public function getByManager($idManager)
    {
        $service = Service::where('idManager', $idManager)->get();

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

    public function getByManagerAndNotLiquidatedTherapist($idManager)
    {
        $service = Service::where(['idManager' => $idManager, 'idLiquidatedTherapist' => null])->get();

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

    public function getByManagerAndNotLiquidatedManagerTodayDateDesc($idManager)
    {
        $service = Service::where(['idManager' => $idManager, 'idLiquidatedManager' => null])->orderBy('created_at', 'desc')->get();

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

    public function getByManagerAndNotLiquidatedTherapistTodayDateDesc($idManager)
    {
        $service = Service::where(['idManager' => $idManager, 'idLiquidatedTherapist' => null])->orderBy('created_at', 'desc')->get();

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

    public function getByManagerAndNotLiquidatedManagerTodayDateAsc($idManager)
    {
        $service = Service::where(['idManager' => $idManager, 'idLiquidatedManager' => null])->orderBy('created_at', 'asc')->get();

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

    public function getByManagerAndNotLiquidatedTherapistTodayDateAsc($idManager)
    {
        $service = Service::where(['idManager' => $idManager, 'idLiquidatedTherapist' => null])->orderBy('created_at', 'asc')->get();

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

    public function getByTherapistAndManagerAndNotLiquidatedTherapistDateStart($idTherapist, $idManager)
    {
        $service = Service::where(['idTherapist' => $idTherapist, 'idManager' => $idManager, 'idLiquidatedTherapist' => null])->orderBy('dateStart', 'asc')->get();

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

    public function getByTherapistAndManagerAndLiquidatedTherapistDateStart($idTherapist, $idManager)
    {
        $service = Service::where(['idTherapist' => $idTherapist, 'idManager' => $idManager, 'idLiquidatedTherapist', '!=', null])->orderBy('dateStart', 'asc')->get();

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

    public function getByManagerAndNotLiquidatedManagerIdDesc($idManager)
    {
        $service = Service::where(['idManager' => $idManager, 'idLiquidatedManager' => null])->orderBy('idService', 'desc')->get();

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

    public function getByManagerAndNotLiquidatedManagerDateStart($idManager)
    {
        $service = Service::where(['idManager' => $idManager, 'idLiquidatedManager' => null])->orderBy('dateStart', 'asc')->get();

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

    public function getByManagerAndLiquidatedManager($idManager)
    {
        $service = Service::where(['idManager' => $idManager, 'idLiquidatedManager', '!=', null])->orderBy('dateStart', 'desc')->get();

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

    public function getByTherapist($idTherapist)
    {
        $service = Service::where('idTherapist', $idTherapist)->orderBy('dateStart', 'desc')->get();

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

    public function getByManagerAndNotLiquidatedManager($idManager)
    {
        $service = Service::where(['idManager' => $idManager, 'idLiquidatedManager' => null])->orderBy('dateStart', 'desc')->get();

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

    public function getByManagerIdAsc($idManager)
    {
        $service = Service::where('idManager', $idManager)->orderBy('idService', 'asc')->get();

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

    public function getByManagerIdDesc($idManager)
    {
        $service = Service::where('idManager', $idManager)->orderBy('idService', 'desc')->get();

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

    public function getByDateDay($created_at, $id, $id_admin)
    {
       $service=[];
        if($id_admin == 'null'){
            $users = User::where('id_admin', $id)->get();;
            
            foreach($users as $user){               
                $response = Service::where('idManager',$user->id)->whereDate('created_at','=', Carbon::parse($created_at))
                ->orderBy('service.dateStart', 'desc')
                ->get();
                $service=array_merge($service, $response->toArray());               
            }


        }
        else{           
            $service = Service::where('idManager',$id)->whereDate('created_at','=', Carbon::parse($created_at))
            ->orderBy('service.dateStart', 'desc')
            ->get();

        }
        
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
        $service = Service::where('uniqueId', $uniqueId)->orderBy('idService', 'desc')->get();

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

    public function getByTherapistAndManager($idTherapist, $idManager, $dateStart, $dateEnd)
    {
        $fromDate = $dateStart;
        $toDate = $dateEnd;

        $service = Service::where(['idTherapist' => $idTherapist, 'idManager' => $idManager, 'idLiquidatedTherapist' => null])
            ->whereRaw("(dateStart >= ? AND dateStart <= ?)", [$fromDate, $toDate])
            ->orderBy('idService', 'desc')
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

    public function getByManagerAndDateStartAndDateEnd($idManager, $dateStart, $dateEnd)
    {
        $fromDate = $dateStart;
        $toDate = $dateEnd;

        $service = Service::where(['idManager' => $idManager, 'idLiquidatedManager' => null])
            ->whereRaw("(dateStart >= ? AND dateStart <= ?)", [$fromDate, $toDate])
            ->orderBy('idService', 'desc')
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

    public function getByTodayDateAndManagerDateStartDesc($created_at, $idManager)
    {
        $service = Service::join('users', 'users.id', '=', 'service.idManager')
            ->join('therapist', 'therapist.id', '=', 'service.idTherapist')
            ->where('service.idManager', '=', $idManager)
            ->whereDate('service.created_at', '=', Carbon::parse($created_at))
            ->orderBy('service.dateStart', 'desc')
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

    public function getByTodayDateAndTherapist($created_at, $idTherapist)
    {
        $service = Service::where(['idTherapist' => $idTherapist])
            ->whereDate('created_at', '=', Carbon::parse($created_at))
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

    public function getByTodayDateAndManager($created_at, $idManager)
    {
        $service = Service::join('users', 'users.id', '=', 'service.idManager')
            ->where(['service.idManager' => $idManager])
            ->whereDate('service.created_at', '=', Carbon::parse($created_at))
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

    public function getByTodayDateAndManagerDistinctTherapist($created_at, $therapist)
    {
        $service = Service::select('therapist.name', 'therapist.id')
            ->join('therapist', 'therapist.id', '=', 'service.idTherapist')
            ->join('users', 'users.id_admin', '=', 'therapist.id_admin')
            ->where(['therapist.id_admin' => $therapist])
            ->whereDate('service.created_at', '=', Carbon::parse($created_at))
            ->distinct('service.name')
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

    public function getByTodayDateAndTherapistAndManager($created_at, $idTherapist, $idManager)
    {
        $service = Service::where(['idTherapist' => $idTherapist, 'idManager' => $idManager])
            ->whereDate('created_at', '=', Carbon::parse($created_at))
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
            'createdBy' => $request->createdBy,
            'created_at' => $request->created_at,
            'dateStart' => $request->dateStart,
            'dateEnd' => $request->dateEnd,
            'drink' => $request->drink,
            'drinkTherapist' => $request->drinkTherapist,
            'exit' => $request->exit,
            'idClosing' => $request->idClosing,
            'idLiquidatedManager' => $request->idLiquidatedManager,
            'idLiquidatedTherapist' => $request->idLiquidatedTherapist,
            'idManager' => $request->idManager,
            'idTherapist' => $request->idTherapist,
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
            'tip' => $request->tip,
            'totalService' => $request->totalService,
            'transactionManager' => $request->transactionManager,
            'transactionDriverTaxi' => $request->transactionDriverTaxi,
            'transactionFloor1' => $request->transactionFloor1,
            'transactionFloor2' => $request->transactionFloor2,
            'transactionTherapist' => $request->transactionTherapist,
            'updated_at' => $request->updated_at,
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

    public function update(Request $request, $idService)
    {
        $service = Service::where('idService', '=', $idService)->update([

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
            'createdBy' => $request->createdBy,
            'dateStart' => $request->dateStart,
            'dateEnd' => $request->dateEnd,
            'drink' => $request->drink,
            'drinkTherapist' => $request->drinkTherapist,
            'exit' => $request->exit,
            'idClosing' => $request->idClosing,
            'idLiquidatedManager' => $request->idLiquidatedManager,
            'idLiquidatedTherapist' => $request->idLiquidatedTherapist,
            'idManager' => $request->idManager,
            'idTherapist' => $request->idTherapist,
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
            'tip' => $request->tip,
            'totalService' => $request->totalService,
            'transactionManager' => $request->transactionManager,
            'transactionDriverTaxi' => $request->transactionDriverTaxi,
            'transactionFloor1' => $request->transactionFloor1,
            'transactionFloor2' => $request->transactionFloor2,
            'transactionTherapist' => $request->transactionTherapist,
            'updated_at' => $request->updated_at,
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

        $data = [
            'message' => 'El servicio fue actualizado correctamente!',
            'service' => $service,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function updateLiquidatedTherapist($idService,)
    {
        $service = Service::where('idService', '=', $idService)->update([
            'idLiquidatedTherapist' =>  null
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

    public function updateLiquidatedManager($idService)
    {
        $service = Service::where('idService', '=', $idService)->update([
            'idLiquidatedManager' => null
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

    public function updateLiquidatedTherapistByIdTherap($idLiquidatedTherapist)
    {
        $service = Service::where('idLiquidatedTherapist', $idLiquidatedTherapist)->update([
            'idLiquidatedTherapist' => null
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

    public function updateLiquidatedManagerByIdManager($idLiquidatedManager)
    {
        $service = Service::where('idLiquidatedManager', $idLiquidatedManager)->update([
            'idLiquidatedManager' =>  null
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

    public function updateScreen(Request $request, $idService)
    {
        $service = Service::where('idService', '=', $idService)->update([
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

    public function destroy($idService)
    {
        $service = Service::where('idService', '=', $idService);

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
