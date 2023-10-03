<?php

namespace App\Repositories\Api;

interface UrbansRepository
{
    public function all($province, $kabupaten, $kecamatan);
    public function where($province, $kabupaten, $kecamatan, $id);
    public function find($id);
    public function delete($id);
}