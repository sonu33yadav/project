<?php

namespace App\Http\Controllers;
use Mail;
use App\Models\user;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $data)
    {  $name = $data->name;//form  filed name
    	$email = $data->email;
    	$password = $data->password;
        $products=$data->product;

    	$obj = new user;

    	$obj->name = $name;//database  field name
        $obj->products =$products;
    	$obj->email = $email;
    	$obj->password = $password;
    

    	if($obj->save())
    	{
    		// return redirect('index',[$name]);

             $data = array('name'=>$name, 'email'=>$email, 'products'=>$products);
             
            Mail::send('temp', $data, function ($message) use ($name,$products,$email) {
                 $message->from('sk1533884@gmail.com',$name);
            
                 $message->to($email)->cc('sk1533884@gmail.com')->subject('This is form Test side');
                //  $message->attach('\Project\resource\views\temp.blade.php');
            });
            return view('temp')->with(['name'=>$name])->with(['products'=>$products]);
            // echo "Email Sent with attachment. Check your inbox.";
         }

    	
    	else
    	{
    		echo "data not insrted";
    	}

        //  return view('temp')->with(['name'=>$name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $data)
    {
        
        // $name = $data->name;//form  filed name
    	// $email = $data->email;
    	// $password = $data->password;
        // $products=$data->product;

    	// $obj = new user;

    	// $obj->name = $name;//database  field name
        // $obj->products =$products;
    	// $obj->email = $email;
    	// $obj->password = $password;
    

    	// if($obj->save())
    	// {
    	// 	return redirect('index',[$name]);
    	// }
    	// else
    	// {
    	// 	echo "data not insrted";
    	// }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        //
    }
}
