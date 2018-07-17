<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;	
use Recombee\RecommApi\Client;
use Recombee\RecommApi\Requests as Reqs;
use Recombee\RecommApi\Exceptions as Ex;
use App\Models\Course;
use App\Models\Student;
use App\Models\View;
use App\Models\Rating;

class Recommender extends Model
{
    //
    protected $client; 

    public function __construct(){
        
    	$this->client = new Client( env('RECOMBEE_DATABASE_ID'), env('RECOMBEE_SECRET_TOKEN'));
    }
    public function batchAddCourses(){
		// Add properties of items
		try{

			$courses = Course::get();
			$requests = [];
			foreach ($courses as $course) {
				$itemId = $course->id;

				$r = new Reqs\setItemValues(
					$itemId,
					[
						'type' => $course->type,
						'category' => $course->category,
						'duration' => $course->duration,
						'grade' => $course->grade
					],
					['cascadeCreate' => true]
				);
				array_push($requests, $r);

			}
			$result =  $this->client->send(new Reqs\Batch($requests));
			var_dump($result);


		}
		catch(Ex\ApiException $e)
		{
    		//ApiException is parent of both ResponseException and ApiTimeoutException
    		dd($e);
		}
	}

    public function batchAddStudents(){
    	try{

				

			$students = Student::get();
			$requests = [];
			foreach ($students as $student) {
				$userId = $student->id;

				$r = new Reqs\SetUserValues(
					$userId,
					[
						'dob' => $student->dob,
						'gender' => $student->gender,
						'location' => $student->location,
						'kcse_grade' => $student->kcse_grade,
						'kcse_points' => $student->kcse_points,
						'highschool' => $student->highschool,
						'year_completed' =>$student->year_completed,
						'personality' => $student->personality,
						'hobbies' => $student->hobbies,
						'skills' => $student->skills,
						'industry_of_interest' => $student->interests
					],
					['cascadeCreate' => true]
				);
				array_push($requests, $r);

			}
			$result =  $this->client->send(new Reqs\Batch($requests));
			var_dump($result);


		}
		catch(Ex\ApiException $e)
		{
    		//ApiException is parent of both ResponseException and ApiTimeoutException
    		dd($e);
		}
	}

    public function batchAddViews(){
    	try{
    		$views = View::get();
	    	$requests = [];
	    	foreach($views as $view){
	    		$itemId = $view->course_id;
	    		$userId = $view->student_id;

	    		$r = new Reqs\AddDetailView(
	    			$userId,
	    			$itemId,
	    			[
	    				'cascadeCreate' => true
	    			]
	    		);
	    		array_push($requests, $r);
	    	}
	    	$results = $this->client->send(new Reqs\Batch($requests));
	    	var_dump($results);
    	}
    	catch(Ex\ApiException $e)
		{
    		//ApiException is parent of both ResponseException and ApiTimeoutException
    		dd($e);
		}

    }

    public function batchAddRatings(){
    	try{
    		$ratings = Rating::get();
    		$requests = [];
    		foreach($ratings as $rating){
    			$itemId = $rating->course_id;
    			$userId = $rating->student_id;
    			$myRating = ((floatval($rating->rating)-3)/2);

    			$r = new Reqs\AddRating(
    				$userId,
    				$itemId,
    				$myRating,
    				[
    					'cascadeCreate' => true
    				]
    			);
    			array_push($requests, $r);
    		}
    		$results = $this->client->send(new Reqs\Batch($requests));
    		var_dump($results);
    	}
    	catch(Ex\ApiException $e)
    	{
    		dd($e);
    	}
    }

    public function addStudent($student){
    	try{
    		$this->client->send(new Reqs\SetUserValues(
    			$student->id,
    			[
    				'dob' => $student->dob,
					'gender' => $student->gender,
					'location' => $student->location,
					'kcse_grade' => $student->kcse_grade,
					'kcse_points' => $student->kcse_points,
					'highschool' => $student->highschool,
					'year_completed' =>$student->year_completed,
					'personality' => $student->personality,
					'hobbies' => $student->hobbies,
					'skills' => $student->skills,
					'industry_of_interest' => $student->interests
    			],
    			['cascadeCreate' => true]
    		));
            $student->update([$student->added_to_recommender = true]);
    	}
    	catch(Ex\ApiException $e)
		{
    		//ApiException is parent of both ResponseException and ApiTimeoutException

    		return redirect()->route('student.index');
		}
    }

