<?php

namespace App\View\Components;

use Illuminate\Support\Facades\{Auth, DB};
use Illuminate\View\{Component, View};

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $is_admin = DB::table("users")->where(['id' => Auth::id(), 'is_admin' => '1'])->exists();
        if ($is_admin) {
            return view('layouts.app');
        } else {
            return view('layouts.user_app');
        }
    }
}
