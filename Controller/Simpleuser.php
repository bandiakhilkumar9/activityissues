<?php
namespace Drupal\simple_user\Controller;
class SimpleuserController
{
	public function content($user)
	{
		$users=array('1'=>
		array('id'=>1,'username'=>'akhil'),
		'2'=>array('id'=>2,'username'=>'akhil two'),
		'3'=>array('id'=>3,'username'=>'akhil three')
		);
		
		
	if(in_array($user, $users[$user]))
	{
		return array(
		'#theme'=>'user_list',
		'#users'=>$users[$user],
		'#title'=>$users[$user]['username']
		);
	}
	}
}

?>