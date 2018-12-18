<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RunMigrateController
{
  public function run(Request $request)
  {
    $mode = $request->input('mode');
    $cmd = 'php /home/admin/web/api.tigalaskarbeton.com/public_html/artisan migrate';

    if($mode) $cmd .= ':'.$mode;

    $output = shell_exec($cmd);
    
    return response()->json(['output' => $output], 200);
  }
}