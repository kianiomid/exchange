<?php

namespace App\Console\Commands;

use App\Models\Currency;
use App\Models\CurrencyPrice;
use App\Repositories\Base\Repository;
use App\Repositories\CurrencyPriceRepository;
use App\Repositories\CurrencyRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class Price extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'price:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates Prices';

    protected $currencyModel;
    protected $currencyPriceModel;

    /**
     * Create a new command instance.
     *
     * @param Currency $currency
     * @param CurrencyPrice $currencyPrice
     */
    public function __construct(Currency $currency, CurrencyPrice $currencyPrice)
    {
        parent::__construct();

        $this->currencyModel = new CurrencyRepository($currency);
        $this->currencyPriceModel = new CurrencyPriceRepository($currencyPrice);
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //if we want to get data from API service, we have to use GuzzleHttp Of course exist another way.
        /*$client = new \GuzzleHttp\Client();
        $request = $client->get('https://get-price');*/

        $randFlot = mt_rand() / mt_getrandmax() * 1;
        Log::info($randFlot);

        //get all currency
        $currencies = $this->currencyModel->all();

        foreach ($currencies as $currency) {
            $currencyPrice = $this->currencyPriceModel->find($currency->currency_price_id);
            $price = $currencyPrice->price += $randFlot;

            if ($currency->currency_price_id == $currencyPrice->id) {
                $currencyPrice->price = $price;
                $currencyPrice->save();
            }
        }

        Log::info("Price execution!");
        $this->info('Prices were updated successfully.');
    }
}
