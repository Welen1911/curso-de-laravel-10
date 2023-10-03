<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $support) {
        $supports = $support->all();

        return view('admin.supports.index', compact('supports'));
    }

    public function create() {
        return view('admin.supports.create');
    }

    public function store(Request $request) {
        $support = new Support();

        $support->subject = $request->subject;
        $support->body = $request->body;

        $support->save();

        return redirect(route('supports.index'));

    }
}
