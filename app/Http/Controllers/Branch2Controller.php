<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Branch;
use App\Http\Requests\BranchPostRequest;
use App\Http\Requests\BranchUpdateRequest;
use App\Services\BranchService;
use App\Repositories\Branch\BranchRepository;

class Branch2Controller extends Controller
{

    protected $branchService, $branchRepository;

    public function __construct(BranchRepository $branchRepository, BranchService $branchService)
    {
        $this->branchRepository = $branchRepository;
        $this->branchService = $branchService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // $data = DB::table('Brenchs')->get();
        $data = $this->branchRepository->all();
       return view('index', ['branchs' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BranchPostRequest $request)
    {

        $this->branchService->storeBranch($request);

        return redirect(route('branch.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $branch = $this->branchRepository->where($id);

        return view('show', ['brenchs' => $branch]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $branch = $this->branchRepository->where($id);
        
        return view('edit', ['brenchs' => $branch]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BranchUpdateRequest $request, string $id)
    {
        $branch = $this->branchRepository->find($id);

        $this->branchService->updateBranch($branch, $request);

        return redirect(route('branch.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->branchRepository->delete($id);
        
        return redirect(route('branch.index'));
    }
}
