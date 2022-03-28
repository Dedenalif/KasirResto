<?php

namespace App\Http\Controllers\Manajer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class LogController extends Controller
{
    public function index()
    {
        $data = Activity::join('users', 'users.id', '=', 'causer_id')
            ->select('activity_log.created_at as tgl_activity', 'users.name', 'activity_log.description')
            ->get();
        // dd($data);
        return view('log.index', compact('data'));
    }
}
