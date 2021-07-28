<?php
namespace Drupal\mycustomform\Controller;
use Drupal\Core\Controller\ControllerBase;
class ShowJsonController extends ControllerBase {
    
    public function get_result(){
 
     $data = file_get_contents('http://social-new.dev.letsummit.com:8000/api/node/topic');
$json_decoded = json_decode($data, TRUE); 
$arrayLength=count($json_decoded['data'][0]);
$html='<div class="item-list"><ul>';
$i='0';
        while ($i < $arrayLength)
        {
             $html.="<li>".$json_decoded['data'][$i]['attributes']['title']."</li>";
            $i++;
        }
        
$html.="</ul></div>";

return array(
                '#title' => t("This data showing from json"),
                '#markup' =>$html,
            );

        
    }
}
