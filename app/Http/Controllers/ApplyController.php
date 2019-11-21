<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ApplyController extends Controller
{
    //
    public static $STEP_1 = 1;
    public static $STEP_2 = 2;
    public static $STEP_3 = 3;
    public static $STEP_4 = 4;
    // public static $STEP_5 = 5;
    public static $STEP_LAST = 5;

    public static $APPLY_STEP_KEY = 'apply_step';
    public static $APPLY_DATA_KEY = 'apply_data';

    public static $fields_group = [
        ['apartment_1-bed-apartment', 'apartment_2-bed-apartment', 'apartment_3-bed-townhouse', 'extra_accessible-property', 'extra_space-for-pet'],
        ['move_in'],
        ['budget_min', 'budget_max'],
        // ['day_of_week', 'time'],
        ['name', 'number', 'email'],
        [],
    ];

    public function index(Request $request) {
        $session = $request->session();
        $previous_path = str_replace(url('/'), '', url()->previous());
        if (strpos($previous_path, '/apply') !== 0) {
            $session->put('previous_path', $previous_path);
        }

        $step = $session->get(ApplyController::$APPLY_STEP_KEY, ApplyController::$STEP_1);
        $data = $session->get(ApplyController::$APPLY_DATA_KEY, []);
        return view("apply-{$step}", [
            'step' => $step,
            'data' => $data,
            'title' => 'Apply'
        ]);
    }

    private function unset(&$data, $fields) {
        foreach($fields as $field) {
            if (isset($data[$field])) {
                unset($data[$field]);
            }
        }
    }

    public function store(Request $request) {
        $session = $request->session();
        $step = $request->input('step', $session->get(ApplyController::$APPLY_STEP_KEY, ApplyController::$STEP_1));

        if ($step < ApplyController::$STEP_1) {
            $step = ApplyController::$STEP_1;
        } else if($step > ApplyController::$STEP_LAST) {
            $step = ApplyController::$STEP_LAST;
        }


        $fields = ApplyController::$fields_group[$step-1];
        $input = $request->only($fields);
        $data = $session->get(ApplyController::$APPLY_DATA_KEY, []);
        $this->unset($data, $fields);
        $data = array_merge($data, $input);
        $session->put(ApplyController::$APPLY_DATA_KEY, $data);

        $step++;
        $session->put(ApplyController::$APPLY_STEP_KEY, $step);

        return view("apply-{$step}", [
            'step' => $step,
            'data' => $data,
            'title' => 'Apply'
        ]);
    }

    public function back(Request $request) {
        $session = $request->session();
        $step = $request->input('step', $session->get(ApplyController::$APPLY_STEP_KEY, ApplyController::$STEP_1));
        $data = $session->get(ApplyController::$APPLY_DATA_KEY, []);
        
        if ($step > ApplyController::$STEP_LAST) {
            $step = ApplyController::$STEP_LAST;
        }

        if ($step > ApplyController::$STEP_1) {
            $fields = ApplyController::$fields_group[$step-1];
            $this->unset($data, $fields);
            $session->put(ApplyController::$APPLY_DATA_KEY, $data);
        
            $step --;
            $session->put(ApplyController::$APPLY_STEP_KEY, $step);
        }
        
        return redirect()->route('apply.index');
    }

    public function skip(Request $request) {
        $session = $request->session();
        $step = $request->input('step', $session->get(ApplyController::$APPLY_STEP_KEY, ApplyController::$STEP_1));
        $step ++;
        $session->put(ApplyController::$APPLY_STEP_KEY, $step);

        return redirect()->route('apply.index');
    }

    public function clear(Request $request) {
        $session = $request->session();
        $session->forget(ApplyController::$APPLY_STEP_KEY);
        $session->forget(ApplyController::$APPLY_DATA_KEY);
    }
}
