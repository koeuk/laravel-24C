<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PromotionProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            // 'discount' => $this->discount,
            // 'products' => $this->products,
            'category' => $this->category->name,
            // 'products' => $this->products //->created_at->format('jS F Y'),
        ];
    }
}
