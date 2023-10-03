<?php

namespace App\Repositories\Api;

interface ProvinceRepository
{
    public function all();
    public function where($id);
    public function find($id);
    public function delete($id);
}