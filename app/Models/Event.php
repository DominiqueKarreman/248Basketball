<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'naam',
        'beschrijving',
        'datumTijd',
        'veld_id',
        'verantwoordelijke',
        'prijs',
        'img_url',
        'locatie',
        'is_active',
        'duratie',
        'capaciteit',
        'is_open',        
    ];
    public function closeEvent(){
        $this->is_open = false;
        $this->save();
    }
    public function openEvent(){
        $this->is_open = true;
        $this->save();
    }
    public function activateEvent(){
        $this->is_active = true;
        $this->save();
    }
    public function deactivateEvent(){
        $this->is_active = false;
        $this->save();
    }
    public function getLatLong(){
        if($this->locatie_id !== null){
            $locatie = Locatie::find($this->locatie_id);
            return ["latitude" => $locatie->latitude,
                    "longitude" => $locatie->longitude];
        } else {
            $veld = Veld::find($this->veld_id);
            return ["latitude" => $veld->latitude,
                    "longitude" => $veld->longitude];
        }
      
    }
}
