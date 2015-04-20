<?php namespace App\Console;

use App\Url;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel {



	/**
	 * The Artisan commands provided by your application.
	 *
	 * @var array
	 */
	protected $commands = [
		'App\Console\Commands\Inspire',
	];

	/**
	 * Define the application's command schedule.
	 *
	 * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
	 * @return void
	 */
	protected function schedule(Schedule $schedule)
	{

		$schedule->command('inspire')
				 ->hourly();
        $schedule->call(function(){
           if($this->firstDay==1){
               $count=40;
           }
            else{
                $number=Url::where('published','=',1)->count();
                $count=round(($number*4)/100,0);
                $count+=40;
            }

            for($i=1;$i<=40;$i++)
            {

                App::setLocale('en');
                $urls=Url::where('published','!=',1)->get();
                $url=$urls->random();
                $url->published=1;
                $url->save();
                App::setLocale('ar');
                $urls=Url::where('published','!=',1)->get();
                $url=$urls->random();
                $url->published=1;
                $url->save();

            }
        })->dailyAt('10:00');
        $this->firstDay=0;

    }

}
