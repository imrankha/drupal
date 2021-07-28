<?php

namespace Drupal\mycustomform\Plugin\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\node\Entity\Node;

/**
 * Provides a 'Notice' Block.
 *
 * @Block(
 *   id = "custom_form_id",
 *   admin_label = @Translation("My Custom Form"),
 *   category = @Translation("Custom Form block"),
 * )
 */
class BlockForm extends BlockBase {
    
    public function build() {

							
$nids = \Drupal::entityQuery('node')
->condition('type', 'page', '=')
->condition('uid', '0','=')
->execute();
$nodes = \Drupal::entityTypeManager()->getStorage('node')->loadMultiple($nids);
foreach ($nodes as $node) {
$title=$node->get('title')->value;
$body=$node->get('body')->value;
}

    
    return [
      '#markup' => $title.'body'.$body
    ];
    }
    
}

