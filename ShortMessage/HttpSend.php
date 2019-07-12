<?php

/**
  * 短信发送类
  *@author superhard
  *@create data 2014-02-09
  */
class HttpSend  {

	private $params = "";

	private $strRegUrl = "http://www.stongnet.com/sdkhttp/reg.aspx";
	private $strBalanceUrl = "http://www.stongnet.com/sdkhttp/getbalance.aspx";
	private $strSmsUrl = "http://www.stongnet.com/sdkhttp/sendsms.aspx";
	private $strSchSmsUrl = "http://www.stongnet.com/sdkhttp/sendschsms.aspx";
	private $strStatusUrl = "http://www.stongnet.com/sdkhttp/getmtreport.aspx";
	private $strUpPwdUrl = "http://www.stongnet.com/sdkhttp/uptpwd.aspx";

	private $strReg = "";//华兴软通 code
	private $strPwd = "";//华兴软通 password
	private $strSourceAdd = "";

	private $template = "您的验证码为%s请在注册页面输入以完成注册，如非本人操作，请忽略本短信";

	public function __construct()
	{
		$this->params = "reg=" . $this->strReg . "&pwd=" . $this->strPwd;
	}

	public function getSend($url,$params)
	{
		$ch = curl_init($url."?".$params);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, true) ;
		$output = curl_exec($ch);
		return $output;	
	}
	
	public function postSend($url,$params)
	{
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$params);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}

	public function sendChecksum($mobile, $checksum)
	{
		if (is_array($mobile)) implode(",", $mobile);
		$content = sprintf($this->template, $checksum);
		$this->params .= "&sourceadd=" . $this->strSourceAdd . "&phone=" . $mobile . "&content=" . $this->strToUTF8($content);
		$res = $this->postSend($this->strSmsUrl, $this->params);
		return $this->strToArray($res);
	}

	public function getChannelStatus()
	{
		$res = $this->postSend($this->strStatusUrl, $this->params);
		return $res;
	}

	public function strToUTF8($string)
	{
		if (preg_match('/^.*$/u', $string) > 0) {
			return rawurlencode($string);
		} else {
			throw new Exception("Only supports utf-8 character.");
		}
	}

	public function strToArray($res)
	{
		$res = explode("&", $res);
		foreach($res as $k => $i) {
			$r = explode("=", $i);
			$item[$r[0]] = $r[1];
		}
		return $item;
	}
}
?>
