<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StarRating extends Component
{
    /**
     * The rating value.
     *
     * @var float|null
     */
    public $rating;

    /**
     * Create a new component instance.
     *
     */
    public function __construct($rating = null)
    {
        $this->rating = $rating;
    }

    /**
     * Get the view / contents that represent the component.
     *
     */
    public function render()
    {
        return view('components.star-rating');
    }
}
