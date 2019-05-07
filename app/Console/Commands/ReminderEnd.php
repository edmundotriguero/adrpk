<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Contract;
use App\Video;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendReportMonth;
use App\Mail\SendReportVideoDay;


class ReminderEnd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:contract';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send emails for contracts that end';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        
        $today = date('Y-m-d');
        
        $contracts = Contract::where('end_date',$today)->get();
        $videos = Video::where('end_date',$today)->get();
       
       //dd($message);
        foreach ($contracts as $contract) {
            Mail::to('etriguero@rpk.com.bo')->send(new SendReportMonth($contract));
            $this->info("se envio mail de contrato");
        }

        foreach ($videos as $video){
            Mail::to('etriguero@rpk.com.bo')->send(new SendReportVideoDay($video));
            $this->info("se envio los mail de video");
        }
        
        $this->info($today);
    }
}