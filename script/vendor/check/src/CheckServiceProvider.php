<?php 

namespace Amcoders\Check;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
/**
 * 
 */
class CheckServiceProvider extends ServiceProvider
{
	
	public function boot()
	{
		$this->loadRoutesFrom(__DIR__.'/routes/web.php');
	}

	public function register()
	{
        
	}
}

 