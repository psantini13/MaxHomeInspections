<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Application::all(['id','name']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        // return Application::findOrFail($id)->get(['id','name']);
        try {
            $application = Application::find($id);

            return response()->json([
                'application' => $this->bankAccountValues($application)
               /* 'application' => [
                    'id' => $application->id,
                    'name' => $application->name,
                    'total_annual_income' => $this->totalAnnualIncome($application),
                    'borrower' => $this->bankAccountValues($application)
                ]*/
            ])->setStatusCode(Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'We cannot find Application Number: ' . $id
            ])->setStatusCode(Response::HTTP_BAD_REQUEST);
        }
    }

    private function totalAnnualIncome(Application $application)
    {
        $app = $application->load('borrowers.incomes');

        $totalAnnualIncome = 0.0;

        foreach ($app->borrowers as $borrower) {
            foreach ($borrower->incomes as $income) {
                $totalAnnualIncome += $income->amount * 12;
            }
        }

        return $totalAnnualIncome;
    }

    private function bankAccountValues(Application $application)
    {
        // return $application->load('borrowers.incomes')->borrowers;

        $app = $application->load('borrowers.incomes');

        $result = array();
        $borrowers = array();
        $totalAnnualIncome = 0.0;

        foreach ($app->borrowers as $borrower) {
            $annualIncome = 0.0;
            foreach ($borrower->incomes as $income) {
                $annualIncome += $income->amount * 12;
            }
            $borrowers[] = array(
                'id' => $borrower->id,
                'name' => $borrower->name,
                'bank_account_amount' => (float)$borrower->bank_account_amount,
                'annual_income' => $annualIncome,
                );
            $totalAnnualIncome += $annualIncome;
        }
        // $result[] = array('totalAnnualIncome', $totalAnnualIncome);
        $result[] = array(
            'id' => $application->id,
            'name' => $application->name,
            'totalAnnualIncome' => (float)$totalAnnualIncome,
            'borrower' => $borrowers
        );
        return $result;
    }
}
