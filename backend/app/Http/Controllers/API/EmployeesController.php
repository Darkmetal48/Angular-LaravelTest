<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeesRequest;
use App\Http\Requests\UpdateEmployeesRequest;
use App\Models\Employees;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index(Employees $employees): JsonResponse{
        $result = $employees->all();
        return response()->json(['data' => $result], 200);
    }

    public function read(Employees $employees, int $id): JsonResponse{
        $result = $employees->find($id);
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
        
        Employees::create($request->all());
        return response()->json(['message' => 'successfully stored'], 200);
    }

    public function update(UpdateEmployeesRequest $request, Employees $employees): JsonResponse
    {
        $email_to_save = $request->first_name . '.' . str_replace(" ", "", $request->first_surname) . '@' . ($request->job_country == 'Colombia' ?  'global.com.co' :  'global.com.us');

        $result = Employees::where('email', $email_to_save)->first();

        if($result['email'] != $email_to_save){
            $id = explode('.',$result['email']);

            $email_to_save = $request->first_name . '.' . str_replace(" ", "", $request->first_surname) . '.' . (is_numeric($id) ? $id++ : 1) . '@' . ($request->job_country == 'Colombia' ?  'global.com.co' :  'global.com.us');

        }
        if($result['email'] != $email_to_save) $request->request->add(['email' => $email_to_save]);
        //dd($request->all());
        $employees->where('id', $request->id)->update($request->all());
        return response()->json(['message' => 'successfully updated'], 200);
    }


    public function destroy(Employees $employees, int $id): JsonResponse
    {
        //$employees->delete();
        if($employees->where('id', $id)->delete()){
            return response()->json(['message' => 'Employee is deleted successfully.'], 200);
        }else{
            return response()->json(['message' => 'Employee is not deleted successfully.'], 500);
        }
    }
}
