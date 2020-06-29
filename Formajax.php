<?php

namespace Drupal\Formcreationajax\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\ReplaceCommand;

class Formajax extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'Formajax';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // Create a select field that will update the contents
    // of the textbox below.
    $form['field'] = [
      '#type' => 'select',
      '#title' => $this->t('Select element'),
      '#options' => [
        '1' => $this->t('Element one'),
        '2' => $this->t('Element two'),
        '3' => $this->t('Element three'),
      ],
    ];
    $form['output'] = [
      '#type' => 'textfield',
      '#size' => '60',
      '#disabled' => TRUE,
      '#value' => 'Hello akhil',      
      '#prefix' => '<div id="edit-output">',
      '#suffix' => '</div>',
    ];

    // Create the submit button.
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
      \Drupal::messenger()->addStatus($key . ': ' . $value);
    }
  }
}