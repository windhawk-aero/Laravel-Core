<?php
/**
 * Path: app/Core/Base/Controllers/Controller.php
 * Author: Ahmet Yusuf TOĞTAY
 * E-Mail:
 * Created At: 25.05.2023
 */
namespace App\Core\Base\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * Class Controller
 * @package App\Core\Base\Controllers
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
