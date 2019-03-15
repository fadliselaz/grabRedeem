<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\Draw;


class PlayerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $data = [])
    {
        $search = '';
        $searchPrize = '';
    	if ($request->has('search')) {
            $search = $request->search;
    		$players = Player::where('name','LIKE','%'.$search.'%')->orderBy('created_at', 'desc')->paginate(10);
            $players->appends(['search' => $search]);
    	} else if ($request->has('searchPrize')) {
            $searchPrize = $request->searchPrize;
            $players = Player::whereHas('drawslist'
                , function($draws) use ($searchPrize) {
                $draws->whereHas('prize', function($prizes) use ($searchPrize) {
                    $prizes->where('name','LIKE','%'.$searchPrize.'%');
                });
            })
            ->paginate(10);
            $players->appends(['searchPrize' => $searchPrize]);
        } else {
	    	$players = Player::orderBy('created_at', 'desc')->paginate(10);
    	}

    	foreach ($players as $key => $player) {
    		$claimed = Draw::where('player_id', $player->id)->where('status', 2)->count();
    		$players[$key]['is_claim'] = $claimed > 0 ? true : false ;
    		foreach ($player->drawslist as $key => $draw) {
				$player->drawslist[$key]['play_order'] = Draw::where('id','<=', $draw->id)->count(); 
			}
    	}
        $data['players'] = $players;
        $data['search'] = $search;
        $data['searchPrize'] = $searchPrize;
    	return view('pages.players.index', $data);
    }

    public function store(Request $request)
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

    	return back()->with('success', "Player {$player->name} added");
    }

    public function detail(Request $request, $id)
    {
		try {
	        $player = Player::findOrFail($id);
	    } catch (ModelNotFoundException $exception) {
	        return back()->withError($exception->getMessage())->withInput();
	    }
		$data['player'] = $player;
		$drawslist = $player->drawslist;
		foreach ($drawslist as $key => $draw) {
			$drawslist[$key]['play_order'] = Draw::where('id','<=', $draw->id)->count(); 
		}
    	return $this->index($request, $data);
    }

    public function update(Request $request, $id)
    {
		try {
	        $player = Player::findOrFail($id);
	    } catch (ModelNotFoundException $exception) {
	        return back()->withError($exception->getMessage())->withInput();
	    }
		$validator = \Validator::make($request->all(), [
            'name' => 'required',
            'draws' => 'required|integer|between:1,10'
        ]);

		if($validator->fails()) {
		    return back()->withInput()->withErrors($validator->errors());
		}
        $player->name = $request->name;
        $player->draws = $request->draws;
        $player->save();
    	return redirect('/dashboard/players')->with('success', "Player {$player->name} updated");
    }

    public function delete(Request $request, $id)
    {
		try {
	        $player = Player::findOrFail($id);
	    } catch (ModelNotFoundException $exception) {
	        return back()->withError($exception->getMessage())->withInput();
	    }
        $player->delete();
    	return back()->with('success', "Player {$player->name} deleted");
    }

    public function claimPrizes(Request $request, $id)
    {
		try {
	        $player = Player::findOrFail($id);
	    } catch (ModelNotFoundException $exception) {
	        return back()->withError($exception->getMessage())->withInput();
	    }

		$data['player'] = $player;
		$drawslist = $player->drawslist;
		foreach ($drawslist as $key => $draw) {
			$draw->status = 2;
			$draw->timestamps = false;
			$draw->save();
		}

    	return redirect('/dashboard/players')->with('success', "Player {$player->name} claimed all prizes");
    }
    
    public function deleteDraw(Request $request, $drawId)
    {
        try {
            $draw = Draw::where('id', $drawId)->whereNotNull('prize_id')->first();
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        $drawName = $draw->prize->name;
        $draw->prize_id = null;
        $draw->save();

        return redirect('/dashboard/players')->with('success', "Prize {$drawName} removed for a player's draw.");
    }    

}
