<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HoangController extends Controller
{
  public function fuq(Request $request, $message2 = null)
  {
      // ?comment=foobar
      $comment = $request->input('comment');

      $msg = 'Example: /hoang/Hello?comment=goodbye';

      if ($message2 != null) {
          $msg = $message2;
          if ($comment != null) {
              $msg .= ' '. $comment;
          } else {
              $msg .= ' is unhappy';
          }
      }

      // resources/views/world.blade.php
      return view('hoang', ['message2' => $msg]);
  }
}
