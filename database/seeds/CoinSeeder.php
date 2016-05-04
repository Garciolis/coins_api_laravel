<?php

	use Illuminate\Database\Seeder;
 
	use App\Coin;
	use App\Currency;
	 
	class CoinSeeder extends Seeder {
	 
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			
			//Array with different relative values of coins
			$relativeValues = array(1, 2, 5, 10, 20, 50, 100, 200);
			
			//Foreach year add all relative values
			//Only ES country is available
			for ($year=1999; $year<2017; $year++) {
				for ($rvPointer=0; $rvPointer<count($relativeValues); $rvPointer++) {
					Coin::create(
						[
							'country'=>'ES',
							'year'=>$year,
							'relative_value'=>$relativeValues[$rvPointer],
							'status'=>0, //0=unpicked; 1=picked; 2=reserved
							'currency_id'=>1 //Supposing that EUR is the only value in the table
						]
					);
				}
			}
	 
		}
	 
	}

?>