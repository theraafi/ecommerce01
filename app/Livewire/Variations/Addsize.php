<?php

namespace App\Livewire\Variations;

use Livewire\Component;
use App\Models\Size;
use Illuminate\Support\Carbon;
use App\Models\User;

class Addsize extends Component
{
    public $size;
    
    public function size_insert(){
        Size::insert([
            "size" => $this->size,
            "user_id" => auth()->id(),
            "created_at" => Carbon::now(),
        ]);
        $this->reset();
        session()->flash('size_added', 'Size Added successfully');
    }

    public function delete_size($id){
        Size::find($id)->delete();
        session()->flash('size_deleted', 'Size Deleted successfully');
    }

    public function edit_size($id){
        Size::find($id)->update([
            "size" => $this->size,
            "user_id" => auth()->id(),
            "updated_at" => now(),
        ]);
    }

    public function render()
    {
        $sizes = Size::where('user_id', auth()->id())->latest()->get();
        return view('livewire.variations.addsize', compact('sizes'));
    }
}
