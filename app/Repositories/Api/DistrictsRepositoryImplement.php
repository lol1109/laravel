<?php 
namespace App\Repositories\Api;

use App\Models\Districts;

class DistrictsRepositoryImplement implements DistrictsRepository
{
    public function all($id)
    {
        return Districts::where('address_province_id', $id)->get();
    }

    public function where($province, $id)
    {
        return Districts::where('address_province_id', $province)
                ->where('id', $id)
                ->get();
    }

    public function find($id){
        return Districts::find($id);
    }

    public function delete($id)
    {
        $Districts = Districts::find($id);

        return $Districts->delete();
    }
}

?>