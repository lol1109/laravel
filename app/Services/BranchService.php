<?php

namespace App\Services;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BranchService
{
    public function storeBranch($request){
        
        $photo = $request->file('photo')->store('public/photos');
        $branch = new Branch();
        $branch->register = random_int(100000, 999999);
        $branch->name = $request->name;
        $branch->photo = str_replace('public', '', $photo);
        return $branch->save();
    }

    public function updateBranch($branch, $request){
        if ($branch) {
            $branch->name = $request->name;

            if ($request->hasFile('photo')) {
         
                if ($branch->photo) {
                    storage::delete('public/photos'.$request->photo);   
                }

            $photo = $request->file('photo')->store('public/photos');
            $branch->photo = str_replace('public', '', $photo);
            }

            $branch->save();
            return redirect(route('branch.index'));
        } else {
            return redirect(route('branch.index'));
        }
    }
}
