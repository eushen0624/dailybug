<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Solution;

class SolutionController extends Controller
{
    public function destroy($id){
    	$solutionToDelete = Solution::find($id);
    	$solutionToDelete->delete();

    	return redirect()->back();


    }
}
