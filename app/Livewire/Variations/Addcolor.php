<?php

namespace App\Livewire\Variations;

use Illuminate\Foundation\Providers\FoundationServiceProvider;
use Livewire\Component;
use App\Models\Color;
use Illuminate\Support\Carbon;

class Addcolor extends Component
{
    public $color_name;
    public $color_code;

    public function color_insert(){
        Color::create([
            'color_name' => $this->color_name,
            'user_id' => auth()->id(),
            'color_code' => $this->color_code,
            'created_at' => Carbon::now(),
        ]);

        $this->inputreset();
        session()->flash('color_added', 'Color Added successfully');
    }


    public function updatecolor($id){
        Color::find($id)->update([
            'color_name' => $this->color_name,
            'color_code' => $this->color_code,
            'updated_at' => Carbon::now(),
        ]);

        $this->inputreset();
        session()->flash('color_added', 'Color Added successfully');
    }

    public function inputreset(){
        $this->color_name = "";
        $this->color_code = "";

    }


    public function editcolor($id){
        $editcolor = Color::where('id', $id)->first();
        $this->color_name = $editcolor->color_name;
        $this->color_code = $editcolor->color_code;

    }



    public function delete_color($id){
        Color::find($id)->delete();
        session()->flash('color_deleted', 'Color Deleted successfully');
    }


    public function render()
    {
        $colors = Color::where('user_id', auth()->id())->latest()->get();
        return view('livewire.variations.addcolor', compact('colors'));
    }
}
