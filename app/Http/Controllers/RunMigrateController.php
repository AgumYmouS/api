<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RunMigrateController
{
  public function run()
  {
    $cmd = 'php /home/admin/web/api.tigalaskarbeton.com/public_html/artisan migrate:refresh';

    $output = shell_exec($cmd);

    return '<pre>'.$output.'</pre>';
  }

  public function runFresh()
  {
    $cmd = 'php /home/admin/web/api.tigalaskarbeton.com/public_html/artisan migrate:fresh';

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
