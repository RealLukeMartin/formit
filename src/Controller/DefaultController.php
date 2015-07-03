<?php

/**
  * @file
  * Contains Drupal\formit\Controller\DefaultController.
  */

namespace Drupal\formit\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class DefaultControlller.
 *
 * @package Drupal\formit\Controller
 */

class DefaultController extends ControllerBase {

	public function yo() {
		$config = $this->config('formit.formit_config');
		$form_submission = $config->get('form_submit');

		return [
			'#theme' => 'formit_custom_form_render',
			'#first_name' => $form_submission['first_name'],
			'#last_name'  => $form_submission['last_name'],
			'#biography'  => $form_submission['biography'],
		];
	}
}