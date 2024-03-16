<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Edit extends Component
{
    public $method;
    public $action;
    public $title;
    public $button;
    public $subCategory;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($subCategory = null)
    {
        $this->method = 'POST';
        $this->action = route('sub.store');
        $this->button = 'submit';
        $this->title = 'Add Sub';
        $this->subCategory = $subCategory;


        if (isset($subCategory) && $subCategory != null) {
            $this->subCategory = $subCategory;
            $this->method = 'PUT';
            $this->action = route('sub.update', $subCategory->id);
            $this->button = 'Save';
            $this->title = 'Edit Sub';
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.edit');
    }
}
