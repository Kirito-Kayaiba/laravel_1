<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class AdminSettingController extends Controller
{
    public function index()
    {
        $accountSetting = \DB::table('users')->where('id', auth()->user()->id)->first();
        return view('Admin.setting', compact('accountSetting'));
    }
    public function update(Request $request)
    {
        $id_user = auth()->user()->id;
        $user = User::find($id_user);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->get('password') != null) {
            if ($request->get('password') == $request->get('password_record')) {
                $user->password = bcrypt($request->get('password'));
            } else {
                return redirect('admin/setting')->with('error', 'Mật khẩu không khớp');
            }
        }
        $user->updated_at = now();
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension(); // Lấy phần mở rộng của file (ví dụ: jpg, png, ...)
            $fileName = time() . '_' . mt_rand(1000, 9999) . '.' . $extension; // Thêm số ngẫu nhiên vào tên file
            $file->move(public_path('img'), $fileName);
            $user->avatar = '/img/' . $fileName;
        }
        $user->save();
        return redirect('admin/setting')->with('success', 'Cập nhật thành công');
    }
    public function dangkytichxanh()
    {
        $id_user = auth()->user()->id;
        $user = User::find($id_user);
        $user->yeuCau = 1;
        $user->save();
        return redirect('admin/setting')->with('success', 'Đăng ký thành công');
    }
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
    public function muagoitichxanh(Request $request)
    {
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = "100000";
        $orderId = time() ."";
        $redirectUrl = "http://127.0.0.1:8000/admin/setting/verify";
        $ipnUrl = "http://127.0.0.1:8000/admin/setting";
        $extraData = "";


        $requestId = time() . "";
        $requestType = "payWithATM";
        // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        $data = array('partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature);
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json
        return redirect()->to($jsonResult['payUrl']);
    }
    public function verify(Request $request)
    {
        $id_user = auth()->user()->id;
        $user = User::find($id_user);
        $user->veryfi = 1;
        $user->save();
        return redirect('admin/setting')->with('success', 'Đăng ký thành công');
    }
}
