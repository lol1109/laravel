<?php 
namespace App\Repositories\Api;

use App\Models\Urbans;

class UrbansRepositoryImplement implements UrbansRepository
{
    public function all($province, $kabupaten, $kecamatan)
    {
        return Urbans::select('address_urbans.id', 'address_urbans.name')
                ->join('address_sub_districts', 'address_urbans.address_sub_district_id', '=', 'address_sub_districts.id')
                ->join('address_districts', 'address_sub_districts.address_district_id', '=', 'address_districts.id')
                ->join('address_provinces', 'address_districts.address_province_id', '=', 'address_provinces.id')
                ->where('address_urbans.address_sub_district_id', $kecamatan)
                ->where('address_sub_districts.address_district_id', $kabupaten)
                ->where('address_districts.address_province_id', $province)
                ->get();

    }

    public function where($province, $kabupaten, $kecamatan, $id)
    {
       return Urbans::select('address_urbans.id', 'address_urbans.name')
                ->join('address_sub_districts', 'address_urbans.address_sub_district_id', '=', 'address_sub_districts.id')
                ->join('address_districts', 'address_sub_districts.address_district_id', '=', 'address_districts.id')
                ->join('address_provinces', 'address_districts.address_province_id', '=', 'address_provinces.id')
                ->where('address_urbans.address_sub_district_id', $kecamatan)
                ->where('address_sub_districts.address_district_id', $kabupaten)
                ->where('address_districts.address_province_id', $province)
                ->where('address_urbans.id', $id)
                ->get();
    }

    public function find($id){
        return Urbans::find($id);
    }

    public function delete($id)
    {
        $Urbans = Urbans::find($id);

        return $Urbans->delete();
    }
}

?>