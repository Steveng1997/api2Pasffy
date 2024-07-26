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
                'message' => 'Manager no encontrada',
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

    public function getIdAndRol($id)
    {
        $manager = Manager::where(['id' => $id, 'rol' => 'Administrador'])->get();

        if (!$manager) {
            $data = [
                'message' => 'Manager no encontrada',
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

    public function getByEmail($email)
    {
        $manager = Manager::where('email', $email)->get();

        if (!$manager) {
            $data = [
                'message' => 'Manager no encontrada',
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

    public function getByName($name)
    {
        $manager = Manager::where('name', $name)->get();

        if (!$manager) {
            $data = [
                'message' => 'Manager no encontrada',
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

    public function getEmailAndPassword($email, $password)
    {
        $manager = Manager::where(['email' => $email, 'password' => $password])->get();

        if (!$manager) {
            $data = [
                'message' => 'Manager no encontrada',
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

    public function getByCompany($company)
    {
        $manager = Manager::where('company', $company)->get();

        if (!$manager) {
            $data = [
                'message' => 'Manager no encontrada',
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

    public function getIdAndCompany($id, $company)
    {
        $manager = Manager::where(['id' => $id, 'company' => $company])->get();

        if (!$manager) {
            $data = [
                'message' => 'Manager no encontrada',
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

    public function getAdmin()
    {
        $manager = Manager::where(['rol' => 'administrador'])->orderBy('id', 'asc')->get();

        if (!$manager) {
            $data = [
                'message' => 'No se encontro',
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

    public function getByCompanyAndActive($company)
    {
        $manager = Manager::where(['company' => $company, 'active' => '1'])->orderBy('id', 'asc')->get();

        if (!$manager) {
            $data = [
                'message' => 'Manager no encontrada',
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
            'active' => '',
            'company' => '',
            'drink' => '',
            'drinkTherapist' => '',
            'email' => 'required',
            'expiration' => '',
            'fixeDay' => '',
            'name' => '',
            'others' => '',
            'password' => 'required|min:5',
            'rol' => '',
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

        $manager = Manager::create([
            'active' => $request->active,
            'company' => $request->company,
            'drink' => $request->drink,
            'drinkTherapist' => $request->drinkTherapist,
            'email' => $request->email,
            "expiration" => $request->expiration,
            'fixeDay' => $request->fixeDay,
            'name' => $request->name,
            'others' => $request->others,
            'password' => $request->password,
            'rol' => $request->rol,
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
                'message' => 'Manager no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'active' => '',
            'drink' => '',
            'drinkTherapist' => '',
            'company' => '',
            'fixeDay' => '',
            'name' => '',
            'others' => '',
            'password' => 'required|min:5',
            'tip' => '',
            'rol' => '',
            'service' => '',
            'tabacco' => '',
            'email' => 'required',
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

        $manager->active = $request->active;
        $manager->drink = $request->drink;
        $manager->drinkTherapist = $request->drinkTherapist;
        $manager->company = $request->company;
        $manager->fixeDay = $request->fixeDay;
        $manager->name = $request->name;
        $manager->others = $request->others;
        $manager->password = $request->password;
        $manager->tip = $request->tip;
        $manager->rol = $request->rol;
        $manager->service = $request->service;
        $manager->tabacco = $request->tabacco;
        $manager->email = $request->email;
        $manager->vitamin = $request->vitamin;

        $manager->save();

        $data = [
            'message' => 'Manager actualizada',
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
                'message' => 'Manager no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'active' => ''
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $manager->active = $request->active;

        $manager->save();

        $data = [
            'message' => 'Manager actualizada',
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
                'message' => 'Manager no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $manager->delete();

        $data = [
            'message' => 'Manager eliminada',
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
