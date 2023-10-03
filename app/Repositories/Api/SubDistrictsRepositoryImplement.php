<?php 
namespace App\Repositories\Api;

use App\Models\SubDistricts;

class SubDistrictsRepositoryImplement implements SubDistrictsRepository
{
    public function all($province, $kabupaten)
    {
        return SubDistricts::select('address_sub_districts.id', 'address_sub_districts.name')
                ->join('address_districts', 'address_sub_districts.address_district_id', '=', 'address_districts.id')
                ->join('address_provinces', 'address_districts.address_province_id', '=', 'address_provinces.id')
                ->where('address_sub_districts.address_district_id', $kabupaten)
                ->where('address_districts.address_province_id', $province)
                ->get();
    }

    public function where($province, $kabupaten, $id)
    {
        return SubDistricts::select('address_sub_districts.id', 'address_sub_districts.name')
                ->join('address_districts', 'address_sub_districts.address_district_id', '=', 'address_districts.id')
                ->join('address_provinces', 'address_districts.address_province_id', '=', 'address_provinces.id')
                ->where('address_sub_districts.address_district_id', $kabupaten)
                ->where('address_districts.address_province_id', $province)
                ->where('address_sub_districts.id', $id)
                ->get();
    }

    public function find($id){
        return SubDistricts::find($id);
    }

    public function delete($id)
    {
        $SubDistricts = SubDistricts::find($id);

        return $SubDistricts->delete();
    }
}

?>