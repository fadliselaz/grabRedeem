<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\Prize;
use App\Draw;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function index(Request $request, $data = [])
    {
    	if (Auth::user()->type != 1) {
    		return back()->withError("Unauthorized")->withInput();
    	}
    	
        $schedules = Schedule::orderBy('play_order', 'desc')->get();
    	// $schedules = Schedule::whereHas('prize')
     //    ->with(['prize' => function($query) {
     //        $query->orderBy('name', 'asc');
     //    }])
     //    ->get();
    	$grandPrizes = Prize::where('type', 1)->get();
  //   	$filter = $grandPrizes->filter(function ($prize, $key) {
		//     return $prize->qtyScheduleRemains() > 0;
		// });
    	$data['schedules'] = $schedules;
    	$data['grand_prizes'] = $grandPrizes;
    	$data['play_order'] = Draw::count();
    	return view('pages.schedules.index', $data);
    }

    public function store(Request $request)
    {
		if (Auth::user()->type != 1) {
    		return back()->withError("Unauthorized")->withInput();
    	}

    	$validator = \Validator::make($request->all(), [
            'play_order' => 'required|integer',
            'prize_id' => 'required|integer'
        ]);

		if($validator->fails()) {
		    return back()->withInput()->withErrors($validator->errors());
		}
		$schedule = new Schedule;
        $schedule->prize_id = $request->prize_id;
        $schedule->play_order = $request->play_order;
        $schedule->save();

    	return back()->with('success', "Schedule for prize {$schedule->prize->name} added");
    }

    public function detail(Request $request, $id)
    {
    	if (Auth::user()->type != 1) {
    		return back()->withError("Unauthorized")->withInput();
    	}

		try {
	        $schedule = Schedule::findOrFail($id);
	    } catch (ModelNotFoundException $exception) {
	        return back()->withError($exception->getMessage())->withInput();
	    }
		$data['schedule'] = $schedule;
    	return $this->index($request, $data);
    }

    public function update(Request $request, $id)
    {
    	if (Auth::user()->type != 1) {
    		return back()->withError("Unauthorized")->withInput();
    	}

		try {
	        $schedule = Schedule::findOrFail($id);
	    } catch (ModelNotFoundException $exception) {
	        return back()->withError($exception->getMessage())->withInput();
	    }
		$validator = \Validator::make($request->all(), [
            'play_order' => 'required'
        ]);

		if($validator->fails()) {
		    return back()->withInput()->withErrors($validator->errors());
		}
        $schedule->prize_id = $request->prize_id;
        $schedule->play_order = $request->play_order;
        $schedule->save();
    	return redirect('/dashboard/schedules')->with('success', "Schedule for prize {$schedule->prize->name} updated");
    }

    public function delete(Request $request, $id)
    {
		if (Auth::user()->type != 1) {
    		return back()->withError("Unauthorized")->withInput();
    	}
		try {
	        $schedule = Schedule::findOrFail($id);
	    } catch (ModelNotFoundException $exception) {
	        return back()->withError($exception->getMessage())->withInput();
	    }
        $schedule->delete();
    	return back()->with('success', "Schedule for prize {$schedule->prize->name} deleted");
    }
}
