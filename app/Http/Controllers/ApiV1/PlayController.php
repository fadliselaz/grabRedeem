<?php

namespace App\Http\Controllers\ApiV1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Player;
use App\Prize;
use App\Schedule;
use App\Draw;
use Dingo\Api\Routing\Helpers;

class PlayController extends Controller
{
	use Helpers;

    public function new(Request $request)
    {
    	$validator = \Validator::make($request->all(), [
            'name' => 'required',
            'draws' => 'required|integer|between:1,10'
        ]);

		if($validator->fails()) {
		    return back()->withInput()->withErrors($validator->errors());
		}

		$player = new Player;
        $player->name = $request->name;
        $player->draws = $request->draws;
        $player->save();

        return $this->createDraws($request, $player);

    }

    public function createDraws(Request $request, $player)
    {

	    $typeGrand = 1;
	   	$prizes = Prize::all();
	   	$gimmick = $prizes->filter(function ($prize, $key) {
		    return $prize->qtyRemains() > 0;
		});

	   	$draws = [];
		for ($i=0; $i < $player->draws; $i++) { 
			$draw = new Draw;
			$draw->player_id = $player->id;
			$draw->save();
			$draws[$i] = $draw;
		}

		$data['player'] = $player->toArray(); 
		$data['drawslist'] = $draws; 

		return redirect()->route('play.draw', $player->id );
        // return $this->response->array($data);
    }


    public function getDraw(Request $request, $draw_id)
    {
		try {
	        $draw = Draw::findOrFail($draw_id);
	    } catch (ModelNotFoundException $exception) {
	        return back()->withInput()->withErrors($exception->getMessage());
	    }

	    if ($draw->prize_id !== null) {
	    	return $this->response->error("Prize already claimed", 400);
	    }

	    $typeGrand = 1;
	   	$prizesQuery = Prize::inRandomOrder();
	   	$prizes = $prizesQuery->get();
	 //   	$prizesChecked = $prizes->filter(function ($prize, $key) {
		//     return $prize->qtyRemains() > 0 && $prize->type == 0;
		// });
		$prizesGimmick = $prizesQuery->where('type',0)->get();
		$prizesChecked = [];
		foreach ($prizesGimmick as $prize) {
		    if ($prize->qtyRemains() > 0) {
		        $prizesChecked[] = $prize;
		    }
		    unset($prize->draws);
		}

		// $nextDraw = Draw::select('id')->where('player_id', $draw->player_id)->where('id','>', $draw->id)->first();

		// $nextID = $nextDraw !== null ? $nextDraw->id : null;

		$grandprize = null;
		$order = Draw::where('id','<=', $draw->id)->count();
		$schedule = Schedule::where('play_order', $order)->first();
		if ($schedule != null && $schedule->prize->qtyRemains() > 0) {
			$grandprize = $schedule->prize;
		}

		// $data['next_id'] = $nextID;
		// $draw->player;
        $data['draw'] = $draw;
        $data['prizes']['ruffle'] = $prizes;
	    $data['prizes']['gimmick'] = $prizesChecked;
	    $data['prizes']['last'] = $grandprize;
    	return $this->response->array($data);
    }

    public function getPlayerDraw(Request $request, $user_id)
    { 
    	try {
	        $player = Player::findOrFail($user_id);
	    } catch (ModelNotFoundException $exception) {
	        return back()->withError($exception->getMessage())->withInput();
	    }
		$data['player'] = $player;
		$drawslist = $player->drawslist;
		$data['current_draw'] = null;
		
		foreach ($drawslist as $draw) {
			if ($draw->prize_id == null) {
				$data['current_draw'] = $draw->id;
				break;
			}
		}
		if ($data['current_draw'] == null) {
			return redirect()->route('play.thanks', $player->id );
		}
		$data['class'] = "ruffle";
		return view('pages.play.ruffle' , $data);
    }

    public function getCongrats(Request $request, $user_id)
    { 
    	try {
	        $player = Player::findOrFail($user_id);
	    } catch (ModelNotFoundException $exception) {
	        return back()->withError($exception->getMessage())->withInput();
	    }
		$data['player'] = $player;
		$data['class'] = "";

		$drawslist = $player->drawslist;
		
		$data['next_action'] = route('play.thanks', $player->id );
		foreach ($drawslist as $draw) {
			if ($draw->prize_id == null) {
				$data['next_action'] = route('play.draw', $player->id );
				break;
			}
		}

		return view('pages.play.congrats' , $data);
    }

    public function getThanks(Request $request, $user_id)
    { 
    	try {
	        $player = Player::findOrFail($user_id);
	    } catch (ModelNotFoundException $exception) {
	        return back()->withError($exception->getMessage())->withInput();
	    }
		$data['player'] = $player;
		$data['class'] = "thx";
		return view('pages.play.thanks' , $data);
    }

    public function updateDraw(Request $request, $draw_id)
    {
		try {
	        $draw = Draw::findOrFail($draw_id);
	    } catch (ModelNotFoundException $exception) {
	        return $this->response->error($exception->getMessage(), 404);
	    }
		$validator = \Validator::make($request->all(), [
            'prize_id' => 'required|integer'
        ]);

		if($validator->fails()) {
            $response = $validator->messages();
            return $this->response->error($response, 401);
		}

        $draw->prize_id = $request->prize_id;
        $draw->save();

    	return $this->response->array(['success' => true, 'message' => 'Prize submited']);
    }
}
