<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'title' => $this->title,
            'message' => $this->message,
            'file' => $this->file,
            'status' => $this->status,
            'is_read' => $this->is_read,
            'has_answer' => $this->has_answer,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at
        ];
    }
}
