<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prize;
use App\Draw;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PrizeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $data = [])
    {
    	$prizes = Prize::orderBy('name','asc')->get();
    	$types = Prize::$types;
    	$data['prizes'] = $prizes;
    	$data['types'] = $types;
    	return view('pages.prizes.index', $data);
    }

    public function store(Request $request)
    {
    	$validator = \Validator::make($request->all(), [
            'name' => 'required'
        ]);

		if($validator->fails()) {
		    return back()->withInput()->withErrors($validator->errors());
		}
		$prize = new Prize;
        $prize->name = $request->name;
        $prize->qty = $request->qty;
        $prize->type = $request->type;
        $prize->save();

    	return back()->with('success', "Prize {$prize->name} added");
    }

    public function detail(Request $request, $id)
    {
		try {
	        $prize = Prize::findOrFail($id);
	    } catch (ModelNotFoundException $exception) {
	        return back()->withError($exception->getMessage())->withInput();
	    }
		$data['prize'] = $prize;
    	return $this->index($request, $data);
    }

    public function update(Request $request, $id)
    {
		try {
	        $prize = Prize::findOrFail($id);
	    } catch (ModelNotFoundException $exception) {
	        return back()->withError($exception->getMessage())->withInput();
	    }
		$validator = \Validator::make($request->all(), [
            'name' => 'required'
        ]);

		if($validator->fails()) {
		    return back()->withInput()->withErrors($validator->errors());
		}
        $prize->name = $request->name;
        $prize->qty = $request->qty;
        $prize->type = $request->type;
        $prize->save();
    	return redirect('/dashboard/prizes')->with('success', "Prize {$prize->name} updated");
    }

    public function delete(Request $request, $id)
    {
		try {
	        $prize = Prize::findOrFail($id);
	    } catch (ModelNotFoundException $exception) {
	        return back()->withError($exception->getMessage())->withInput();
	    }
        $prize->delete();
    	return back()->with('success', "Prize {$prize->name} deleted");
    }

    public function prizesCalc(Request $request)
    {

         $dataPrizes = [];
        if ($request->has('drawDate') && !empty($request->drawDate)) {
            $drawDate = $request->drawDate;
            $start = Carbon::createFromFormat('Y-m-d H:i:s', $drawDate. " 00:00:00", 'Asia/Jakarta');
            $end = Carbon::createFromFormat('Y-m-d H:i:s', $drawDate. " 00:00:00", 'Asia/Jakarta')->addDay();
            $prizes = Prize::orderBy('name','asc')->get();
            foreach ($prizes as $key => $prize) {
                $dataPrizes[$key] = $prize;
                // $query = Draw::where('prize_id', $prize->id)->whereBetween('updated_at', [$start->setTimeZone('UTC'), $end->setTimeZone('UTC')]);
                $dataPrizes[$key]['claimed']  = Draw::where('prize_id', $prize->id)->whereBetween('updated_at', [$start->setTimeZone('UTC'), $end->setTimeZone('UTC')])->where('status', 2)->count();
                $dataPrizes[$key]['unclaimed'] = Draw::where('prize_id', $prize->id)->whereBetween('updated_at', [$start->setTimeZone('UTC'), $end->setTimeZone('UTC')])->where('status', 1)->count();
                $dataPrizes[$key]['total'] = Draw::where('prize_id', $prize->id)->whereBetween('updated_at', [$start->setTimeZone('UTC'), $end->setTimeZone('UTC')])->count();
            }

            //echo $start->setTimeZone('UTC')->format('Y-m-d H:i:s')." ".$end->setTimeZone('UTC')->format('Y-m-d H:i:s');
        }

        $data['prizes'] = $dataPrizes;
        $data['drawDate'] = $request->drawDate;
        return view('pages.prizes.indexcalc', $data);
    }
}
