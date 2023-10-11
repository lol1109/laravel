<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Visit\VisitRepository;

class VisitController extends Controller
{
	protected $VisitRepository;

	public function __construct(VisitRepository $VisitRepository)
	{
		$this->middleware('auth');
		$this->VisitRepository = $VisitRepository;
	}

	public function index()
	{
		$data = $this->VisitRepository->all();
		return view('test', [
			'error' => False,
			'visits' => $data['visits'],
			'totalEpiIg' => $data['totalEpiIg'],
			'totalEpiGa' => $data['totalEpiGa'],
			'totalEmotIg' => $data['totalEmotIg'],
			'totalEmotGa' => $data['totalEmotGa'],
		]);
	}

	public function search(VisitRepository $VisitRepository, Request $request)
	{
		// Validasi input
		$validator = Validator::make($request->all(), [
			'month' => 'required|numeric',
			'year' => 'required|numeric',
		]);

		// Jika validasi gagal, redirect kembali dengan pesan error
		if ($validator->fails()) {
			return view('test', ['error' => True]);
		}

		$month = $request->input('month');
		$year = $request->input('year');

		$data = $this->VisitRepository->find($month, $year);

		return view('test', [
			'error' => False,
			'visits' => $data['visits'],
			'totalEpiIg' => $data['totalEpiIg'],
			'totalEpiGa' => $data['totalEpiGa'],
			'totalEmotIg' => $data['totalEmotIg'],
			'totalEmotGa' => $data['totalEmotGa'],
		]);
	}


	public function visitor(Request $request)
	{
		$rules = [
			'trafic' => 'required|in:instagram,googleads',
			'target' => 'required|in:epi,emot',
		];

		$customMessages = [
			'trafic.in' => 'Kolom traffic hanya boleh berisi "instagram" atau "googleads".',
			'target.in' => 'Kolom target hanya boleh berisi "epi" atau "emot".',
		];

		$validatedData = $request->validate($rules, $customMessages);

		$trafic = $request->input('trafic');
		$ip = $request->ip();
		$target = $request->input('target');

		$data = [
			'traffict' => $trafic,
			'ip_address' => $ip,
			'mac_address' => null,
			'target' => $target,
		];

		#tambahkan data pengunjung ke database
		$this->VisitRepository->create($data);

		return redirect(config('constant.link_wa'));
	}
}
