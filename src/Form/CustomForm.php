<?php
namespace Drupal\mycustomform\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use \Drupal\node\Entity\Node;

/**
 * CustomForm controller.
 */
class CustomForm extends FormBase {

  /**
   * Returns a unique string identifying the form.
   *
   * The returned ID should be a unique string that can be a valid PHP function
   * name, since it's used in hook implementation names such as
   * hook_form_FORM_ID_alter().
   *
   * @return string
   *   The unique string identifying the form.
   */
  public function getFormId() {
    return 'ex81_hello_form';
  }

  /**
   * Form constructor.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   *
   * @return array
   *   The form structure.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

   
  $form['title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
      '#required' => TRUE,
    ];
            

     $form['body'] = [
      '#type' => 'textarea',
      '#title' => $this->t('body'),
      '#required' => TRUE,
    ];
            
            
     $form['submit']=array(
         '#type'=>'submit',
         '#value'=> t('Submit') 
         
         );


    return $form;

  }

 

  public function submitForm(array &$form, FormStateInterface $form_state) {

    // Display the results
    // Call the Static Service Container wrapper
    // We should inject the messenger service, but its beyond the scope
    // of this example.
    $messenger = \Drupal::messenger();
   
   

    $node = Node::create([
  'type'        => 'page',
  'title'       => $form_state->getValue('title'),
  'body'=>$form_state->getValue('body')
  ]);
$node->save();
  }

}