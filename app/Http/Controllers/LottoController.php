<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Combination;

class LottoController extends Controller
{
    public function index() {
        return view('lotto.index');
    }

    public function list_combinations(Request $request) {
        $generated_list = Combination::orderBy('id', 'DESC')->get();

        return view('lotto.combinations', compact('generated_list'));
    }

    public function has_duplicates($combinations) {
        $orderings = $this->get_all_possible_ordering($combinations);
        $converted_orderings = $this->convert_arrays_to_array_string($orderings);

        return Combination::whereIn('combination', $converted_orderings)->first() !== null ? Combination::whereIn('combination', $converted_orderings)->first() : null;
    }

    public function save_combinations(Request $request) {
        if($request->isMethod('POST')){
            $has_duplicates = $this->has_duplicates($request->combi);

            if(!isset($has_duplicates)){
                Combination::create([
                    'combination' => implode(',', $request->combi)
                ]);

                Session::flash('success', 'Generated lotto number successfully added.');
            }else{
                Session::flash('error', 'Lotto numbers <b>' . implode(',', $request->combi). '</b> already listed from ' . $has_duplicates->created_at);
            }

            return redirect()->back();
        }

        return view('lotto.generate');
    }

    public function convert_arrays_to_array_string($permutations){
        $possibles = [];
        foreach ($permutations as $permutation) {
            array_push($possibles, implode(',', $permutation));
        }
    
        return $possibles;
    }

    public function get_all_possible_ordering($items, $orderings = [],&$return_value = []) {
        if(!empty($items)){
            for ($i = count($items) - 1; $i >= 0; --$i) {
                $new_items = $items;
                $new_orderings = $orderings;
                list($arrays) = array_splice($new_items, $i, 1);
                array_unshift($new_orderings, $arrays);
                $this->get_all_possible_ordering($new_items, $new_orderings, $return_value);
            }
        }else{
            $return_value[] = $orderings;
        }
        
        return $return_value;
     }

    
}
