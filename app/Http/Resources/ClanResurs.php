<?php

namespace App\Http\Resources;

use App\Models\Mesto;
use App\Models\Tim;
use Illuminate\Http\Resources\Json\JsonResource;

class ClanResurs extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $mesto = Mesto::find($this->mestoID);
        $tim = Tim::find($this->timID);

        return [
            'id' => $this->id,
            'ime' => $this->ime,
            'prezime' => $this->prezime,
            'godinaStudija' => $this->godinaStudija,
            'mesto' => $mesto->nazivMesta,
            'tim' => $tim->nazivTima
        ];
    }
}