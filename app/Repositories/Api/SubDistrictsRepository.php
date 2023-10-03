<?php

namespace App\Repositories\Api;

interface SubDistrictsRepository
{
    public function all($province, $kabupaten);
    public function where($province, $kabupaten, $id);
    public function find($id);
    public function delete($id);
}