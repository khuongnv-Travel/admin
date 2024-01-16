<?php

namespace Modules\Backend\Services;

use Illuminate\Support\Facades\Validator;
use Modules\Backend\Repositories\RoomRepository;
use Modules\Core\BaseService;
use Modules\Core\Helpers\LoggerHelpers;

class RoomService extends BaseService
{
    private $categoriesService;
    private $validateService;
    private $fileService;
    private $logger;
    public function __construct(
        CategoriesService $categoriesService,
        ValidateService $validateService,
        FileService $fileService
    ){
        $this->categoriesService = $categoriesService;
        $this->validateService   = $validateService;
        $this->fileService       = $fileService;
        $this->logger = new LoggerHelpers;
        $this->logger->setFileName('RoomService');
        parent::__construct();
    }
    public function repository()
    {
        return RoomRepository::class;
    }
    /**
     * Trang Index
     */
    public function index(): array
    {
        $data = [];
        return $data;
    }
    /**
     * Danh sách
     * @param $input Dữ liệu đầu vào
     * @return array
     */
    public function loadList($input): array
    {
        $input['sort'] = 'order';
        $data['datas'] = $this->repository->filter($input);
        return array(
            'arrData' => view('rooms.loadList', $data)->render(),
            'perPage' => $input['limit'],
        );;
    }
    /**
     * Thêm mới
     * @param $input Dữ liệu truyền vào
     * @return array
     */
    public function create($input): array
    {
        $rooms = $this->repository->select('order')->orderBy('order', 'desc')->first();
        $data['order'] = isset($rooms->order) ? (int)$rooms->order + 1 : 1;
        return $data;
    }
    /**
     * Sửa
     * @param $input Dữ liệu truyền vào
     * @return array
     */
    public function edit($input): array
    {
        $data['datas'] = $this->repository->where('id', $input['id'])->first();
        return $data;
    }
    /**
     * Cập nhật
     * @param $input Dữ liệu truyền vào
     * @return array
     */
    public function _update($input): array
    {
        $validator = Validator::make($input, [
            'dataUpdate' => 'required',
        ],[
            'dataUpdate.required' => 'Không tồn tại dữ liệu cập nhật!',
        ]);
        if($validator->fails()){
            return array('success' => false, 'message' => $validator->errors()->get('dataUpdate')[0]);
        }
        parse_str($input['dataUpdate'], $params);
        $check = $this->validateService->validate($params, 'tác giả');
        if ($check['status'] === false) {
            foreach ($check['message'] as $key => $message) {
                return array('success' => false, 'message' => $message, 'key' => $key);
            }
        }
        try {
            $this->logger->setChannel('Update')->log('Params', $input);
            if($_FILES != []){
                $avatar = $this->fileService->upload($_FILES, 'avatar');
                $params['avatar'] = $avatar[0]['url'];
            }
            $data = $this->repository->_update($params);
            return array('success' => true, 'message' => 'Cập nhật thành công', 'data' => $data);
        } catch (\Exception $e) {
            $this->logger->setChannel('Update')->log('Messages', ['Line:' => $e->getLine(), 'Message:' => $e->getMessage(), 'FileName:' => $e->getFile()]);
            return array('success' => false, 'message' => $e->getMessage());
        }
    }
    /**
     * Xóa
     * @param $input Dữ liệu truyền vào
     * @return array
     */
    public function _delete($input): array
    {
        $arrIds = explode(',', $input['listId']);
        try {
            $this->logger->setChannel('Delete')->log('Params', $arrIds);
            $this->repository->whereIn('id', $arrIds)->delete();
            return array('success' => true, 'message' => 'Xóa thành công.');
        } catch (\Exception $e) {
            $this->logger->setChannel('Delete')->log('Messages', ['Line:' => $e->getLine(), 'Message:' => $e->getMessage(), 'FileName:' => $e->getFile()]);
            return array('success' => false, 'message' => 'Xóa thất bại!');
        }
    }
    /**
     * Cập nhật số thứ tự
     * @param $input Dữ liệu truyền vào
     * @return array
     */
    public function updateOrderTable($input): array
    {
        try {
            $this->logger->setChannel('UpdateOrderTable')->log('Params', $input);
            $categories = $this->repository->select('*')->orderBy('order')->get();
            $i = 1;
            foreach ($categories as $key => $value) {
                $value->update(['order' => $i++]);
            }
            return array('success' => true, 'message' => 'Cập nhật thành công!');
        } catch (\Exception $e) {
            $this->logger->setChannel('UpdateOrderTable')->log('Message', ['Line:' => $e->getLine(), 'Message:' => $e->getMessage(), 'FileName:' => $e->getFile()]);
            return array('success' => false, 'message' => 'Xóa thất bại!');
        }
    }
    /**
     * Cập nhật trạng thái
     * @param $input Dữ liệu truyền vào
     * @return array
     */
    public function changeStatus($input): array
    {
        try {
            $this->logger->setChannel('ChangeStatus')->log('Params', $input);
            $this->repository->where('id', $input['id'])->update(['status' => $input['status']]);
            return array('success' => true, 'message' => 'Cập nhật thành công!');
        } catch (\Exception $e) {
            $this->logger->setChannel('ChangeStatus')->log('Message', ['Line:' => $e->getLine(), 'Message:' => $e->getMessage(), 'FileName:' => $e->getFile()]);
            return array('success' => false, 'message' => 'Xóa thất bại!');
        }
    }
    /**
     * Upload file nội dung bài viết
     */
    public function uploadFile($input)
    {
        $response = '';
        if($_FILES != [] && isset($input['upload'])){
            $images = $this->fileService->upload($_FILES, 'uploads');

            $CKEditorFuncNum = $input['CKEditorFuncNum'];
            $url = $images[0]['url'];
            $msg = 'Tải ảnh lên thành công.';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
        }
        echo $response;
    }
}