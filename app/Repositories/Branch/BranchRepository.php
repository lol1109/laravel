<?php

namespace App\Repositories\Branch;

interface BranchRepository
{
    public function all();
    public function where($id);
    public function find($id);
    public function delete($id);
}