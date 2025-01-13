<?php

namespace App\Services;

use App\Models\Appointment;
use App\Models\Car;
use App\Models\Location;

class AppointmentService
{
    protected $appointment;
    protected $car;
    protected $location;

    public function __construct(Appointment $appointment, Car $car, Location $location)
    {
        $this->appointment = $appointment;
        $this->car = $car;
        $this->location = $location;
    }


    protected function createLocation(array $data)
    {
        return $this->location->create([
            'address' => $data['address'],
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude'],
            'user_id' =>auth()->id(),
        ]);
    }

    protected function createCar(array $data)
    {
        return $this->car->create([
            'car_plate' => $data['car_plate'],
            'car_color' => $data['car_color'],
            'car_model' => $data['car_model'],
            'car_type' => $data['car_type'],
            'user_id' =>auth()->id(),
        ]);
    }

    public function createAppointment(array $data)
    {
        // حفظ بيانات السيارة
        $car = $this->createCar($data);

        // حفظ بيانات الموقع
        $location = $this->createLocation($data);

        // حفظ بيانات الموعد
        return $this->appointment->create([
            'package_id' => $data['package_id'],
            'appointment_date' => $data['appointment_date'],
            'appointment_time' => $data['appointment_time'],
            'location_id' => $location->id,
            'car_id' => $car->id,
            'user_id' =>auth()->id(),
            'status'=>'pending',
        ]);
    }





}



?>
