<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClanResurs;
use App\Models\Clan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClanController extends BaseController
{
    public function index()
    {
        $clanovi = Clan::all();
        return $this->uspesnoOdgovor(ClanResurs::collection($clanovi), 'Vraceni svi podaci o clanovima!');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'ime' => 'required',
            'prezime' => 'required',
            'godinaStudija' => 'required',
            'timID' => 'required',
            'mestoID' => 'required',
        ]);
        if($validator->fails()){
            return $this->greskaOdgovor($validator->errors());
        }

        $clan = Clan::create($input);

        return $this->uspesnoOdgovor(new ClanResurs($clan), 'Novi clan je kreiran.');
    }


    public function show($id)
    {
        $clan = Clan::find($id);
        if (is_null($clan)) {
            return $this->greskaOdgovor('Clan sa zadatim id-em ne postoji.');
        }
        return $this->uspesnoOdgovor(new ClanResurs($clan), 'Clan sa zadatim id-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $clan = Clan::find($id);
        if (is_null($clan)) {
            return $this->greskaOdgovor('Clan sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'ime' => 'required',
            'prezime' => 'required',
            'godinaStudija' => 'required',
            'timID' => 'required',
            'mestoID' => 'required',
        ]);

        if($validator->fails()){
            return $this->greskaOdgovor($validator->errors());
        }

        $clan->ime = $input['ime'];
        $clan->prezime = $input['prezime'];
        $clan->godinaStudija = $input['godinaStudija'];
        $clan->timID = $input['timID'];
        $clan->mestoID = $input['mestoID'];
        $clan->save();

        return $this->uspesnoOdgovor(new ClanResurs($clan), 'Clan je azuriran.');
    }

    public function destroy($id)
    {
        $clan = Clan::find($id);
        if (is_null($clan)) {
            return $this->greskaOdgovor('Clan sa zadatim id-em ne postoji.');
        }

        $clan->delete();
        return $this->uspesnoOdgovor([], 'Clan je obrisan.');
    }
}