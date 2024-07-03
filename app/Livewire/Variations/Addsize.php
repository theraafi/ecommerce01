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
        $this->inputreset();
        session()->flash('size_added', 'Size Added successfully');
    }


    public function delete_size($id){
        Size::find($id)->delete();
        session()->flash('size_deleted', 'Size Deleted successfully');
    }

    public function inputreset(){
        $this->size = "";
    }


    public function editsize($id){
        $editsize = Size::where('id', $id)->first();
        $this->size = $editsize->size;
    }

    public function updatesize($id){
        Size::find($id)->update([
            "size" => $this->size,
            "user_id" => auth()->id(),
            "updated_at" => now(),
        ]);
        $this->inputreset();
        return redirect()->to('/variation/create');
        // session()->flash('size_updated', 'Size Updated successfully');
    }


    public function render()
    {
        $sizes = Size::where('user_id', auth()->id())->latest()->get();
        return view('livewire.variations.addsize', compact('sizes'));
    }
}
