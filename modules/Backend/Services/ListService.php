<?php
 
namespace Modules\Backend\Services;

use Modules\Backend\Repositories\ListRepository;
use Modules\Core\BaseService;
use Modules\Core\Helpers\LoggerHelpers;

class ListService extends BaseService
{
    private $listtypeService;
    private $validateService;
    private $logger;
    public function __construct(
        ListtypeService $listtypeService,
        ValidateService $validateService
    ) {
        $this->listtypeService = $listtypeService;
        $this->validateService = $validateService;
        $this->logger = new LoggerHelpers();
        $this->logger->setFileName('ListService_Backend');
        parent::__construct();
    }
    public function repository()
    {
        return ListRepository::class;
    }
    /**
     * Trang Index
     */
    public function index(): array
    {
        $data['listtype'] = $this->listtypeService->select('*')->get();
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
            'arrData' => view('listtype.list.loadList', $data)->render(),
            'perPage' => $input['limit'],
        );;
    }
    /**
     * Thêm mới
     * @param $input Dữ liệu truyền vào
     * @return array
     */
    public function _create($input): array
    {
        $listtype = $this->listtypeService->where('id', $input['listtype_id'])->first();
        if(empty($listtype)){
            return array('success' => false, 'message' => 'Không tồn tại mã chuyên mục');
        }
        $data['listtype'] = $listtype;
        $list = $this->repository->select('order')->where('listtype_id', $input['listtype_id'])->orderBy('order', 'desc')->first();
        $data['order'] = isset($list->order) ? (int)$list->order + 1 : 1;
        // parents
        if($listtype->code == 'DM_QUAN_HUYEN'){
            $listtype_id = $this->listtypeService->where('code', 'DM_TINH_THANH')->first();
            $data['parents'] = $this->repository->where('listtype_id', $listtype_id->id)->get();
        }
        return $data;
    }
    /**
     * Sửa
     * @param $input Dữ liệu truyền vào
     * @return array
     */
    public function _edit($input): array
    {
        $listtype = $this->listtypeService->where('id', $input['listtype_id'])->first();
        if(empty($listtype)){
            return array('success' => false, 'message' => 'Không tồn tại mã chuyên mục');
        }
        $data['listtype'] = $listtype;
        $list = $this->repository->where('id', $input['id'])->first();
        $data['checked'] = $list->status == 1 ? 'checked="checked"' : '';
        $data['datas'] = $list;
        return $data;
    }
    /**
     * Cập nhật
     * @param $input Dữ liệu truyền vào
     * @return array
     */
    public function _update($input): array
    {
        $listtype = $this->listtypeService->where('id', $input['listtype_id'])->first();
        $check = $this->validateService->validate($input, 'danh mục');
        if ($check['status'] === false) {
            foreach ($check['message'] as $key => $message) {
                return array('success' => false, 'message' => $message, 'key' => $key);
            }
        }
        try {
            $this->logger->setChannel('Update')->log('Params', $input);
            $data = $this->repository->_update($input);
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
            $list = $this->repository->select('*')->where('listtype_id', $input['listtype_id'])->orderBy('order')->get();
            $i = 1;
            foreach ($list as $key => $value) {
                $value->update(['order' => $i++]);
            }
            return array('success' => true, 'message' => 'Cập nhật thành công!');
        } catch (\Exception $e) {
            $this->logger->setChannel('UpdateOrderTable')->log('Message', ['Line:' => $e->getLine(), 'Message:' => $e->getMessage(), 'FileName:' => $e->getFile()]);
            return array('success' => false, 'message' => 'Cập nhật thất bại!');
        }
    }
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
}