<?php

namespace app\models;

use Yii;
use yii\base\Model;
use Esyst\Nusoap\NusoapClient;

/**
 * Soap Module
 * 
 * @author 		Yusuf Ayuba
 * @copyright   2016
 * @link        http://dutainformasi.net   
 * @location 
*/
class Soapmodel extends Model
{
	protected $wsdl;

	public function __construct()
	{
		parent::__construct();
		$this->wsdl = new NusoapClient("http://localhost:8082/ws/live.php?wsdl", true);
	}

	public function token($username,$password)
	{
		return $this->wsdl->call('GetToken',[
										'username' => $username, 
										'password' => $password
									]);
	}

	public function listtable($token)
	{
		return $this->wsdl->call('ListTable',[
									'token' => $token
								]);
	}

	public function dictionary($token,$tabel)
	{
		return $this->wsdl->call('GetDictionary', [
									'token' => $token, 
									'table' => $tabel
								]);
	}

	public function recordset($token, $table, $filter, $order, $limit, $offset) {
		return $this->wsdl->call('GetRecordset',[
									'token' => $token, 
									'table' => $table, 
									'filter' => $filter, 
									'order' => $order, 
									'limit' => $limit, 
									'offset' => $offset
								]);
	}

	public function record($token, $table, $filter) {
		return $this->wsdl->call('GetRecord', [
									'token' => $token, 
									'table' => $table, 
									'filter' => $filter
								]);
	}

	public function insertrset($token, $table, $records) {
		return $this->wsdl->call('InsertRecordset',[
									'token' => $token, 
									'table' => $table, 
									'data' => json_encode($records)
								]);
	}

	public function insertrecord($token, $table, $records) {
		return $this->wsdl->call('InsertRecord',[
									'token' => $token, 
									'table' => $table, 
									'data' => json_encode($records)
								]);
	}

	public function update($token,$table,$records) {
		return $this->wsdl->call('UpdateRecord',[
									'token' => $token,
									'table' => $table,
									'data' => $records
								]);
	}

	public function updaterset($token,$table,$records) {
		return $this->wsdl->call('UpdateRecordset',[
									'token' => $token, 
									'table' => $table, 
									'data' => $records
								]);
	}

	public function count_all($token,$table,$filter) {
		return $this->wsdl->call('GetCountRecordset',[
									'token' => $token, 
									'table' => $table, 
									'filter' => $filter
								]);
		/*
			token: xsd:string
			table: xsd:string
			filter: xsd:string
		*/
	}
}