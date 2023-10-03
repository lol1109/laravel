<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\Api\ProvinceRepository;
use App\Repositories\Api\DistrictsRepository;
use App\Repositories\Api\SubDistrictsRepository;
use App\Repositories\Api\UrbansRepository;


class ApiController extends Controller
{

   	protected $ProvinceRepository, $districtsRepository, $SubDistrictsRepository, $UrbansRepository;

   	public function __construct(ProvinceRepository $ProvinceRepository, DistrictsRepository $districtsRepository, SubDistrictsRepository $SubDistrictsRepository, UrbansRepository $UrbansRepository){
   		$this->ProvinceRepository = $ProvinceRepository;
		$this->districtsRepository = $districtsRepository;
        $this->SubDistrictsRepository = $SubDistrictsRepository;
        $this->UrbansRepository = $UrbansRepository;
   	} 

   	public function getData(){
    	$provinces = $this->ProvinceRepository->all();

    	$dataProvinces = [];

    	foreach ($provinces as $province) {
        	$dataProvinces[] = [
            	'id' => $province->id,
            	'name' => $province->name,
        	];
    	}

    	if (!empty($dataProvinces)) {
        	$data = [
            	'success' => true,
            	'message' => 'Data Retrieved successfully...',
            	'data' => $dataProvinces,
        	];
    	} else {
        	$data = [
            	'success' => false,
            	'message' => 'No data found.',
        	];
    	}

    	return response()->json($data);
	}


	public function province($id) {
    	$provinces = $this->ProvinceRepository->where($id);

		$dataProvinces = [];

    	foreach ($provinces as $province) {
        	$dataProvinces[] = [
            	'id' => $province->id,
            	'name' => $province->name,
        	];
    	}

    	if (!empty($province)) {
        	$data = [
            	'success' => true,
            	'message' => 'Data Retrieved successfully...',
            	'data' => $dataProvinces,
        	];
    	} else {
        	$data = [
            	'success' => false,
            	'message' => 'No data found.',
        	];
    	}

    	return response()->json($data);
	}

	public function districts($province){
		$districts = $this->districtsRepository->all($province);

		$datadistricts = [];

		foreach ($districts as $districts) {
        	$datadistricts[] = [
            	'id' => $districts->id,
            	'name' => $districts->name,
        	];
    	}

    	if (!empty($datadistricts)) {
        	$data = [
            	'success' => true,
            	'message' => 'Data Retrieved successfully...',
            	'data' => $datadistricts,
        	];
    	} else {
        	$data = [
            	'success' => false,
            	'message' => 'No data found.',
        	];
    	}

    	return response()->json($data);
	}

	public function kota($province, $id){
		$kabupaten = $this->districtsRepository->where($province, $id);

		$dataKabupaten = [];

		foreach ($kabupaten as $kabupaten) {
        	$dataKabupaten[] = [
            	'id' => $kabupaten->id,
            	'name' => $kabupaten->name,
        	];
    	}

    	if (!empty($dataKabupaten)) {
        	$data = [
            	'success' => true,
            	'message' => 'Data Retrieved successfully...',
            	'data' => $dataKabupaten,
        	];
    	} else {
        	$data = [
            	'success' => false,
            	'message' => 'No data found.',
        	];
    	}

    	return response()->json($data);
	}

	public function kecamatan($province, $kabupaten){
		$kecamatan = $this->SubDistrictsRepository->all($province, $kabupaten);

		$datakecamatan = [];

		foreach ($kecamatan as $kecamatan) {
        	$datakecamatan[] = [
            	'id' => $kecamatan->id,
            	'name' => $kecamatan->name,
        	];
    	}

    	if (!empty($datakecamatan)) {
        	$data = [
            	'success' => true,
            	'message' => 'Data Retrieved successfully...',
            	'data' => $datakecamatan,
        	];
    	} else {
        	$data = [
            	'success' => false,
            	'message' => 'No data found.',
        	];
    	}

    	return response()->json($data);
	}

	public function desa($province, $kabupaten, $id){
		$kecamatan = $this->SubDistrictsRepository->where($province, $kabupaten, $id);

		$datakecamatan = [];

		foreach ($kecamatan as $kecamatan) {
        	$datakecamatan[] = [
            	'id' => $kecamatan->id,
            	'name' => $kecamatan->name,
        	];
    	}

    	if (!empty($datakecamatan)) {
        	$data = [
            	'success' => true,
            	'message' => 'Data Retrieved successfully...',
            	'data' => $datakecamatan,
        	];
    	} else {
        	$data = [
            	'success' => false,
            	'message' => 'No data found.',
        	];
    	}

    	return response()->json($data);
	}

    public function kelurahan($province, $kabupaten, $kecamatan){
        $kelurahan = $this->UrbansRepository->all($province, $kabupaten, $kecamatan);

        $datakelurahan = [];

        foreach ($kelurahan as $kelurahan) {
            $datakelurahan[] = [
                'id' => $kelurahan->id,
                'name' => $kelurahan->name,
            ];
        }

        if (!empty($datakelurahan)) {
            $data = [
                'success' => true,
                'message' => 'Data Retrieved successfully...',
                'data' => $datakelurahan,
            ];
        } else {
            $data = [
                'success' => false,
                'message' => 'No data found.',
            ];
        }

        return response()->json($data);
    }

    public function kelurahan1($province, $kabupaten, $kecamatan ,$id){
        $kelurahan = $this->SubDistrictsRepository->where($province, $kabupaten, $kecamatan, $id);

        $datakelurahan = [];

        foreach ($kelurahan as $kelurahan) {
            $datakelurahan[] = [
                'id' => $kelurahan->id,
                'name' => $kelurahan->name,
            ];
        }

        if (!empty($datakelurahan)) {
            $data = [
                'success' => true,
                'message' => 'Data Retrieved successfully...',
                'data' => $datakelurahan,
            ];
        } else {
            $data = [
                'success' => false,
                'message' => 'No data found.',
            ];
        }

        return response()->json($data);
    }
}
