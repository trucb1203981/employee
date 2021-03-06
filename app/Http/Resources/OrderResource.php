<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
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
            'id'              => $this->id,
            'owner'           => $this->whenLoaded('user', function() {  
                return new UserResource($this->user);                
            }),
            'name'            => $this->name,
            'address'         => $this->address,
            'lat'             => $this->lat,
            'lng'             => $this->lng,
            'distance'        => $this->distance,
            'phone'           => $this->phone,
            'bookingDate'     => Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d-m-Y H:i'),
            'receiveDate'     => $this->date,
            'receiveTime'     => $this->time,
            'deliveryPrice'   => $this->delivery_price,
            'subTotal'        => $this->subtotal_amount,
            'total'           => $this->amount,
            'memo'            => $this->memo,
            'coupon'          => $this->coupon,
            'secret'          => $this->secret,
            'discountPercent' => $this->discount,
            'discountTotal'   => $this->discount_total,
            'statusId'        => $this->status_id,
            'statusName'      => $this->status->order_status_name,
            'statusColor'     => $this->status->color,
            'statusStep'      => $this->status->number_order,
            'orderNotes'      => unserialize($this->note),
            'items'           => $this->whenLoaded('products', function() {
                foreach ($this->products as $product) {
                    $product->pivot->toppings = unserialize($product->pivot->toppings);
                }

                return $this->products;
            }),
            'payment'         => $this->whenLoaded('payment', function() {
                return new PaymentMethodResource($this->payment);
            }),
            'store'           => $this->whenLoaded('store', function() {
                return new StoreResource($this->store);
            }),
            'shipper'         => $this->whenLoaded('shipper', function() {
                return new UserResource($this->shipper);
            }),
            'employee'        => $this->whenLoaded('employee', function() {
                return new UserResource($this->employee);
            }),
            'actualOrder'    => $this->whenLoaded('actualOrder', function() {
                return new ActualOrderResource($this->actualOrder);
            })
        ];
    }
}
