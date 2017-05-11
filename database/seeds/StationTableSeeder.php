<?php

use Illuminate\Database\Seeder;
use App\Station;

class StationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $station = new Station();
        $station->device_id = '440';
        $station->province = 'Cavite';
        $station->location = 'Amadeo';
        $station->lat = '14.17023';
        $station->lng = '120.92218';
        $station->type = 'Rain2';
        $station->sim = 'Smart';
        $station->save();

        $station = new Station();
        $station->device_id = '1151';
        $station->province = 'Cavite';
        $station->location = 'Southwoods Bridge';
        $station->lat = '14.31463';
        $station->lng = '121.04115';
        $station->type = 'Waterlevel';
        $station->sim = 'Globe';
        $station->save();

        $station = new Station();
        $station->device_id = '825';
        $station->province = 'Cavite';
        $station->location = 'Bunga Bridge';
        $station->lat = '14.35120';
        $station->lng = '120.87189';
        $station->type = 'Waterlevel';
        $station->sim = 'Smart';
        $station->save();

        $station = new Station();
        $station->device_id = '2115';
        $station->province = 'Cavite';
        $station->location = 'Daang Hari Bridge';
        $station->lat = '14.373163';
        $station->lng = '120.942109';
        $station->type = 'Waterlevel';
        $station->sim = 'Smart';
        $station->save();

        $station = new Station();
        $station->device_id = '439';
        $station->province = 'Cavite';
        $station->location = 'Dasmarinas';
        $station->lat = '14.31219';
        $station->lng = '120.97131';
        $station->type = 'Rain2';
        $station->sim = 'Smart';
        $station->save();

        $station = new Station();
        $station->device_id = '1785';
        $station->province = 'Cavite';
        $station->location = 'State Land - Dam Side Cavite';
        $station->lat = '14.816';
        $station->lng = '120.9113';
        $station->type = 'Waterlevel';
        $station->sim = 'Smart';
        $station->save();
        
        $station = new Station();
        $station->device_id = '441';
        $station->province = 'Laguna';
        $station->location = 'Cavinti';
        $station->lat = '14.24685';
        $station->lng = '121.50039';
        $station->type = 'Rain2';
        $station->sim = 'Smart';
        $station->save();

        $station = new Station();
        $station->device_id = '668';
        $station->province = 'Laguna';
        $station->location = 'Cabuyao';
        $station->lat = '14.27135';
        $station->lng = '121.12427';
        $station->type = 'Rain2';
        $station->sim = 'Smart';
        $station->save();

        $station = new Station();
        $station->device_id = '482';
        $station->province = 'Laguna';
        $station->location = 'Bay';
        $station->lat = '14.14341';
        $station->lng = '121.27277';
        $station->type = 'Rain2';
        $station->sim = 'Smart';
        $station->save();

        $station = new Station();
        $station->device_id = '287';
        $station->province = 'Laguna';
        $station->location = 'Molawin Sampling Site UPLB';
        $station->lat = '14.1564';
        $station->lng = '121.234';
        $station->type = 'Waterlevel';
        $station->sim = 'Smart';
        $station->save();

        $station = new Station();
        $station->device_id = '1226';
        $station->province = 'Laguna';
        $station->location = 'Macabling Dam 2';
        $station->lat = '14.29745';
        $station->lng = '121.09453';
        $station->type = 'Waterlevel';
        $station->sim = 'Smart';
        $station->save();

        $station = new Station();
        $station->device_id = '444';
        $station->province = 'Laguna';
        $station->location = 'Nagcarlan';
        $station->lat = '14.13332';
        $station->lng = '121.41523';
        $station->type = 'Rain2';
        $station->sim = 'Smart';
        $station->save();
    }
}