    public function addCourse($course){
    	try{
    		$this->client->send(new Reqs\setItemValues(
    			$course->id,
    			[
    				'type' => $course->type,
					'category' => $course->category,
					'duration' => $course->duration,
					'grade' => $course->grade
    			],
    			['cascadeCreate' => true]
    		));
            $course->update([$course->added_to_recommender = true]);
    	}
    	catch(Ex\ApiException $e)
		{
    		//ApiException is parent of both ResponseException and ApiTimeoutException
            return redirect()->route('verifier.verifying');
    	
		}
    }

    public function addView($view){
    	try{
    		$this->client->send(new Reqs\AddDetailView(
    			$view->student_id,
    			$view->course_id,
    			[
	    			'cascadeCreate' => true
	    		]
    		));
            $view->update([$view->added_to_recommender = true]);
    	}
    	catch(Ex\ApiException $e)
		{
    		//ApiException is parent of both ResponseException and ApiTimeoutException
            return redirect()->route('student.index');
    		
		}
    }
    public function addRating($rating){
    	try{
    		$this->client->send(new Reqs\AddRating(
    			$rating->student_id,
    			$rating->course_id,
    			((floatval($rating->rating)-3)/2),
    			[
    				'cascadeCreate' => true
    			]
    		));
            $rating->update([$rating->added_to_recommender = true]);
    	}
    	catch(Ex\ApiException $e)
		{
    		//ApiException is parent of both ResponseException and ApiTimeoutException
    		return redirect()->route('student.index');
		}
    }

    public function resetDatabase(){
    	try{
    		$this->client->send(new Reqs\ResetDatabase());
    	}
    	catch(Ex\ApiException $e)
		{
    		//ApiException is parent of both ResponseException and ApiTimeoutException
    		dd($e);
		}	
    }

    public function propertyDoesNotExists($prop){

    	$result = $this->client->send(new Reqs\GetItemPropertyInfo($prop));
    	 if($result == null){
    	 	return true;
    	 } else {
    	 	return false;
    	 }
    }

    public function studentPropertyDoesNotExist($prop){
    	$result = $this->client->send(new Reqs\GetUserPropertyInfo($prop));
    	 if($result == null){
    	 	return true;
    	 } else {
    	 	return false;
    	 }
    }

    public function addCourseProperties(){
    	try{
    		$this->client->send(new Reqs\AddItemProperty('type', 'string'));			
			$this->client->send(new Reqs\AddItemProperty('category', 'string'));			
			$this->client->send(new Reqs\AddItemProperty('duration', 'string'));
			$this->client->send(new Reqs\AddItemProperty('grade', 'string'));
    	}
    	catch(Ex\ApiException $e){
    		dd($e);
    	}
    }

    public function addStudentProperties(){
    	try{
    		$this->client->send(new Reqs\AddUserProperty('dob', 'string'));
			$this->client->send(new Reqs\AddUserProperty('gender', 'string'));
			$this->client->send(new Reqs\AddUserProperty('location', 'string'));
			$this->client->send(new Reqs\AddUserProperty('kcse_grade', 'string'));
			$this->client->send(new Reqs\AddUserProperty('kcse_points', 'string'));
			$this->client->send(new Reqs\AddUserProperty('highschool', 'string'));
			$this->client->send(new Reqs\AddUserProperty('year_completed', 'string'));
			$this->client->send(new Reqs\AddUserProperty('personality', 'string'));
			$this->client->send(new Reqs\AddUserProperty('hobbies', 'string'));
			$this->client->send(new Reqs\AddUserProperty('skills', 'string'));
			$this->client->send(new Reqs\AddUserProperty('industry_of_interest', 'string'));
    	}
    	catch(Ex\ApiException $e){
    		dd($e);
    	}
    	
    }

    public function getRecommendations($userId){
       try {
           $result = $this->client->send(new Reqs\RecommendItemsToUser($userId, 5));
           return $result;
       } catch (Ex\ApiException $e) {
            $error = "unable to get reccomendations at the moment";
            return $error;
           // dd("recommendations are down at the moment try later");
       }
    }

    public function getItemRecommendations($itemId, $userId){
        try {
            $result = $this->client->send(new Reqs\RecommendItemsToItem($itemId, $userId, 4));
            return $result;
            
        } catch (Ex\ApiException $e) {
            
        }
    }
}
