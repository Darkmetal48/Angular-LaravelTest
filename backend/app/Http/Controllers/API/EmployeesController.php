<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeesRequest;
use App\Models\Employees;
use App\Models\EmployeesModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index(Employees $employees): JsonResponse{
        $result = $employees->all();
        return response()->json(['data' => $result], 200);
    }

    public function read(Employees $employees): JsonResponse{
        $result = $employees->findAll();
        return response()->json(['data' => $result], 200);
    }

    public function store(StoreEmployeesRequest $request): JsonResponse
    {

        $email_to_save = $request->first_name . '.' . str_replace(" ", "", $request->first_surname) . '@' . ($request->job_country == 'Colombia' ?  'global.com.co' :  'global.com.us');

        $result = Employees::where('email', $email_to_save)->first();

        if($result){
            $id = explode('.',$result['email']);

            $email_to_save = $request->first_name . '.' . str_replace(" ", "", $request->first_surname) . '.' . (is_numeric($id) ? $id++ : 1) . '@' . ($request->job_country == 'Colombia' ?  'global.com.co' :  'global.com.us');

        }
        $request->request->add(['email' => $email_to_save]);
        //return response()->json(['message' =>  $email_to_save], 200);
        Employees::create($request->all());
        return response()->json(['message' => 'successfully stored'], 200);
    }

    public function update(StoreEmployeesRequest $request, Employees $employees): JsonResponse
    {
        $employees->update($request->all());
        return response()->json(['message' => 'successfully updated'], 200);
    }


    public function destroy(Employees $employees): JsonResponse
    {
        $employees->delete();
        return response()->json(['message' => 'Employee is deleted successfully.'], 200);
    }
}
