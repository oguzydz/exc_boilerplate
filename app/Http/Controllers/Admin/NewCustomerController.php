<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CancelRequest;
use App\Http\Requests\NewCustomerSearchRequest;
use App\Models\SubMerchant;
use App\Models\User;
use App\Models\UserCancel;
use App\Services\IyzicoService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NewCustomerController extends Controller
{
    protected $iyzicoService;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(IyzicoService $iyzicoService)
    {
        $this->iyzicoService = $iyzicoService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(NewCustomerSearchRequest $request)
    {
        $customers = User::where('status', User::STATUS_READY)
            ->whereHas("roles", function ($role) {
                $role->where("name", "user");
            })
            ->where(function ($query) use ($request) {
                $query->where('name', 'like', "%$request->search%");
            })
            ->select(['id', 'name', 'email', 'status', 'created_at'])
            ->paginate(10);

        return Inertia::render('Admin/NewCustomer/Index', [
            'data' => $customers
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $userId
     * @return \Illuminate\Http\Response
     */
    public function show(int $userId)
    {
        $data = User::with(['iban', 'confirmData', 'company', 'type', 'city', 'county'])->findOrFail($userId);

        return Inertia::render('Admin/NewCustomer/Show', [
            'data' => $data
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm(Request $request, int $userId)
    {
        $user              = User::findOrFail($userId);
        $createSubMerchant = $this->iyzicoService->createPersonelSubMerchant($user);

        if ($createSubMerchant->getStatus() == 'success') {
            SubMerchant::create([
                'company_id'       => $user->company->id,
                'sub_merchant_key' => $createSubMerchant->getSubMerchantKey(),
            ]);
            $user->update(['status' => User::STATUS_ACTIVE]);

            return redirect()->back();
        }

        return redirect()->back()->withErrors([
            'message' => $createSubMerchant->getErrorMessage()
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  int  $userId
     * @return \Illuminate\Http\Response
     */
    public function cancel(int $userId)
    {
        $user = User::findOrFail($userId);

        return Inertia::render('Admin/NewCustomer/Cancel', [
            'data' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $userId
     * @return \Illuminate\Http\Response
     */
    public function cancelStore(CancelRequest $request, int $userId)
    {
        $user = User::findOrFail($userId);

        $data = [
            'user_id' => $userId,
            'text'    => $request->text,
        ];

        try {
            $user->update([
                'status' => User::STATUS_CANCELED
            ]);

            UserCancel::create($data);

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('type', 'error');
            $request->session()->flash('message', __('Kullanıcı güncellenirken beklenmedik bir hata oldu'));

            return redirect()->back();
        }
    }
}
