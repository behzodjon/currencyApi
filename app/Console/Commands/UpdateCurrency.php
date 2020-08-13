<?php

namespace App\Console\Commands;

use App\Currency;
use Illuminate\Console\Command;
use Illuminate\Http\Request;

class UpdateCurrency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:currency';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $headers = ['Id','Name', 'Rate'];

        $users = Currency::all(['id','name', 'rate'])->toArray();

        $this->table($headers, $users);
        $currencyId=Currency::findOrFail($this->ask('Enter the id of currency to update'));
        $currencyId->update([
            'name'=>$this->ask('Enter the new name'),
            'rate'=>$this->ask('Enter the new rate'),
        ]);
            dump("Success");
    }
}
