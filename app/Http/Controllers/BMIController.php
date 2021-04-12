<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BMIController extends Controller
{
    public function index()
    {
        return view('user.bmi_kalkulator');
    }

    public function calculate(Request $request)
    {
        $gender = $request->input('gender');
        $bb = $request->input('bb');
        $tb = $request->input('tb');

        $tb = ($tb*0.01); // cm to m

        function bmi($mass,$height) {
            $bmi = $mass/($height*$height);
            return $bmi;
        }

        $bmi = bmi($bb,$tb);

        if ($bmi <= 18.5) {
            $output = "Underweight";
    
            } else if ($bmi > 18.5 AND $bmi<=24.9 ) {
            $output = "Normal";
    
            } else if ($bmi > 24.9 AND $bmi<=29.9) {
            $output = "Overweight";
    
            } else if ($bmi > 30.0) {
            $output = "Obese";
        }
        // echo "Your BMI value is  " . $bmi . "  and you are : "; 
        // return $output;

        return view('user.bmi_kalkulator',[
            'bmi' => $bmi,
            'output' => $output
        ]);
    }
}
