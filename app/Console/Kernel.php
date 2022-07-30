<?php

namespace App\Console;

use App\Models\Tag;
use App\Mail\AdvertiserRemainder;
use App\Models\Advertiser;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            // get advertisers who have ads the next day
            $advertisersToMail = Advertiser::whereHas('ads', function($query) {
                $query->where('start_date', Carbon::now()->addDay()->toDateString());
            })->get();

            Mail::to($advertisersToMail)->send(new AdvertiserRemainder);
        })->dailyAt('20:00')->timezone('Africa/Cairo');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
