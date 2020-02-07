<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RWHILEController extends Controller
{
  public function index()
  {
    // DBよりBookテーブルの値を全て取得
    #$books = Book::all();
    $program = "";
    $data = "";
    // 取得した値をビュー「book/index」に渡す
    printf($program);
    return view('index', compact('program', 'data'));
  }

  public function index_sample($id)
  {
    $example = $id;
    if ($example == 1) {
       $filename = "swap.rwhile";
    } else if ($example == 2) {
       $filename = "piorder.rwhile";
    } else if ($example == 3) {
       $filename = "ri.rwhile";
    } else if ($example == 4) {
       $filename = "ri.rwhile";
    } else if ($example == 5) {
       $filename = "ri.rwhile";
    } else if ($example == 6) {
       $filename = "ri.rwhile";
    } else if ($example == 7) {
       $filename = "infinite.rwhile";
    } else if ($example == 8) {
       $filename = "enumeration.rwhile";
    } else {
       $filename = "reverse.rwhile";
    }

    if ($example == 1) {
      $data = "list123.val";
    } else if ($example == 2) {
      $data = "piorder_input05.val";
    } else if ($example == 3) {
      $data = "id_and_nil.p_val";
    } else if ($example == 4) {
      $data = "reverse_and_list123.p_val";
    } else if ($example == 5) {
      $data = "piorder.p_val";
    } else if ($example == 6) {
      $data = "ri_ri_reverse_list123.p_val";
    } else if ($example == 8) {
      $data = "nil.val";
    } else {
      $data = "list123.val";
    }
    $program = file_get_contents(public_path().'/examples/'.$filename);
    $data = file_get_contents(public_path().'/examples/'.$data);
    return view('index', compact('program', 'data'));
  }

  public function edit($id)
  {
    // DBよりURIパラメータと同じIDを持つBookの情報を取得
    $book = Book::findOrFail($id);

    // 取得した値をビュー「book/edit」に渡す
    return view('book/edit', compact('book'));
  }
}
