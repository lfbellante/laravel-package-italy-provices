<?php
namespace Lfbellante\ItalyProvinces;
use Illuminate\Support\ServiceProvider;

class ItalyProvincesServiceProvider extends ServiceProvider
{
	/**
	 * Publishes configuration file.
	 *
	 * @return  void
	 */
	public function boot()
	{
		$this->publishes([
			__DIR__ . '/../database/migrations/create_provinces_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_provinces_table.php'),
		], 'regions-migrations');

		$this->publishes([
			__DIR__ . '/../database/seeders/ProvinceSeeder.php' => database_path('seeders/ProvinceSeeder.php'),
		], 'regions-seeders');
	}
	/**
	 * Make config publishment optional by merging the config from the package.
	 *
	 * @return  void
	 */
	public function register()
	{
	}
}
