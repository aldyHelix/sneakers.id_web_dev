<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Size\Repositories\SizeRepository;

class Size extends Component
{
    public $current_size;
    public $edit;

    public function render(SizeRepository $size)
    {
        $size = $size->getSizeIdAndNameLivewire()->toJson();
        return view('livewire.size', compact('size'));
    }
}
