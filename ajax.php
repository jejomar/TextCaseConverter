<?php
	if (isset($_GET['h']) && $_GET['h'] == 'get') {
		if (!empty($_POST['action']) && !empty($_POST['content'])) {
			$result_string='';
			switch ($_POST['action']) {
				case 'All Caps':
					die(json_encode(array('Success'=>'true', 'result'=>strtoupper($_POST['content']))));
					break;
				case 'Capital Caps':
					die(json_encode(array('Success'=>'true', 'result'=>ucwords($_POST['content']))));
					break;
				case 'Small Caps':
					die(json_encode(array('Success'=>'true', 'result'=>strtolower($_POST['content']))));
					break;
				case 'Randon Caps':
					$str = $_POST['content'];
					for ($i=0,$c=strlen($str);$i<$c;$i++)
					  $str[$i] = rand(0, 100) > 50? strtoupper($str[$i]):$str[$i];
					
					die(json_encode(array('Success'=>'true', 'result'=>$str)));
					break;
				
				default:
					die(json_encode(array('Success'=>'false', 'result'=>'There is some problem')));
					break;
			}
		}
		else{
			die(json_encode(array('Success'=>'true', 'result'=>strtoupper($_POST['content']))));
		}
	}
?>