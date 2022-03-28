<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Controllers\EmployeeController;
use \Validator;

class AdminController extends Controller
{
    public function login()
    {
        $credentials = request(['email', 'password']);
        if (!$token = auth()->guard('admin_api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated Admin.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function profile()
    {
        return response()->json(auth('admin_api')->user());
    }
    /**
     * Get Employee Salary and Bouns.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSalaries(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'month' => 'required|in:Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,Dec',
            'year' => 'required|digits:4|integer|min:2000|max:'.(date('Y')+10),
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $employee = new EmployeeController();

        $salariesPaymentDay = $employee->getPaymentDay($request->year, $request->month, 1);
        $salariesTotal = $employee->getPaymentAmount();

        $bounsPaymentDay = $employee->getPaymentDay($request->year, $request->month, 15);
        $bounsTotal = $employee->getPaymentAmount(0.1);
        
        $paymentsTotal = $salariesTotal + $bounsTotal;

        return response()->json([
            'Month' => $request->month,
            'Salaries_payment_day' => $salariesPaymentDay,
            'Bonus_payment_day' => $bounsPaymentDay,
            'Salaries_total' => '$'.$salariesTotal,
            'Bonus_total' => '$'.$bounsTotal,
            'Payments_total' => '$'.$paymentsTotal
        ]);


    }
    /**
     * Log the admin out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('admin_api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('admin_api')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->guard('admin_api')->factory()->getTTL() * 60
        ]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:100|unique:admins',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $admin = Admin::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));

        return response()->json([
            'message' => 'Admin successfully registered',
            'admin' => $admin
        ], 201);
    }
}
