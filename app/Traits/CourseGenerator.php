<?php
 namespace App\Traits;


trait CourseGenerator
{

	protected $type_of_courses = [
		'certificate', 'diploma', 'degree'
	];

	protected $dip_and_cert_courses =[
		'Business', 'Cloth and textile', 'computing', 'education (arts)', 'education (science)', 'engineering', 'health sciences', 'humanities', 'sciences', 'technical', 'tourism and hotel management'
	];

	protected $degree_courses =[
		'Engineering and Technology', 'Science and Mathematics', 'Business Management', ' Computer Science and IT','Medical and Pharmacy', 'Education and Teaching', 'social Sciences', 'Tourism and Hospitality', 'Architecture','Law', 'Accounting and Finance', 'Media and Advertising', 'Agriculture', 'Beauty and Fashion'
	];

	/**
	* returns an array of the type of courses
	*
	*/

	public function getType(){
		return $this->type_of_courses;
	}

	public function getCategory($type){
		if($type == 'certificate' || $type == 'diploma'){
			return $this->dip_and_cert_courses;
		} else {
			return $this->degree_courses;
		}
	}

	public function getDuration($type){
		switch ($type) {
			case 'certificate':
				return 1;
				break;
			case 'diploma':
				return 3;
				break;
			case 'degree':
				return 4;
				break;
		}
	}

	public function getGrade($type){
		switch ($type) {
			case 'certificate':
				return 'D';
				break;
			case 'diploma':
				return 'C-';
				break;
			case 'degree':
				return 'C+';
				break;
		}
	}

	public function getCourseName($type, $category){
		
	}
}
