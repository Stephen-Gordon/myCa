<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;



class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }




    public function index()
    {
        $customers = Customer::all();
        return view('admin.customers.index', [
            // the view can see the customers (the green one)
            'customers' => $customers
        ]);
    }





    public function create()
    {
        return view('admin.customers.create');
    }





    public function store(Request $request)
    {
        // when user clicks submit on the create view above
        // the customer will be stored in the DB
        $request->validate([
            'name' => 'required',
            'address' =>'required|max:500',
            'email' => 'required|email',
            'phone' => 'required|min:6',
            'customer_image' => 'file|image'
        ]);


        $customer_image = $request->file('customer_image');
        $filename = $customer_image->hashName();

        $path = $customer_image->storeAs('public/images', $filename);


        // if validation passes create the new book

        //Makes a Customer Object
        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->address = $request->input('address');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phone');
        $customer->image_location =  $filename;


        //Puts them in the customer variable
        //Customer is now an object
        //Saves it to the database
        $customer->save();

        //Then goes back to index if everything is correct
        return redirect()->route('admin.customers.index');
    }


    public function show($id)
    {
        $customer = Customer::findOrFail($id);

        return view('admin.customers.show', [
            'customer' => $customer
        ]);
    }



    public function edit($id)
    {
        // get the customer by ID from the Database. passes through the function

        //Find or Fail check is it exists

        $customer = Customer::findOrFail($id);

        // Load the edit view and pass the customer to
        // that view
        return view('admin.customers.edit', [
            'customer' => $customer
        ]);
    }



    public function update(Request $request, $id)
    {

        // first get the existing customer that the user is update
        //Id is passed through to make sure we update the right customer

        $customer = Customer::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'address' =>'required|max:500',
            'email' => 'required|email',
            'phone' => 'required|min:6'
        ]);



        // if validation passes then update existing customer
        $customer->name = $request->input('name');
        $customer->address = $request->input('address');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phone');
        $customer->image = $request->input('image');
        $customer->save();


        return redirect()->route('admin.customers.index');
    }




    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('admin.customers.index');
    }
}
