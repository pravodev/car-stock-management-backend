<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'car_id'
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public static function getSummary($date)
    {
        $query = \DB::table('sales')
                    ->whereDate('sales.created_at', now())
                    ->groupBy('car_id')
                    ->selectRaw('COUNT(car_id) as total_car, cars.name as car_name')
                    ->leftJoin('cars', 'cars.id', 'sales.car_id')
                    ->orderBy(\DB::raw('COUNT(car_id)'), 'DESC')
                    ->first();

        // $
        $data = [];

        return [
            'most_car' => $query->car_name,
            // 'percentage' => 
        ];
        dd($query);
    }
}
