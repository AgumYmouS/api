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

    $output = shell_exec($cmd);

    return '<pre>'.$output.'</pre>';


  }

  public function pull()
  {
    $cmd = 'cd /home/admin/web/api.tigalaskarbeton.com/public_html && git pull origin master ';

    $output = shell_exec($cmd);

    return '<pre>'.$output.'</pre>';

  }
}