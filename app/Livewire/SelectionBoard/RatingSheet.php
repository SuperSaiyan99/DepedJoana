<?php

namespace App\Livewire\SelectionBoard;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RatingSheet extends Component
{
    public array $questions = [];
    public array $points = [];
    public int $total = 0;
    public String $comments;

    public function mount()
    {
        $this->questions = $this->show_IOAF_Questions()->toArray();
        $this->points = array_fill(0, count($this->questions), 0);


        foreach ($this->questions as $index => $question) {
            $this->points[$index] = $question->points;
            $this->total =+ $this->points[$index]; 
        }

        $this->total = array_sum($this->points);
    }

    public function render()
    {
        return view('livewire.selection-board.rating-sheet');
    }



    //Functions
    public function save()
    {

    }

    public function show_IOAF_Questions()
    {
        return DB::table('hrmpsb_questionnaires')
            ->where('questionnaire_type', 'co_ioaf')
            ->select([
                'id',
                'title',
                'description',
                'points',
            ])
            ->get();
    }

    // Function to increment points
    public function increment_points($index)
    {
        if (isset($this->questions[$index])) {
            $max_points = $this->questions[$index]->points;
            if ($this->points[$index] < $max_points) {
                $this->points[$index]++;
                $this->updatedPoints();
            }
        }
    }

    public function decrement_points($index)
    {
        if (isset($this->questions[$index])) {
            if ($this->points[$index] > 0) {
                $this->points[$index]--;
                $this->updatedPoints();
            }
        }
    }

    public function updatedPoints()
    {
        $this->total = array_sum($this->points);
    }

}
