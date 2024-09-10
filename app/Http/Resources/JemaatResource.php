<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JemaatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this -> id,
            'nama' => $this -> nama,
            'gender' => $this -> gender,
            'alamat' => $this -> alamat,
            'telepon' => $this -> telepon,
            'masjid_id' => $this -> masjid_id,

            'masjid' => new MasjidResource($this->whenLoaded('masjid'))
        ];
    }
}
