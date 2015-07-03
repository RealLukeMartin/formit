<?php

/**
 * @file
 * Contains Drupal\formit\Form\FormitForm
 */

namespace Drupal\formit\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class FormitForm.
 *
 * @package Drupal\formit\Form
 */
class Formit extends ConfigFormBase {

	/**
	 * {@inheritdoc}
	 */
	protected function getEditableConfigNames() {
		return [
			'formit.formit_config'
		];
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function getFormId() {
		return 'formit_form';
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function buildForm(array $form, FormStateInterface $form_state) {
		$config = $this->config('formit.formit_config');
		$form['first_name'] = array(
			'#type' => 'textfield',
			'#title' => t('First Name'),
			'#required' => TRUE,
		);
	    $form['last_name'] = array(
	      '#type' => 'textfield',
	      '#title' => t('Last Name'),
	      '#required' => TRUE,
	    );
	    $form['biography'] = array(
	      '#type' => 'textarea',
	      '#title' => t('Biography'),
	      '#required' => TRUE,
	    );
	    return parent::buildForm($form, $form_state);
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
    	parent::submitForm($form, $form_state);
    	$submission = $form_state->getValues();
    	$this->config('formit.formit_config')
      	  ->set('form_submit', $submission)
      	  ->save();
    	foreach ($form_state->getValues() as $key => $value) {
      		drupal_set_message($key . ': ' . $value);
    	}
    }
}