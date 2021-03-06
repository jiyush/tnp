<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Marks;
use App\Record;
use App\Company;
use App\Studentplaced;
use Illuminate\Support\Facades\Input;
use DB;
class AjaxController extends Controller
{

    public function getFields(Request $req){
    	// return 

    	$userCol = array_values(
    						array_diff(
    										DB::getSchemaBuilder()->getColumnListing((new User())->getTable()),
    										['id', 'created_at','updated_at','avatar','remember_token','resume','address','name','password']
    								  )
							);

    	$marksCol = array_values(
							array_diff(
									DB::getSchemaBuilder()->getColumnListing((new Marks())->getTable()),
									['id', 'created_at','updated_at','enrollment','sem1','sem2','sem3'
									,'sem4','sem5','sem6','sem7','sem8']
							  )
					);

    	return ['user' => $userCol, 'marks' => $marksCol];
    }

	public function getResults	(Request $req)
	{
		$query = $req->get('q');
		$paramFields = $this->getFields($req);
		$params = array();
		foreach ($paramFields['user'] as $key => $value) {
			array_push( $params, 'users.'.$value);
		}
		foreach ($paramFields['marks'] as $key => $value) {
			array_push($params, 'marks.'.$value);
		}
		$params = implode(",", $params);
		
		$q = DB::raw("Select ".$params." from users LEFT JOIN marks ON users.enrollment = marks.enrollment where ".$query );
		
		$results = DB::select( $q );
		return $results;
	}

	public function addRecord(Request $req){

		$record = new  Record;
		//sleep(5);

		$record->year = $req->year;
		$record->companies_visited = $req->companies_visited;
		$record->students_placed = $req->students_placed;
		$record->save();
        
		 $data = Record::all();
		return $data;


	}
	public function addCompany(Request $req){

		// 	$h = "hello";
		// return $req->branch;

		$company = new Company;

		$company->name = $req->name;
		$company->email = $req->email;
		$company->contact = $req->contact;
		$company->branch = $req->branch;
		$company->year = $req->year;
		$company->student_placed = $req->student_placed;
		$company->package = $req->package;
		$company->city = $req->city;
		$company->state = $req->state;
		if($req->hasFile('logo')){
    		$logo = $req->file('logo');
    		$filename = $req->name. '.' . $logo->getClientOriginalExtension();
    		$location = public_path('/logo/'.$filename);
    		Image::make($logo)->save($location);
    		$movie->logo = $filename;
    	}
		
		$company->save();

		$data = Company::all();
		return $data;

	}


	public function getRecordFields(Request $req){

		$companyCol = array_values(
    						array_diff(
    										DB::getSchemaBuilder()->getColumnListing((new Company())->getTable()),
    										['id', 'created_at','updated_at','logo','branch']
    								  )
							);

    	$studentCol = array_values(
							array_diff(
									DB::getSchemaBuilder()->getColumnListing((new Studentplaced())->getTable()),
									['id', 'created_at','updated_at','name','company','package']
							  )
					);

    	return ['companies' => $companyCol, 'studentplaceds' => $studentCol];

	}
	public function getRecordResults(Request $req){

		$query = $req->get('q');
		$paramFields = $this->getRecordFields($req);
		$params = array();
		foreach ($paramFields['companies'] as $key => $value) {
			array_push( $params, 'companies.'.$value);
		}
		foreach ($paramFields['studentplaceds'] as $key => $value) {
			array_push($params, 'studentplaceds.'.$value);
		}
		$params = implode(",", $params);
		
		$q = DB::raw("Select ".$params." from companies LEFT JOIN studentplaceds ON companies.name = studentplaceds.company where ".$query );
		
		$results = DB::select( $q );
		// $results = "Select ".$params." from companies LEFT JOIN studentplaceds ON companies.name = studentplaceds.company where ".$query;
		return $results;
		
	}
}
