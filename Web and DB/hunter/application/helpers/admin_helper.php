<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');


if (!function_exists('drawMenu'))

{
  function drawMenu($listOfItems, $key) {
      $html = '';
      foreach ($listOfItems as $item) {
      $html .= '<div id="accordion_'.$item['c_id'].'">
                  <div class="card orderby" id="category_list_'.$item['c_id'].'" data-order="'.$item['c_id'].'">
                     <div class="card-header">
                     <div class="row">
                      <div class="col-md-6">
                        <a data-toggle="collapse" aria-expanded="true" href="#collapseOne'.$item['c_id'].'" class="collapsed category_'.$item['c_id'].'" id="category_'.$item['c_id'].'" data-val="'.$item['category'].'" data-aff="'.$item['affilate_per'].'" data-id="'.$item['c_id'].'">';
                           if(isset($item['image']) && !empty($item['image'])){
                                $html .= '<img src="'.base_url($item['image']).'" alt="'.$item['category'].'" style="width:45px;">';
                              }
                             $html .= $item['category'].' ('.$item['c_id'].')';
              $html .='</a>
                      </div>
                      <div class="col-md-6">
                        <div style="float:right;">
                        <a href="javascript:void(0)" title="edit" data-toggle="modal" data-target="#editcategorypopup"><button class="btn btn-success btn-sm edit_category" data-type="category" data-image="'.$item['image'].'" data-id="'.$item['c_id'].'" data-aff="'.$item['affilate_per'].'"><i class="fa fa-edit"></i></button></a>
                        <button title="delete" class="btn btn-danger btn-sm deleteCategory" data-type="category" data-id="'.$item['c_id'].'"><i class="fa fa-trash"></i></button>
                        Check to show <input type="checkbox" class="showonfront" name="show" value="'.$item['c_id'].'"'.(($item['show']==1)?'checked="checked"':"").'/>
                        
                        </div>
                      </div>
                     </div>
                     </div>
                     <div id="collapseOne'.$item['c_id'].'" class="collapse" data-parent="#accordion_'.$item['c_id'].'">
                        <div class="card-body" style="padding:0px;">';
                           if(isset($item['childs']) && $item['childs']) {
                              // echo "<pre>";
                              // print_r($item['childs']); die;
                                $html .=  drawMenu($item['childs'],$item['c_id']);
                            }
                    $html .= '</div>
                     </div>
                  </div>
                </div>';
          $key++;
      }
      return $html;
  }
  function drawsMenu($listOfItems, $key) {
      $html = '';
      foreach ($listOfItems as $item) {
      $html .= '<div class="panel-group" style="margin:10px;" id="accordion_'.$item['c_id'].'">';
      $html .= '<div class="panel panel-default orderby" id="category_list_'.$item['c_id'].'" data-order="'.$item['c_id'].'">';
          $html .= '<div class="panel-heading">
                      <h4 class="panel-title">
                        <span>
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne'.$item['c_id'].'" class="collapsed category_'.$item['c_id'].'" id="category_'.$item['c_id'].'" data-val="'.$item['category'].'" data-id="'.$item['c_id'].'">';
                              if(isset($item['image']) && !empty($item['image'])){
                                $html .= '<img src="'.base_url($item['image']).'" alt="'.$item['category'].'" style="width:45px;">';
                              }
                             $html .= $item['category'].' ('.$item['c_id'].')';

              $html .=  '</a>
                        </span>
                        <span class="pull-right">
                          <a href="javascript:void(0)" title="edit" data-toggle="modal" data-target="#editcategorypopup"><button class="btn btn-success btn-sm edit_category" data-type="category" data-image="'.$item['image'].'" data-id="'.$item['c_id'].'"><i class="fa fa-edit"></i></button></a>
                          <button title="delete" class="btn btn-danger btn-sm deleteCategory" data-type="category" data-id="'.$item['c_id'].'"><i class="fa fa-trash"></i></button>
                          Check to show <input type="checkbox" class="showonfront" name="show" value="'.$item['c_id'].'"'.(($item['show']==1)?'checked="checked"':"").'/>
                        </span>
                      </h4>
                    </div>
                    <div id="collapseOne'.$item['c_id'].'" class="panel-collapse collapse" style="height: 0px;">';
                      if(isset($item['childs']) && $item['childs']) {
                        // echo "<pre>";
                        // print_r($item['childs']); die;
                          $html .=  drawMenu($item['childs'],$item['c_id']);
                      }
          $html .= '</div>
              </div>
            </div>';
          $key++;
      }
      return $html;
  }
}

if (!function_exists('catMenu'))
{
  function catMenu($listOfItems) {
      $html = '';
      foreach ($listOfItems as $item) {
        $html .= '<li style="margin-bottom:10px;">
                    <input name="parent" type="radio" value="'.$item['c_id'].'" />
                    <a style="cursor:pointer;" data-toggle="collapse" href="#list_'.$item['c_id'].'"><label for="">'.$item['category'].'</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                      if(isset($item['childs']) && $item['childs']) {
                        $html .= '<span class="zmdi zmdi-chevron-down"></span>';
                      }
            $html .='</a>
                      <ul id="list_'.$item['c_id'].'" class="collapse" style="list-style-type:disc;margin-left:50px;">';
                          if(isset($item['childs']) && $item['childs']) {
                                $html .=  catMenu($item['childs'],$item['c_id']);
                          }
            $html .= '</ul>
                  </li>';
      }

      return $html;
  }
}


if (!function_exists('postMenu'))
{
  function postMenu($listOfItems) {
      $html = '';
      foreach ($listOfItems as $item) {
        $html .= '<li>
                    <input name="product_category[]" type="checkbox" value="'.$item['c_id'].'" class="CheckParent"/>
                    <label for="">'.$item['category'].'</label>
                      <ul style="list-style-type:disc;margin-left:40px;">';
                          if(isset($item['childs']) && $item['childs']) {
                                $html .=  postMenu($item['childs'],$item['c_id']);
                          }
            $html .= '</ul>
                  </li>';
      }

      return $html;
  }
}

if (!function_exists('editPostMenu'))
{
  function editPostMenu($listOfItems,$pcat) {
      $html = '';
      foreach ($listOfItems as $item) {
        $html .= '<li>
                    <input name="product_category[]" type="checkbox" value="'.$item['c_id'].'"'.((in_array($item['c_id'], explode(",", $pcat)))?'checked="checked"':"").'/>
                    <label for="">'.$item['category'].'</label>
                      <ul style="list-style-type:disc;margin-left:40px;">';
                          if(isset($item['childs']) && $item['childs']) {
                                $html .=  editPostMenu($item['childs'],$pcat);
                          }
            $html .= '</ul>
                  </li>';
      }

      return $html;
  }
}


// ------------------------------------------------------------------------

/* End of file translate_helper.php */

/* Location: ./system/helpers/translate_helper.php */