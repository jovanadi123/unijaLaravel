<?php

namespace App\Http\Controllers;

use App\Http\Resources\TimResurs;
use App\Models\Tim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TimController extends BaseController
{
    public function index()
    {
        $timovi = Tim::all();
        return $this->uspesnoOdgovor(TimResurs::collection($timovi), 'Vraceni svi podaci o timovima!');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nazivTima' => 'required',
        ]);
        if($validator->fails()){
            return $this->greskaOdgovor($validator->errors());
        }

        $tim = Tim::create($input);

        return $this->uspesnoOdgovor(new TimResurs($tim), 'Novi tim je kreiran.');
    }


    public function show($id)
    {
        $tim = Tim::find($id);
        if (is_null($tim)) {
            return $this->greskaOdgovor('Tim sa zadatim id-em ne postoji.');
        }
        return $this->uspesnoOdgovor(new TimResurs($tim), 'Tim sa zadatim id-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $tim = Tim::find($id);
        if (is_null($tim)) {
            return $this->greskaOdgovor('Tim sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'nazivTima' => 'required',
        ]);

        if($validator->fails()){
            return $this->greskaOdgovor($validator->errors());
        }

        $tim->nazivTima = $input['nazivTima'];
        $tim->save();

        return $this->uspesnoOdgovor(new TimResurs($tim), 'Tim je azuriran.');
    }

    public function destroy($id)
    {
        $tim = Tim::find($id);
        if (is_null($tim)) {
            return $this->greskaOdgovor('Tim sa zadatim id-em ne postoji.');
        }

        $tim->delete();
        return $this->uspesnoOdgovor([], 'Tim je obrisan.');
    }
}