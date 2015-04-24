<?php

/**
 * My Client Module
 *
 * You will want to change the class and file name from "cm_test" to
 * something a little more descriptive, however be sure to retain the
 * "cm_" prefix.
 *
 * When complete, place your finished module into include/client_modules/
 *
 * @package ubersmith_customizations
 */

/**
 * My Client Module Class
 *
 * @package ubersmith_customizations
 */
class cm_test extends client_module_base
{
	public static function title()
	{
		return uber_i18n('Test');
	}

	public function client_edit_label()
	{
		return uber_i18n('configure');
	}

	public function summary($request = array())
	{
		$output = '<pre>'. h(print_r($request,true)) .'</pre>';

		$values = array(
			uber_i18n('Sample Text')      => $this->config('sample_field'),
			uber_i18n('Sample Secure')    => $this->config('sample_field_secure'),
			uber_i18n('Sample Drop Down') => $this->config('sample_drop_down'),
		);

		$output .= '
			<table>';

		foreach ($values as $k => $v) {
			$output .= '
				<tr>
					<td>'. h($k) .'</td>
					<td>'. h($v) .'</td>
				</tr>';
		}

		$output .= '
			</table>';

		return $output;
	}

	public function config_items()
	{
		return array(
			'sample_field' => array(
				'label'    => uber_i18n('Sample Text'),
				'type'     => 'text',
				'default'  => '',
				'required' => false,
			),
			'sample_field_secure' => array(
				'label'    => uber_i18n('Sample Secure'),
				'type'     => 'text_secure',
				'default'  => '',
				'required' => false,
			),
			'sample_drop_down' => array(
				'label'    => uber_i18n('Sample Drop Down'),
				'type'     => 'select',
				'options'  => array(
					'0'   => uber_i18n('No'),
					'1'   => uber_i18n('Yes'),
				),
				'default'  => '0',
				'required' => false,
			),
		);
	}

	public function edit()
	{
		$_SESSION['USER']->check('admin.client_profile','update');

		return '<pre>'. print_r($request,true) .'</pre>';
	}

}

// end of script
