<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MsgSuccess extends Component
{
    public $sKey;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($sKey)
    {
        $this->sKey = $sKey;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.msg-success');
    }
}
