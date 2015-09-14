<?php

class DateTimeView {


	public function show() {
		date_default_timezone_set("Europe/Stockholm");
		$timeString = date("l") . ", the " . date("jS") . " of " . date("F") . " " . date("Y") . ", The time is " . date("h:m:s");

		return '<p>' . $timeString . '</p>';
	}
}