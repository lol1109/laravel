<?php

namespace App\Repositories\Visit;

interface VisitRepository
{
	public function all();
	public function find($month, $year);
    public function create(array $data);
}