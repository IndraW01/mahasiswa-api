<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MahasiswaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->User->name,
            'email' => $this->User->email,
            'nim' => $this->nim,
            'jurusan' => $this->Jurusan->name,
            'jenis_kelamin' => $this->jenis_kelamin
        ];
    }
}
