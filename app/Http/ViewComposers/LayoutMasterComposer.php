<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class LayoutMasterComposer
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $active = $this->request->segment(1);
        $active2 = $this->request->segment(2);
        $view->with(['active' => $active, 'active2' => $active2]);
    }
}