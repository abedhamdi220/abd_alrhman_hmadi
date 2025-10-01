<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // TODO: Implement the resource transformation
        // Return an array with the following fields:
        // - id, name, description, price, status
        // - provider (when loaded) - name, email
        // - category (when loaded) - name
        // - created_at, updated_at



        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'status' => $this->status,
            'category' => $this->whenLoaded('category', function () {
                return new CategoryResource($this->category);
            }),
            'provider' => $this->whenLoaded('provider', function () {
                return [
                    'id' => $this->provider->id,
                    'name' => $this->provider->name,
                ];
            }),
            'created_at' => $this->created_at?->toDateTimeString(),
        ];
    }
}
