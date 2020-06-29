<?php
namespace Drupal\Formcreation\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
class SimpleForm extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'Formcreation';
  }
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['First_name'] = array(
      '#type' => 'textfield',
      '#title' => t('User  First Name:'),
      '#required' => TRUE,
          );
    
     $form['Last_name'] = array(
     '#type' => 'textfield',
      '#title' => t('User  Last Name:'),
       '#required' => TRUE,
         );
       
      $form['user_mail'] = array(
      '#type' => 'email',
      '#title' => t('Email ID:'),
      '#required' => TRUE,
          );
            
      $form['user_id'] = array(
        '#type' => 'id',
        '#title' => t('User ID:'),
        '#required' => TRUE,
            );
    
    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Save'),
    );
    return $form;
  }
  public function submitForm(array &$form, FormStateInterface $form_state) {
     foreach ($form_state->getValues() as $key => $value) {
       drupal_set_message($key . ': ' . $value);
     }
    }
  }
