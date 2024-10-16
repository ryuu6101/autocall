<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function agencies() {
        $menu = [
            'sidebar' => 'agencies',
            'breadcrumb' => 'Đại lý',
        ];

        return view('admin.sections.agencies.index')->with(['menu' => $menu]);
    }

    public function sim_cards() {
        $menu = [
            'sidebar' => 'sim-cards',
            'breadcrumb' => 'Thẻ sim',
        ];

        return view('admin.sections.sim-cards.index')->with(['menu' => $menu]);
    }

    public function staticals() {
        $menu = [
            'sidebar' => 'staticals',
            'breadcrumb' => 'Thống kê',
        ];

        return view('admin.sections.staticals.index')->with(['menu' => $menu]);
    }
}
