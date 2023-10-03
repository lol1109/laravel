<?php 
namespace App\Repositories\Branch;

use App\Models\Branch;

class BranchRepositoryImplement implements BranchRepository
{
    public function all()
    {
        return Branch::get();
    }

    public function where($id)
    {
        return Branch::where('id', $id)->get();
    }

    public function find($id){
        return Branch::find($id);
    }

    public function delete($id)
    {
        $branch = Branch::find($id);

        return $branch->delete();
    }
}

?>