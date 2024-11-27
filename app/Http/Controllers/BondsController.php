<?php

namespace App\Http\Controllers;

use App\Models\Bonds;
use Carbon\Carbon;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\{RedirectResponse, Request};

class BondsController extends Controller
{
    /**
     * @return View|Factory|Application
     */
    public function index(): View|Factory|Application
    {
        return view('dashboard');
    }

    /**
     * @return View|Factory|Application
     */
    public function userDashboard(): View|Factory|Application
    {
        return view('user_dashboard');
    }

    /**
     * @return View|Factory|Application
     */
    public function viewBound(): View|Factory|Application
    {
        return view('bound');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function addBound(Request $request): RedirectResponse
    {
        Bonds::create([
            'title' => $request->title,
            'price' => $request->price,
            'slots' => $request->slots,
            'status' => 'active',
            'start_date' => Carbon::now(),
            'withdraw_date' => $request->withdraw_date,
        ]);
        return Redirect::route('view-bound')->with('status', true);
    }
}
