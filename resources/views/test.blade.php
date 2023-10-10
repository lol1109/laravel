@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-3">
            <div class="card-header">
            	<div class="col-12">
            		 <h3 class="card-title"> Data Pengunjung</h3>
            	</div>
            </div>
            <div class="card-body">
            		<form action="{{ route('search') }}" method="GET">
            		<div class="row">
            		<select class="form-select" style="width: 10%; margin-right: 1rem; margin-left: 1rem;" name="month">
    					<option value="01">Januari</option>
    					<option value="02">Februari</option>
    					<option value="03">Maret</option>
    					<option value="04">April</option>
    					<option value="05">Mei</option>
    					<option value="06">Juni</option>
    					<option value="07">Juli</option>
    					<option value="08">Agustus</option>
    					<option value="09">September</option>
    					<option value="10">Oktober</option>
    					<option value="11">November</option>
    					<option value="12">Desember</option>
					</select>
            		<select class="form-select" style="width: 10%; margin-right: 1rem;" name="year">
						<?php
						$currentYear = date("Y");
						$endYear = $currentYear + 10; // Ganti angka 10 dengan berapa tahun ke depan yang Anda inginkan

						for ($year = $currentYear; $year <= $endYear; $year++) {
						echo "<option value=\"$year\">$year</option>";
    						}
    					?>
					</select>
					<button class="btn btn-success" style="width: 10%;" type="submit">Filter</button>
					</div>
        		</form>
            	<!-- Form untuk memilih bulan dan tahun -->
            	@if($error == True)
            		<h3 class="text-center mt-5">Form Tidak Boleh Diedit</h3>
            	@else
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Target</th>
                            <th>Traffic</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php 
                        	$no = 1; 
                        	$displayedCombinations = []; 
                        @endphp	
						@foreach($visits as $visit)
    						@php
    							$target = $visit->target;
    							$trafic = $visit->traffict;
    						@endphp
    						@if (!in_array($target . ' ' . $trafic, $displayedCombinations))
        				<tr>
            				<td>{{ $no++ }}</td>
            				<td>{{ $target }}</td>
            				<td>{{ $trafic }}</td>
            				<td>
            					@if($target == 'epi' && $trafic == 'instagram')
            						 {{ $totalEpiIg }}
            					@elseif($target == 'epi' && $trafic == 'googleads')
                					 {{ $totalEpiGa }}
            					@elseif($target == 'emot' && $trafic == 'instagram')
                					{{ $totalEmotIg }}
            					@elseif($target == 'emot' && $trafic == 'googleads')
               	 					{{ $totalEmotGa }}
            					@endif
        					</td>
        				</tr>
        					<?php $displayedCombinations[] = $target . ' ' . $trafic; ?>
    						@endif
						@endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
@endsection
