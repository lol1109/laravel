<?php

namespace App\Repositories\Api;

interface DistrictsRepository
{
    public function all($id);
    public function where($province, $id);
    public function find($id);
    public function delete($id);
}