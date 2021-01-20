<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Http;
use Illuminate\Database\Seeder;
use Lfbellante\ItalyProvinces\Models\Province;
use Carbon\Carbon;

class ProvinceSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		switch (config('regions.source_type')){
			case 'json':
			default:
				$response = Http::get(config('regions.source'));
				if($response->ok()){
					foreach($response->json() as $province){
						$newProvince = Province::where('code', $province['provincia']['codice'])->get();
						if($newProvince->count() == 0){
							$newProvince = new Region();
							$newProvince->code = $province['provincia']['codice'];
							$newProvince->name = $province['provincia']['nome'];
							$newProvince->abbreviation = $province['sigla'];
							$newProvince->created_at = Carbon::now()->format('Y-m-d H:i:s');
							$newProvince->updated_at = Carbon::now()->format('Y-m-d H:i:s');

							$newProvince->save();
						}
					}
				}
				break;
		}
	}
}