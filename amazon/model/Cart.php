<?php

class Cart {
    public int $id;
    public array $items;
    public int $total;

    public function __construct(
        int $id,
        string $items,
        string $total,
        
    )
    {
        $this->id = $id;
        $this->items = $items;
        $this->total = $total;
    }
}