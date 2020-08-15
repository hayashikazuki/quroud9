<?php

    
    function sanitize($before)
    {
        foreach($before as $key => $value)
        {
            $after[$key] = htmlspecialchars($value,ENT_QUOTES,'UTF-8');
        }
        
        return $after;
    }
    
    function era_select($hurugi_era = null)
    {
        print'<select name="era">';
        print'<option value="">----<option>';
        for($i = 1950; $i <= 2020; $i=$i+10){
            if($i == $hurugi_era){
                print'<option value="' . $i . '" selected>' . sprintf('%02d', $i) . '</option>';
            }else{
                print'<option value="' . $i . '">' . sprintf('%02d', $i) . '</option>';
            }
        }
        
        print'</select>';
    }
    
    function pulldown_year($year = null)
    {
        print'<select name="year" class="year-search">';
        print'<option value="">----<option>';
        for($i = 2015; $i <= 2025; $i++){
            if($i == $year){
                print'<option value="' . $i . '" selected>' . sprintf('%02d', $i) . '</option>';
            }else{
                print'<option value="' . $i . '">' . sprintf('%02d', $i) . '</option>';
            }
        }
        
        print'</select>';
    }
    
    function pulldown_month($month = null)
    {
        print'<select name="month" class="month-search">';
        print'<option value="">----<option>';
        for($i = 1; $i <= 12; $i++){
            if($i == $month){
                print'<option value="' . $i . '" selected>' . sprintf('%02d', $i) . '</option>';
            }else{
                print'<option value="' . $i . '">' . sprintf('%02d', $i) . '</option>';
            }
        }
        
        print'</select>';
    }
    
    function pulldown_saleyear($saleyear = null)
    {
        print'<select name="saleyear">';
        print'<option value="">----<option>';
        for($i = 2015; $i <= 2025; $i++){
            if($i == $saleyear){
                print'<option value="' . $i . '" selected>' . sprintf('%02d', $i) . '</option>';
            }else{
                print'<option value="' . $i . '">' . sprintf('%02d', $i) . '</option>';
            }
        }
        
        print'</select>';
    }
    
    function pulldown_salemonth($salemonth = null)
    {
        print'<select name="salemonth">';
        print'<option value="">----<option>';
        for($i = 1; $i <= 12; $i++){
            if($i == $salemonth){
                print'<option value="' . $i . '" selected>' . sprintf('%02d', $i) . '</option>';
            }else{
                print'<option value="' . $i . '">' . sprintf('%02d', $i) . '</option>';
            }
        }
        
        print'</select>';
    }
    
    
    function dawnload_pulldown_year()
    {
        print'<select name="year">';
        print'<option value="2017">2017</option>';
        print'<option value="2018">2018</option>';
        print'<option value="2019">2019</option>';
        print'<option value="2020">2020</option>';
        print'<option value="2021">2021</option>';
        print'<option value="2022">2022</option>';
        print'<option value="2023">2023</option>';
        print'<option value="2024">2024</option>';
        print'<option value="2025">2025</option>';
        print'</select>';
    }
    
    function dawnload_pulldown_month()
    {
        print'<select name="month">';
        print'<option value="01">01</option>';
        print'<option value="02">02</option>';
        print'<option value="03">03</option>';
        print'<option value="04">04</option>';
        print'<option value="05">05</option>';
        print'<option value="06">06</option>';
        print'<option value="07">07</option>';
        print'<option value="08">08</option>';
        print'<option value="09">09</option>';
        print'<option value="10">10</option>';
        print'<option value="11">11</option>';
        print'<option value="12">12</option>';
        print'</select>';
    }
    
    function dawnload_pulldown_day()
    {
        print'<select name="day">';
        print'<option value="01">01</option>';
        print'<option value="02">02</option>';
        print'<option value="03">03</option>';
        print'<option value="04">04</option>';
        print'<option value="05">05</option>';
        print'<option value="06">06</option>';
        print'<option value="07">07</option>';
        print'<option value="08">08</option>';
        print'<option value="09">09</option>';
        print'<option value="10">10</option>';
        print'<option value="11">11</option>';
        print'<option value="12">12</option>';
        print'<option value="13">13</option>';
        print'<option value="14">14</option>';
        print'<option value="15">15</option>';
        print'<option value="16">16</option>';
        print'<option value="17">17</option>';
        print'<option value="18">18</option>';
        print'<option value="19">19</option>';
        print'<option value="20">20</option>';
        print'<option value="21">21</option>';
        print'<option value="22">22</option>';
        print'<option value="23">23</option>';
        print'<option value="24">24</option>';
        print'<option value="25">25</option>';
        print'<option value="26">26</option>';
        print'<option value="27">27</option>';
        print'<option value="28">28</option>';
        print'<option value="29">29</option>';
        print'<option value="30">30</option>';
        print'<option value="31">31</option>';
        print'</select>';
    }
    
    function salestatus($status){
        print'<select name="status" class="status-search">';
            print'<option value="">-----</option>';
            if($status == notsale){
                print'<option value="notsale" selected>'.未販売.'</option>';
            }
            else
            {
                print'<option value="notsale">'.未販売.'</option>';
            }
            
            if($status == onsale){
                print'<option value="onsale" selected>'.販売中.'</option>';
            }
            else
            {
                print'<option value="onsale">'.販売中.'</option>';
            }
            
            if($status == sold){
                print'<option value="sold" selected>'.販売済み.'</option>';
            }
            else
            {
                print'<option value="sold">'.販売済み.'</option>';
            }
            
            
            
        print'</select>';
    }

?>