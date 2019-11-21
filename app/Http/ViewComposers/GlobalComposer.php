<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

use App\Models\Item;
use App\Menu;

class GlobalComposer
{
    public $conditions = [
        '*' => 'global'
    ];

    /**
     * Bind data to the view.
     *
     * @param  View $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        foreach (array_keys($this->conditions) as $keyName) {
            if (Str::is($keyName, $view->name())) {
                if (!method_exists($this, $this->conditions[$keyName])) {
                    continue;
                }

                $view->with($this->{$this->conditions[$keyName]}($view));
            }
        }
    }

    public function global()
    {
        return [
            'isFrontPage' => is_front_page(),
            'primaryMenuItems' => Menu::getByLocation('primary-menu'),
        ];
    }
}
