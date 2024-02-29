<?php

namespace App\Http\Resources;

use App\Data\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ConversationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'customer_name' => $this->customer_name,
            'messages' => [
                // converted carbon datetime to CarbonImmutable 
                // because Message class has a CarbonImmutable as dependency
                Message::from([
                    'content' => 'Some message #1',
                    'sentAt' => now()->subMinutes(5)->toImmutable()
                ]),
                Message::from([
                    'content' => 'Some message #2',
                    'sentAt' => now()->subMinutes(3)->toImmutable()
                ])
            ]
        ];
    }
}
