<?php

namespace App\Http\Controllers;

use App\Http\Resources\MestoResurs;
use App\Models\Mesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MestoController extends BaseController
{
    public function index()
    {
        $mesta = Mesto::all();
        return $this->uspesnoOdgovor(MestoResurs::collection($mesta), 'Vraceni svi podaci o mestima.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nazivMesta' => 'required',
        ]);
        if($validator->fails()){
            return $this->greskaOdgovor($validator->errors());
        }

        $mesto = Mesto::create($input);

        return $this->uspesnoOdgovor(new MestoResurs($mesto), 'Novo mesto je kreirano.');
    }


    public function show($id)
    {
        $mesto = Mesto::find($id);
        if (is_null($mesto)) {
            return $this->greskaOdgovor('Mesto sa zadatim id-em ne postoji.');
        }
        return $this->uspesnoOdgovor(new MestoResurs($mesto), 'Mesto sa zadatim id-em je vracena.');
    }


    public function update(Request $request, $id)
    {
        $mesto = Mesto::find($id);
        if (is_null($mesto)) {
            return $this->greskaOdgovor('Mesto sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'nazivMesta' => 'required',
        ]);

        if($validator->fails()){
            return $this->greskaOdgovor($validator->errors());
        }

        $mesto->nazivMesta = $input['nazivMesta'];
        $mesto->save();

        return $this->uspesnoOdgovor(new MestoResurs($mesto), 'Mesto je azurirano.');
    }

    public function destroy($id)
    {
        $mesto = Mesto::find($id);
        if (is_null($mesto)) {
            return $this->greskaOdgovor('Mesto sa zadatim id-em ne postoji.');
        }
        $mesto->delete();
        return $this->uspesnoOdgovor([], 'Mesto je obrisana.');
    }
}