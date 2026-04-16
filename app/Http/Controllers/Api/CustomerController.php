<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Repositories\CustomerRepository;
use App\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    protected $service;

    public function __construct(CustomerService $service)
{
$this->service = $service;
}

    public function index(){
        return CustomerResource::collection($this->service->all());
    }

    public function store(StoreCustomerRequest $request){
       $data = $request->validated();
       $data['user_id'] = auth()->id();

       $customer = $this->service->store($data);
       return new CustomerResource($customer);
    }

    public function update(StoreCustomerRequest $request, $id){
        $customer = $this->service->update($id, $request->validated());
        return new CustomerResource($customer);
    
    }

    public function destroy($id){
     $this->service->delete($id);
     return response()->json(['message' => 'Customer deleted successfully']);
     
    }
}
