<?php 
namespace App\Repositories\Api;

use App\Models\Province;

class ProvinceRepositoryImplement implements ProvinceRepository
{
    public function all()
    {
        return Province::get();
    }

    public function where($id)
    {
        return Province::where('id', $id)->get();
    }

    public function find($id){
        return Province::find($id);
    }

    public function delete($id)
    {
        $Province = Province::find($id);

        return $Province->delete();
    }
}

?>