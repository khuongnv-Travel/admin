<?php

namespace Modules\Backend\Services;

class ProvinceService
{
    private $listtypeService;
    private $listService;

    public function __construct(
        ListtypeService $listtypeService,
        ListService $listService
    ) {
        $this->listtypeService = $listtypeService;
        $this->listService = $listService;
    }
    /**
     * Thay đổi danh mục quận huyện theo id Tỉnh Thành
     */
    public function changeProvince($input)
    {
        $htmls = '<option value="">--Chọn Quận/Huyện--</option>';
        $listtype = $this->listtypeService->select('*')->where('code', 'DM_QUAN_HUYEN')->first();
        if (!empty($listtype)) {
            $datas = $this->listService->select('*')->where('listtype_id', $listtype->id)->where('parent_id', $input['provinces'])->get();
            foreach ($datas as $key => $value) {
                $htmls .= '<option value="' . $value->id . '">' . $value->name . '</option>';
            }
            return $htmls;
        } else {
            return array('success' => false, 'message' => 'Không tồn tại danh mục quận huyện!');
        }
    }
    /**
     * Thay đổi danh mục phường xã theo id quận huyện
     */
    public function changeDistrict($input)
    {
        $htmls = '<option value="">--Chọn Phường/Xã/Thị trấn--</option>';
        $listtype = $this->listtypeService->select('*')->where('code', 'DM_PHUONG_XA')->first();
        if (!empty($listtype)) {
            $datas = $this->listService->select('*')->where('listtype_id', $listtype->id)->where('parent_id', $input['districts'])->get();
            foreach ($datas as $key => $value) {
                $htmls .= '<option value="' . $value->id . '">' . $value->name . '</option>';
            }
            return $htmls;
        } else {
            return array('success' => false, 'message' => 'Không tồn tại danh mục phường xã!');
        }
    }
}
