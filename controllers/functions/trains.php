<?php
  require("OpenLDBWS.php");
  
    function GetTrains($start_location)
    {
  	    $results = array();
  	    $i = 0;
	    $OpenLDBWS = new OpenLDBWS("93cca7c3-9c17-4aa6-9113-76d5657ddc02");
	    $response = $OpenLDBWS->GetDepartureBoard(10,$start_location);
	    $source_location_name = $response->GetStationBoardResult->locationName;
	    if (count($response->GetStationBoardResult->trainServices->service) > 0)
	    {
			foreach ($response->GetStationBoardResult->trainServices->service as $value)
			{
			  	$result = "";
			  	$destination_location_name = $value->destination->location->locationName;
			  	$std = $value->std;
			  	$etd = $value->etd;
			  	if ($destination_location_name == "London Marylebone")
			  	{
			  		$result .= "$source_location_name - $destination_location_name - $std - $etd";
			  		//print_r($result);
			  		array_push($results, $result);
			  	}
		  	}
		}
		else
		{
			$result .= "No trains availalble";
		}

	  return $results;
   }

   //GetTrains("BCF");
?>
