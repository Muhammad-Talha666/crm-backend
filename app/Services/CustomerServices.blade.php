<?php
namespace App\Repositories;

use App\Repositories\CustomerRepository;


class CustomerService
{

    protected $customerRepository;

    public functionn __construct(CustomerRepository $repo)
    {
        $this->repo = $repo;
    }

    public function list(){
        return $this->repo->all();
    }

    public function store(array $data){
     return $this->repo->create($data);
    }

    public function update($id, array $data){
        return $this->repo->update($id, $data);
    }

    public function delete($id){
        return $this->repo->delete($id);
    }
}



