<?php

	use Illuminate\Database\Seeder;
	
	use App\Currency;
	 
	class CurrencySeeder extends Seeder {
	
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			//WARNING!	If more currencies are created is necessary to edit currency_id in CoinSeeder
			Currency::create(
				[
					'name'=>'Euro',
					'abbreviature'=>'EUR',
					'plural_name'=>'Euros'
				]
			);
		}
	 
	}

?>