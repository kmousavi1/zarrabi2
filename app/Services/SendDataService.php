<?php

namespace App\Services;

use App\Models\LiveData;
use Illuminate\Support\Facades\Http;

class SendDataService
{
    public static function Send(): int
    {
        $response = Http::get(config('senddata.api_server_url') . '/api/last_id');
        if ($response && $response->status() === 200) {
            $data = $response->json();

            $last_id = $data['last_id'];
            echo "\n last id: " . $last_id;

            $new_data = LiveData::where('id', '>', $last_id)
                ->orderBy('id', 'ASC')
                ->limit(50)
                ->get();
            if ($new_data) {
                $res = Http::post(config('senddata.api_server_url') . '/api/save_data', ['data' => $new_data]);
                if ($res) {
                    echo "\n new data saved: " . $res;
                    return 1;
                }
            } else {
                echo "\n new data not found.";
                return 1;
            }
        }
        return 0;
    }
}
