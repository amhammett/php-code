<?php

date_default_timezone_set('Australia/Sydney');

// only run mon-fri (1-5) 8am-6pm (8-18)
function business_hours () {
    if(isa_work_day() && within_work_hours()){
        return true;
    }

    return false;
}

function isa_work_day() {
    $day_of_week_format='N';
    $now_day=date($day_of_week_format);

    if( $now_day > 0 && $now_day < 6) {
        return true;
    }

    return false;
}

function within_work_hours() {
    $hour24_format='G';
    $now_hour=date($hour24_format);

    if( $now_hour > 8 && $now_hour < 18 ) {
        return true;
    }

    return false;
}

if(business_hours()) {
    echo "inside business hours";
} else {
    echo "outside business hours";
}

echo "\n";
