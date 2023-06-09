<?php
/**
 * Path: app/Repositories/UserRepository.php
 * Author: Ahmet Yusuf TOĞTAY
 * E-Mail: yusuf.togtay@gmail.com
 * Created At: 26.05.2023
 * Version: 1.0.0
 */

namespace App\Repositories;

use App\Models\User;
use YusufTogtay\Repository\Eloquent\BaseRepository;


/**
 * Class UserRepository
 * @package App\Repositories
 * @version July 10, 2018, 11:44 am UTC
 *
 * @method User findWithoutFail($id, $columns = ['*'])
 * @method User find($id, $columns = ['*'])
 * @method User first($columns = ['*'])
*/
class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'name',
        'email',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }
}
