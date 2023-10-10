<?php 
namespace App\Repositories\Visit;

use App\Models\Visit;
use Illuminate\Support\Carbon;

class VisitRepositoryImplement implements VisitRepository
{
    protected $model;

    public function __construct(Visit $model)
    {
        $this->model = $model;
    }

    public function all()
{
    $visits = $this->model->all();

    // Calculate the total trafic and target values
    $totalTargetEpiInstagram = $visits->where('target', 'epi')->where('traffict', 'instagram')->count('id');
	$totalTargetEpiGoogleAds = $visits->where('target', 'epi')->where('traffict', 'googleads')->count('id');
	$totalTargetEmotInstagram = $visits->where('target', 'emot')->where('traffict', 'instagram')->count('id');
	$totalTargetEmotGoogleAds = $visits->where('target', 'emot')->where('traffict', 'googleads')->count('id');


    	return [
        	'visits' => $visits,
        	'totalEpiIg' => $totalTargetEpiInstagram,
        	'totalEpiGa' => $totalTargetEpiGoogleAds,
        	'totalEmotIg' => $totalTargetEmotInstagram,
        	'totalEmotGa' => $totalTargetEmotGoogleAds
    	];
	}

	public function find($month, $year)
	{
		// Konversi bulan dan tahun ke format yang sesuai
    	$startDate = Carbon::createFromDate($year, $month, 1)->startOfMonth();
    	$endDate = $startDate->copy()->endOfMonth();

		$visits = $this->model->whereBetween('created_at',[$startDate, $endDate])->get();

    // Calculate the total trafic and target values for each combination
    $totalTargetEpiInstagram = $this->model
        ->where('target', 'epi')
        ->where('traffict', 'instagram')
        ->whereBetween('created_at', [$startDate, $endDate])
        ->count();

    $totalTargetEpiGoogleAds = $this->model
        ->where('target', 'epi')
        ->where('traffict', 'googleads')
        ->whereBetween('created_at', [$startDate, $endDate])
        ->count();

    $totalTargetEmotInstagram = $this->model
        ->where('target', 'emot')
        ->where('traffict', 'instagram')
        ->whereBetween('created_at', [$startDate, $endDate])
        ->count();

    $totalTargetEmotGoogleAds = $this->model
        ->where('target', 'emot')
        ->where('traffict', 'googleads')
        ->whereBetween('created_at', [$startDate, $endDate])
        ->count();


    	return [
        	'visits' => $visits,
        	'totalEpiIg' => $totalTargetEpiInstagram,
        	'totalEpiGa' => $totalTargetEpiGoogleAds,
        	'totalEmotIg' => $totalTargetEmotInstagram,
        	'totalEmotGa' => $totalTargetEmotGoogleAds
    	];
	}

    public function create(array $data)
    {
        return $this->model->create($data);
    }
}

?>