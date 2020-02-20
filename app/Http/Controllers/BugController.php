<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Bug;
use \App\Category;
use Auth;
use \App\Solution;

class BugController extends Controller
{
   public function index(){
      $bugs = Bug::all();

   	return view('bug', compact("bugs"));
   }

   public function create(){

   	$categories = Category::all();

   	return view('userviews.addbug', compact("categories"));
   }

   public function store(Request $req){

   	$newBug = new Bug;
   	$newBug->title = $req->title;
   	$newBug->body = $req->body;
   	$newBug->category_id = $req->category_id;
   	$newBug->status_id=1;
   	$newBug->user_id = Auth::user()->id;
   	$newBug->save();

   	return redirect('/allbugs');
   }

   public function indivBugs(){

   	$bugs = Bug::where('user_id', Auth::user()->id)->get();

   	return view('userviews.mybug', compact("bugs"));
   }

   public function destroy($id){
   	$bugToDelete = Bug::find($id);
   	$bugToDelete->delete();
   	return redirect('/mybugs');
   }

   public function edit($id){

   	$bug = Bug::find($id);
   	$categories = Category::all();

   	return view('userviews.editbug', compact('bug', 'categories'));
   }

   public function update($id, Request $req){
   	$bugToEdit = Bug::find($id);

      $bufgToEdit->title= $req->title;
      $bugToEdit->body = $req->body;
      $bugToEdit->category_id=$req->category_id;
      $bugToEdit->save();
      return redirect('/mybugs');
   }

   public function showSolve($id){

      $bug = Bug::find($id);

      return view('adminviews.solveform', compact("bug"));
   }

   public function saveSolution(Request $req){
      $newSolution = new Solution;
      $newSolution->title=$req->title;
      $newSolution->body=$req->body;
      $newSolution->bug_id = $req->bug_id;
      $newSolution->status_id = 5;
      $newSolution->save();


      $bug = Bug::find($req->bug_id);
      $solutions = Solution::where('bug_id', $req->bug_id)->get();

      //We will update the status of the bug from pending to answered
      //updated it to 3
      $bug->status_id=3;
      $bug->save();
      return redirect('/indivbug/'.$req->bug_id)->with(compact('bug', 'solutions'));


   }

   public function showIndivBug($id){

      $bug = Bug::find($id);
      $solutions = Solution::where("bug_id", $id)->get();

      return view('indivbug', compact('bug','solutions'));
   }

   public function accept($id){
      $bug = Bug::find($id);
      $bug->status_id = 4;
      $bug->save();

      $solutions = Solution::where('bug_id', $id)->get();

      foreach($solutions as $indiv_solution){
         $indiv_solution->status_id=6;
         $indiv_solution->save();
      }
      return redirect()->back();
   }

}