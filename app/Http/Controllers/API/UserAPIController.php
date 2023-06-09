<?php
/**
 * Path: app/Http/Controllers/API/UserAPIController.php
 * Author: Ahmet Yusuf TOĞTAY
 * E-Mail:
 * Created At: 25.05.2023
 */
namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Repositories\UserRepository;
use App\Core\Base\Controllers\APIBaseController;
use App\Core\Traits\APIResponseTrait;
use App\Http\Middleware\APIStatisticsMiddleware;
use Illuminate\Http\Resources\Json\JsonResource;
use YusufTogtay\Repository\Criteria\RequestCriteria;
use YusufTogtay\Repository\Exceptions\RepositoryException;

/**
 * Class UserAPIController
 * @package App\Http\Controllers\API
 */
class UserAPIController extends APIBaseController
{
    use APIResponseTrait;

    /** @var UserRepository $userRepository */
    private $userRepository;

    /**
     * UserAPIController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->middleware(APIStatisticsMiddleware::class)->only('show');
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the User.
     * GET|HEAD /users
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $this->userRepository->pushCriteria(new RequestCriteria($request));
        } catch (RepositoryException $e) {
            return $this->sendError(new JsonResource($e->getMessage()));
        }

        $users = $this->userRepository->all();

        return $this->sendResponse(new JsonResource($users), 'Users retrieved successfully');
    }

    /**
     * Store a newly created User in storage.
     * POST /users
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $input = $request->all();

        try {
            $user = $this->userRepository->create($input);
        } catch (RepositoryException $e) {
            return $this->sendError(new JsonResource($e->getMessage()));
        }

        return $this->sendResponse(new JsonResource($user), 'User saved successfully');
    }

    /**
     * Display the specified User.
     * GET|HEAD /users/{id}
     *
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function show($id, Request $request): JsonResponse
    {
        $input = $request->all();

        try {
            $user = $this->userRepository->find($id);
        } catch (RepositoryException $e) {
            return $this->sendError(new JsonResource($e->getMessage()));
        }

        if (empty($user)) {
            return $this->sendError(new JsonResource('User not found'));
        }
        return $this->sendResponse(new JsonResource($user), 'User retrieved successfully');
    }

    /**
     * Update the specified User in storage.
     * PUT/PATCH /users/{id}
     *
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function update($id, Request $request): JsonResponse
    {
        $input = $request->all();

        try {
            $user = $this->userRepository->update($input, $id);
        } catch (RepositoryException $e) {
            return $this->sendError(new JsonResource($e->getMessage()));
        }

        return $this->sendResponse(new JsonResource($user), 'User updated successfully');
    }

    /**
     * Remove the specified User from storage.
     * DELETE /users/{id}
     *
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy($id, Request $request): JsonResponse
    {
        try {
            $this->userRepository->delete($id);
        } catch (RepositoryException $e) {
            return $this->sendError(new JsonResource($e->getMessage()));
        }

        return $this->sendResponse(new JsonResource($id), 'User deleted successfully');
    }
}
