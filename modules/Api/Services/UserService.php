<?php

namespace Modules\Api\Services;

use Modules\Api\Repositories\UserRepository;
use Modules\Core\BaseService;

class UserService extends BaseService
{
    public function __construct()
    {
        parent::__construct();
    }
    public function repository()
    {
        return UserRepository::class;
    }
    public function _update($input)
    {
        $data = $this->repository->_update($input);
        return $data;
    }
}