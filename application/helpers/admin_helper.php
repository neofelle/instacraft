<?php

    /*
     * Session on admin section 
     * @author : niraj
     * @admin panel
     * @redirec login if not signed in 
     * @function for : check login session on everpage call
     */
    function sessionChk(){
        $CI = & get_instance();
        $CI->load->library('session');
        $chkVal = $CI->session->userdata('logged_in');
        if(!isset($chkVal)){
            $CI->session->set_flashdata('error','Sorry, Please login first      ');
            $CI->session->flashdata('error');
            redirect(base_url().'admin');
        }
    }
    
    
    
    /*
     * Users on Map section 
     * @admin panel
     * @return true/false
     * @function for : Calculate distance Between Two LatLongs 
     */

    function distance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000) {
        // convert from degrees to radians
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
                                cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return round($angle * $earthRadius);
    }
    
    /*
     * Function : Calculate Drivers Distance & time 
     */
    function drivingDistanceAndTime($lat1, $lat2, $long1, $long2) {
        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=" . $lat1 . "," . $long1 . "&destinations=" . $lat2 . "," . $long2 . "&mode=driving&key=AIzaSyDnT6ewhJpccffkJRlbAPyCQeQKJxJfLQ8";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $response_a = json_decode($response, true);
        $dist = (array_key_exists('distance', $response_a['rows'][0]['elements'][0]))?$response_a['rows'][0]['elements'][0]['distance']['text']:'';
        $distanceValue = (array_key_exists('distance', $response_a['rows'][0]['elements'][0]))?($response_a['rows'][0]['elements'][0]['distance']['value']) / 1000:'';
        $time =(array_key_exists('duration', $response_a['rows'][0]['elements'][0]))? $response_a['rows'][0]['elements'][0]['duration']['text']:'';
        return array('distance' => $dist, 'distanceValue' => $distanceValue, 'time' => $time);
    }
    
    /*
     * Function : Pagination For All Pages with listing 
     */
    function globalPagination($totalPage = '', $baseUrl = '', $perPage = '') {
        $CI = & get_instance();
        $CI->load->library('pagination');
        $config['base_url'] = $baseUrl;
        $config['total_rows'] = $totalPage;
        $config['per_page'] = $perPage;
        $config['full_tag_open'] = "<p class='pagination_bottom'>";
        $config['full_tag_close'] = "</p>";
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['use_page_numbers'] = TRUE;
        $config['next_link'] = "Next";
        $config['prev_link'] = "Prev";
        $config['first_link'] = "First";
        $config['last_link'] = "Last";
        $CI->pagination->initialize($config);

        if ($_GET['page'] != '' && $_GET['page'] > 0) {
            $pageFrom = ($_GET['page'] - 1) * $perPage;
        } else {
            $pageFrom = '0';
        }
        return $pageFrom;
    }


    //send global email function 
    function sendEmailGlobalPart2($from_email = '', $email = '', $name = '', $subject = '', $emailMessage = '', $attachment = '') {

        $CI = & get_instance();
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $CI->load->library('email');
        $CI->email->set_newline("\r\n");
        $CI->email->initialize($config);
        $CI->email->from($from_email, "Support | Travel Assist");
        $CI->email->to($email, $email);
        $CI->email->subject($subject);

        $CI->email->message($emailMessage);
        $res = $CI->email->send();
       
        if($res){ 
            return TRUE;
        }else{
            
            echo "<pre>";print_r($CI->email->print_debugger());die;
        }
    }
    
    function average_time($total, $count, $rounding = 0) {
        $total = explode(":", strval($total));
        if (count($total) !== 3) return false;
        $sum = $total[0]*60*60 + $total[1]*60 + $total[2];
        $average = $sum/(float)$count;
        $hours = floor($average/3600);
        $minutes = floor(fmod($average,3600)/60);
        $seconds = number_format(fmod(fmod($average,3600),60),(int)$rounding);
        return $hours.":".$minutes.":".$seconds;
    }

    //--- 
    //--- # Admin Dashboard Functionalities #
    //---
    
    
    //-- 
    
   function returnCouponDropDown() {
    $CI = & get_instance();
    $coupons = $CI->db->select('id, code')
            ->from('coupons')
            ->get()
            ->result_array();

    $html = "<select name=\"coupons\" id=\"coupons\"><option value=\"-1\">Select</option>";
    foreach ($coupons as $coupon){
        $html .= "<option value=\"$coupon[id]\">$coupon[code]</option>";
    }
    $html .= "</select>";
   
    return $html;
}
