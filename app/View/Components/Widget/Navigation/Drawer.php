<?php

namespace App\View\Components\Widget\Navigation;

use App\Context\Theme\Models\NavigationItems;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class Drawer extends Component
{
    public array $items;

    public string $fontAwesomeIconTypeAndSize;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->fontAwesomeIconTypeAndSize = config('theme.navigation.fa-type')
            .' '.config('theme.navigation.fa-size');

        if (! config('cache.navigation.enabled') || ! Cache::has('navigation-items')) {
            $this->items = NavigationItems::withoutTrashed()
                ->get()
                ->toArray();

            if (config('cache.navigation.enabled')) {
                Cache::put('navigation-items', $this->items, now()->addHours(12));
            }
        } else {
            $this->items = (array) Cache::get('navigation-items');
        }
    }

    public function render(): View
    {
        return view('components.widget.navigation.drawer');
    }
}
