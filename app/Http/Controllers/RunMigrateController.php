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
    
    return '<pre>'.$output.'</pre>';
  }

  public function runCmd(Request $request)
  {

    $cmd = 'php /home/admin/web/api.tigalaskarbeton.com/public_html/artisan ';

    $cmd .= $request->input('cmd');

    return '<pre>'.$output.'</pre>';


  }
}