<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('desktopMenu'))
{
  function desktopMenu($listOfItems) {
      $html = '';
      $href = '';
      foreach ($listOfItems as $item) {
        $chClass = '';
        if(isset($item['childs']) && $item['childs']) { 
            $chClass = 'has-child';
            $href = str_replace(" ","-",base_url("products/".$item['category']."/pr?catid=".$item['c_id']));
        }else{
          $href = str_replace(" ","-",base_url("products/".$item['category']."/pr?catid=".$item['c_id']));
        }
        $html .= '<li class="'.$chClass.'">
                  <a href="'.$href.'">'.$item['category'].'</a>';
                    if(isset($item['childs']) && $item['childs']) {
                      $html .= '<div class="mega-menu">';
                         $html .=  subMenu($item['childs'],$item['category'],$item['c_id']); 
                      $html .= '</div>';
                      }
        $html .= '</li>';
      }
      return $html;
  }
}


if (!function_exists('subMenu'))
{
  function subMenu($listOfItems,$parentcat,$parent_id) {
      $html = '';
      $i=1;
      foreach ($listOfItems as $item) {  
          if(isset($item['childs']) && $item['childs']) { 
              $href=base_url('category-list/'.str_replace(' ', '-',$parentcat).'/'.str_replace(' ', '-',$item['category']).'/'.$item['c_id']);
          }else{
            $href = str_replace(" ","-",base_url("products/".$item['category']."/pr?catid=".$item['c_id']));
          }      
          $html .= '<div class="mega-catagory per-20">';
          if ($i==1) {
             $html .= '<h4><a href="'.$href.'">'.$item['category'].'</a></h4>';
             $i=1;
          }else{
            $html .= '<h4><a href="'.$href.'">'.$item['category'].'</a></h4>';
          }
         
           if(isset($item['childs']) && $item['childs']) {
            $html .= '<ul class="mega-button">';
            foreach ($item['childs'] as $item) {
              $href = str_replace(" ","-",base_url("products/".$item['category']."/pr?catid=".$item['c_id']));
             $html .= '<li><a href="'.$href.'">'.$item['category'].'</a></li>';
            }
             
              $html .= '</li>';
            $html .= '</ul>';
          }
          $html .= '</div>'; 


      }

      return $html;
  }
}


if (!function_exists('mobileMenu'))
{
  function mobileMenu($listOfItems) {
      // echo "<pre>";
      // print_r($listOfItems); die;
      $html = '';
      $href = '';
      foreach ($listOfItems as $item) {
        $chClass = '';
        if(isset($item['childs']) && $item['childs']) { 
            $chClass = '<i class="fa fa-chevron-down"></i>';
            //$href=base_url('category-list/'.str_replace(' ', '-',$item['category']).'/'.$item['c_id']);
            $href = str_replace(" ","-",base_url("products/".$item['category']."/pr?catid=".$item['c_id']));
        }else{
          $href = str_replace(" ","-",base_url("products/".$item['category']."/pr?catid=".$item['c_id']));
        }
        $html .= '<li>
                  <a class="link1" href="'.$href.'">'.$item['category'].' '.$chClass.'</a>';
                    if(isset($item['childs']) && $item['childs']) {
                      $html .= '<ul class="submenu">';
                         $html .=  subMobileMenu($item['childs'],$item['category'],$item['c_id']); 
                      $html .= '</ul>';
                      }
        $html .= '</li>';
      }
      return $html;
  }
}

if (!function_exists('subMobileMenu'))
{
  function subMobileMenu($listOfItems,$parentcat,$parent_id) {
      $html = '';
      foreach ($listOfItems as $item) { 
          if(isset($item['childs']) && $item['childs']) { 
            $href = "javascript:void(0)";
          }else{
              $href=str_replace(" ","-",base_url("products/".$item['category']."/pr?catid=".$item['c_id']));
          } 
          $html .= '<li>
                    <a class="link2 link3"  href="'.$href.'">'.$item['category'].'</a>';
                    if(isset($item['childs']) && $item['childs']) {
                      $html .= '<ul class=" submenu2 dnone" data-type="none">';
                         $html .=  subMobileMenu($item['childs'],$item['category'],$item['c_id']); 
                      $html .= '</ul>';
                      }
          $html .= '</li>';       
      }

      return $html;
  }
}


if (!function_exists('catMenu'))
{
  function catMenu($listOfItems,$link,$class) {
      $html = '';
      foreach ($listOfItems as $item) {
        if(isset($item['childs']) && $item['childs']) { 
            if($link==1){
                $href=base_url('category-list/'.str_replace(' ', '-',$item['category']).'/'.$item['c_id']);
            }else{
                $href=base_url('category-list/'.str_replace(' ', '-',$link).'/'.str_replace(' ', '-',$item['category']).'/'.$item['c_id']);
            }
          }else{
            $href = str_replace(" ","-",base_url("products/".$item['category']."/pr?catid=".$item['c_id']));
          } 
          $href = str_replace(" ","-",base_url("products/".$item['category']."/pr?catid=".$item['c_id']));
            $html .= '<div class="'.$class.'">
                      <a href="'.$href.'" style="color:#000;">'.$item['category'].'</a></div>';
                      if(isset($item['childs']) && $item['childs']) {
                        $html .= '';
                      }
            $html .='<div id="list_'.$item['c_id'].'" class="accordeon-entry">
                      <ul>';
                          if(isset($item['childs']) && $item['childs']) {
                                $html .=  catMenu($item['childs'],$item['c_id'],$item['category'],'child');
                          }
            $html .= '</ul>
                  </div>';
      }

      return $html;
  }
}



// ------------------------------------------------------------------------

/* End of file translate_helper.php */

/* Location: ./system/helpers/translate_helper.php */