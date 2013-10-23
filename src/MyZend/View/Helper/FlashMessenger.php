<?php
namespace MyZend\View\Helper;

use Zend\View\Helper\AbstractHelper;

class FlashMessenger extends AbstractHelper
{
    public function html()
    {
        $flashMessenger = new \Zend\Mvc\Controller\Plugin\FlashMessenger();
		$html = "";
		
		//Error		
		if($flashMessenger->setNamespace("error")->hasMessages()) {
			$class = "alert alert-error";
			foreach($flashMessenger->setNamespace("error")->getMessages() as $msg) {
				$html .= '<div class="'.$class.'"><i class="icon-remove-sign"></i>' . PHP_EOL;
				$html .= $msg . PHP_EOL;	
				$html .= "</div>" . PHP_EOL;
			}
		}
		//Notice		
		if($flashMessenger->setNamespace("notice")->hasMessages()) {
			$class = "alert alert-info";
			foreach($flashMessenger->setNamespace("notice")->getMessages() as $msg) {
				$html .= '<div class="'.$class.'"><i class="icon-exclamation-sign"></i>' . PHP_EOL;
				$html .= $msg . PHP_EOL;	
				$html .= "</div>" . PHP_EOL;
			}
		}
		//Success		
		if($flashMessenger->setNamespace("success")->hasMessages()) {
			$class = "alert alert-success";
			foreach($flashMessenger->setNamespace("success")->getMessages() as $msg) {
				$html .= '<div class="'.$class.'"><i class="icon-ok-sign"></i>' . PHP_EOL;
				$html .= $msg . PHP_EOL;	
				$html .= "</div>" . PHP_EOL;
			}
		}
		
		echo $html;
    }
}
