<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SummarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        $totalIssued= DB::table('store_request_items')
        ->select('*', DB::raw('sum(qty) as totalIssued'))
        ->groupBy('item_id')
        ->get();

            foreach($totalIssued as $issue){
            DB::table('item_summaries')
                ->updateOrInsert(
                    ['item_id'=>$issue->item_id],
                    ['totalIssued' => $issue->totalIssued]);
        }

                $totalOrders= DB::table('orders')
                    ->select('*', DB::raw('sum(qty) as totalReceiving'))
                    ->groupBy('item_id')
                    ->get();


                foreach($totalOrders as $order){
                        DB::table('item_summaries')
                            ->updateOrInsert(
                                ['item_id' => $order->item_id],
                                ['totalReceived' => $order->totalReceiving]);
                }
    }


}
